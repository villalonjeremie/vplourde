(function ($) {
    "use strict";

    var equalheight = function (container) {
        var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array(),
            jQueryel,
            topPosition = 0;
        jQuery(container).each(function () {

            jQueryel = jQuery(this);
            jQuery(jQueryel).height('auto')
            var topPostion = jQueryel.position().top;

            if (currentRowStart != topPostion) {
                for (var currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                    rowDivs[currentDiv].height(currentTallest);
                }
                rowDivs.length = 0; // empty the array
                currentRowStart = topPostion;
                currentTallest = jQueryel.height();
                rowDivs.push(jQueryel);
            } else {
                rowDivs.push(jQueryel);
                currentTallest = (currentTallest < jQueryel.height()) ? (jQueryel.height()) : (currentTallest);
            }
            for (var currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
        });
    }

    /*-----------------------------------------------------------------------------------*/
        /*  Window load
     /*-----------------------------------------------------------------------------------*/
    jQuery(window).on('load', function () {

        if (jQuery('.hidden-block').length) {
        if($('.footer-data').hasClass('footer-data-paralax')) {
            //Fixed footer

                fixedFooter();

                jQuery(window).on('resize', function () {
                    fixedFooter();
                });

        } else {
            jQuery('.hidden-block').css('position', 'relative');
        }

        }

        equalheight('.height-marg');
        equalheight('.services-box');
        equalheight('.case-box.height');

        var curent_hach = location.hash;
        if (curent_hach) {
            setTimeout(hash(), 1000);
            function hash() {
                jQuery('a[hrefjQuery="' + curent_hach + '"]').click();
            }

            return false;
        }

        staff_title();

    });


    if($('.unit-block').hasClass('body-unit')) {
        $('#header').addClass('header-test');
        $('.page_item_has_children').addClass('menu-item-has-children');
        $('.nav.navbar-nav > ul').attr('id', 'menu-header-menu');
        $('#menu-header-menu').parent().addClass('menu').removeClass('nav navbar-nav');
        $('#menu-header-menu').addClass('nav navbar-nav');
        $('.children').addClass('sub-menu');
        $('.navbar2').parent().addClass('wrapp2');

        $('.widget').find('.menu-item-has-children').find('ul').removeClass('sub-menu').addClass('test-menu');
    }

    /*-----------------------------------------------------------------------------------*/
    /*  Window resize
     /*-----------------------------------------------------------------------------------*/
    jQuery(window).on('resize', function () {
        equalheight('.height-marg');
        equalheight('.services-box');
        equalheight('.case-box.height');

        setTimeout(staff_title, 100);
    });

    jQuery("#own-advisor-box").owlCarousel({
        navigation : true,
        items : 2,
        pagination:false,
        navigationText : ["<i class=\'demo-icon icon-left-open-big\'>&#xe802;</i>","<i class=\'demo-icon icon-right-open-big\'>&#xe801;</i>"] ,
        itemsDesktop : [1199,2],
        itemsDesktopSmall : [979,2],
        itemsTablet : [768,2],
        itemsMobile : [479,1]
    });


    jQuery("#own-blog-box").owlCarousel({
        navigation : true,
        items : 2,
        pagination:false,
        navigationText : ["<i class=\'demo-icon icon-left-open-big\'>&#xe802;</i>","<i class=\'demo-icon icon-right-open-big\'>&#xe801;</i>"] ,
        itemsDesktop : [1199,2],
        itemsDesktopSmall : [979,2],
        itemsTablet : [768,2],
        itemsMobile : [479,1]
    });


    jQuery('.collapse .menu-item-has-children > a').after('<a class="submenu-toggler" href="#"><i class="fa fa-angle-down"></i></a>');
    (function () {
        var li_count = 0;
        jQuery('.center-logo > li').each(function () {
            li_count++;
        });
        var li_count_midl = ((li_count - li_count % 2) / 2) - 1;
        jQuery('.center-logo > li:eq(' + li_count_midl + ')').after(jQuery('.row .logo-li'));
    })();
    
    if ($('#sb-search').length) {
        new UISearch(document.getElementById('sb-search'));
        jQuery(".sb-search-input").addClass('animated fadeIn');
        jQuery("#header .menu").addClass('animated fadeIn');
        jQuery("#header .woo-icon-cart").addClass('animated');
    }

    jQuery(function () {
        var el = jQuery('#mb-main-menu li .submenu-toggler');
        jQuery('#mb-main-menu li:has("ul")').append('<span></span>');
        el.on('click', function () {

            var checkElement = jQuery(this).next();

            checkElement.stop().toggleClass('active').animate({
                'height': 'toggle',
                'padding': '0px'
            }, 500).parent().toggleClass('active');
            if (checkElement.is('ul')) {
                return false;
            }
        });
    });
    jQuery("#owl-advisor").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });
    jQuery("#owl-partners").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });

    jQuery("#own-team-box").owlCarousel({
        navigation: true,
        items: 3,
        pagination: false,
        navigationText: ["<i class='demo-icon icon-left-open-big'>&#xe802;</i>", "<i class='demo-icon icon-right-open-big'>&#xe801;</i>"],
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 2],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1]
    });

    jQuery('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    jQuery('.slider-nav').slick({
        centerPadding: '0',
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        arrows: false,
        centerMode: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    centerMode: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    /*-----------------------------------------------------------------------------------*/
    /*  Years Box
     /*-----------------------------------------------------------------------------------*/
    jQuery('.box-percent .years-percent, .border-top-box .years-box').on('click', function () {
        var curent_class = jQuery(this).attr('data-years');
        jQuery('.years-percent .text-year').removeClass('blue');
        jQuery('.years-box').removeClass('blue-border');
        jQuery('.years').animate({
            opacity: 0,
        }, 150, function () {
            jQuery(this).removeClass('active');
        });

        jQuery('.years-percent .' + curent_class).addClass('blue');
        jQuery('.years-box.' + curent_class).addClass('blue-border');
        jQuery('.years.' + curent_class).animate({
            opacity: 1,
        }, 200, function () {
            jQuery(this).addClass('active');

        });
    });

    /*-----------------------------------------------------------------------------------*/
    /*  FAQ accordion
     /*-----------------------------------------------------------------------------------*/
    jQuery('.tab-content .media').on('click', function () {
        var curent_height = jQuery(this).find('.hide-part-content').height();
        if (!jQuery(this).hasClass("open")) {

            jQuery('.open .hide-part').animate({
                height: '0px',
            }, 500);
            jQuery('.tab-content .media').removeClass('open');
            jQuery(this).find('.hide-part').animate({
                height: curent_height,
            }, 500);

            jQuery(this).addClass('open');
        } else {
            jQuery(this).removeClass('open');
            jQuery(this).find('.hide-part').animate({
                height: '0px',
            }, 500);
        }
    });
    var pre_scroll = 0;
    var header_top = jQuery('#header.shadow-center').scrollTop();

    /*-----------------------------------------------------------------------------------*/
    /*	Fixed Footer
     /*-----------------------------------------------------------------------------------*/

    function fixedFooter() {
        jQuery('.wrapper').css('margin-bottom', jQuery('.hidden-block').innerHeight());
    }


    /**
     * Back To Top
     */
    (function () {
        jQuery('#btt').fadeOut();
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() != 0) {
                jQuery('#btt').fadeIn();
            } else {
                jQuery('#btt').fadeOut();
            }
        });

        jQuery('#btt').on('click', function () {
            jQuery('body,html').animate({scrollTop: 0}, 800);
        });
    })();

    /**
     * Search form trim
     */
    jQuery('#searchform').on('submit', function () {
        var value = jQuery('#searchform .form-control').val();
        value = value.trim();
        jQuery('#searchform .form-control').val(value);
    });
    jQuery('#searchform_2').on('submit', function () {
        var value = jQuery('#searchform_2 .form-control').val();
        value = value.trim();
        jQuery('#searchform_2 .form-control').val(value);
    });

    /**
     * Sub menu
     */
    jQuery(document).on('hover', '.sub-menu .menu-item-has-children', function() {
        var element_position = jQuery(this).offset().left + 460;
        var  window_width = jQuery(window).width();
        if (element_position >= window_width) {
            jQuery(this).find('.sub-menu').attr('style', 'left: -230px !important;');
        } else {
            jQuery(this).find('.sub-menu').attr('style', '');
        }
    });

    /**
     * Staff title top
     */
    function staff_title() {
        jQuery('.hover-user').each(function () {
            var elem_height = jQuery(this).height();
            var title_height = jQuery(this).find('.table-user').height();
            var top = elem_height / 2 - title_height / 2;
            jQuery(this).find('.table-user').css('top', top + 'px');
        });
    }


    jQuery('.navbar-toggle').on('click', function () {
        jQuery('#header').toggleClass('header-collapsed');
    });

    jQuery(document).on('click', '.submenu-toggler', function (e) {

        alert('1');
        e.preventDefault();
        jQuery(this).next('ul').slideToggle();
    });



    if($('.footer-data2').hasClass('footer-data2-yes')) {
        jQuery( '.list-images ul li a' ).append( '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><line class="top" x1="0" y1="0" x2="100%" y2="0"/><line class="left" x1="0" y1="100%" x2="0" y2="-920"/><line class="bottom" x1="100%" y1="100%" x2="0" y2="100%"/><line class="right" x1="100%" y1="0" x2="100%" y2="1380"/></svg>' );
        jQuery( '.icon-box > div' ).append( '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><line class="top" x1="0" y1="0" x2="100%" y2="0"/><line class="left" x1="0" y1="100%" x2="0" y2="-100%"/><line class="bottom" x1="100%" y1="100%" x2="-100%" y2="100%"/><line class="right" x1="100%" y1="0" x2="100%" y2="100%"/></svg>' );
        jQuery( '.money-box > div' ).append( '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><line class="top" x1="0" y1="0" x2="100%" y2="0"/><line class="left" x1="0" y1="100%" x2="0" y2="-920"/><line class="bottom" x1="100%" y1="100%" x2="-600" y2="100%"/><line class="right" x1="100%" y1="0" x2="100%" y2="1380"/></svg>' );
        jQuery( '.block-images' ).append( '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><line class="top" x1="0" y1="0" x2="900" y2="0"/><line class="left" x1="0" y1="100%" x2="0" y2="-920"/><line class="bottom" x1="100%" y1="100%" x2="-600" y2="100%"/><line class="right" x1="100%" y1="0" x2="100%" y2="1380"/></svg>' );

    } else {
        jQuery('.icon-box.box').addClass('no-svg-border-margin');
        jQuery('.block-images.box').addClass('no-svg-border-margin');
        jQuery('.money-box.box').addClass('no-svg-border-margin');
    }


    if($('body').hasClass('page-template-onepage-template')) {

        jQuery(document).ready(function () {
            jQuery('.menu .menu-item a').each(function(){
                var href = jQuery(this).attr('href');
                jQuery(href).addClass('onepage-section');
            });
        });
        var win = jQuery(window);
        win.scroll(function() {
            jQuery('.onepage-section').each(function(){
                if (win.scrollTop() + win.height()/2 >= jQuery(this).offset().top && win.scrollTop() <= jQuery(this).offset().top + jQuery(this).height()/2) {

                    if (history.pushState) {
                        // IE10, Firefox, Chrome, etc.
                        window.history.pushState(null, null, '#'+jQuery(this).attr('id'));
                    } else {
                        // IE9, IE8, etc
                        window.location.hash = '#'+jQuery(this).attr('id');
                    }
                    var curent_section = jQuery(this).attr('id');
                    jQuery('#header.single .navbar-nav > li > a').removeClass('active');
                    jQuery('a[href$="'+curent_section+'"]').addClass('active');

                }
            });
        });
        if($('.header-fixed-data').hasClass('header-fixed-data-true')) {
            if(jQuery('#wpadminbar').length > 0){
                var scroll_shift = 107;
            }else{
                var scroll_shift = 75;
            }
            jQuery('#header.single .navbar-nav > li > a').pageNav({
                'scroll_shift': scroll_shift
            });

        } else {
            if(jQuery('#wpadminbar').length > 0){
                var scroll_shift = 31;
            }else{
                var scroll_shift = 0;
            }
            jQuery('#header.single .navbar-nav > li > a').pageNav({
                'scroll_shift': scroll_shift
            });
        }

        var header_top = jQuery('#header.shadow-center').scrollTop();
        jQuery(window).scroll(function(){
            if(jQuery(document).scrollTop() > header_top){
                jQuery('#header.shadow-center').addClass('sticky');
                jQuery('#header.shadow-fixed').addClass('sticky');
            }else{
                jQuery('#header.shadow-center').removeClass('on', 1000).removeClass('sticky');
                jQuery('#header.shadow-fixed').removeClass('on', 1000).removeClass('sticky');
            }
        });

    } else {
        var pre_scroll = 0;
        var header_top = jQuery('#header.shadow-center').scrollTop();
        var scrollData = $('.scroll-span').data('scroll');
        jQuery(window).scroll(function(){
            if(jQuery(document).scrollTop() > header_top){
                jQuery('#header.shadow-center').addClass(scrollData);
                jQuery('#header.shadow-fixed').addClass(scrollData);
                if (pre_scroll > jQuery(document).scrollTop()) {
                    jQuery('#header.shadow-center').addClass('on', 1000);
                    jQuery('#header.shadow-fixed').addClass('on', 1000);
                }else{
                    jQuery('#header.shadow-center').removeClass('on', 1000);
                    jQuery('#header.shadow-fixed').removeClass('on', 1000);
                }
            }else{
                jQuery('#header.shadow-center').removeClass('on', 1000).removeClass(scrollData);
                jQuery('#header.shadow-fixed').removeClass('on', 1000).removeClass(scrollData);
            }
            pre_scroll = jQuery(document).scrollTop();
        });
    }


    if($('.page_layout-sidebar').length) {
        $('.page_layout-sidebar').closest('.container').addClass('main-category main-category-flex');
        $('.page_layout-sidebar').next().addClass('maincont_col');
    }
})(jQuery);


