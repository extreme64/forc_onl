/** UI animation and graphis HTML collection*/
const uiHtmlCollection = {
  loading1 : `<img width="65" data-ui="loading" src="http://forwardcreating.com/new_wp/wp-content/themes/forwardcreating_v3/ui/c3c4d331234507.564a1d23db8f9.gif">`
}

// get html for loading graphics
export function getUiLoading(type=1) {
  let html
  switch (type) {
    case 1:
      html = uiHtmlCollection['loading1']
      break;
    case 2:
      html = ''
      break;
    default:

  }
  return html
}

// psots display template
export function postCol(posts_data) {
  let imgSrc
  // NOTE: no image added to the post, makes src attrivute generate 404
  // TODO: default graphics/image
  imgSrc = (posts_data.post_thumb_url == false ) ? '' : posts_data.post_thumb_url
  return `<div class="col-md-3 margin-top-0">
           <img src="${imgSrc}" alt="">
           <h4 class="margin-top--0 margin-bot-0">
             <a href="${posts_data.post_permalink}">
               ${posts_data.post_title}
             </a>
           </h4>
           <p>${posts_data.post_excerpt}</p>
           <p>
             <a href="${posts_data.post_permalink}">continue... <i class="fas fa-angle-double-right"></i></a>
           </p>
         </div>`;
}
