<?php

if( has_post_thumbnail() ) {

	if( !is_single() ) {
		?><p><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail( 'blog', array( 'class' => "img-responsive" ) ); ?></a></p><?php
	} else {
		?><p><?php the_post_thumbnail( 'blog', array( 'class' => "img-responsive" ) ); ?></p><?php
	}

} ?>