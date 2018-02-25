<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

	<div class="col-sm-2"><?php echo get_avatar( $post->post_author, 140 ); ?></div>

	<div class="col-sm-10"><?php

		the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );

		get_template_part( 'inc/post-meta' );
		
		get_template_part( 'inc/thumbnail' );

		if ( is_category() || is_archive() || is_search() ) {
			the_excerpt();
		} else {
			the_content('');
		} ?>
		
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary read-more-btn"><?php _e('Read more', 'jobseek'); ?><i class="fa fa-arrow-right"></i></a>

	</div>

</article>

<hr>