<?php
/**
 * Testimonials Block
 *
 * Displays a Bootstrap carousel of testimonials from the Testimonial CPT
 * Auto-rotates every 5 seconds with manual controls
 *
 * No ACF fields required - pulls from 'testimonial' custom post type
 */
?>

<!-- Testimonials Section -->
<section class="testimonials">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="hover">
        <div class="carousel-inner">
            <?php
            // Query testimonials CPT
            $args = array(
                'post_type'      => 'testimonial',
                'posts_per_page' => -1,
                'order'          => 'DESC',
                'orderby'        => 'date'
            );

            $testimonial_query = new WP_Query($args);
            $i = 0;

            if ($testimonial_query->have_posts()):
                while ($testimonial_query->have_posts()): $testimonial_query->the_post();
                    $class = ($i === 0) ? 'active' : '';
            ?>
                    <div class="carousel-item <?php echo esc_attr($class); ?>">
                        <div class="testimonial-header d-flex">
                            <i class="fa fa-quote-right" aria-hidden="true"></i>
                            <h3><?php the_title(); ?></h3>
                        </div>
                        <div class="testimonial-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
            <?php
                    $i++;
                endwhile;
            else:
                echo '<p>No testimonials found.</p>';
            endif;

            wp_reset_postdata();
            ?>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
