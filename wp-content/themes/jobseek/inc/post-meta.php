<div class="meta">
<span><i class="fa fa-user"></i><?php
$user_info = get_userdata( $post->post_author );
echo $user_info->display_name; ?></span>
<span><i class="fa fa-calendar"></i><?php the_time( 'd/m/Y' ); ?></span>
<?php if ( comments_open() ) { ?><span><i class="fa fa-comment"></i><a href="<?php echo esc_url( get_permalink() ); ?>#comments"><?php comments_number( __('0', 'jobseek'), __('1', 'jobseek'), __('%', 'jobseek') ); ?></a></span><?php } ?>
<?php if( is_single() && has_category() ) { ?><span><i class="fa fa-folder"></i><?php the_category(', '); ?></span><?php } ?>
</div>