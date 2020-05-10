import * as components from "./../views/components.js";

export const someVar = "";

export function renderInRow(posts_data, posts_count, inRow) {
  var html="";
  for(var i = 0; i < posts_count; i++) {
    // row div open start
    if (i==0) {
      html += '<div class="row concepts-row">'
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
