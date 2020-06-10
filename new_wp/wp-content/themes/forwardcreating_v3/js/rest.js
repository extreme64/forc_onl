import * as posts from './modules/posts.js';
const catId = 0;


// click events
jQuery(document).ready(function($) {

  getPosts()

  $('[data-cats="filter-ui"]').on( 'click', function(e){
    // on filter select, set page to first one
    $('[data-ui="load-more"]').attr('data-post-page', 1)
    // update load more UI btn to get the next page from proper filter category
    $('[data-ui="load-more"]').attr("data-cats-val", $(this).attr('data-cats-val'))
    getPosts(e, this)
  })

  // more posts on UI click
  $('[data-ui="load-more"]').on( 'click', function(e){
    getPosts(e, this)
  })
});


/**  functions  */
// get posts, from all/filtered categories
function getPosts(e, element, cid=0) {
  let isCategoryFiltering
  let catIdVal
  let page
  let loadMoreElem= $('[data-ui="load-more"]')
  let postRowsWrapElem= $('.post-rows-wrap')

  // if e(event) undefined, do posts from all categories
  page = $(loadMoreElem).attr('data-post-page')
  // if 'load more' UI click, alter page value
  if($(element).attr("data-ui") == "load-more") {
    page = (1*page)+1
    // make page value remembered in "load-more" button
    $(loadMoreElem).attr('data-post-page', page)
    // loading anim. for posts laoding
    // keep old html, we are just adding new posts to it
    $(postRowsWrapElem).append(posts.componentsModule.getUiLoading(1))
  } else {
    // if filter used, then clear html
    $(postRowsWrapElem).html(posts.componentsModule.getUiLoading(1))
  }

  // set category value
  catIdVal = $(element).attr('data-cats-val')
  // if no category set (on init. page load)
  if(catIdVal == undefined){
    // take default value
    // TODO: catIdVal = -1
    catIdVal = cid
  }else {
    // for future use, set button to have a selected category id
    $('[data-ui="load-more"]').attr("data-cats-val", catIdVal)
  }
// NOTE: data passed as url parameters
  let data = {
      //catId: catIdVal,
      //page: page,
      isCategoryFiltering : isCategoryFiltering
  };
  
  /* */
  $.ajax({
    method: 'GET',
    // Here we supply the endpoint url, as opposed to the action in the data object with the admin-ajax method
    url: rest_object.api_url + 'concepts?catId='+catIdVal+'&page='+page,
    data: data,
    beforeSend: function ( xhr ) {
      // Here we set a header 'X-WP-Nonce' with the nonce as opposed to the nonce in the data object with admin-ajax
      xhr.setRequestHeader( 'X-WP-Nonce', rest_object.api_nonce );
    },
    success : function( response ) {
      let i;
      let html = "";
      let res_o;

      try {
        res_o = JSON.parse(response.posts_data)
        // compile a html for all the rows,
        // 4 posts per row, in this case
        html = posts.renderInRow(res_o, response.posts_count, 4, page);
        console.log(response.str_bubbleup);
      } catch (e) {
        console.log(e);
      } finally {
        // pump html into the element
        $(postRowsWrapElem).children('[data-ui="loading"]').remove()
        //$(postRowsWrapElem).append(html)
        $(postRowsWrapElem).append(html)
        // if init. add instant, or if data from read more then aniamte it
        let lastPostsHtml = $(postRowsWrapElem).children('[data-from-page="'+page+'"]')
        if(catIdVal !== 0)
          // and show it
          $(lastPostsHtml).hide(0).fadeIn(700)
      }

    },
    fail : function( response ) {
      console.log('No good data');
    }
  });
}
