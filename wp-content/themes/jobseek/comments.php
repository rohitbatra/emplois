<?php

// don't load it if you can't comment
if ( post_password_required() ) {
  return;
} ?>

<div id="comments">

<?php if ( have_comments() ) {

  ?><h2 class="comments-title"><?php comments_number( __( 'No Comments', 'jobseek' ), __( 'One Comment', 'jobseek' ), __( '% Comments', 'jobseek' ) );?></h2>

  <ul class="commentlist"><?php
    wp_list_comments(array(
      'callback'    => 'jobseek_comment',
      'avatar_size' => 60,
      'reply_text'  => __('Reply', 'jobseek'),
      'per_page'    => 1000
    ));
  ?></ul><hr><?php

  if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : 
  	?><nav class="paging" role="navigation">
    	<div class="pull-left"><?php previous_comments_link( __( 'Prev', 'jobseek' ) ); ?></div>
    	<div class="pull-right"><?php next_comments_link( __( 'Next', 'jobseek' ) ); ?></div>
  	</nav><?php
  endif;

  if ( ! comments_open() ) : 
  	?><p class="no-comments"><?php _e( 'Comments are closed.' , 'jobseek' ); ?></p><?php
  endif;

}

// Comment form settings.

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$fields =  array(
  'author' => '<div class="row"><div class="form-group comment-form-author col-sm-6"><input class="form-control" placeholder="' . esc_html__( 'Name', 'jobseek' ) . ( $req ? ' *' : '' ) . '" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . '>',
  'email'  => '</div><div class="form-group comment-form-email col-sm-6"><input class="form-control" placeholder="' . esc_html__( 'Email', 'jobseek' ) . ( $req ? ' *' : '' ) . '" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . '></div></div>'
);

comment_form( array(
  'class_submit'  => 'btn btn-primary',
  'label_submit'  => __( 'Post Comment' ),
  'comment_field' =>  '<div class="form-group comment-form-comment"><textarea id="comment" class="form-control" name="comment" cols="45" rows="5" aria-required="true"></textarea></div>',
  'fields'        => apply_filters( 'comment_form_default_fields', $fields ),
) ); ?>

</div>