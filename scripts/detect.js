/**
 * Detect browser functionality, sans Modernizr.
 * From: http://www.sitepoint.com/detect-css3-property-browser-support/
 */
var Detect = (function() {
    var css_prefixes = "Webkit,Moz,O,ms,Khtml".split(",");
    var d = document.createElement('detect');
    var props = ['textStroke', 'textShadow'];

    function listen(evnt, elem, func) {
        if (elem.addEventListener) { // W3C DOM
            elem.addEventListener(evnt,func,false);
        }
        else if (elem.attachEvent) { // IE DOM
            var r = elem.attachEvent("on"+evnt, func);
            return r;
        }
        else {
            throw('This browser not supported.');
        }
    }

    function test_prefixes(prop) {
        title = prop.charAt(0).toUpperCase() + prop.substr(1);
        tests = (prop + ' ' + css_prefixes.join(title + ' ') + title).split(' ');
        for(var n=0; n<tests.length; n++) {
            if(d.style[tests[n]] === "") return true; 
        }
        return false;
    }

    function append_classes() {
        var body = document.getElementsByTagName('body')[0];

        for(p in props) {
            prop = props[p];
            if(test_prefixes(prop)) {
                body.className += ' ' + prop.toLowerCase();
            }
        }
    }

    listen('load', window, append_classes);
}());
