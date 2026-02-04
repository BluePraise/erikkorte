<?php
/**
 * Testimonials Block
 *
 * Displays a Bootstrap carousel of testimonials from ACF repeater
 * Auto-rotates every 5 seconds with manual controls
 *
 * Expected ACF fields (from homepage_content flexible content):
 * - testimonials_list (repeater)
 *   - testimonial_title (text)
 *   - testimonial_content (wysiwyg)
 */

// Get testimonials from ACF repeater
$testimonials = get_sub_field('testimonials_list');

if ($testimonials && count($testimonials) > 0):
?>

<!-- Testimonials Section -->
<section class="testimonials">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="hover">
        <div class="carousel-inner">
            <?php
            foreach ($testimonials as $i => $testimonial):
                $class = ($i === 0) ? 'active' : '';
            ?>
                <div class="carousel-item <?php echo esc_attr($class); ?>">
                    <div class="testimonial-header d-flex">
                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                        <h3><?php echo esc_html($testimonial['testimonial_title']); ?></h3>
                    </div>
                    <div class="testimonial-content">
                        <?php echo wp_kses_post($testimonial['testimonial_content']); ?>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" tabindex="-1" aria-hidden="true">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next" tabindex="-1" aria-hidden="true">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<?php
else:
    echo '<p>Geen getuigenissen gevonden.</p>';
endif;
?>
