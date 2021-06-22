<?php

function ltco_sidebar() {
  register_sidebar(array(
    'name'          => 'Sidebar Home',
    'id'            => 'sidebar',
    'before_widget' => '<div class="ltco_widget %2$s mt-5">',
    'after_widget'  => '</div>',
    'before_title'  => '<h6 class="ltco_widget__title mb-5 text-uppercase">',
    'after_title'   => '</h6>',
  ));

  register_sidebar(array(
    'name'          => 'Sidebar Posts',
    'id'            => 'sidebar-posts',
    'before_widget' => '<div class="ltco_widget %2$s mt-5">',
    'after_widget'  => '</div>',
    'before_title'  => '<h6 class="ltco_widget__title mb-5 text-uppercase">',
    'after_title'   => '</h6>',
  ));

  register_sidebar(array(
    'name'          => 'Footer 1',
    'id'            => 'footer-1',
    'before_widget' => '<div class="ltco_widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="ltco_widget__title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => 'Footer 2',
    'id'            => 'footer-2',
    'before_widget' => '<div class="ltco_widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="ltco_widget__title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => 'Footer 3',
    'id'            => 'footer-3',
    'before_widget' => '<div class="ltco_widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="ltco_widget__title">',
    'after_title'   => '</h3>',
  ));
}

add_action( 'widgets_init', 'ltco_sidebar' );

function ltco_has_sidebar( $sidebar, $class ) {
  if (is_active_sidebar($sidebar)) return $class;
}
