<?php
  $args = array(
    'post_type' => 'post',
    'showposts' => 5,
    'ignore_sticky_posts' => true
  );

  $query = new WP_Query( $args );

  if ( $query->have_posts() ) :
?>
<section class="ltco_sidebar">
  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
  <article <?php post_class('ltco_sidebar__item d-flex mt-4'); ?>>
    <figure class="mr-2">
      <?= ltco_the_post_thumbnail( get_the_ID(), 'sidebar' ); ?>
    </figure>
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="h4 stretched-link">
      <?php the_title(); ?>
    </a>
  </article>
  <?php endwhile; ?>
</section>
<?php endif; wp_reset_query(); ?>
