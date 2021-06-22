<?php

function ltco_first_category( $params ) {
  if ( is_array( $params ) ) list($id, $class, $link) = $params;

  $id       = ( is_array( $params ) ) ? $id : $params;
  $class    = ( is_array( $params ) ) ? $class : false;
  $has_link = ( is_array( $params ) ) ? $link : false;

  $cat = get_the_category( $id );

  if ($class) $class = ' class="ltco_category text-secondary"';

  if ( !empty( $cat ) ) {
    if ( !$has_link )
      return sprintf(
        '<span class="ltco_category text-primary font-weight-bold text-uppercase">%s</span>',
        esc_html( $cat[0]->name )
      );

      return sprintf(
      '<a href="%s"%s>%s</a>',
      esc_url( get_category_link( $cat[0]->term_id ) ),
      $class,
      esc_html( $cat[0]->name )
    );

    return '<a href="' . esc_url( get_category_link( $cat[0]->term_id ) ) . '"'.$class.'>' . esc_html( $cat[0]->name ) . '</a>';
  }
}

function ltco_class_the_author($html){
  $html = str_replace('<a','<a class="text-secondary"',$html);
  return $html;
}

add_filter('the_author_posts_link','ltco_class_the_author');

function ltco_button_more( $content = 'Ver mais posts' ) {
  $published_posts = wp_count_posts()->publish;

  if ( $published_posts > get_option( 'posts_per_page' ) )
    return sprintf(
      '<button type="button" class="btn btn-tertiary text-uppercase font-weight-bold px-4 d-table mx-auto mt-5 ltco_posts">%s</button>',
      $content
    );
}
