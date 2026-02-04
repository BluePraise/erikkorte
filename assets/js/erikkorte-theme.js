/**
 * Erik Korte Theme JavaScript
 * Mobile menu toggle and submenu navigation
 */

jQuery(document).ready(function($) {
    let isMobileMenuInitialized = false;

    function initMenuScript() {
        const isMobile = window.matchMedia("(max-width: 991.98px)").matches;

        if (isMobile && !isMobileMenuInitialized) {
            // Mobile menu toggle - Click and Keyboard support
            $('.mobile_menubtn').off('click keypress').on('click keypress', function(e) {
                // Handle both click and keyboard (Enter/Space)
                if (e.type === 'click' || e.which === 13 || e.which === 32) {
                    if (e.type === 'keypress') {
                        e.preventDefault(); // Prevent space from scrolling
                    }

                    const $btn = $(this);
                    const isClosing = $('.main-menu').is(':visible');

                    if (isClosing) {
                        // Reset submenu states when closing menu
                        $('.sub-menu').removeClass('active').removeAttr('style');
                        $('.menu-item-has-children > a').show();
                        $('.back-btn').remove();
                        $('.main-menu > li').show();

                        // Update aria-label for screen readers
                        $btn.attr('aria-label', 'Open menu');
                    } else {
                        $btn.attr('aria-label', 'Close menu');
                    }

                    $('.main-menu').toggle('slow');
                    // Toggle the icons between hamburger and cross
                    $btn.find('i').toggleClass('fa-bars fa-times');
                    // Toggle aria-expanded for accessibility
                    $btn.attr('aria-expanded', isClosing ? 'false' : 'true');
                }
            });

            // Handle submenu toggle - Click and Keyboard support
            $('.menu-item-has-children > a').off('click keypress').on('click keypress', function(e) {
                // Handle both click and keyboard (Enter/Space)
                if (e.type === 'click' || e.which === 13 || e.which === 32) {
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

                    // Focus the back button for keyboard users
                    setTimeout(function() {
                        submenu.find('.back-btn a').focus();
                    }, 100);
                }
            });

            // Handle back button click - Click and Keyboard support
            $('.main-menu').off('click keypress', '.back-btn a').on('click keypress', '.back-btn a', function(e) {
                // Handle both click and keyboard (Enter/Space)
                if (e.type === 'click' || e.which === 13 || e.which === 32) {
                    e.preventDefault();
                    e.stopPropagation(); // Prevent event bubbling

                    const $parentLink = $(this).closest('.sub-menu').siblings('a');

                    $(this).closest('.sub-menu').removeClass('active').slideUp();

                    $('.main-menu > li').show();
                    // Show the <a> element of the clicked parent item again
                    $parentLink.show();

                    // Return focus to parent menu item for keyboard users
                    setTimeout(function() {
                        $parentLink.focus();
                    }, 100);
                }
            });

            isMobileMenuInitialized = true;
        } else if (!isMobile && isMobileMenuInitialized) {
            // Desktop mode - clean up mobile handlers
            $('.mobile_menubtn').off('click keypress');
            $('.menu-item-has-children > a').off('click keypress');
            $('.main-menu').off('click keypress', '.back-btn a');
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
