<?php get_header(); ?>

<section id="title">
	<div class="container">
		<?php the_title( '<h1>', '</h1>' ); ?>

		<?php do_action( 'single_job_listing_meta_before' ); ?>

		<ul class="item-meta">
			<?php do_action( 'single_job_listing_meta_start' ); ?>

			<li class="job-type <?php echo get_the_job_type() ? sanitize_title( get_the_job_type()->slug ) : ''; ?>" itemprop="employmentType"><i class="fa fa-clock-o"></i><?php the_job_type(); ?></li>

			<li class="job-company">
				<?php
				if ( class_exists( 'Astoundify_Job_Manager_Companies' ) && '' != get_the_company_name() ) :
					$companies   = Astoundify_Job_Manager_Companies::instance();
					$company_url = esc_url( $companies->company_url( get_the_company_name() ) );
				?>
				<i class="fa fa-building"></i><a href="<?php echo esc_url($company_url); ?>" target="_blank"><?php the_company_name(); ?></a>
				<?php else : ?>
					<?php the_company_name(); ?>
				<?php endif; ?>
			</li>

			<li class="location" itemprop="jobLocation"><i class="fa fa-map-marker"></i><?php the_job_location(); ?></li>

			<li class="date-posted" itemprop="datePosted"><i class="fa fa-calendar"></i><date><?php printf( __( 'Posted %s ago', 'wp-job-manager' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) ); ?></date></li>

			<?php if ( is_position_filled() ) : ?>
				<li class="position-filled"><i class="fa fa-check-circle-o"></i><?php _e( 'This position has been filled', 'wp-job-manager' ); ?></li>
			<?php elseif ( ! candidates_can_apply() && 'preview' !== $post->post_status ) : ?>
				<li class="listing-expired"><i class="fa fa-times"></i><?php _e( 'Applications have closed', 'wp-job-manager' ); ?></li>
			<?php endif; ?>

			<?php do_action( 'single_job_listing_meta_end' ); ?>
		</ul>

		<?php do_action( 'single_job_listing_meta_after' ); ?>
	</div>
</section>

<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php the_content(); ?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

			</div>
			<div class="col-sm-4" id="sidebar">

				<?php if ( is_active_sidebar( 'job-single-top' ) ) {
					dynamic_sidebar( 'job-single-top' );
				} ?>

				<?php if ( candidates_can_apply() ) : ?>

					<?php get_job_manager_template( 'job-application.php' ); ?>
				<?php endif; ?>

				<?php if ( function_exists( 'sharing_display' ) ) { ?>
					<div class="sidebar-widget">
						<h2><?php _e('Share This Job', 'jobseek'); ?></h2>
				    	<?php sharing_display( '', true ); ?>
				    </div><hr><?php
				}
				 
				if ( class_exists( 'Jetpack_Likes' ) ) {
				    $custom_likes = new Jetpack_Likes;
				    echo($custom_likes->post_likes( '' ));
				}

				/**
				 * single_job_listing_sidebar hook
				 *
				 * @hooked job_listing_company_display - 10
				 */
				do_action( 'single_job_listing_sidebar' );

				if ( is_active_sidebar( 'job-single-bottom' ) ) {
					dynamic_sidebar( 'job-single-bottom' );
				} ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>