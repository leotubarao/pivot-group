<form
  role="search"
  method="get"
  class="ltco_form_search"
  autocomplete="off"
  action="<?= esc_url( home_url( '/' ) ); ?>"
>
  <div class="form-group">
    <input
      type="search"
      class="ltco_form_search__field form-control"
      placeholder="Pesquisar"
      aria-label="Pesquisar"
      name="s"
      value="<?= get_search_query(); ?>"
    />
    <button type="submit" class="ltco_form_search__btn">
      <span class="sr-only">Pesquisar</span>
      <img src="<?= ltco_path('svgs'); ?>/icon-search.svg" alt="ltco_icon__search">
    </button>
  </div>
</form>
