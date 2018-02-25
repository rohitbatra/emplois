<?php

if ( is_home() ) {

	$blog_page_id = get_option('page_for_posts', true);

	$blog_page_title = get_post_meta( $blog_page_id, '_jobseek_page_title_show', true );
	echo '<br /><br /><br /><br /><br />';
	if( $blog_page_title != 'hide' ) {

		$blog_title_text = get_the_title( get_option('page_for_posts', true) );

		$blog_subtitle_text = get_post_meta( $blog_page_id, '_jobseek_page_title_subtitle', true );

		if( empty($blog_title_text) ) $blog_title = __('Blog', 'jobseek'); ?>

		<section id="title">
			<div class="text-center">
				<h1><?php echo esc_html($blog_title_text); ?></h1>
				<?php if( !empty( $blog_subtitle_text ) ) { ?><h4><?php echo esc_html($blog_subtitle_text); ?></h4><?php } ?>
			</div>
		</section><?php

	}

} else if ( is_search() ) { ?>

	<section id="title">
		<div class="text-center">
			<h1><?php _e('Search Results', 'jobseek'); ?></h1>
			<h4><?php printf( __( 'for: "%s"', 'jobseek' ), get_search_query() ); ?></h4>
		</div>
	</section><?php

} else if ( is_single() ) { ?>
 
	<section id="title">
		<div class="container">
			<div class="row">
				<div class="col-sm-2"><?php echo get_avatar( $post->post_author, 140 ); ?></div>
				<div class="col-sm-10"><?php
					the_title( '<h1>', '</h1>' );
					get_template_part( 'inc/post-meta' );
				?></div>
			</div>
		</div>
	</section><?php

} else if ( taxonomy_exists('job_listing_category') || taxonomy_exists('job_listing_type') || taxonomy_exists('job_listing_tag') || taxonomy_exists('resume_category') || taxonomy_exists('resume_skill') ) {

	$taxonomy = get_taxonomy( get_queried_object()->taxonomy ); ?>

	<section id="title">
		<div class="text-center">
			<h1><?php single_term_title(); ?></h1>
			<h4><?php echo esc_attr( $taxonomy->labels->singular_name ); ?></h4>
		</div>
	</section>
	
<?php } ?>