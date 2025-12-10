/**
 * Erik Korte Theme JavaScript
 * Mobile menu toggle and submenu navigation
 */

jQuery(document).ready(function($) {
    let isMobileMenuInitialized = false;

    function initMenuScript() {
        const isMobile = window.matchMedia("(max-width: 991.98px)").matches;

        if (isMobile && !isMobileMenuInitialized) {
            // Mobile menu toggle
            $('.mobile_menubtn').off('click').on('click', function() {
                const $btn = $(this);
                const isClosing = $('.main-menu').is(':visible');

                if (isClosing) {
                    // Reset submenu states when closing menu
                    $('.sub-menu').removeClass('active').removeAttr('style');
                    $('.menu-item-has-children > a').show();
                    $('.back-btn').remove();
                    $('.main-menu > li').show();
                }

                $('.main-menu').toggle('slow');
                // Toggle the icons between hamburger and cross
                $btn.find('i').toggleClass('fa-bars fa-times');
                // Toggle aria-expanded for accessibility
                $btn.attr('aria-expanded', isClosing ? 'false' : 'true');
            });

            // Handle submenu toggle
            $('.menu-item-has-children > a').off('click').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); // Prevent event bubbling

                $('.main-menu > li').not($(this).parent()).hide();
                // Hide the clicked <a> element
                $(this).hide();

                const submenu = $(this).siblings('.sub-menu');

                // Remove any existing back button first
                submenu.find('.back-btn').remove();

                submenu.addClass('active').slideDown();
                submenu.prepend('<li class="back-btn"><a href="#" aria-label="Terug naar hoofdmenu">Ga terug</a></li>');
            });

            // Handle back button click
            $('.main-menu').off('click', '.back-btn a').on('click', '.back-btn a', function(e) {
                e.preventDefault();
                e.stopPropagation(); // Prevent event bubbling

                $(this).closest('.sub-menu').removeClass('active').slideUp();

                $('.main-menu > li').show();
                // Show the <a> element of the clicked parent item again
                $(this).closest('.sub-menu').siblings('a').show();
            });

            isMobileMenuInitialized = true;
        } else if (!isMobile && isMobileMenuInitialized) {
            // Desktop mode - clean up mobile handlers
            $('.mobile_menubtn').off('click');
            $('.menu-item-has-children > a').off('click');
            $('.main-menu').off('click', '.back-btn a');
            $('.main-menu').show(); // Ensure menu is visible on desktop
            $('.menu-item-has-children > a').show(); // Show all parent links
            isMobileMenuInitialized = false;
        }
    }

    // Initialize the menu script
    initMenuScript();

    // Recheck screen size on window resize with debounce
    let resizeTimer;
    $(window).on('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            initMenuScript();
        }, 250);
    });
});
