<!DOCTYPE html>
<html lang="pt-br">
<?php get_head(); ?>
<body <?php body_class(); ?>>
<div id="root">
<?php
  get_template_part( 'components/navs/main' );
  if ( is_single() ) get_template_part( 'components/headers/default' );
?>
<main class="ltco_main">
