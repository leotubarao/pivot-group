const postsContainer = $('.ltco_blog');
const postsWrapper = postsContainer.find( '.ltco_blog__lists' );

$('button.ltco_posts').on('click', function() {
  postsWrapper.animate({
    opacity: 0.5
  });

  const button = $(this);
  const buttonDescription = button.text();
  const max_pages = postsContainer.data('max-pages');
  let data = {
    action: 'ltco_posts',
    query: options.posts,
    page: options.current_page
  };

  $.ajax({
    url: options.ajax_url,
    data: data,
    type: 'POST',
    beforeSend: function( _xhr ) {
      button.text('Carregando...');
    },
    success: function( response ) {
      if (!response) button.remove();

      button.text( buttonDescription );
      postsWrapper.append( response );
      options.current_page++;

      if ( options.current_page >= max_pages ) button.remove();
    }
  }).always(() => {
    postsWrapper.animate({
      opacity: 1
    });
  });
});
