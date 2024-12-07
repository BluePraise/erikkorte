<footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 set_btm">
                        <h3 class="widget-title"><?php the_field('over_ons','option'); ?> </h3>
                        <div class="textwidget">
                            <?php the_field('over_ons_text','option'); ?>
                            <p class="text-center">
                                <a href="<?php the_field('logo_image_url','option'); ?>">
                                    <img src="<?php the_field('logo_image','option'); ?>">
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 set_btm">
                        <h3 class="widget-title">Snel naar: </h3>
						<?php
						// Display a menu with ID 'footer-quick'
						wp_nav_menu(array(
							'menu'           => 'footer-quick',
							'container'      => 'nav', 
							'container_class'=> 'footer-quick-menu',
							'menu_class'     => 'f_list',
							'fallback_cb'    => false 
						));
						?>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-6 set_btm">
                        <h3 class="widget-title"><?php the_field('address_title','option'); ?> </h3>
                        <div class="textwidget">
                            <?php the_field('address_detail','option'); ?>
                                <p>Telefoon: <a href="tel:<?php the_field('phone_number','option'); ?>"><?php the_field('phone_number','option'); ?></a><br>
                                    E-mail: <i class="fa fa-envelope"></i> <a href="mailto:<?php the_field('email_address','option'); ?>"><?php the_field('email_address','option'); ?></a><br>
                                    Website: <a href="<?php the_field('website_link','option'); ?>"><?php the_field('website_link','option'); ?></a></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <h3 class="widget-title"><?php the_field('happy_funeral','option'); ?> </h3>
						<?php if (is_active_sidebar('footer_widget_two')) : ?>
						   <?php dynamic_sidebar('footer_widget_two'); ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </footer>
        <div class="footer-nav">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-3 order_3">
                        <div class="footer-socials">
                            <div class="socials inline-inside socials-colored">
                                <a href="<?php the_field('facebook_url','option'); ?>" target="_blank" title="Facebook" class="socials-item">
                                    <i class="fa-brands fa-facebook-f"></i> Follow Us
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 order_2">
					<?php if (is_active_sidebar('footer_widget_one')) : ?>
					   <?php dynamic_sidebar('footer_widget_one'); ?>
					<?php endif; ?>
                    </div>
                    <div class="col-lg-3 col-md-3 order_1">
                        <div class="footer-site-info"><?php the_field('copyright','option'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/css/lightbox.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>	
   <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/js/lightbox.min.js"></script>

      <script>
        // Fancybox Config
$('[data-fancybox="gallery"]').fancybox({
  buttons: [
    "slideShow",
    "thumbs",
    "zoom",
    "fullScreen",
    "share",
    "close"
  ],
  loop: false,
  protect: true
});

      </script>
	  
<script>
jQuery(document).ready(function ($) {
  // Check if the screen size is 991px or less
  function initMenuScript() {
    if (window.matchMedia("(max-width: 991px)").matches) {
      // Mobile menu toggle
      $('.mobile_menubtn').click(function () {
        $('.main-menu').toggle('slow');
        // Toggle the icons between hamburger and cross
        $(this).find('i').toggleClass('fa-bars fa-times');
      });

      // Handle submenu toggle
      $('.menu-item-has-children > a').on('click', function (e) {
        e.preventDefault(); // Prevent default link behavior

        $('.main-menu > li').not($(this).parent()).hide();
        // Hide the clicked <a> element
        $(this).hide();

        const submenu = $(this).siblings('.sub-menu');
        submenu.addClass('active').slideDown();

        if (!submenu.find('.back-btn').length) {
          submenu.prepend('<li class="back-btn"><a href="#">Back</a></li>');
        }
      });

      // Handle back button click
      $('.main-menu').on('click', '.back-btn a', function (e) {
        e.preventDefault(); // Prevent default link behavior

        $(this).closest('.sub-menu').removeClass('active').slideUp();

        $('.main-menu > li').show();
        // Show the <a> element of the clicked parent item again
        $(this).closest('.sub-menu').siblings('a').show();
      });
    }
  }

  // Initialize the menu script
  initMenuScript();

  // Recheck screen size on window resize
  $(window).resize(function () {
    initMenuScript();
  });
});
</script>
<script>
jQuery(document).ready(function() {
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
});
</script>

    <?php wp_footer(); ?>
    </body>
</html>