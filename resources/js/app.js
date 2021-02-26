require('./bootstrap');

// AOS library for animation
window.AOS = require('AOS');
AOS.init();

// add csrf-token to all request headers
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// footer on bottom page
$(document).ready(function () {
    setInterval(function () {
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
$(window).scroll(function () {
    let $selector = $('#header');
    if ($(this).scrollTop() > $selector.height()) {
        console.log($selector.height());
        $('#navbar_top').addClass("fixed-top");
        // add padding top to show content behind navbar
        $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
    } else {
        $('#navbar_top').removeClass("fixed-top");
        // remove padding top from body
        $('body').css('padding-top', '0');
    }
});

// change facebook widget's width when resizing window
function calculateWidgetWith() {
    let current_window_width = window.innerWidth;
    let fb_width = "500";

    if (current_window_width < 400) fb_width = "325";
    else if (current_window_width >= 400 && current_window_width < 450) fb_width = "325";
    else if (current_window_width >= 450 && current_window_width < 600) fb_width = "400";
    else if (current_window_width >= 600 && current_window_width < 750) fb_width = "450";
    else if (current_window_width >= 750 && current_window_width < 1200) fb_width = "500";
    else if (current_window_width >= 1200 && current_window_width < 1400) fb_width = "300";
    else if (current_window_width >= 1400 && current_window_width < 1600) fb_width = "400";
    else if (current_window_width >= 1600) fb_width = "500";

    if (document.getElementById("fb-widget")) {
        document.getElementById("fb-widget").innerHTML = '<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fniebieszczany.remix%2F&tabs=timeline&width=' + fb_width + '&height=600&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId" width="' + fb_width + '" height="610" style="border:none;overflow:hidden" allowTransparency="true" allow="encrypted-media"></iframe>';
    }
}

window.addEventListener("load", calculateWidgetWith, false);
window.addEventListener("orientationchange", function () {
    window.location.reload();
}, false);

let width = jQuery(window).width();
jQuery(window).on('resize', function () {
    if (jQuery(this).width() !== width) {
        width = jQuery(this).width();
        calculateWidgetWith();
    }
});

// toggler for admin sidebar nav
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

// scroll to top page button
$(document).ready(function(){
    let body = document.body,
        html = document.documentElement;

    let height = Math.max( body.scrollHeight, body.offsetHeight,
        html.clientHeight, html.scrollHeight, html.offsetHeight );

    $(window).scroll(function () {
        if ($(this).scrollTop() > height/2) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 400);
        return false;
    });
});

// logic for last and upcoming matches forms in admin panel
window.onload = function() {
    let matchType = document.getElementById('match-type');
    if (matchType) {
        matchType.onchange = function() {
            let element = document.getElementById("date-div-toggler");
            // The code of your function
            if (matchType.value === "1") {
                document.getElementById("league-matches").style.display = "block";
                element.className = element.className.replace(/\bcol-md-12\b/g, "col-md-6");
            } else {
                document.getElementById("league-matches").style.display = "none";
                element.className = element.className.replace(/\bcol-md-6\b/g, "col-md-12");
            }
        }
    }
}

// logic for toggler button on admin player list button
$(document).ready(function() {
    $("#add-player-btn").click(function() {
        $("#add-player").toggle();
    });
});

