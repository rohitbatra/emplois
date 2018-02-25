<style>.apply_ok { width:10% !important;}</style>

<?php

	

	$user_ID 	= 	get_current_user_id(); 

	$job_ID 	= 	get_the_ID();



	$current_user = wp_get_current_user();

	if ( !($current_user instanceof WP_User) )

	   return;

	$roles = $current_user->roles;  //$roles is an array



?>



<?php if ( $apply = get_the_job_application_method() ) :

	wp_enqueue_script( 'wp-job-manager-job-application' );

	?>

	<div class="job_application application">

		<?php do_action( 'job_application_start', $apply ); ?>

		

<?php 





include("database.php");



//print_r($roles['0']);exit;

if($user_ID != 0 && (strtolower($roles['0']) == 'subscriber' || strtolower($roles['0']) == 'candidate')) { ?>  



<?php



	$duplicate_check	=	"SELECT * FROM applied_job_details WHERE user_ID = '$user_ID' AND job_ID = '$job_ID'";

	$result = mysqli_query($conn, $duplicate_check);

	if ($result->num_rows > 0) {?>

     <?php



        while($row = $result->fetch_assoc()) {

            $apr = $row['approved_by_company'];

        }



        if($apr !== '1') {

        ?>

            <input type="button" class="button" value="<?php _e( 'Your Application is under Approval', 'wp-job-manager' ); ?>" onclick="javascript:void(1);" />

        <?php } else { ?>

            <input type="button" class="button" value="<?php _e( 'You already applied for job', 'wp-job-manager' ); ?>" onclick="javascript:void(1);" />

        <?php } ?>





<?php } else {





	// $is_resume_present == 1;



	$posts  =  "SELECT * from wp_posts where post_author = ".$user_ID." AND post_type = 'resume'";

	$result = mysqli_query($conn, $posts);



	if ($result->num_rows > 0) {

		$is_resume_present == 1; ?>





    <input type="button" class="application_button button" value="<?php _e( 'Apply for job', 'wp-job-manager' ); ?>" />

    <form id="job_apply_details">

    <input name="user_id" type="hidden" value="<?php echo $user_ID;?>" /><input name="job_id" type="hidden" value="<?php echo $job_ID; ?>" />

    </form>



	<?php } else {

		$is_resume_present == 0;

	}





?>



<?php 

	}

	} else if($user_ID != 0 && ( strtolower($roles['0']) == 'employer' || strtolower($roles['0']) == 'administrator' ) ) {	}

else {

?>

		<input type="button" class="cjfm-show-login-form button" value="<?php _e( 'Login', 'wp-job-manager' ); ?>" /><br /><input type="button" class="cjfm-show-register-form button" style="margin-top: 10px;" value="<?php _e( 'Register', 'wp-job-manager' ); ?>" />

<?php } ?>		

		<div class="application_details">

			<div class="form-wrapper">

			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button><h2><?php _e( 'Apply', 'jobseek' ); ?></h2>

			<?php

				/**

				 * job_manager_application_details_email or job_manager_application_details_url hook

				 */

				//do_action( 'job_manager_application_details_' . $apply->type, $apply );

				

			?>

            <strong>  You details successfully sent to company.</strong><br /><br />





            <input type="button" class="button btn-primary apply_ok" style="float:left;" value="Ok">



			</div>

		</div>

		<?php do_action( 'job_application_end', $apply ); ?>

	</div>

<?php endif; ?>