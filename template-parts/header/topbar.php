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
            <?php
            $address_group = get_field('company_details_group', 'option');
            if ($address_group):
                // Address
                if (!empty($address_group['address_details'])):
                    // Display first line only for topbar
                    $address_lines = explode("\n", $address_group['address_details']);
                    $first_line = trim($address_lines[0]);
                    if ($first_line):
            ?>
                <li class="d-inline-flex align-items-center">
                    <i class="fa-solid fa-location-dot me-2" aria-hidden="true"></i>
                    <address class="mb-0 d-inline-block small" style="font-style: normal;">
                        <?php echo esc_html($first_line); ?>
                    </address>
                </li>
            <?php
                    endif;
                endif;

                // Phone
                if (!empty($address_group['phone_number'])):
            ?>
                <li class="d-inline-flex align-items-center">
                    <i class="fa-solid fa-phone me-2" aria-hidden="true"></i>
                    <a href="tel:<?php echo esc_attr($address_group['phone_number']); ?>"
                        class="text-decoration-none small"
                        aria-label="Bel ons op <?php echo esc_attr($address_group['phone_number']); ?>">
                        <?php echo esc_html($address_group['phone_number']); ?>
                    </a>
                </li>
            <?php
                endif;

                // Email
                if (!empty($address_group['email_address'])):
            ?>
                <li class="d-inline-flex align-items-center">
                    <i class="fa-regular fa-envelope me-2" aria-hidden="true"></i>
                    <a href="mailto:<?php echo esc_attr($address_group['email_address']); ?>"
                        class="text-decoration-none small"
                        aria-label="Email ons op <?php echo esc_attr($address_group['email_address']); ?>">
                        <?php echo esc_html($address_group['email_address']); ?>
                    </a>
                </li>
            <?php
                endif;

                // Facebook
                if (!empty($address_group['facebook_url'])):
            ?>
                <li class="d-inline-flex align-items-center">
                    <i class="fa-brands fa-facebook-f me-2" aria-hidden="true"></i>
                    <a href="<?php echo esc_url($address_group['facebook_url']); ?>"
                        class="text-decoration-none small"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Volg ons op Facebook">
                        <span>Follow Us</span>
                    </a>
                </li>
            <?php
                endif;
            endif;
            ?>
        </ul>
    </div>
</div>