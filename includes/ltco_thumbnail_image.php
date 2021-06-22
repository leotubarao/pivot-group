<?php
function ltco_get_image_ref() {
  return 'https://via.placeholder.com/1500/DBDBDB/000000?text=No+Image';
}

function styleInline( $image ) {
  return " style='background-image: url($image)'";
}

function ltco_thumbnail_image( $id = null ) {
  if ( has_post_thumbnail( $id ) ) return get_the_post_thumbnail_url( $id, 'large' );
}

function ltco_thumbnail_post( $params = null ) {
  if (is_array($params) && $params[0] === 'acf') {
    $params = array_slice($params, 1);
    return styleInline( ltco_the_field($params, 'image') );
  }

  if ($params === 'ref') return styleInline( ltco_get_image_ref() );

  if ( ltco_thumbnail_image( $params ) )
    return styleInline( ltco_thumbnail_image( $params ) );
}

function ltco_thumbnail_post_dev( $params ) {
  return ( ltco_thumbnail_post( $params ) ) ?: ltco_thumbnail_post('ref');
}

function ltco_the_post_thumbnail( $id, $size ) {
  return ( get_the_post_thumbnail( $id, $size ) ) ?: sprintf(
    '<img src="%s" width="110" height="90" alt="image-reference">',
    ltco_get_image_ref()
  );
}
