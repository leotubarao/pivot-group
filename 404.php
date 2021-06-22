<?php get_header('error'); ?>
<section class="wrapper-error m-auto">
  <h1 class="display-1">404</h1>
  <p class="h3">Esta página não foi encontrada.</p>
  <p>Talvez você queira ir para a nossa página inicial?</p>
  <a href="<?= home_url(); ?>" class="btn btn-primary text-white">Voltar para a Home</a>
</section>
<?php get_footer('error'); ?>
