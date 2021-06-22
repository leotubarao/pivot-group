<?php
  $sticky = new WP_Query( array( 'p' =>  get_option( 'sticky_posts' )[0] ) );

  if ( $sticky->have_posts() ) : while ( $sticky->have_posts() ) : $sticky->the_post();
?>

<article <?php post_class("ltco_blog__lists__featured col-12"); ?> >
  <div <?= ltco_thumbnail_post_dev( get_the_ID() ); ?> class="ltco_blog__lists__featured__wrapper">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="link stretched-link">
      <span class="sr-only">
        <?php the_title(); ?>
      </span>
    </a>

    <div class="content">
      <?= ltco_first_category( get_the_ID() ); ?>

      <p class="h2 text-white mb-0"><?php the_title(); ?></p>
    </div>
  </div>
</article>

<?php endwhile; endif; wp_reset_postdata(); ?>
