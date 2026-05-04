<?php

/**
 * Template Name: Testimonials Overview
 */
get_header();

get_template_part('template-parts/hero-banner');

$form_shortcode = get_field('testimonial_form_shortcode', 'option');
?>

    <div class="container-fluid my-lg-5 my-3">

        <div class="testimonials-header mb-4">
            <?php if ($form_shortcode) : ?>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testimonialModal">
                    Laat een reactie achter<span class="bc-arrow-right"></span>
                </button>
            <?php endif; ?>
        </div>

            <?php
            $paged = max(1, get_query_var('paged', 1));
            $testimonials_query = new WP_Query([
                'post_type'      => 'testim_and_reviews',
                'posts_per_page' => 20,
                'paged'          => $paged,
            ]);

            if ($testimonials_query->have_posts()) : ?>
                <div class="testimonials">
                    <?php while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
                        $test_image = get_the_post_thumbnail_url(get_the_ID(), 'full');

                        // Fallback: random placeholder from ACF options
                        if (!$test_image) {
                            $placeholders = get_field('testimonial_placeholder_images', 'option');
                            if (!empty($placeholders) && is_array($placeholders)) {
                                $random_id = $placeholders[array_rand($placeholders)];
                                $test_image = wp_get_attachment_image_url($random_id, 'full');
                            }
                        }
                    ?>
                        <article class="testimonial">
                            <!-- Testimonial Image -->
                            <div class="testimonial-item-left">
                                <div class="testimonial-item-image">
                                    <?php if ($test_image) : ?>
                                        <img
                                            src="<?php echo esc_url($test_image); ?>"
                                            class="img-responsive wp-post-image"
                                            alt="<?php echo esc_attr(get_the_title()); ?>">
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Testimonial Content -->
                            <div class="testimonial-item-right">
                                <div class="testimonial-item-content">
                                    <div class="post-title">
                                        <h5 class="entry-title reverse-link-color">
                                            <span class="testim__entry-date"><?php echo esc_html(get_the_date('d M Y')); ?></span>
                                            <span class="light"><?php the_title(); ?></span>
                                        </h5>
                                    </div>
                                    <div class="post-text">
                                        <div class="summary"><?php the_content(); ?></div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination and Footer -->
                <section class="testim__footer spacebetween">
                    <div class="pagination">
                        <?php
                        echo paginate_links([
                            'base'      => get_pagenum_link(1) . '%_%',
                            'format'    => 'page/%#%',
                            'current'   => $paged,
                            'total'     => $testimonials_query->max_num_pages,
                            'prev_text' => '« ' . __('prev', 'erikkorte'),
                            'next_text' => __('next', 'erikkorte') . ' »',
                        ]);
                        ?>
                    </div>
                    <?php if ($form_shortcode) : ?>
                        <div class="jump-to-testim-form">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testimonialModal">
                                Laat een reactie achter<span class="bc-arrow-right"></span>
                            </button>
                        </div>
                    <?php endif; ?>
                </section>

            <?php else : ?>
                <p class="no-testimonials">Geen reacties gevonden.</p>
            <?php
            endif;
            wp_reset_postdata();
            ?>

    </div>

<?php if ($form_shortcode) : ?>
<!-- Testimonial Submission Modal -->
<div class="modal fade" id="testimonialModal" tabindex="-1" aria-labelledby="testimonialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="testimonialModalLabel">Laat een reactie achter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Sluiten"></button>
            </div>
            <div class="modal-body testimonial-form">
                <?php echo do_shortcode($form_shortcode); ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

</div>
<?php get_footer(); ?>
