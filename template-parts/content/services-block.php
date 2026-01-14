<?php
/**
 * Services Block
 *
 * Displays a grid of service items with icons, headings, and descriptions
 * Each item links to a service page
 *
 * ACF Fields Required:
 * - services_heading (text) - optional
 * - services_sub_heading (text)
 * - services_description (textarea)
 * - services (repeater)
 *   - icon (image)
 *   - heading (text)
 *   - description (text)
 *   - services_url (URL)
 */

$services_heading = get_sub_field('services_heading');
$services_sub_heading = get_sub_field('services_sub_heading');
$services_description = get_sub_field('services_description');
?>

<!-- Services Section -->
<section class="services">
    <div class="container-fluid">
        <div class="wpb_wrapper">
            <?php if ($services_heading): ?>
                <h2 class="section-title text-center"><?php echo esc_html($services_heading); ?></h2>
            <?php endif; ?>
            <?php if ($services_sub_heading): ?>
                <h2 class="section-title text-center"><?php echo esc_html($services_sub_heading); ?></h2>
            <?php endif; ?>
            <?php if ($services_description): ?>
                <p class="section-intro"><?php echo esc_html($services_description); ?></p>
            <?php endif; ?>
        </div>

        <div class="row">
            <?php if (have_rows('services')): ?>
                <?php while (have_rows('services')): the_row();
                    $icon = get_sub_field('icon');
                    $service_heading = get_sub_field('heading');
                    $service_description = get_sub_field('description');
                    $services_url = get_sub_field('services_url');
                ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <a href="<?php echo esc_url($services_url); ?>" class="links_info">
                            <div class="quickfinder-item-box">
                                <div class="info_def">
                                    <div class="icon_box_info service-image">
                                        <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($service_heading); ?>">
                                    </div>
                                </div>
                                <div class="quickfinder-item-info">
                                    <div class="quickfinder-item-title"><?php echo esc_html($service_heading); ?></div>
                                    <div class="quickfinder-item-text"><?php echo esc_html($service_description); ?></div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No services found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
