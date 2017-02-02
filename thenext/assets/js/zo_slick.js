jQuery(document).ready(function ($) {
    "use strict";
    $(document).ready(function () {

        $('.slider-for').slick({
            slide: 'div',
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            infinite: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slide: 'div',
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: false,
            arrows: false,
            infinite: true,
            centerMode: true,
            centerPadding: '0',
            focusOnSelect: true
        });
      
    });
});

