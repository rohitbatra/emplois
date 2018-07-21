<?php

/* Template name: Employer Applied List Template */


get_header();
global $wp;

include("database.php");
$user_ID = get_current_user_id();

$current_user = wp_get_current_user();
if ( !($current_user instanceof WP_User) )
   return;
$roles = $current_user->roles;  //$roles is an array

$page_title = get_post_meta( get_the_ID(), '_jobseek_page_title_show', true );

if( $page_title != 'hide' )
{

	$page_subtitle = get_post_meta( get_the_ID(), '_jobseek_page_title_subtitle', true ); ?>

	<section id="title">
		<div class="container">
			<h2><?php the_title(); ?></h2>
			<?php if( !empty( $page_subtitle ) ) { ?><h4><?php echo esc_html($page_subtitle); ?></h4><?php } ?>
		</div>
	</section>

<?php } ?>


<?php
// UPDATE Logics Below

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
?>



<section id="content"<?php if( $page_title != 'show' ) { ?> class="no-title"<?php } ?>>
	<div class="container">
    <?php //print_r($roles);

            if($user_ID != 0 && $roles['0'] == 'employer' )
            {
                 // SQL For Employer
                   $sql = "SELECT
                                ajb.sr_id as id,
                                ajb.user_ID,
                                ajb.job_ID,
                                ajb.approved_by_candidate,
                                DATE_FORMAT(ajb.applied_date,'%d %b %y') as applied_date,
                                (SELECT wp_p.guid
                                 FROM wp_posts AS wp_p
                                 WHERE wp_p.post_author = ajb.user_ID
			        AND post_status LIKE 'publish' 
	                 ) AS candidate_url,
                           (SELECT wp_u.display_name
                            FROM `wp_usermeta` AS wp_um
                            LEFT JOIN `wp_users` wp_u ON (wp_u.ID = wp_um.user_id)
                            WHERE wp_um.user_id = ajb.user_ID
                              AND wp_um.meta_key LIKE 'cjfm_user_role'
                              AND wp_um.meta_value = 'subscriber'
                              AND wp_u.display_name NOT LIKE '') AS candidate_name,
                              (SELECT wp_u.display_name
                                                          FROM `wp_usermeta` AS wp_um
                                                          LEFT JOIN `wp_users` wp_u ON (wp_u.ID = wp_um.user_id)
                                                          WHERE wp_um.user_id = ajb.user_ID
                                                            AND wp_um.meta_key LIKE 'cjfm_user_role'
                                                            AND wp_um.meta_value = 'subscriber'
                                                            AND wp_u.display_name NOT LIKE '') AS candidate_name
                         FROM `applied_job_details` AS ajb
                         WHERE ajb.sent_by_emp = '1'
                           AND ajb.emp_id = '{$user_ID}'
                           ORDER BY ajb.sr_id ASC";

            }else if($user_ID != 0 && $roles['0'] == 'subscriber' ) {

                // SQL for Candidate
                 $sql = "SELECT ajb.sr_id as id, ajb.approved_by_candidate,
                        (SELECT wp_u.display_name FROM `wp_usermeta` AS wp_um LEFT JOIN `wp_users` wp_u ON ( wp_u.ID = wp_um.user_id )  WHERE wp_um.user_id = ajb.emp_id AND wp_um.meta_key LIKE 'cjfm_user_role' AND wp_um.meta_value = 'employer') as employer_name,
                        DATE_FORMAT(ajb.applied_date,'%d %b %y') as applied_date
                        FROM applied_job_details AS ajb WHERE ajb.user_ID = '{$user_ID}' AND ajb.sent_by_emp = '1'
                        ORDER BY ajb.sr_id ASC;";

            }else {
                // Dummy Condition for Admins....
                //$roles['0'] == 'administrator'
            }
            $result = mysqli_query($conn, $sql);

        ?>
            <div id="approval-list-dashboard">

                <div class="table-responsive">
                    <table class="job-manager-jobs table table-striped">
                        <thead>
                            <?php
                                if($roles['0'] == 'employer')
                                {
                                    echo '<tr>
                                            <th class="job_title">#</th>
                                            <th class="date">Candidate Name</th>
                                            <th class="date">Applied Date</th>
                                            <th class="date">Status</th>
                                          </tr>';

                                }else if($roles['0'] == 'subscriber')
                                {
                                echo '<tr>
                                        <th class="job_title">#</th>
                                        <th class="job_title">Employee Name</th>
                                        <th class="date">Applied Date</th>
                                        <th class="date">Action</th>
                                      </tr>';
                                }
                                ?>
                        </thead>
                        <tbody>
                            <?php
                                $path = pathinfo($_SERVER['REQUEST_URI']);
                                $i = 1;
                                if($roles['0'] == 'employer')
                                {

                                    while($row = $result->fetch_assoc())
                                    {

                                        print("<tr>
                                                <th class='job_title'>{$i}</th>
                                                <th class='date'><a href='{$row['candidate_url']}'>{$row['candidate_name']}</a></th>
                                                <th class='date'>{$row['applied_date']}</th>");

                                                if($row['approved_by_candidate'] !== '1')
                                                {
                                                    print("<th data-sr-id='{$row['id']}'>Pending Approval!</th>");
                                                }else {
                                                    print("<th data-sr-id='{$row['id']}'> Already Approved! </th>");
                                                }
                                        print("</tr>");

                                      $i++;
                                    }

                                }else if($roles['0'] == 'subscriber')
                                {

                                    while($row = $result->fetch_assoc())
                                    {
                                        print("<tr>
                                                <th class='job_title'>{$i}</th>
                                                <th class='job_title'>{$row['employer_name']}</th>
                                                <th class='date'>{$row['applied_date']}</th>");

                                                if($row['approved_by_candidate'] !== '1')
                                                {
                                                    print("<th><button class='btn btn-success' onclick=\"location.href = '".get_site_url()."/dashboard/approval-list?id={$row['id']}&action=employer'\">Approve</button></th>");
                                                }else {
                                                    print("<th data-sr-id='{$row['id']}'> Already Approved! </th>");
                                                }
                                                print("</tr>");
                                        $i++;
                                    }
                                }
                            ?>

                        </tbody>
                    </table>

                </div>

            </div>
	</div>
</section>

<?php get_footer(); ?>
