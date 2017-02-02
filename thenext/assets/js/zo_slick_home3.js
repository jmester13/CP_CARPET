jQuery(document).ready(function ($) {
    "use strict";
    $(document).ready(function () {

        $('.slider-for-home3').slick({
            slide: 'div',
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            infinite: true,
            asNavFor: '.slider-nav-home3'
        });
        $('.slider-nav-home3').slick({
            slide: 'div',
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for-home3',
            dots: false,
            arrows: false,
            infinite: true,
            centerMode: true,
            centerPadding: '0',
            focusOnSelect: true
        });
    });
});

