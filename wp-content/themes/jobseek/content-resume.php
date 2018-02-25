<?php $category = get_the_resume_category(); ?>
<li <?php resume_class(); ?>>
	<a href="<?php the_resume_permalink(); ?>">
		<div class="row">
			<div class="col candidate-photo">
				<?php the_candidate_photo(); ?>
			</div>
			<div class="col candidate-name">
				<h5><?php the_title(); ?></h5>
				<p><?php the_candidate_title( '<strong>', '</strong> ' ); ?></p>
			</div>
			<div class="col candidate-location">
				<p><?php the_candidate_location( false ); ?></p>
			</div>
			<div class="col candidate-posted <?php if ( $category ) : ?>resume-meta<?php endif; ?>">
				<p class="candidate-date"><?php printf( __( 'Updated %s ago', 'wp-job-manager-resumes' ), human_time_diff( get_the_modified_time( 'U' ), current_time( 'timestamp' ) ) ); ?></p>
				<p class="candidate-tags"><?php if ( $category ) : ?>
					<span class="badge">
						<?php echo esc_html($category); ?>
					</span>
				<?php endif; ?></p>
			</div>
		</div>
	</a>
</li>