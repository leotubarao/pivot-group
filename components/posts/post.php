<article <?php post_class("ltco_blog__lists__item col-12 col-md-6 mt-4"); ?>>
  <figure <?= ltco_thumbnail_post_dev( get_the_ID() ); ?>></figure>

  <?= ltco_first_category( get_the_ID() ); ?>

  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="h3 stretched-link mb-0">
    <?php the_title(); ?>
  </a>
</article>
