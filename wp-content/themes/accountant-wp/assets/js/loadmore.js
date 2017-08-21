jQuery(function($){
  $(document).on('click', '#load_more', function() {
    $(this).text('...');
    var data = {
      'action': 'loadmore',
      'query': true_posts,
      'page' : current_page
    };
    $.ajax({
      url:ajaxurl,
      data:data,
      type:'POST',
      success:function(data){
        if( data ) { 
          $('#load_before').text('...').before(data);
          current_page++;
          if (current_page == max_pages) $("#load_before").remove();
        } else {
          $('#load_before').remove();
        }
      }
    });
  });
});