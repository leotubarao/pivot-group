<?php
  $sidebar_current = ( is_singular() ) ? 'sidebar-posts' : 'sidebar';
?>
<?php if ( is_active_sidebar( $sidebar_current )  ) : ?>
<aside class="ltco_sidebar col-12 <?= ltco_has_sidebar($sidebar_current, 'col-lg-4 col-xxl-3'); ?>">
  <?php dynamic_sidebar( $sidebar_current ); ?>
</aside>
<?php endif; ?>
