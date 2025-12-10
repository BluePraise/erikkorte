</main>
<footer class="site-footer">
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 set_btm">
                <h3 class="widget-title"><?php the_field('over_ons', 'option'); ?> </h3>
                <div class="textwidget">
                    <?php the_field('over_ons_text', 'option'); ?>
                    <p class="text-center">
                        <a href="<?php echo esc_url(get_field('logo_image_url', 'option')); ?>" aria-label="<?php echo esc_attr(get_field('over_ons', 'option')); ?>">
                            <img src="<?php echo esc_url(get_field('logo_image', 'option')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> logo" loading="lazy">
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 set_btm">
                <h3 class="widget-title">Snel naar: </h3>
                <nav class="footer-quick-menu" aria-label="Footer navigation">
                    <?php
                    // Display a menu with ID 'footer-quick'
                    wp_nav_menu(array(
                        'menu'           => 'footer-quick',
                        'container'      => false,
                        'menu_class'     => 'f_list',
                        'fallback_cb'    => false
                    ));
                    ?>
                </nav>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 set_btm">
                <h3 class="widget-title"><?php the_field('address_title', 'option'); ?> </h3>
                <div class="textwidget">
                    <?php echo wp_kses_post(get_field('address_detail', 'option')); ?>
                    <p>Telefoon: <a href="tel:<?php echo esc_attr(get_field('phone_number', 'option')); ?>" aria-label="Bel ons op <?php echo esc_attr(get_field('phone_number', 'option')); ?>"><?php echo esc_html(get_field('phone_number', 'option')); ?></a><br>
                        E-mail: <i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:<?php echo esc_attr(get_field('email_address', 'option')); ?>" aria-label="Stuur een e-mail naar <?php echo esc_attr(get_field('email_address', 'option')); ?>"><?php echo esc_html(get_field('email_address', 'option')); ?></a><br>
                        Website: <a href="<?php echo esc_url(get_field('website_link', 'option')); ?>" rel="nofollow noopener" target="_blank" aria-label="Bezoek onze website op <?php echo esc_attr(get_field('website_link', 'option')); ?>"><?php echo esc_html(get_field('website_link', 'option')); ?></a></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 class="widget-title"><?php the_field('happy_funeral', 'option'); ?> </h3>
                <?php if (is_active_sidebar('footer_widget_two')) : ?>
                    <?php dynamic_sidebar('footer_widget_two'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="colophon">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 order_1 footer-site-info">
                    <?php the_field('copyright', 'option'); ?>
                </div>
                <div class="footer-socials col-lg-3 col-md-3 order_3 ms-auto text-end">
                    <div class="socials inline-inside socials-colored">
                        <a href="<?php the_field('facebook_url', 'option'); ?>" target="_blank" rel="noopener" aria-label="Volg ons op Facebook" class="socials-item">
                            <i class="fa-brands fa-facebook-f" aria-hidden="true"></i> <span class="visually-hidden">Facebook</span> Follow Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .colophon -->
</footer>

</div><!-- .site-wrapper -->

<?php wp_footer(); ?>
</body>

</html>