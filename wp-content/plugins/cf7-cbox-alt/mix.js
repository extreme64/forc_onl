/* WAR!!! min. version is in use!*/
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
    let nelInput = svg.nextSibling
    //TODO is of type
    let input = document.getElementsByTagName("input");     
    let matches;
    
    let checkmarkSvg
    
    // polyfill for now
    (function (doc) {
        matches =
            doc.matchesSelector ||
            doc.webkitMatchesSelector ||
            doc.mozMatchesSelector ||
            doc.oMatchesSelector ||
            doc.msMatchesSelector;
        })(document.documentElement);

        document.addEventListener('click', function (e) {
            let selectCheckBoxBtnsWrap = function (e, isLabel = false) {
            try {
                let target
                // find our parent form wrap element, to limit the scope
                //let ourWrapingForm
                if (isLabel) {
                    target = e.target.parentNode.firstChild
                    //ourWrapingForm = target.closest('form.mc4wp-form')
                } else {
                    target = e.target
                    //urWrapingForm = e.target.closest('form.mc4wp-form')
                }

                // we target the path elem. 'box'
                // so we need the parent ['SVG' one]
                let next = target.nextElementSibling
                while (next.nodeType > 1) {
                    next = next.nextSibling
                }

                // toggle SVG class (show check sign)
                target.classList.toggle('checkmark');
                // switch svg UI: show/hide check sigh path element
                checkmarkSvg = target.querySelector('path.cb-check')
                checkmarkSvg.classList.toggle('hide-svg');
                // change checkbox value to reflect svg UI selected/not 
                // .. to have the proper value for the POST 
                if (!next.checked) {
                    next.checked = true
                } else {
                    next.checked = false
                }
            } catch (error) { 

            }
        }
    
        if (matches.call(e.target, '.cb-check')) {
            selectCheckBoxBtnsWrap(e)
        } 
        
    
        if (matches.call(e.target, '.wpcf7-list-item-label')) {
            selectCheckBoxBtnsWrap(e, true)
        }
        /*** for - contact form END */
        



        // catch radio btns evwnts. (subscribe form)
        let selectRadioBtnsWrap = function (e, isSpan = false) {
            try {
                
                let target
                let ourWrapingForm
                // find our parent form wrap element, to limit the scope
                if (isSpan) {
                    target = e.target.parentNode.firstChild
                    ourWrapingForm = target.closest('form.mc4wp-form')
                }else{
                    target = e.target
                    ourWrapingForm = e.target.closest('form.mc4wp-form')
                }

                // eliminate not input elem.
                let next = target.nextElementSibling
                while (next.nodeType > 1) {
                    next = next.nextSibling
                }
                
                // get our radio btns  (no need label wrap makes the selection automatic)  
                // let all_radiobtns = ourWrapingForm.querySelectorAll(".cf7-cbrb-alt");
                // all_radiobtns.forEach(rbtn => { 
                //     rbtn.classList.toggle('sss')
                // });
                
                // ger the sleccted radio btn. SVG check path elem. 
                let eCheckPathClasses = target.querySelector('path.rb-check').classList
                // if not selected, go forward
                if (eCheckPathClasses.contains('hide-svg')) {
                    // get all SVG check path elems. hide check
                    let checkUIpatElements = ourWrapingForm.querySelectorAll('path.rb-check')
                    checkUIpatElements.forEach(svgCheckUIpath => {
                        let classes = svgCheckUIpath.classList;
                    svgCheckUIpath.classList.add('hide-svg');
                });
                // show check for the selected one
                eCheckPathClasses.remove('hide-svg');
                }
            } catch (error) {
                
            }
        }


        if (matches.call(e.target, 'span')) {
            selectRadioBtnsWrap(e, true)
        }
        // svg events
        if (matches.call(e.target, '.rb-selected') || matches.call(e.target, '.rb-unselected')) {
            selectRadioBtnsWrap(e)
        }

        

    }, false);

});