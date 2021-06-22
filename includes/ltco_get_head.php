<?php
function get_head( $name = null ) {
  do_action( 'get_head', $name );

  $templates = array();
  $name = (string) $name;

  if ( '' !== $name ) {
    $templates[] = "components/head-{$name}.php";
  }

  $templates[] = 'components/head.php';

  locate_template( $templates, true );
}
