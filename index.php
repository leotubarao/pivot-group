<?php get_header(); ?>
<section class="container ltco-py-2 ltco-py-md-4 ltco-py-lg-6">
  <div class="row justify-content-between align-items-start mt-n5">
    <section
      id="ltco_posts"
      class="ltco_blog col-12 mt-5 <?= ltco_has_sidebar('sidebar', 'col-lg-8'); ?>"
      data-max-pages="<?= ltco_max_pages() ?>"
    >
      <?php if ( have_posts() ) : ?>

      <div class="ltco_blog__lists row">
        <?php if (!is_search()) get_template_part('components/featured-post'); ?>

        <?php
          while ( have_posts() ) : the_post();
            get_template_part('components/posts/post');
          endwhile;
        ?>
      </div>

      <?= ltco_button_more(); ?>

      <?php else : ?>
      <div class="alert alert-danger" role="alert">Nada encontrado</div>
      <?php endif; ?>

    </section>

    <?php get_sidebar(); ?>
  </div>
</section>
<?php get_footer(); ?>

