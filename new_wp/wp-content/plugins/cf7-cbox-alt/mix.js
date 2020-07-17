
document.addEventListener('DOMContentLoaded', function () {
    let q = function (el) {
        return document.querySelectorAll(el);
    };

    // Usage
    /* q('#container');
    q('.box'); // any element with a class of box
    q('.box', 'div'); // look for divs with a class of box
    q('p'); // get all p elements */

    // Array.prototype.forEach...

    let checkboxWrap = document.getElementsByClassName("wpcf7-list-item");
    let svg = document.getElementsByClassName("svg-cb");
    var nelInput = svg.nextSibling
    //TODO is of type
    let input = document.getElementsByTagName("input"); 

    
    var matches;
    
    (function (doc) {
        matches =
            doc.matchesSelector ||
            doc.webkitMatchesSelector ||
            doc.mozMatchesSelector ||
            doc.oMatchesSelector ||
            doc.msMatchesSelector;
        })(document.documentElement);


    document.addEventListener('click', function (e) {
        let checkmarkSvg

        // .cb-box
        if (matches.call(e.target, '.cb-check')) {
            // we target the path elem. 'box'
            // so we need the parent ['SVG' one]
            let next = e.target.nextElementSibling
            while (next.nodeType > 1)
                next = next.nextSibling

            // toggle SVG class (show check sign)
            e.target.classList.toggle('checkmark');
            // switch svg UI: show/hide check sigh path element
            checkmarkSvg = e.target.querySelector('path.cb-check')
            checkmarkSvg.classList.toggle('hide-svg');
            // change checkbox value to reflect svg UI selected/not 
            // .. to have the proper value for the POST 
            if (!next.checked)
                next.checked = true
            else
                next.checked = false
        }
    }, false);

});