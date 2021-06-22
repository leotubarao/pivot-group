<?php

function ltco_styles_theme() {
  wp_register_style(
    'main-css',
    ltco_path('styles').'/main.css',
    array(),
    false
  );

  wp_register_style(
    'fonts-google',
    'https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;700&display=swap',
    array(),
    false
  );

  wp_register_style(
    'style',
    get_stylesheet_uri(),
    array( 'main-css', 'fonts-google' )
  );

  wp_enqueue_style( 'style' );
}

add_action( 'wp_enqueue_scripts', 'ltco_styles_theme' );

function ltco_scripts_theme() {
  wp_deregister_script( 'jquery' );

  wp_register_script(
    'jquery',
    'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js',
    array(),
    '3.4.1',
    true
  );

  wp_register_script(
    'popper',
    'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js',
    array( 'jquery' ),
    '1.15.0',
    true
  );

  wp_register_script(
    'bootstrap',
    'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js',
    array( 'jquery', 'popper' ),
    '4.6.0',
    true
  );

  wp_register_script(
    'modernizr',
    'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js',
    array( 'jquery' ),
    '2.8.3',
    false
  );

  wp_register_script(
    'ltco_dev',
    'https://leotubarao.github.io/signature/build/signature-ltco.js?theme=dark',
    array( 'bootstrap', 'modernizr' ),
    '2.0.0',
    true
  );

  wp_enqueue_script( 'ltco_dev' );

}
add_action( 'wp_enqueue_scripts', 'ltco_scripts_theme' );
