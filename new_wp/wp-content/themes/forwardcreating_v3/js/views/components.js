

export function postCol(posts_data) {
  return `<div class="col-md-3 margin-top-0">
           <img src="${posts_data.post_thumb_url}" alt="">
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
