</main>
<footer class="site-footer">
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 set_btm">
                <h3 class="footer-title widget-title"><?php echo esc_html_e('Over Ons', 'erikkorte'); ?> <i class="fa fa-caret-down" aria-hidden="true"></i></h3>
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
                <h3 class="footer-title widget-title">Snel naar: <i class="fa fa-caret-down" aria-hidden="true"></i></h3>
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
                <!-- add line awesome caret to each widget-title -->
                <h3 class="footer-title widget-title"><?php echo esc_html_e('Adresgegevens', 'erikkorte'); ?> <i class="fa fa-caret-down" aria-hidden="true"></i></h3>
                <div class="textwidget">
                    <?php
                    $address_group = get_field('company_details_group', 'option');
                    if ($address_group) {
                        // Address details
                        if (!empty($address_group['address_details'])) {
                            echo '<p>' . nl2br(esc_html($address_group['address_details'])) . '</p>';
                        }

                        // Contact info
                        echo '<p>';
                        if (!empty($address_group['phone_number'])) {
                            $phone = $address_group['phone_number'];
                            echo 'Telefoon: <a href="tel:' . esc_attr($phone) . '" aria-label="Bel ons op ' . esc_attr($phone) . '">' . esc_html($phone) . '</a><br>';
                        }
                        if (!empty($address_group['email_address'])) {
                            $email = $address_group['email_address'];
                            echo 'E-mail: <i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:' . esc_attr($email) . '" aria-label="Stuur een e-mail naar ' . esc_attr($email) . '">' . esc_html($email) . '</a><br>';
                        }
                        // Hardcoded website link with WordPress Sanitize functions
                        echo 'Website: <a href="' . esc_url('https://www.erikkorte.nl') . '" aria-label="Bezoek onze website">' . esc_html('https://www.erikkorte.nl') . '</a>';
                        echo '</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 class="footer-title widget-title"><?php esc_html_e('Lokaties', 'erikkorte'); ?> <i class="fa fa-caret-down" aria-hidden="true"></i></h3>
                <nav class="footer-locations-menu footer-quick-menu" aria-label="Footer locations navigation">
                    <?php
                    wp_nav_menu(array(
                        'menu'           => 'regions-menu',
                        'container'      => false,
                        'menu_class'     => 'f_list',
                        'fallback_cb'    => false
                    ));
                    ?>
                </nav>
            </div>
        </div>
    </div>
    <div class="colophon">
        <div class="container-fluid px-5">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 order_1 footer-site-info">
                    &copy; <?php echo date('Y'); ?> <?php echo esc_html(get_bloginfo('name')); ?>
                </div>
                <div class="footer-socials col-lg-3 col-md-3 order_3 ms-auto text-end">
                    <div class="socials inline-inside socials-colored">
                        <?php
                        $address_group = get_field('company_details_group', 'option');
                        if ($address_group && !empty($address_group['facebook_url'])) :
                        ?>
                            <a href="<?php echo esc_url($address_group['facebook_url']); ?>" target="_blank" rel="noopener" aria-label="Volg ons op Facebook" class="socials-item">
                                <i class="fa-brands fa-facebook-f" aria-hidden="true"></i> <span class="visually-hidden">Facebook</span> Follow Us
                            </a>
                        <?php endif; ?>
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