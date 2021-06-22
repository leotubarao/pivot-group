<nav class="navbar navbar-expand-md navbar-light ltco_navbar_header flex-column">
  <div class="container">
    <a class="m-auto" href="<?= home_url(); ?>">
      <img src="<?= ltco_path('svgs'); ?>/logo-pivot.svg" width="180" alt="logo-pivot">
    </a>
  </div>
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ltco_navbar_header__collapse" id="navbarHeader">
      <?php
        wp_nav_menu(
          array(
            'theme_location'  => 'header',
            'depth'           => 2,
            'container'       => '',
            'menu_class'      => 'navbar-nav mr-auto ltco_navbar_header__collapse__navbar',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker()
          )
        );
      ?>

      <?php get_search_form(); ?>
    </div>
  </div>
</nav>
