<style type="text/css">

	.row.single-testimonial:hover {
    background: #e7e7e7;
}

	.owl-item .testimonial-item	.row.single-testimonial:hover {
    	background: none;
	}

.single-testimonial:first-child {
    margin-top: 0;
    border: 0px solid;
    padding-top: 60px;
}

.single-testimonial {
    margin-top: 0px !important;
    padding-top: 40px;
    border-bottom: 1px solid #e7e7e7;
    padding-bottom: 25px;
    border-top: 1px solid #e7e7e7;
}
	

</style>

<div class="row single-testimonial"><?php

$byline = get_post_meta( $post->ID, '_byline', true );
$url = get_post_meta( $post->ID, '_url', true );

if( has_post_thumbnail() ) { ?>
	<div class="col-sm-3 col-md-2">
		<?php if( !empty( $url ) ) { ?>
			<a href="<?php echo esc_url($url); ?>"><?php the_post_thumbnail( 'testimonial', array( 'class' => "img-circle img-responsive" ) ); ?></a>
		<?php } else { ?>
			<?php the_post_thumbnail( 'testimonial', array( 'class' => "img-circle img-responsive" ) ); ?>
		<?php } ?>
	</div>
	<div class="col-sm-9 col-md-10">
<?php } else { ?>
	<div class="col-sm-12">
<?php } ?>
		<blockquote>
			<?php the_content(''); ?>
			<footer>
				<?php echo get_the_title(); ?>
				<?php if( !empty( $url ) ) { ?>
					<a href="<?php echo esc_url($url); ?>"><cite title="<?php echo esc_html($byline); ?>"><?php echo esc_html($byline); ?></cite></a>
				<?php } else { ?>
					<cite title="<?php echo esc_html($byline); ?>"><?php echo esc_html($byline); ?></cite>
				<?php } ?>
			</footer>
		</blockquote>
	</div>
</div>