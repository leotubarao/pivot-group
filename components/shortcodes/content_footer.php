<?php
  wp_nav_menu(
    array(
      'theme_location'  => 'footer',
      'depth'           => 1,
      'container'       => '',
      'menu_class'      => 'ltco_footer__nav nav flex-column',
      'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
      'walker'          => new WP_Bootstrap_Navwalker()
    )
  );
?>
