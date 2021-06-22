<header class="header default">
  <div class="container pt-5 ltco_title_header">
    <div class="header__content col-12 col-md-8 col-lg-7 col-xl-6 col-xxl-6 px-0">
      <h1><?= ltco_title(); ?></h1>
      <?= ( has_excerpt() ) ? '<p class="mb-0">'.get_the_excerpt().'</p>' : ''; ?>
    </div>
    <div class="date_post pt-5">
      <span>Por: <strong><?= get_the_author_meta( 'display_name', $post->post_author ); ?></strong></span>
      <span><?= get_the_date(); ?></span>
    </div>
  </div>
</header>
