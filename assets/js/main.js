import jQuery from "jquery";
window.$ = window.jQuery = jQuery;
import 'bootstrap';
import 'slick-carousel';

$('.product_slider').slick({
    slidesToShow: 6,
    centerMode: true,
    prevArrow: $('.left'),
    nextArrow: $('.right'),
    responsive: [
        {
            breakpoint: 1920,
            settings: {
                slidesToShow: 5,
            }
        },
        {
            breakpoint: 1620,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 1360,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 1028,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 732,
            settings: {
                slidesToShow: 1,
                centerMode: false
            }
        }
    ]
});

$('.hamburger-icon').on('click', function() {
    const menu = $('.menu');
    const shade = $('.page-shade');
    menu.toggleClass('active');
    if (menu.hasClass('active')){
        shade.show();
    } else {
        shade.hide();
    }
});

$('.close-menu').on('click', function() {
    const menu = $('.menu');
    const shade = $('.page-shade');
    menu.toggleClass('active');
    if (menu.hasClass('active')){
        shade.show();
    } else {
        shade.hide();
    }
});