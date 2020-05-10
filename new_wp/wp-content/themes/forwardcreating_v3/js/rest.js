import * as posts from './modules/posts.js';
const catId = 0;

jQuery(document).ready(function($) {
  getPosts()
  $( '[data-cats="filter-ui"]' ).on( 'click', function(e){
    getPosts(e, this)
  })
});



function getPosts(e, element, cid=0) {
  let isAllPosts
  // if e(event) undefined, do
  // all categories and all posts
  try {
    e.preventDefault();
  } catch (exep) {
    //console.log(exep instanceof ReferenceError);
  }

    var catIdVal = $(element).attr('data-cats-val')
    if(catIdVal == undefined){
        catIdVal = cid
        isAllPosts = false
    }else {
        isAllPosts = true
    }

    var data = {
        methodVerb : 'get',
        catId: catIdVal,
        isAllPosts: isAllPosts,
        page: 1
    };
    //$('.post-rows-wrap').hide()
    $('.post-rows-wrap').html('<img width="65" src="http://forwardcreating.com/new_wp/wp-content/themes/forwardcreating_v3/ui/c3c4d331234507.564a1d23db8f9.gif">')
    $.ajax({
        method: 'POST',
        // Here we supply the endpoint url, as opposed to the action in the data object with the admin-ajax method
        url: rest_object.api_url + 'concepts/',
        data: data,
        beforeSend: function ( xhr ) {
            // Here we set a header 'X-WP-Nonce' with the nonce as opposed to the nonce in the data object with admin-ajax
            xhr.setRequestHeader( 'X-WP-Nonce', rest_object.api_nonce );
        },
        success : function( response ) {
          $('.post-rows-wrap').hide(200)
          // TODO: ERROR handle: response.posts_data if UNDEFINRD !!!!
          var res_o = JSON.parse(response.posts_data)
          var i;
          var html = "";
          // compile a html for all the rows,
          // 4 posts per row, in this case
          html = posts.renderInRow(res_o, response.posts_count, 4);
          // pump html into the element
          $('.post-rows-wrap').html(html)
          // and show it
          $('.post-rows-wrap').show(500)
        },
        fail : function( response ) {
          console.log('No good data');
          //$( '#result' ).html(response.message);
        }
    });
}
