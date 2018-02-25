<?php get_header(); ?>

<section id="title">
	<div class="container">
		<h1><?php echo apply_filters( 'testimonials_archives_title', __( 'Testimonials', 'jobseek' ) ); ?></h1>
		<h4><?php echo apply_filters( 'testimonials_archives_subtitle', __( 'Kind Words From Happy Members', 'jobseek' ) ); ?></h4>
	</div>
</section>

<section id="content">
	<div class="container">

		<?php if ( is_active_sidebar( 'testimonials-archive' ) ) { ?><div class="row"><div class="col-sm-8"><?php } ?>

		<?php if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				get_template_part( 'content-testimonial', get_post_format() );

			endwhile;

		else :

			get_template_part( 'content', 'none' );

		endif;

		if ( is_active_sidebar( 'testimonials-archive' ) ) { ?></div><div class="col-sm-4" id="sidebar"><?php dynamic_sidebar( 'testimonials-archive' ); ?></div></div><?php } ?>

	</div>
</section>

<?php get_footer(); ?>