<?php if ( resume_manager_user_can_view_resume( $post->ID ) ) : ?>
	<div class="single-resume-content col-sm-8">

		<?php do_action( 'single_resume_start' ); ?>

		<div class="resume_description">
			<h2><?php _e( 'About', 'wp-job-manager-resumes' ); ?></h2>
			<?php echo apply_filters( 'the_resume_description', get_the_content() ); ?>
		</div>

		<?php if ( $items = get_post_meta( $post->ID, '_candidate_education', true ) ) : ?>
			
			<?php
				foreach( $items as $item ) : ?>
				<div class="row work-experience">
				<h3><?php _e( 'Education', 'wp-job-manager-resumes' ); ?></h3>
					<div class="col-sm-2 ">
						
						<div class="img-circle">
							<i class="fa fa-graduation-cap"></i>
						</div>
					</div>
					<div class="col-sm-10 ">
						<h4 class="date"><?php echo esc_html( $item['date'] ); ?></h4>
						<h5><?php printf( __( '%s at %s', 'wp-job-manager-resumes' ), '<strong class="qualification">' . esc_html( $item['qualification'] ) . '</strong>', '<strong class="location">' . esc_html( $item['location'] ) . '</strong>' ); ?></h5>
						<?php echo wpautop( wptexturize( $item['notes'] ) ); ?>
					</div>
				</div>
				<?php endforeach; ?>
		<?php endif; ?>

		<?php if ( $items = get_post_meta( $post->ID, '_candidate_experience', true ) ) : ?>
			
			<?php
				foreach( $items as $item ) : ?>
				<div class="row work-experience">
					<h3><?php _e( 'Experience', 'wp-job-manager-resumes' ); ?></h3>
					<div class="col-sm-2">
						<div class="img-circle">
							<i class="fa fa-briefcase"></i>
						</div>
					</div>
					<div class="col-sm-10">
						<h4 class="date"><?php echo esc_html( $item['date'] ); ?></h4>
						<h5><?php printf( __( '%s at %s', 'wp-job-manager-resumes' ), '<strong class="job_title">' . esc_html( $item['job_title'] ) . '</strong>', '<strong class="employer">' . esc_html( $item['employer'] ) . '</strong>' ); ?></h5>
						<?php echo wpautop( wptexturize( $item['notes'] ) ); ?>
					</div>
				</div>
				<?php endforeach; ?>
		<?php endif; ?>


		<?php do_action( 'single_resume_end' ); ?>
	</div>

	<div class="col-sm-4" id="sidebar">

		<?php if ( is_active_sidebar( 'resume-single-top' ) ) {
			dynamic_sidebar( 'resume-single-top' );
		} ?>

		<div class="sidebar-widget">
			<?php the_candidate_photo('candidate'); ?>
			<?php the_resume_links(); ?>
			<?php the_candidate_video(); ?>
		</div>

		<?php if ( ( $skills = wp_get_object_terms( $post->ID, 'resume_skill', array( 'fields' => 'names' ) ) ) && is_array( $skills ) ) : ?>
			<div class="sidebar-widget skills">
			<h2><?php _e( 'Skills', 'wp-job-manager-resumes' ); ?></h2>
				<?php echo '<span class="badge">' . implode( '</span><span class="badge">', $skills ) . '</span>'; ?>
			</div>
		<?php endif; ?>

		<?php get_job_manager_template( 'contact-details.php', array( 'post' => $post ), 'wp-job-manager-resumes', RESUME_MANAGER_PLUGIN_DIR . '/templates/' ); ?>

		<?php if ( is_active_sidebar( 'resume-single-bottom' ) ) {
			dynamic_sidebar( 'resume-single-bottom' );
		} ?>

	</div>

<?php else : ?>

	<div class="col-sm-12"><?php get_job_manager_template_part( 'access-denied', 'single-resume', 'wp-job-manager-resumes', RESUME_MANAGER_PLUGIN_DIR . '/templates/' ); ?></div>

<?php endif; ?>