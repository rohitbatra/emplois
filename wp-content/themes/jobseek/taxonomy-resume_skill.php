<?php get_header();

get_template_part('inc/blog-title'); ?>

<section id="content">
	<div class="container">

		<?php if ( have_posts() ) : ?>

			<ul class="job_listings">

			<?php while ( have_posts() ) : the_post();

				get_job_manager_template_part( 'content', 'resume', 'resume_manager', RESUME_MANAGER_PLUGIN_DIR . '/templates/' );

			endwhile; ?>

			</ul><?php 

			if( function_exists('wp_bootstrap_pagination') ) {
				wp_bootstrap_pagination();
			} else {
				the_posts_pagination();
			}

		else :

			get_template_part( 'content', 'none' );

		endif; ?>

	</div>
</section>

<?php get_footer(); ?>