<?php

/* Template name: Home Page Template */

get_header();

$user_ID = get_current_user_id();


$current_user = wp_get_current_user();
if ( !($current_user instanceof WP_User) )
   return;
$roles = $current_user->roles;  //$roles is an array


$page_title = get_post_meta( get_the_ID(), '_jobseek_page_title_show', true );

if( $page_title != 'hide' ) {

	$page_subtitle = get_post_meta( get_the_ID(), '_jobseek_page_title_subtitle', true ); ?>

	<section id="title">
		<div class="container">
			<h1><?php the_title(); ?></h1>
			<?php if( !empty( $page_subtitle ) ) { ?><h4><?php echo esc_html($page_subtitle); ?></h4><?php } ?>
		</div>
	</section>

<?php } ?>


<?php echo do_shortcode('[vc_row css=".vc_custom_1447935617445{padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column][rev_slider_vc alias="main"][/vc_column][/vc_row] '); ?>

<section id="content"<?php if( $page_title != 'show' ) { ?> class="no-title"<?php } ?>>
	<div class="container">


<?php
	//if( $roles['0'] == 'employer' || $roles['0'] == 'administrator'	)

	echo do_shortcode('[vc_row][vc_column width="2/3"][subtitle title="RECENT JOBS"][jobs per_page="5" show_filters="false" gjm_use="0"][/vc_column][vc_column width="1/3"][subtitle title="FEATURED JOB"][job_summary id="1928"][/vc_column][/vc_row]
');

//echo do_shortcode('[vc_row full_width="stretch_row" color_scheme="color-alternative" css=".vc_custom_1447930407610{background-image:url(http://www.coffeecreamthemes.com/themes/jobseek/wordpress/wp-content/uploads/2015/05/stats.jpg?id=277)!important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" el_class="text-center"][vc_column][hgroup title="Jobseek Stats" subtitle="HOW MANY PEOPLE WE’VE HELPED"][counterup][counterup_item number="4329" title="Members"][counterup_item number="894" title="Jobs"][counterup_item number="1482 title="Resumes"][counterup_item number="83" title="Companies"][/counterup][js_button color="btn-primary" button="btn-primary" link="url:%23|title:Join%20Us|"][/vc_column][/vc_row]');

echo do_shortcode('[vc_row][vc_column][hgroup title="Latest News" subtitle="SPECIALLY CRAFTED JOB POSTS EVERYDAY"][vc_row_inner css=".vc_custom_1444231939626{margin-top: 50px !important;margin-bottom: 0px !important;}"][vc_column_inner][recent-blog-posts posts="4" columns="2" categories="61"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
');
echo do_shortcode('');

?>

		<?php if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				the_content();

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'modellic' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'modellic' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );

				if ( comments_open() ) {
					comments_template();
				}

			endwhile; 

		else :

			get_template_part( 'content', 'none' );

		endif; ?>

	</div>
</section>

<?php get_footer(); ?>