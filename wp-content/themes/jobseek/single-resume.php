<?php get_header(); ?>

<section id="title">
	<div class="container">
		<?php the_title( '<h1>', '</h1>' ); ?>
		<ul class="item-meta">
			<?php do_action( 'single_resume_meta_start' ); ?>

			<li><i class="fa fa-briefcase"></i><?php the_candidate_title(); ?></li>

			<li class="location"><i class="fa fa-map-marker"></i><?php the_candidate_location(); ?></li>

			<?php if ( get_the_resume_category() ) : ?>
				<li class="resume-category"><i class="fa fa-folder-open"></i><?php the_resume_category(); ?></li>
			<?php endif; ?>

			<li class="date-posted" itemprop="datePosted"><i class="fa fa-clock-o"></i><date><?php printf( __( 'Updated %s ago', 'wp-job-manager-resumes' ), human_time_diff( get_the_modified_time( 'U' ), current_time( 'timestamp' ) ) ); ?></date></li>

			<?php do_action( 'single_resume_meta_end' ); ?>
		</ul>
	</div>
</section>

<section id="content">
	<div class="container">
		<div class="row">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'content-single', 'resume' ); ?>

			<?php endif; ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>