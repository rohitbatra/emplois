<?php get_header();

get_template_part('inc/blog-title'); ?>

<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">

				<?php if ( have_posts() ) :

					while ( have_posts() ) : the_post();

						if ( is_single() && (get_post_type() == 'post') ) {

							get_template_part( 'content-single', get_post_format() );

						} else {

							get_template_part( 'content', get_post_format() );

						}

					endwhile; 

					if( function_exists('wp_bootstrap_pagination') ) {
						wp_bootstrap_pagination();
					} else {
						the_posts_pagination();
					}


				else :

					get_template_part( 'content', 'none' );

				endif; ?>

			</div>

			<?php get_sidebar(); ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>