$(function(){
    'use strict';
    let sections = ['titleSection', 'gameSection', 'talkSection', 'locationSection', 'sponsorSection'];
    let current = 0;
    if (window.location.href.lastIndexOf('#') !== -1){
        current = sections.indexOf(window.location.href.substring(window.location.href.lastIndexOf('#') + 1));
    }
    let lastScroll = $(`#${sections[0]}`).offset().top;
    let active = false;

    $('.owl-carousel').owlCarousel({
        loop:true,
        items: 3,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    function scrollTo(){
        $('html, body').animate({
            scrollTop: $(`#${sections[current]}`).offset().top
        }, 750).promise().then(function() {
            lastScroll = Math.round($(`#${sections[current]}`).offset().top * 100) / 100;
            setTimeout(function () {
                window.location.href = `http://127.0.0.1:8000#${sections[current]}`;
                active = true;
            }, 100);
        });
    }

    scrollTo();

    $('#learnMore').click(function () {
        if (active) {
            active = false;
            current = 1;
            scrollTo();
        }
    });

    $('#nextStep').click(function () {
        if (active && current !== sections.length - 1){
            active = false;
            current++;
            scrollTo();
        }
    });

    $(window).scroll(function(event){
        event.stopPropagation();
        if(active)
        {
            active = false;
            if (Math.round($(this).scrollTop() * 100) / 100 > lastScroll){
                if (current !== sections.length - 1){
                    current++;
                    scrollTo();
                }
                else{
                    active = true;
                }
            } else if(Math.round($(this).scrollTop() * 100) / 100 < lastScroll) {
                if (current !== 0){
                    current--;
                    scrollTo();
                }
                else{
                    active = true;
                }
            }
            else{
                active = true;
            }
        }
    });
});