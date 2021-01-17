jQuery(document).ready(function($) {

    //Collapse and open #ribbon on click
    $("#ribbon").click(function() {
        $("#student-nav").toggleClass("open");
    });

    //Hover on front page feature articles
    $('.feature').hover(function() {
        $('.feature').removeClass("active");
        $(this).toggleClass("active");
    });

    //Extend arrows on hover
    $('.byu-icon-arrow-long, .byu-icon-arrow-thin-long').parents('a').hover(function() {
        $(this).toggleClass('extend');
    });

    //Open mobile menu on click
    $('#mobile-menu-button').click(function() {
        $('#page').toggleClass('mobile-menu');
    });



    //Show mega menu on hover
    "use strict";

    var navItems = $('#main-menu > ul > li');

    navItems.on("click", function (e) {

        var megaMenu = $(this).children('.sub-menu');

        // hide any other menu item dropdowns to prevent overlap
        var dropdowns = $('#main-menu .top-level-nav-item').not(this);
        dropdowns.children('.sub-menu').hide();

        if ($(this).is(':last-child'))
            megaMenu.addClass('adjust-menu');

        if (!megaMenu.is(':visible') && $(this).hasClass('menu-item-has-children')) {

            megaMenu.fadeIn(500);

            megaMenu.on("mouseleave", function (e) {
                if (megaMenu.is(':visible')) {
                    megaMenu.fadeOut(500);
                }
            });


            e.preventDefault();
        }

    });

    // Show drop down menu on click
    var trigger = $('.filter-label');
    var dropdown = trigger.siblings('ul');

    trigger.click(function(e) {
        if (!dropdown.is(':visible')) {
            dropdown.fadeIn(300);
        }
        e.stopPropagation();
    });


    $('html').click(function() {
        if (dropdown.is(':visible')) {
            dropdown.fadeOut(300);
        }
    });


    // Detect touch screens and add class to HTML
    var is_touch_device = 'ontouchstart' in document.documentElement;

    if (is_touch_device) {
        $('html').addClass('touch');
    } else {
        $('html').addClass('no-touch');
    }

    // Flipping Animation
    $('.flip-container').on('click', function () {
        $(this).toggleClass('flip');
    });


});
