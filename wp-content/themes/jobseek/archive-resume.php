<?php get_header(); ?>

<section id="title">
	<div class="container">
		<h1 style="    padding-bottom: 10px;"><?php echo apply_filters( 'resume_archives_title', __( 'Candidates', 'jobseek' ) ); ?></h1>
		<h4 style="margin-bottom: 20px;"><?php echo apply_filters( 'resume_archives_subtitle', __( 'Find Your Perfect Match', 'jobseek' ) ); ?></h4>
	</div>
</section>

<section id="content">
	<div class="container" role="main">
		<?php echo do_shortcode( '[resumes]' ); ?>
	</div>
</section>

<?php get_footer(); ?>