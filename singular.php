<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section <?php post_class('container ltco-py-2 ltco-py-md-4 ltco-py-lg-6'); ?>>

  <div class="row justify-content-between align-items-start mt-n5">
    <section class="col-12 mt-5 <?= ltco_has_sidebar('sidebar-posts', 'col-lg-8'); ?>">
      <article>
        <?php the_content(); ?>

        <?php ltco_post_meta_edit('post', 'mt-3'); ?>
      </article>

      <hr>
      <?= ltco_comments_template(); ?>
    </section>

    <?php get_sidebar(); ?>

  </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>
