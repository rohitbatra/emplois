<?php

// check if employer made the payment. if not then he cant search through resumes
if($_SERVER['REDIRECT_URL'] == '/resumes/') {

$user_ID = get_current_user_id();
$current_user = wp_get_current_user();

if ( !($current_user instanceof WP_User) )

   return;

$roles = $current_user->roles;  //$roles is an array
if($user_ID != 0) {
  if($roles['0'] == 'employer' ) {
	require('database.php');
	// check if he has made the payment
	$posts  =  "SELECT * from plans_status WHERE user_id = ".$user_ID;
	//$posts  =  "SELECT * from plans_status ";

	$result = mysqli_query($conn, $posts);

	if ($result->num_rows > 0) 
	{

		// nothing

	}else{

		$nopayment=1;

		if($_SERVER['REDIRECT_URL'] == '/resumes/')
		{
			header("Location: https://sezplus.com/jobs/plans-pricing/");

		}

	}
}

}

}

?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title><?php wp_title('|', true, 'right'); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->

	<!--[if lt IE 9]>

	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>

	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>

	<![endif]--> 

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php if( get_theme_mod( 'loader', 'yes' ) != 'no' ) { ?><div id="loader"><i class="fa fa-cog fa-4x fa-spin"></i></div><?php } ?>

<div class="fm-container">

	<div class="menu">

		<div class="button-close text-right"><a class="fm-button"><i class="fa fa-close fa-2x"></i></a></div>

			<ul><?php

				wp_nav_menu( array( 'theme_location'  => 'primary', 'items_wrap' => '%3$s', 'container' => false, 'depth' => 3, 'fallback_cb' => 'jobseek_menu_fallback' ) );

				if ( is_user_logged_in() ) {

					if( jobseek_check_user_role('employer') ) {

						wp_nav_menu(

							array(

								'theme_location' => 'employer-menu',

								'items_wrap' => '%3$s',

								'container' => false,

								'depth' => 2,

							)

						);

					} else {

						wp_nav_menu(

							array(

								'theme_location' => 'candidate-menu',

								'items_wrap' => '%3$s',

								'container' => false,

								'depth' => 2,

							)

						);

					}

				}

		?></ul>

	</div>

</div>

<header id="header">

	<div id="header-background"></div>

	<div class="container">

		<div class="pull-left">

			<div id="logo"><a href="<?php echo home_url(); ?>">

			<?php $theme_logo = get_theme_mod( 'theme_logo', '' );

			if ( empty( $theme_logo ) ) { ?>

				<div style='font-family:"Montserrat", Arial;font-weight:bold;text-shadow:none;font-size:2.5em;'>SEZPLUS Jobs</div>

				<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt=""> -->

			<?php } else { ?>

				<img src="<?php echo esc_url($theme_logo); ?>" alt="">

			<?php } ?>

			</a></div>

		</div>

		<div id="menu-open" class="pull-right">

			<a class="fm-button"><i class="fa fa-bars fa-lg"></i></a>

		</div>



		<nav>

			<ul id="main-nav"><?php



  				wp_nav_menu( array( 'theme_location'  => 'primary', 'items_wrap' => '%3$s', 'container' => false, 'depth' => 3, 'fallback_cb' => 'jobseek_menu_fallback' ) );



  				if ( is_user_logged_in() ) {

  					if( jobseek_check_user_role('employer') ) {

  						wp_nav_menu( array('theme_location' => 'employer-menu', 'items_wrap' => '%3$s', 'container' => false, 'depth' => 2 ) );

  					} else {

  						wp_nav_menu( array('theme_location' => 'candidate-menu', 'items_wrap' => '%3$s', 'container' => false, 'depth' => 2 ) );

  					}

  				}



			?>
<?php
/**
*	Adding Menu items for Admins only to check the Payments -- Rohit Batra
*/
if(strtolower($roles['0']) == 'administrator' || strtolower($roles['0']) == 'editor')
{ ?>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-754544 user-nav"><a href="#">Payments</a>
<ul class="sub-menu">
<li class="menu-item menu-item-type-post_type menu-item-object-page user-nav"><a href="https://sezplus.com/jobs/payment-status/">Payment Status</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page user-nav"><a href="https://sezplus.com/jobs/manual-payment/">Manual Payment</a></li>
</ul>
</li>

<?php } ?>

			</ul>

		</nav>

	</div>

</header>
