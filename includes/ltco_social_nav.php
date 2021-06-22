<?php
function ltco_social_nav() {

  $sociais = array(
    array(
      'name' => 'Facebook',
      'class' => 'facebook',
      'icon_name' => 'facebook',
      'url' => esc_url( get_field( 'ltco_social_facebook', 'options' ), 'https', '#' )
      // 'url' => 'javascript:void(0)'
    ),
    array(
      'name' => 'Instagram',
      'class' => 'instagram',
      'icon_name' => 'instagram',
      'url' => esc_url( get_field( 'ltco_social_instagram', 'options' ), 'https', '#' )
      // 'url' => 'javascript:void(0)'
    ),
    array(
      'name' => 'YouTube',
      'class' => 'youtube',
      'icon_name' => 'youtube',
      'url' => esc_url( get_field( 'ltco_social_youtube', 'options' ), 'https', '#' )
      // 'url' => 'javascript:void(0)'
    ),
    array(
      'name' => 'LinkedIn',
      'class' => 'linkedin',
      'icon_name' => 'linkedin',
      'url' => esc_url( get_field( 'ltco_social_linkedin', 'options' ), 'https', '#' )
      // 'url' => 'javascript:void(0)'
    )
  );

  $content_social_nav = "<nav class='ltco_social'>";

  foreach ( $sociais as $social ) {

    if ( !empty( $social['url'] ) ) {

      $ltco_social_name = $social['name'];
      $ltco_social_class = $social['class'];
      $ltco_social_icon_name = $social['icon_name'];

      $ltco_social_url = $social['url'];


      $blog_name = get_bloginfo('name');
      $ltco_src_icon_social = ltco_path('svgs')."/icon-social-$ltco_social_icon_name-dark.svg";

      $content_social_nav .= "<a href='$ltco_social_url' class='$ltco_social_class' target='_blank' rel='external noopener noreferrer' title='$ltco_social_name $blog_name'>";
      $content_social_nav .= "<img src='$ltco_src_icon_social' width='34' height='34' alt='ltco_icon_$ltco_social_icon_name'>";
      $content_social_nav .= "</a>";
    }
  }

  $content_social_nav .= '</nav>';

  return $content_social_nav;
}
