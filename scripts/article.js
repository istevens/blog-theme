$(document).ready(function() {
    _article = $('#content article');

    // Make any article clickable from index page.
    // First color when clicked.
    _article.mousedown(function(e) {
        $(this).addClass('clicked');
    });

    _article.find('a').mousedown(function(e) {
        e.stopPropagation();
    });

    _article.mouseleave(function(e) {
        $(this).removeClass('clicked');
    });

    _article.mouseup(function(e) {
        if($(this).hasClass('clicked')) {
            $(this).removeClass('clicked');
            link = $(this).find('a[rel=bookmark]')[0].href.split('#')[0]
            window.location = link
        }
    });
});

