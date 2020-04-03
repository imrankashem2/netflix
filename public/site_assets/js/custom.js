$(document).ready(function () {
    'use strict';

    /*-----------------------------------------------------
    Navbar Toggle for Mobile
    ------------------------------------------------------*/
    function navbarCollapse() {
        if ($(window).width() < 992) {
            $(document).on('click', function (event) {
                var clickover = $(event.target);
                var _opened = $("#main-nav-collapse").hasClass("in");
                if (_opened === true && !(clickover.is('.dropdown, #main-nav-collapse input, #main-nav-collapse button, #main-nav-collapse .fa, #main-nav-collapse select'))) {
                    // $("button.navbar-toggle").trigger('click');
                }
            });

            $('.dropdown').unbind('click');
            $('.dropdown').on('click', function () {
                $(this).children('.dropdown-menu').slideToggle();
            });
        }
    }
    navbarCollapse();

    /*-----------------------------------------
    Mobile Dropdown Toggle
    -----------------------------------------*/
    function dropdownToggle() {
        if ($(window).width() < 992) {
            $('.navbar-toggle').css('display', 'block');
            $('.navbar-collapse').css('display', 'none');

            $('.dropdown').unbind('click');

            $('.dropdown').on('click', function (dd) {
                dd.stopPropagation();
                $(this).children('.dropdown-menu').slideToggle();
            });
        } else {
            $('.navbar-toggle').css('display', 'none');
            $('.navbar-collapse').css('display', 'block');
        }
    }

    dropdownToggle();

    /*-----------------------------------------
    Header Slider 
    -----------------------------------------*/
    $('#vfx_banner_slider').owlCarousel({
        singleItem: true,
        slideSpeed: 200,
        autoPlay: 3000,
        stopOnHover: true,
        navigation: false,
        pagination: true,
        paginationNumbers: true,
    });

	/*-----------------------------------------
    TV Show Carousel 
    -----------------------------------------*/
    $('.tv-show-carousel').owlCarousel({
        items: 4,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [991, 3],
        itemsTablet: [767, 2],
        itemsMobile: [479, 1],
        slideSpeed: 200,
        navigation: true,
        navigationText: ['<i class=\"fa fa-angle-left\"></i>', '<i class=\"fa fa-angle-right\"></i>'],
        pagination: false,
    });

    /*-----------------------------------------
    Video Carousel 
    -----------------------------------------*/
    $('.video-carousel').owlCarousel({
        items: 6,
        itemsDesktop: [1199, 5],
        itemsDesktopSmall: [991, 4],
        itemsTablet: [767, 3],
        itemsMobile: [479, 2],
        slideSpeed: 200,
        navigation: true,
        navigationText: ['<i class=\"fa fa-angle-left\"></i>', '<i class=\"fa fa-angle-right\"></i>'],
        pagination: false,
    });	

	/*-----------------------------------------
    Sports Video Carousel 
    -----------------------------------------*/
    $('.sports-video-carousel').owlCarousel({
        items: 4,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [991, 3],
        itemsTablet: [767, 2],
        itemsMobile: [479, 1],
        slideSpeed: 200,
        navigation: true,
        navigationText: ['<i class=\"fa fa-angle-left\"></i>', '<i class=\"fa fa-angle-right\"></i>'],
        pagination: false,
    });	

	/*-----------------------------------------
    Seasons Video Carousel 
    -----------------------------------------*/
    $('.seasons-video-carousel').owlCarousel({
        items: 4,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [991, 3],
        itemsTablet: [767, 2],
        itemsMobile: [479, 1],
        slideSpeed: 200,
        navigation: true,
        navigationText: ['<i class=\"fa fa-angle-left\"></i>', '<i class=\"fa fa-angle-right\"></i>'],
        pagination: false,
    });		
	
	/*-----------------------------------------
		News Carousel 
    -----------------------------------------*/
    $('.news-carousel').owlCarousel({
        items: 3,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [991, 2],
        itemsTablet: [767, 1],
        itemsMobile: [479, 1],
        slideSpeed: 200,
        navigation: true,
        navigationText: ['<i class=\"fa fa-angle-left\"></i>', '<i class=\"fa fa-angle-right\"></i>'],
        pagination: false,
    });
	
    /*-----------------------------------------
    Single Gallery Slider
    -----------------------------------------*/
    $('.single-gallery-slider').owlCarousel({
        singleItem: true,
        slideSpeed: 200,
        autoPlay: 3000,
        stopOnHover: true,
        navigation: true,
        navigationText: ['<i class=\"fa fa-angle-left\"></i>', '<i class=\"fa fa-angle-right\"></i>'],
        pagination: false,
    });
 
    
    // Function for email address validation
    function isValidEmail(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);

        return pattern.test(emailAddress);

    }
    /*-----------------------------------------
    All Window Event
    -----------------------------------------*/
    $(window).on('resize orientationchange', function () {
        dropdownToggle();
        navbarCollapse();
    });
});

/*-----------------------------------------
Preloader
-----------------------------------------*/
$(window).on('load', function () {
    $('#preloader').delay(200).fadeOut(100);
});
