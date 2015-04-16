/**
 * Created by Devin on 2015-04-14.
 */

function SetSlideCall(launchElem, slideElem) {
    var maxHeight = slideElem.offsetHeight;
    var currH = 0;

    function SlideComplete(height) {
        currH = height;
        if(currH <= 0)
            slideElem.style.display = 'none';
    }
    slideElem.style.height = 0 + 'px';
    SlideComplete(0);

    launchElem.addEventListener('click', function() {
        if(currH <= 0) {
            slideElem.style.display = 'block';
            AnimateElement.Slide(slideElem, 10, 16, maxHeight, currH, SlideComplete);
        }
        else if(currH >= maxHeight)
            AnimateElement.Slide(slideElem, 10, 16, 0, currH, SlideComplete);
    }, false);
}