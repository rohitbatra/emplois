<a href="<?php the_permalink(); ?>">
	<?php the_post_thumbnail( 'featured', array( 'class' => "img-responsive") );

	$salary = get_post_meta( $post->ID, '_job_salary', true );

	$thousands_separator = get_theme_mod('thousands_separator', ',');
	$sign_before = get_theme_mod('sign_before', '$');
	$sign_after = get_theme_mod('sign_after', ''); ?>

	<div class="featured-job">
		<?php the_company_logo(); ?>
		<div class="title">
			<?php the_title('<h5>', '</h5>'); ?>
			<?php the_company_name( '<p>', '</p> ' ); ?>
		</div>
		<div class="data">
			<span class="city"><i class="fa fa-map-marker"></i><?php the_job_location(false); ?></span>
			<span class="type <?php echo get_the_job_type() ? sanitize_title( get_the_job_type()->slug ) : ''; ?>"><i class="fa fa-clock-o"></i><?php the_job_type(); ?></span>
			<?php if( !empty($salary) ) { ?><span class="salary"><i class="fa fa-money"></i><?php echo( $sign_before . esc_html( number_format($salary, 0, '.', $thousands_separator) ) . $sign_after ); ?></span><?php } ?>
		</div>
		<div class="description"><?php the_excerpt(); ?></div>
	</div>
</a>