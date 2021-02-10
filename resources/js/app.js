require('./bootstrap');

// footer on bottom page
$(document).ready(function() {
    setInterval(function() {
        let selector = $('#footer');

        let docHeight = $(window).height();
        let footerHeight = selector.height();
        let footerTop = selector.position().top + footerHeight;
        let marginTop = (docHeight - footerTop + 10);

        if (footerTop < docHeight)
            selector.css('margin-top', marginTop + 'px'); // padding of 30 on footer
        else
            selector.css('margin-top', '0px');
        // console.log("docheight: " + docHeight + "\n" + "footerheight: " + footerHeight + "\n" + "footertop: " + footerTop + "\n" + "new docheight: " + $(window).height() + "\n" + "margintop: " + marginTop);
    }, 250);
});

// sticky navbar
$(window).scroll(function(){
    if ($(this).scrollTop() > $('.header').height()) {
        $('#navbar_top').addClass("fixed-top");
        // add padding top to show content behind navbar
        $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
    } else {
        $('#navbar_top').removeClass("fixed-top");
        // remove padding top from body
        $('body').css('padding-top', '0');
    }
});
