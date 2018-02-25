<?php get_header(); ?>

	<section id="title">
		<div class="container">
			<h1><?php echo apply_filters( 'jobseek_job_archives_title', __( 'Find a Job', 'jobseek' ) ); ?></h1>
			<h4><?php echo apply_filters( 'jobseek_job_archives_title', __( 'There is no better place to start', 'jobseek' ) ); ?></h4>
		</div>
	</section>

	<section id="content">
		<div class="container" role="main">
			<?php echo do_shortcode( '[jobs]' ); ?>
		</div>
	</section>

<?php get_footer(); ?>