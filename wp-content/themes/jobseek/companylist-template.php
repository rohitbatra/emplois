<?php 
/**
 * Template Name: CompanyList
 */
?>

<style type="text/css" data-type="vc_custom-css">.container > .wpb_row {
    margin-bottom: 0;
    padding-top: 20px;
    padding-bottom: 20px;
}

.vc_row.wpb_row.vc_row-fluid.color-default:hover {
    background: #f2f2f2;
}
.container > .wpb_row {
    margin-bottom: 0;
    padding-top: 20px;
    padding-bottom: 20px;
    border: 1px solid #e7e7e7;
}

footer{
       margin-top: 60px;
}

</style>

<?php







//$user_fields = array( 'company_name', 'cjfm_user_role', 'user_email', 'cjfm_address1', 'cjfm_address2', 'cjfm_city', 'cjfm_state', 'cjfm_country' );
$user_fields = array( 'ID' );
$user_query = new WP_User_Query( array( 'role' => 'employer', 'fields' => $user_fields ) );


// User Loop
if ( ! empty( $user_query->results ) ) {
	foreach ( $user_query->results as $user ) {




		$full_user_list[$user->ID] = $user->ID;

		//$full_user_list[$user->data->ID]["meta"][] = get_user_meta( $user->data->ID ); 

	}
} else {
	echo 'No users found.';
}


foreach ($full_user_list as $key => $value) {

	$metavalue[$key] = get_user_meta( $key ); 
	# code...
}



get_header();


$page_title = get_post_meta( get_the_ID(), '_jobseek_page_title_show', true );

if( $page_title != 'hide' ) {

	$page_subtitle = get_post_meta( get_the_ID(), '_jobseek_page_title_subtitle', true ); ?>
	<section id="title">
		<div class="container">

			<h1><?php the_title(); ?></h1>
			<?php if( !empty( $page_subtitle ) ) { ?><h4><?php echo esc_html($page_subtitle); ?></h4><?php } ?>
		</div>
	</section>
<?php } 


?>



<section id="content">
   <div class="container">
    <div class="vc_row vc_row-fluid color-default" style="margin-bottom: 30px;">
         <div class="wpb_column vc_column_container vc_col-sm-4">
            <div class="wpb_wrapper">
               <h2 class="subtitle">Name Of The Company</h2>
            </div>
         </div>
         <div class="wpb_column vc_column_container vc_col-sm-8">
            <div class="wpb_wrapper">
              <h2 class="subtitle">Address</h2>
            </div>
         </div>
      </div>




<?php
foreach ($metavalue as $key => $value) {
	# code...



	echo '


      <div class="vc_row wpb_row vc_row-fluid color-default">
         <div class="wpb_column vc_column_container vc_col-sm-4">
            <div class="wpb_wrapper">
               <div class="wpb_text_column wpb_content_element  vc_custom_1436530603605">
                  <div class="wpb_wrapper">
			<p><strong style="color:#888;">'.$value["company_name"][0].'</strong></p>
                  </div>
               </div>
            </div>
         </div>
         <div class="wpb_column vc_column_container vc_col-sm-8">
            <div class="wpb_wrapper">
               <div class="wpb_text_column wpb_content_element  vc_custom_1436530603605">
                  <div class="wpb_wrapper">
			<p>'.$value["cjfm_address1"][0].', '.$value["cjfm_address2"][0].', '.$value["cjfm_city"][0].', '.$value["cjfm_state"][0].', '.$value["cjfm_country"][0].'</p>
                  </div>
               </div>
            </div>
         </div>
      </div>


      




	';
}




?>






   </div>
</section>









<?php get_footer(); ?>