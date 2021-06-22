</main>
<footer class="ltco_footer">
  <div class="container py-5">
    <div class="row justify-content-between mt-n5">

      <?php if ( is_active_sidebar( 'footer-1' )  ) : ?>
      <div class="ltco_footer__sidebar_1 col-12 col-lg-4 col-xxl-3 mt-5">
        <?php dynamic_sidebar( 'footer-1' ); ?>
      </div>
      <?php endif; ?>

      <?php if ( is_active_sidebar( 'footer-2' )  ) : ?>
      <div class="ltco_footer__sidebar_2 col-12 col-lg-4 col-xxl-3 mt-5">
        <?php dynamic_sidebar( 'footer-2' ); ?>
      </div>
      <?php endif; ?>

      <?php if ( is_active_sidebar( 'footer-3' )  ) : ?>
      <div class="ltco_footer__sidebar_3 col-12 col-lg-4 col-xxl-3 mt-5">
        <?php dynamic_sidebar( 'footer-3' ); ?>
      </div>
      <?php endif; ?>

    </div>

    <div class="ltco_footer__copyright">
      <span>© Copyright <?php bloginfo('name'); ?> - Todos os direitos reservados.</span>
      <a
        class="ltco_footer__copyright__sign"
        href="http://www.sinaispublicidade.com.br/"
        target="_blank"
        rel="external noopener noreferrer"
      >
        SINAIS
      </a>
    </div>
  </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
