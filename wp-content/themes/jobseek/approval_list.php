<?php
/* Template name: Approval List Template */
get_header();
global $wp;
include("database.php");
$user_ID = get_current_user_id();
$current_user = wp_get_current_user();
if ( !($current_user instanceof WP_User) )
   return;
$roles = $current_user->roles;  //$roles is an array
$page_title = get_post_meta( get_the_ID(), '_jobseek_page_title_show', true );
$mydata = get_user_meta($user_ID);
if( $page_title != 'hide' )
{
	$page_subtitle = get_post_meta( get_the_ID(), '_jobseek_page_title_subtitle', true ); ?>
	<section id="title">
		<div class="container">
			<h1><?php the_title(); ?></h1>
			<?php if( !empty( $page_subtitle ) ) { ?><h4><?php echo esc_html($page_subtitle); ?></h4><?php } ?>
		<h3><?php print($mydata['first_name'][0].' '.$mydata['last_name'][0]); ?></h3>
		</div>
	</section>
<?php }
// UPDATE Logic Below
if(isset($_GET['action']) && !empty($_GET['action']))
{
    if($_GET['action'] == 'candidate')
    {
        // Update the EMPLOYER Record SQL with sr_id
        $posts  =  "UPDATE applied_job_details SET approved_by_company = '1' WHERE sr_id = ".$_GET['id']." ;";
        $result = mysqli_query($conn, $posts);
    } else if($_GET['action'] == 'employer')
    {
       // Update the CANDIDATE Record SQL with sr_id
        $posts  =  "UPDATE applied_job_details SET approved_by_candidate = '1' WHERE sr_id = ".$_GET['id']." ;";
        $result = mysqli_query($conn, $posts);
    }
}

// Get Current User Meta
$applicantmeta = get_user_meta($user_ID);
?>

<section id="content"<?php if( $page_title != 'show' ) { ?> class="no-title"<?php } ?>>
	<div class="container">
    <?php 
            if($user_ID != 0 && strtolower($roles['0']) == 'employer' )
            {
                 // SQL For Employer
                  $sql = "SELECT
                               ajb.sr_id as id,
                                ajb.user_ID,
                                ajb.job_ID,
                                ajb.approved_by_company,
                                DATE_FORMAT(ajb.applied_date,'%d %b %y') as applied_date,
                           (SELECT wp_p.post_title
                            FROM wp_posts AS wp_p
                            WHERE wp_p.ID = ajb.job_ID
                              AND post_type LIKE 'job_listing'
                              AND wp_p.post_author = '{$user_ID}') AS job_title,
                           (SELECT wp_u.display_name
                            FROM `wp_usermeta` AS wp_um
                            LEFT JOIN `wp_users` wp_u ON (wp_u.ID = wp_um.user_id)
                            WHERE wp_um.user_id = ajb.user_ID
                              AND wp_um.meta_key LIKE 'cjfm_user_role'
                              AND (wp_um.meta_value = 'subscriber' OR wp_um.meta_value = 'candidate')
                              AND wp_u.display_name NOT LIKE '') AS candidate_name
                         FROM `applied_job_details` AS ajb
                         INNER JOIN wp_posts ON (wp_posts.ID = ajb.job_ID)
                         WHERE ajb.job_ID <> '0'
                           AND ajb.sent_by_emp <> '1'
                           AND wp_posts.post_author = '{$user_ID}'
                           ORDER BY ajb.sr_id ASC";

            }else if($user_ID != 0 && (strtolower($roles['0']) == 'subscriber' || strtolower($roles['0']) == 'candidate' ))
            {
                // SQL for Candidate
                 $sql = "SELECT ajb.sr_id as id,
			ajb.emp_id as emp_id,
                        ajb.approved_by_candidate as approved_by_candidate,
                        (SELECT wp_um.meta_value FROM `wp_usermeta` AS wp_um WHERE wp_um.user_id = ajb.emp_id AND wp_um.meta_key LIKE 'company_name' ) as company_name,
                        (SELECT wp_um.meta_value FROM `wp_usermeta` AS wp_um WHERE wp_um.user_id = ajb.emp_id AND wp_um.meta_key LIKE 'contact_person' ) as company_contact_person,
                        (SELECT wp_um.meta_value FROM `wp_usermeta` AS wp_um WHERE wp_um.user_id = ajb.emp_id AND wp_um.meta_key LIKE 'cjfm_city' ) as company_city,
                        (SELECT wp_um.meta_value FROM `wp_usermeta` AS wp_um WHERE wp_um.user_id = ajb.emp_id AND wp_um.meta_key LIKE 'cjfm_state' ) as company_state,
(SELECT wp_um.meta_value FROM `wp_usermeta` AS wp_um WHERE wp_um.user_id = ajb.emp_id AND wp_um.meta_key LIKE 'cjfm_address1' ) as company_address_1,
(SELECT wp_um.meta_value FROM `wp_usermeta` AS wp_um WHERE wp_um.user_id = ajb.emp_id AND wp_um.meta_key LIKE 'cjfm_address2' ) as company_address_2,
                        DATE_FORMAT(ajb.applied_date,'%d %b %y') as applied_date
                        FROM applied_job_details AS ajb WHERE ajb.user_ID = '{$user_ID}' AND ajb.sent_by_emp = '1'
                        ORDER BY ajb.sr_id ASC;";

            }else {

                // Dummy Condition for Admins....
                //$roles['0'] == 'administrator'
            }

            //print($sql);exit;

            $result = mysqli_query($conn, $sql);

            $currResult = array();

                if(strtolower($roles['0']) == 'subscriber' || strtolower($roles['0']) == 'candidate')
                {
                   $path = pathinfo($_SERVER['REQUEST_URI']);
                    while($row = $result->fetch_assoc())
                    {

                        if(isset($_GET['id']) && ($row['id'] === $_GET['id']))
                        {
                            $currResult = $row;

                        }
                        print('<div class="vc_row wpb_row vc_inner vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-8">
                               <div class="wpb_wrapper">
                                  <h2 class="subtitle">'.$row['company_name'].'</h2>
                                  <div class="wpb_text_column wpb_content_element ">
                                     <div class="wpb_wrapper">
                                        <p>Company Location: '.ucwords(strtolower($row['company_address_1'])) .', ' .ucwords(strtolower($row['company_address_2'])) .', '.ucwords(strtolower($row['company_city'])).' - '.ucwords(strtolower($row['company_state'])).'</p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-4">
                               <div class="wpb_wrapper">');
                                if($row['approved_by_candidate'] !== '1')
                                {
                                  print('<div class="vc_btn3-container vc_btn3-center"><a href="'.get_site_url().'/dashboard/approval-list?id='.$row['id'].'&action=employer"><button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-round vc_btn3-style-outline vc_btn3-icon-left vc_btn3-color-orange" onclick="javascript:void(1);"><i class="vc_btn3-icon fa fa-file-text"></i> Pending Approval</button></a></div>');

                                }else{

                                  print('<div class="vc_btn3-container vc_btn3-center" data-sr-id='.$row['id'].'><button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-round vc_btn3-style-outline vc_btn3-icon-left vc_btn3-color-green" onclick="javascript:void(1);"><i class="vc_btn3-icon fa fa-file-text"></i> Approved</button></div>');
                                }
                               print('
                               </div>
                            </div>
                         </div>
                         <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_turquoise"><span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span></div>');
                     }
                }
                if(!empty($currResult))
                {

                    if(isset($_GET['action']) && !empty($_GET['action']))
                    {

                        if($_GET['action'] == 'employer')
                        {

                            if($currResult['id'] === $_GET['id'])
                            {
			      $currResult['metadata'] = get_user_meta($currResult['emp_id']);

                            // Text Message Send to Candidate with Company Details ------------------------------------

                                    //-----------------------------------------

                                    // Send Call Letter Functionality

                                    //-----------------------------------------

                                    if(strlen($applicantmeta['phone_no'][0]) == 0)
                                    {

                                        $candidate_phone_number = '9768230192';

                                    }else if(strlen($applicantmeta['phone_no'][0]) > 10)

                                    {

                                        $candidate_phone_number = substr((int)$applicantmeta['phone_no'][0],2,10);



                                    }else{

                                        $candidate_phone_number = $applicantmeta['phone_no'][0];

                                    }
					

                                    $candidate_name  =  $applicantmeta['first_name'][0] ." ". $applicantmeta['last_name'][0];

                                    if(!$candidate_phone_number)
                                    {


                                    }else{

                                        // We got the phone number. send message.
                                        $apiKey = "fIGPfvyRREQ-AhC2MBBByyTkOBrtdr6yGarPJlWxFQ";

                                        // Config variables. Consult http://api.textlocal.in/docs for more info.

                                        $test = "0";

                                        // Data for text message. This is the text message data.

                                        $sender = "SEZPLS"; // This is who the message appears to be from.

                                        $numbers = "91".$candidate_phone_number; // A single number or a comma-seperated list of numbers

					$message = "Hello ".substr($candidate_name,0,15).", you are selected for interview at ".substr($currResult['company_name'],0,25).". Please contact Company at: ".substr($currResult['metadata']['phone-no']['0'],0,18)." - SEZPLUS Team";

                                        // 612 chars or less

                                        // A single number or a comma-seperated list of numbers

                                        $message = urlencode($message);

                                        $data = "apiKey=".$apiKey."&&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;

                                        $ch = curl_init('http://api.textlocal.in/send/?');

                                        curl_setopt($ch, CURLOPT_POST, true);

                                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                                        $result = curl_exec($ch); // This is the result from the API

					print("<div class='result_text' style='display:none;'>".json_encode($result)."</div>");
                                        //print($result);

                                        curl_close($ch);

                                        //-------------------------------------------------------

                                    }

                            // Text Message Send to Candidate with Company Details ENDS--------------------------------

                            }

                        }

                    }

                }

                get_footer(); ?>
