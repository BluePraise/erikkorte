<?php
/**
 * Top Bar Template
 *
 * Displays contact information and social links in the header.
 * CSS: assets/css/07-header.css (.top-area-block styles)
 */
?>
<div class="top-area-block">
    <div class="container">
        <ul class="list-unstyled d-flex align-items-center justify-content-center gap-3 mb-0">
            <?php if (get_field('Address', 'option')): ?>
                <li class="d-inline-flex align-items-center">
                    <i class="fa-solid fa-location-dot me-2" aria-hidden="true"></i>
                    <address class="mb-0 d-inline-block small" style="font-style: normal;">
                        <?php echo esc_html(get_field('Address', 'option')); ?>
                    </address>
                </li>
            <?php endif; ?>

            <?php if (get_field('phone_number', 'option')): ?>
                <li class="d-inline-flex align-items-center">
                    <i class="fa-solid fa-phone me-2" aria-hidden="true"></i>
                    <a href="tel:<?php echo esc_attr(get_field('phone_number', 'option')); ?>"
                        class="text-decoration-none small"
                        aria-label="Bel ons op <?php echo esc_attr(get_field('phone_number', 'option')); ?>">
                        <?php echo esc_html(get_field('phone_number', 'option')); ?>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (get_field('email_address', 'option')): ?>
                <li class="d-inline-flex align-items-center">
                    <i class="fa-regular fa-envelope me-2" aria-hidden="true"></i>
                    <a href="mailto:<?php echo esc_attr(get_field('email_address', 'option')); ?>"
                        class="text-decoration-none small"
                        aria-label="Email ons op <?php echo esc_attr(get_field('email_address', 'option')); ?>">
                        <?php echo esc_html(get_field('email_address', 'option')); ?>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (get_field('facebook_url', 'option')): ?>
                <li class="d-inline-flex align-items-center">
                    <i class="fa-brands fa-facebook-f me-2" aria-hidden="true"></i>
                    <a href="<?php echo esc_url(get_field('facebook_url', 'option')); ?>"
                        class="text-decoration-none small"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Volg ons op Facebook">
                        <span>Follow Us</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>