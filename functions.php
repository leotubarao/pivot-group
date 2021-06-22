<?php

require_once('includes/index.php');

function ltco_path($dirname) {
  $root = '/public';

  $dirname = ($dirname === 'svgs')
    ? "$root/images/$dirname"
    : "$root/$dirname";

  return get_template_directory_uri().$dirname;
}

function ltco_mailer( $phpmailer ) {
  $phpmailer->isSMTP();
  $phpmailer->Host = 'smtp.example.com';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 465;
  $phpmailer->Username = 'user@example.com';
  $phpmailer->Password = 'secret';
}

// add_action( 'phpmailer_init', 'ltco_mailer' );

function ltco_post_meta_edit($type = 'post', $margin = '') {
  edit_post_link("Editar $type","","","","badge badge-warning p-2 text-uppercase $margin");
}

/*=================================
=            Debug PHP            =
=================================*/

function debugPHP( $value ) {
  echo "<pre>";
  print_r($value);
  echo "</pre>";
}

function _ltco( $value = null ) {
  global $current_user;

  if ($current_user->user_login === 'ltco') {
    debugPHP($value);
  }
}

/*=====  End of Debug PHP  ======*/

function ltco_query_posts( $query ) {
  if ( $query->is_main_query() )
    $query->set( 'ignore_sticky_posts', true );
    // $query->set( 'post__not_in', get_option( 'sticky_posts' ) );
}
add_action( 'pre_get_posts', 'ltco_query_posts' );

/*==================================
=            Shortcodes            =
==================================*/

function ltco_content_sidebar() {
  ob_start();
  get_template_part('components/sidebar/more_posts');
  return ob_get_clean();
}
add_shortcode( 'ltco_content_sidebar', 'ltco_content_sidebar' );

function ltco_newsletter() {
  ob_start();
  get_template_part('components/sidebar/newsletter');
  return ob_get_clean();
}
add_shortcode( 'ltco_newsletter', 'ltco_newsletter' );

function ltco_social_shortcode() {
  ob_start();
  echo ltco_social_nav();
  return ob_get_clean();
}
add_shortcode( 'ltco_social_shortcode', 'ltco_social_shortcode' );

function ltco_menu_footer() {
  ob_start();
  get_template_part('components/shortcodes/content_footer');
  return ob_get_clean();
}
add_shortcode( 'ltco_menu_footer', 'ltco_menu_footer' );

/*=====  End of Shortcodes  ======*/

/*=======================================
=            Themes Supports            =
=======================================*/

/*----------  Post thumbnail  ----------*/

add_theme_support( 'post-thumbnails' );

add_image_size( 'sidebar', 110, 90, array( 'center', 'center' ) );

// update_option('thumbnail_size_w', 215);
// update_option('thumbnail_size_h', 215);

/*----------  Page Excerpt  ----------*/

add_post_type_support( 'page', 'excerpt' );

/*----------  Menu  ----------*/

add_theme_support( 'menus' );

register_nav_menus(array(
  'header' => 'Header',
  'footer' => 'Footer'
));

/*----------  Title Tag  ----------*/

add_theme_support( 'title-tag' );

/*=====  End of Themes Supports  ======*/

/*====================================
=            Theme Filter            =
====================================*/

function ltco_upload_svg($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'ltco_upload_svg');

add_filter('show_admin_bar', '__return_false');

/*=====  End of Theme Filter  ======*/

/*========================================
=            Remove WordPress            =
========================================*/

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

/*=====  End of Remove WordPress  ======*/
