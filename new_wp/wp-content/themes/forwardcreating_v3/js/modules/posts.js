import * as components from "./../views/components.js";

// ussed in files that include this json_encode
// bubbling up the 'components'
export const componentsModule = components;

export function renderInRow(posts_data, posts_count, inRow, page) {
  var html="";
  for(var i = 0; i < posts_count; i++) {
    // row div open start
    if (i==0) {
      html += `<div class="row concepts-row" data-from-page="${page}">`
    }
    // new row div open
    if (i % inRow == 0 && i !== 0) {
      html += '<div class="row concepts-row">'
    }
    // populate post col view component with data
    // and add to output string
    html += components.postCol(posts_data[i]);
    // close last row div
    if (i == posts_count-1) {
      html += '</div>'
    }
  }
  return html;
}
