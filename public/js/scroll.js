window.onscroll = function() {scroll()};

function scroll() {
    let scroll = $(window).scrollTop();
    let docHeight = $(document).height();
    let winHeight = $(window).height();
    let scrollPerc = (scroll / (docHeight-winHeight)) * 100;
    $('#progressbar').css('height', scrollPerc + '%');
}