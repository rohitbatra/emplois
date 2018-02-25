<?php get_header(); ?>

<section id="title">
	<div class="container">

		<h1><?php printf( __( 'Jobs at %s', 'jobseek' ), esc_attr( urldecode( get_query_var( apply_filters( 'wp_job_manager_companies_company_slug', 'company' ) ) ) ) ); ?></h1>

		<h4><?php printf( _n( '%d Job Available', '%d Jobs Available', $wp_query->found_posts, 'jobseek' ), $wp_query->found_posts ); ?> <?php if ( get_the_company_tagline( get_the_ID() ) ) : ?>&mdash; <?php the_company_tagline( '', '', true, get_the_ID() ); ?><?php endif; ?></h4>

	</div>
</section>

<?php rewind_posts(); ?>

<section id="content">
	<div class="container">

		<?php if ( have_posts() ) : ?>
		<div class="job_listings col-sm-8">
			<ul class="job_listings">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_job_manager_template_part( 'content', 'job_listing' ); ?>
				<?php endwhile; ?>
			</ul>
		</div>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		<div class="company-profile-info job-meta col-sm-4">

			<article class="job_listing-widget default-widget">
				<?php the_company_logo(); ?>
			</article>

			<article class="job_listing-widget default-widget">

				<h3 class="job_listing-widget-title"><?php _e( 'Company Details', 'jobseek' ); ?></h3>

				<ul class="company-social">

					<?php do_action( 'job_listing_company_social_before' ); ?>

					<?php if ( get_the_company_website() ) : ?>
					<li><a href="<?php echo get_the_company_website(); ?>" itemprop="url">
						<i class="icon-link"></i>
						<?php _e( 'Website', 'jobseek' ); ?>
					</a></li>
					<?php endif; ?>

					<?php if ( get_the_company_twitter() ) : ?>
					<li><a href="http://twitter.com/<?php echo get_the_company_twitter(); ?>">
						<i class="icon-twitter"></i>
						<?php _e( 'Twitter', 'jobseek' ); ?>
					</a></li>
					<?php endif; ?>

					<?php do_action( 'job_listing_company_social_after' ); ?>
				</ul>
			</article>

			<article class="job_listing-widget default-widget">
				<?php get_template_part( 'content-share' ); ?>
			</article>

		</div>

	</div>
</section>

<?php get_footer(); ?>