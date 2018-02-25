<footer><?php



$footer_sidebars = array();



$footer_sidebar_1 = get_theme_mod('footer_sidebar_1', 'col-sm-6');

$footer_sidebar_2 = get_theme_mod('footer_sidebar_2', 'disabled');

$footer_sidebar_3 = get_theme_mod('footer_sidebar_3', 'disabled');

$footer_sidebar_4 = get_theme_mod('footer_sidebar_4', 'col-sm-6');



if( $footer_sidebar_1 != 'disabled' || $footer_sidebar_2 != 'disabled' || $footer_sidebar_3 != 'disabled' || $footer_sidebar_4 != 'disabled' ) { ?>



<div id="prefooter">

	<div class="container">

		<div class="row">



			<?php if( $footer_sidebar_1 != 'disabled' ) {

				echo('<div class="' . $footer_sidebar_1 . '">');

					if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-sidebar-1'));

				echo('</div>');

			} ?>



			<?php if( $footer_sidebar_2 != 'disabled' ) {

				echo('<div class="' . $footer_sidebar_2 . '">');

					if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-sidebar-2'));

				echo('</div>');

			} ?>



			<?php if( $footer_sidebar_3 != 'disabled' ) {

				echo('<div class="' . $footer_sidebar_3 . '">');

					if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-sidebar-3'));

				echo('</div>');

			} ?>



			<?php if( $footer_sidebar_1 != 'disabled' ) {

				echo('<div class="' . $footer_sidebar_4 . ' text-right">');

					if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-sidebar-4'));

				echo('</div>');

			} ?>



		</div>

	</div>

</div><?php 



}



$footer_text = get_theme_mod('footer_text', '&copy; 2015 Jobseek - Responsive Job Board WordPress Theme<br>Designed &amp; Developed by <a href="http://themeforest.net/user/Coffeecream" target="_blank">Coffeecream Themes</a>');



if( !empty( $footer_text ) ) { ?>

<div id="credits">

	<div class="container text-center">

		<div class="row">

			<div class="col-sm-12"><?php echo ent2ncr($footer_text); ?></div>

		</div>

	</div>

</div>

<?php } ?>



<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>



<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>





<script>

var tpj=jQuery;



tpj(document).ready(function (){



<?php

	

include("database.php");



$user_ID = get_current_user_id();



$current_user = wp_get_current_user();

if ( !($current_user instanceof WP_User) )

   return;

$roles = $current_user->roles;  //$roles is an array


if( $roles['0'] == 'subscriber' ) {

   $last_login_time_sql  =  "SELECT meta_value from wp_usermeta where user_id = ".$user_ID." AND meta_key LIKE 'cjfm_last_login'";
$res1 = mysqli_query($conn, $last_login_time_sql);
if ($res1->num_rows > 0) {
	$dataFromDatabase = $res1->row['meta_value'];
}

$dateFromPast = strtotime('-30 days',time());
if ($dateFromDatabase < $dateFromPast) {
} else {
	
echo "toastr.warning('Please relogin before that', 'Profile expires in 30 days', {timeOut: 50000});";
}


   $posts  =  "SELECT * from wp_posts where post_author = ".$user_ID." AND post_type = 'resume'";

   $result = mysqli_query($conn, $posts);



   if ($result->num_rows > 0) {

	// do nothing

   } else {

	echo "toastr.warning('Please go to resume menu', 'You have not uploaded any resume', {timeOut: 50000});";

   }

}





if($roles['0'] == 'employer' ) {
	// check if he has made the payment
	$posts  =  "SELECT * from plans_status WHERE user_id = ".$user_ID;
	$result = mysqli_query($conn, $posts);
	if ($result->num_rows > 0) {
		// nothing
	}else{
		echo "toastr.warning('Consider Paid subscription', 'Contact SEZPLUS Support', {timeOut: 50000});";
	}
}
?>
});
</script>

<?php
// Google Analytics Tracking Code - RB

if($roles['0'] !== 'administrator')
{

print("<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78416880-1', 'auto');
  ga('send', 'pageview');

</script>");

}
?>



</footer>



	



<?php wp_footer(); ?>



	

<script type='text/javascript' src='//sezplus.com/jobs/wp-content/plugins/wp-job-manager/assets/js/jquery-chosen/chosen.jquery.min.js?ver=1.1.0'></script>





</body>

</html>
