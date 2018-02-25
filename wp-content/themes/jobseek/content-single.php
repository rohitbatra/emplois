<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php
	
	get_template_part( 'inc/thumbnail' );

	the_content();

?></article>

<?php
if ( function_exists( 'sharing_display' ) ) { ?>
	<div class="share">
		<h5><?php _e('Share it', 'jobseek'); ?></h5>
    	<?php sharing_display( '', true ); ?>
    </div><?php
}

if( has_tag() ) {
	the_tags( '<ul class="tags"><li><i class="fa fa-tag"></i></li><li>', '</li><li>', '</li></ul>' );
} else {
	echo '<hr>';
}

if ( get_the_author_meta( 'description' ) ) :
	get_template_part( 'author-bio' );
endif;

if ( get_post_type() == 'post' ) {
?><ul class="paging"><li class="pull-left"><?php previous_post_link( '%link', __('Prev', 'jobseek') ); ?></li><li class="pull-right"><?php next_post_link( '%link', __('Next', 'jobseek') ); ?></li></ul><?php
}

if ( is_single() && ( get_post_type() == 'post' ) ) {
	comments_template();
} ?>