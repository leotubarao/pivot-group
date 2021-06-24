<?php

function custom_theme_setup() {
  add_theme_support( 'html5', array( 'comment-list' ) );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

function ltco_comment_fields( $fields ) {
  unset( $fields['comment'] );
  unset( $fields['author'] );
  unset( $fields['email'] );
  unset( $fields['url'] );
  unset( $fields['cookies'] );

  $commenter  = wp_get_current_commenter();
  $req        = get_option( 'require_name_email' );
  $html_req   = ( $req ? " required='required'" : '' );
  $consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

  $fields['author'] = sprintf(
    '<div class="form-group">%s</div>',
    sprintf(
      '<input id="author" name="author" class="form-control" type="text" placeholder="%s%s" value="%s" size="30" maxlength="245"%s />',
      __('Name'),
      ($req ? ' *' : ''),
      esc_attr($commenter['comment_author']),
      $html_req
    )
  );

  $fields['email'] = sprintf(
    '<div class="form-group">%s</div>',
    sprintf(
      '<input id="email" name="email" class="form-control" type="email" placeholder="%s%s" value="%s" size="30" maxlength="100" aria-describedby="email-notes"%s />',
      __('Email'),
      ($req ? ' *' : ''),
      esc_attr($commenter['comment_author_email']),
      $html_req
    )
  );

  $fields['url'] = false;

  $fields['comment'] = sprintf(
    '<div class="form-group">%s</div>',
    sprintf(
      '<textarea id="comment" name="comment" class="form-control" placeholder="%s *" cols="45" rows="3" maxlength="65525" required="required"></textarea>',
      _x( 'Comment', 'noun' )
    )
  );

  $fields['cookies'] = sprintf(
    '<div class="custom-control custom-checkbox">%s %s</div>',
    sprintf(
      '<input id="cookies-check" name="wp-comment-cookies-consent" class="custom-control-input" type="checkbox" value="yes"%s />',
      $consent
    ),
    sprintf(
      '<label class="custom-control-label" for="cookies-check">%s</label>',
      __('Save my name, email, and website in this browser for the next time I comment.')
    )
  );

  return $fields;
}

add_filter( 'comment_form_fields', 'ltco_comment_fields' );


function ltco_comment_form( $args ) {
  $req = get_option( 'require_name_email' );
  $required_text = sprintf(
    ' ' . __( 'Required fields are marked %s' ),
    '<span class="required">*</span>'
  );

  $args['class_container'] = 'mb-5';
  $args['class_form'] = 'ltco_form';
  $args['cancel_reply_link'] = 'Cancelar';
  $args['title_reply'] = __( 'Deixe seu comentário:' );
  $args['comment_notes_before'] = sprintf(
    '<p id="email-notes" class="text-muted">%s%s</p>',
    __( 'Your email address will not be published.' ),
    ( $req ? $required_text : '' )
  );

  $args['class_submit'] = 'btn btn-tertiary';
  $args['label_submit'] = 'Enviar';
  $args['submit_field'] = '<div class="form-submit d-flex justify-content-end mt-3">%1$s %2$s</div>';

  return $args;
};

add_filter( 'comment_form_defaults', 'ltco_comment_form' );

function ltco_comment_reply_link( $content ) {
  $extra_classes = 'badge badge-secondary p-2 text-uppercase';

  return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
}

add_filter('comment_reply_link', 'ltco_comment_reply_link', 99);

function ltco_cancel_comment_reply_link( $content ) {
  $classes = 'class="badge badge-primary p-2" id=';

  return preg_replace( '/id=/', $classes, $content);
}

add_filter('cancel_comment_reply_link', 'ltco_cancel_comment_reply_link', 99);


function ltco_comments_template() {
  if ( comments_open() || get_comments_number() )
    return comments_template();
}
