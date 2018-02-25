<?php
/**
 * Single view Company information box
 *
 * Hooked into single_job_listing_start priority 30
 *
 * @since  1.14.0
 */

if ( ! get_the_company_name() ) {
	return;
}
?>

<!--
<div class="sidebar-widget sami" itemscope itemtype="http://data-vocabulary.org/Organization">
	<?php the_company_name( '<h2 itemprop="name">', '</h2>' ); ?>

	<?php the_company_logo(); ?>

	<?php the_company_tagline( '<p class="tagline">', '</p>' ); ?>

	<ul class="company-profile">
		<?php if ( $website = get_the_company_website() ) : ?>
			<li><i class="fa fa-external-link"></i><a class="website" href="<?php echo esc_url( $website ); ?>" itemprop="url" target="_blank" rel="nofollow"><?php echo esc_url( $website ); ?></a></li>
		<?php endif; ?>
		<?php the_company_twitter('<li><i class="fa fa-twitter"></i>', '</li>'); ?>
	</ul>

	<?php the_company_video(); ?>

	<?php
	if ( class_exists( 'Astoundify_Job_Manager_Companies' ) && '' != get_the_company_name() ) :
		$companies   = Astoundify_Job_Manager_Companies::instance();
		$company_url = esc_url( $companies->company_url( get_the_company_name() ) );
	?>
	<a href="<?php echo esc_url($company_url); ?>" class="btn btn-primary" target="_blank"><?php _e('Learn More', 'jobseek'); ?></a>
	<?php endif; ?>

</div> -->