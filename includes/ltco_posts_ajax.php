<?php

function ltco_posts_scripts() {
  global $wp_query;

  wp_enqueue_script( 'ltco_posts_ajax', ltco_path('scripts').'/posts_ajax.js', array( 'jquery' ), '1.0.0', true );

  wp_localize_script( 'ltco_posts_ajax', 'options', array(
    'ajax_url' => admin_url( 'admin-ajax.php' ),
    'posts' => json_encode( $wp_query->query_vars ),
    'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1
  ) );
}

add_action( 'wp_enqueue_scripts', 'ltco_posts_scripts');

function ltco_ajax_handler() {
  $args = json_decode( stripslashes( $_POST['query'] ), true );
  $args['paged'] = $_POST['page'] + 1;
  $args['post_status'] = 'publish';

  query_posts( $args );

  while( have_posts() ): the_post();
    get_template_part( 'components/posts/post' );
  endwhile;

  die;
}

add_action('wp_ajax_ltco_posts', 'ltco_ajax_handler');
add_action('wp_ajax_nopriv_ltco_posts', 'ltco_ajax_handler');


function ltco_max_pages() {
  global $wp_query;

  return $wp_query->max_num_pages;
}
