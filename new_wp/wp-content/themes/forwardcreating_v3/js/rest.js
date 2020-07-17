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
  let catIdVal
  let isCategoryFiltering
  let isAllpages
  let page
  let isLoadMoreAction
  let loadMoreElem= $('[data-ui="load-more"]')
  let postRowsWrapElem= $('.post-rows-wrap')

  // if e(event) undefined, do posts from all categories
  page = $(loadMoreElem).attr('data-post-page')
  // if 'load more' UI click, alter page value
  isLoadMoreAction = $(element).attr("data-ui") == "load-more"
  if (isLoadMoreAction) {
    page = +page
    page += 1
    
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
    isCategoryFiltering = false
    // take default value
    catIdVal = cid
  }else {
    isCategoryFiltering = true
    // for future use, set button to have a selected category id
    $('[data-ui="load-more"]').attr("data-cats-val", catIdVal)
  }
  

  // 0 => user just typed in an Url
  if (performance.navigation.type == 0) {
    
  } else if (performance.navigation.type == 1 || performance.navigation.type == 2) {
    // 1 => page reloaded | 2 => back button clicked.  

    /* filter/load more btn. used  */
    if (isCategoryFiltering) {
      // save for next refreash or back btn rqst.
      sessionStorage.setItem("catid", catIdVal)
      sessionStorage.setItem("page", page)

      // if load more, give all posts
      if (isLoadMoreAction) {
        sessionStorage.setItem("page", page)
        isAllpages = false
      } else {
        isAllpages = true
      }
    } else {
      /* reload what we had last time */
      // set data from session
      let fromSessCatId = sessionStorage.getItem("catid")
      let fromSessPage = sessionStorage.getItem("page")
      //TODO:more testing for when we have bad vakues ( first load etc)
      if (!isNaN(fromSessCatId) && !isNaN(fromSessPage)) {
        catIdVal = sessionStorage.getItem("catid")
        page = sessionStorage.getItem("page")
      }
      // now save for next time
      sessionStorage.setItem("catid", catIdVal)
      sessionStorage.setItem("page", page)
      // update the btn. "load-more" with the current page
      $('[data-ui="load-more"]').attr("data-post-page", page)
      isAllpages = true
    }
  }
  
  
  // NOTE: data passed as url parameters
  let data = {
    allpages: isAllpages,
    loadMoreAction: isLoadMoreAction,
    isCategoryFiltering : isCategoryFiltering
  };
  
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

        $(loadMoreElem).attr('data-post-page', page)
        if (response.is_last_page === true) {
          $(loadMoreElem).attr('data-is-last-page', "true")
          $(loadMoreElem).hide()
        }else{  
        }
      } catch (e) {
        console.log(e);
      } finally {
        // rmove loading anim. 
        // load html into the element
        $(postRowsWrapElem).children('[data-ui="loading"]').remove()
        $(postRowsWrapElem).append(html)
        // if init. add instant, or if data from read more then aniamte it
        let lastPostsHtml = $(postRowsWrapElem).children('[data-from-page="'+page+'"]')
        if(catIdVal !== 0)
          $(lastPostsHtml).hide(0).fadeIn(700)
      }
    },
    fail : function( response ) {
      console.log('No good data');
    }
  });
}
