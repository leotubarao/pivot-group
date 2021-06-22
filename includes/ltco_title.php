<?php
function ltco_title() {
  $titleSearch = sprintf(
    'Resultados da pesquisa: %s',
    esc_html( get_search_query() )
  );

  if ( is_search() ) return $titleSearch;

  return get_the_title();
}
