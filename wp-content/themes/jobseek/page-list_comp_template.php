<?php 

/* Template name: Add Job Template___ */

include("database.php");

	$duplicate_email_check	=	"SELECT email,res_no FROM resume_data WHERE email LIKE '$email' ";
	$result = mysqli_query($conn, $duplicate_email_check);
	
get_header();
//print_r($_SESSION);
$user_ID = get_current_user_id();


$current_user = wp_get_current_user();
if ( !($current_user instanceof WP_User) )
   return;
$roles = $current_user->roles;  //$roles is an array

//echo $session->all_userdata();

$page_title = get_post_meta( get_the_ID(), '_jobseek_page_title_show', true );

if( $page_title != 'hide' ) {

	$page_subtitle = get_post_meta( get_the_ID(), '_jobseek_page_title_subtitle', true ); 

}	


echo 'donee';

?>



<?php get_footer(); ?>