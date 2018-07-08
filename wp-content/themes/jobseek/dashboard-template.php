<?php
// This is the Original File being used by Employer & Candidate Dashboard -- Rohit Batra
get_header();
include("database.php");
$user_ID = get_current_user_id();
#var_dump($user_ID);die();
$current_user = wp_get_current_user();
if ( !($current_user instanceof WP_User) )
   return;
$roles = $current_user->roles;  //$roles is an array
$mydata = get_user_meta($user_ID);

echo '
    <section id="title">
      <div class="container">
        <h1>Dashboard</h1>
        <br />
        <h3>'.$mydata['first_name'][0].' '.$mydata['last_name'][0].'</h3>
      </div>
  </section>';
if($user_ID != 0) {
  if( $roles['0'] == 'subscriber' || $roles['0'] == 'administrator' ) {
   $posts  =  "SELECT * from applied_job_details where user_ID = ".$user_ID;
   $result = mysqli_query($conn, $posts);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $myjobs[] = $row;
    }
} else {
   $nojob = 1;
}

if(empty($nojob)) {

   foreach ($myjobs as $key => $value) {
      if($value['job_ID'] == 0 && $value['approved_by_candidate'] == 0){
        $chosen[] = $value['emp_id'];
      }else{
       $jobidlist[] = $value['job_ID'];
      }
   }

   $posts  =  "SELECT * from wp_posts WHERE ID IN (".implode(', ', $jobidlist).") AND post_status LIKE 'publish' ORDER BY DATE(post_date) DESC;";
   $result = mysqli_query($conn, $posts);
   if ($result->num_rows > 0) {

       while($row = $result->fetch_assoc()) {
           $myjoblist[] = $row;
       }
   } else {
      $nojob = true;
   }
   // If he is chosen
   if(!empty($chosen)){
      // Get the list of chosen Employees.
      foreach ($chosen as $key => $value) {
          $chosen_emp[$value]['emp'] = get_userdata($value);
          $chosen_emp[$value]['empmeta'] = get_user_meta($value);
      }
     // If chosn is available thn we need the phone number.
   }
}

if($_GET['self_approved']) {
  $empid = $_GET['empid'];

  $phone_number_to_send = $mydata['phone_no'][0];

  $company_name = $chosen_emp[$empid]['empmeta']['company_name'][0];

  $contact_person = $chosen_emp[$empid]['empmeta']['phone-no'][0];

  // Send the message
  $destination_number = $mydata['phone_no'][0];

				             // We got the phone number. send message.
          $apiKey = "fIGPfvyRREQ-Gz6JNj76pHVpPH255wO7tMVO7jCGRq";

          // Config variables. Consult http://api.textlocal.in/docs for more info.

          $test = "0";

          // Data for text message. This is the text message data.

          $sender = "SEZPLS"; // This is who the message appears to be from.

          $numbers = "91".$destination_number; // A single number or a comma-seperated list of numbers

					$message = "Hello ".substr($candidate_name,0,8).", you are selected for interview at ".substr($company_name,0,8).". Please Contact: ".substr($contact_person,0,8).", Phone: ".substr($phone_number_to_send,0,12)." - SEZPLUS Team";

          $message = urlencode($message);

          $data = "apiKey=".$apiKey."&&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;

          $ch = curl_init('http://api.textlocal.in/send/?');

          curl_setopt($ch, CURLOPT_POST, true);

          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $result = curl_exec($ch); // This is the result from the API

          curl_close($ch);
          #var_dump($result);
          $qur = "UPDATE `applied_job_details` SET `approved_by_candidate` = '1' WHERE emp_id = ".$empid;

          $result = mysqli_query($conn, $qur);

      echo '<div style="background-color: #469A2A;

        padding: 8px;

        text-align: center;

        margin-bottom: 20px;

        font-size: 22px;

        border-radius: 8px;

        color: white;

        width: 50%;">Approved, Message has been sent.</div>';
}

              if($myjoblist){

              foreach ($myjoblist as $key => $value) {
                 echo '<div class="container">
                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                    <!--<div class="wpb_column vc_column_container vc_col-sm-3">
                       <div class="wpb_wrapper">
                          <div class="wpb_single_image wpb_content_element vc_align_right">
                             <figure class="wpb_wrapper vc_figure">
                                <div class="vc_single_image-wrapper vc_box_border_grey"><img width="150" height="150" src="" class="vc_single_image-img attachment-thumbnail" alt="Company-Logo"></div>
                             </figure>
                          </div>
                       </div>
                    </div>-->
                    <div class="wpb_column vc_column_container vc_col-sm-8">
                       <div class="wpb_wrapper">
                          <h2 class="subtitle">'.$value['post_title'].'</h2>
                          <div class="wpb_text_column wpb_content_element ">
                             <div class="wpb_wrapper">
                                <p>'.$value['post_content'].'</p>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-4">
                       <div class="wpb_wrapper">
                          <div class="vc_btn3-container vc_btn3-center"><button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-round vc_btn3-style-outline vc_btn3-icon-left vc_btn3-color-orange"><i class="vc_btn3-icon fa fa-file-text"></i><a href="'.$value['guid'].'"> Know More</a></button></div>
                          <div class="vc_btn3-container vc_btn3-center"><button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-icon-left vc_btn3-color-turquoise"><i class="vc_btn3-icon fa fa-check-square-o"></i> Applied</button></div>
                       </div>
                    </div>
                 </div>
                 <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_turquoise"><span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span></div>';
              }

          }else{
            echo '<h2>You have not applied for any jobs.</h2>';

          }
            echo '</div>
         </div>
      </div>
  </div>
  </section>';

  }else{
    $posts  =  "SELECT * from wp_posts where post_author = ".$user_ID." AND post_status LIKE 'publish' ORDER BY DATE(post_date) DESC ";

    $result = mysqli_query($conn, $posts);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $posts_list[] = $row;
    }
} else {
    // No result
   $nojob = true;

}
foreach ($posts_list as $key => $value) {
   $final_post[$key]['title'] = $value['post_title'];
   $final_post[$key]['description'] = $value['post_content'];
   $final_post[$key]['id'] = $value['ID'];

   $posts  =  "SELECT count('user_ID') as cont from applied_job_details where job_ID = ".$value['ID'];

   $result = mysqli_query($conn, $posts);

   if ($result->num_rows > 0) {

       // output data of each row
       while($row = $result->fetch_assoc()) {
         $final_post[$key]['count'] = $row["cont"];

       }
   }
}
$conn->close();

echo '
<section id="content">
   <div class="container">
      <div class="vc_row wpb_row vc_row-fluid color-default">
         <div class="border_bottom wpb_column vc_column_container vc_col-sm-12">
               <div class="wpb_wrapper">
                <div class="vc_row wpb_row vc_inner vc_row-fluid" style="margin-bottom: 4px;border-bottom: 1px solid #888;">
                     <div class="wpb_column vc_column_container vc_col-sm-3">
                        <div class="wpb_wrapper">
                           <h5 style="color:#888;">Job Title</h5>
                        </div>
                     </div>
                     <div class="wpb_column vc_column_container vc_col-sm-3">
                        <div class="wpb_wrapper">
                           <h5 style="color:#888;">Job / role description </h5>
                        </div>
                     </div>
                     <div class="wpb_column vc_column_container vc_col-sm-3">
                        <div class="wpb_wrapper">
                        </div>
                     </div>
                     <div class="wpb_column vc_column_container vc_col-sm-3">
                        <div class="wpb_wrapper">
                        </div>
                     </div>
                  </div>';
         if(!$nojob){
            foreach ($final_post as $key => $value) {
            echo '
                  <div class="vc_row wpb_row vc_inner vc_row-fluid" style="margin-top: 31px;">
                     <div class="wpb_column vc_column_container vc_col-sm-3">
                        <div class="wpb_wrapper">
                           <h5 style="color:#888;">'.$value['title'].'</h5>
                        </div>
                     </div>
                     <div class="wpb_column vc_column_container vc_col-sm-3">
                        <div class="wpb_wrapper">
                           <div class="wpb_text_column wpb_content_element  vc_custom_1459159604384">
                              <div class="wpb_wrapper">
                                 <p>'.substr($value['description'],0,200).'</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="wpb_column vc_column_container vc_col-sm-3">
                        <div class="wpb_wrapper">
                           <div class="wpb_text_column wpb_content_element ">
                              <div class="wpb_wrapper">
                                 <p style="text-align: center;"><a style="font-size: 25px;">'.$value['count'].' <i class="vc_btn3-icon fa fa-users"></i></a><br>
                                    Number Of Candidate Applied
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>';

                     if($value['count'] >= 1){

                     echo '<div class="wpb_column vc_column_container vc_col-sm-3">
                        <div class="wpb_wrapper">
                           <div class="vc_btn3-container  wpb_animate_when_almost_visible wpb_bottom-to-top vc_btn3-center wpb_start_animation">
                           <a href="//sezplus.com/jobs/applied-candidate-list/?jobID='.$value['id'].'"><button style="text-align: center;" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-round vc_btn3-style-outline vc_btn3-icon-left vc_btn3-color-orange"><i class="vc_btn3-icon fa fa-users"></i> View Candidates</button></a></div>
                        </div>
                     </div>';

                 }
                  echo '</div>
                          <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_shadow vc_sep_border_width_8 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_grey"><span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
                           </div>
                            ';
            }

         }
         echo '
              </div>
            </div>
      </div>
   </div>
</section>';
  }

}else{
  echo '<h2>you are not allowed here.</h2>';

}
get_footer();
