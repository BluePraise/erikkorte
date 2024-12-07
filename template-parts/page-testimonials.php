<?php
/**
 * Template Name: Testimonials Overview
 */
get_header(); ?>

<!-- Hero Banner -->
<div class="hero-banner" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);">
    <div class="container">
        <h1 class="banner-heading"><?php the_title(); ?></h1>
    </div>
    <div class="breadcrumbs-container">
       <?php echo the_breadcrumb(); ?>
    </div>
</div>

<!-- Main Content -->
<div class="container-fluid my-lg-5 my-3">
<div id="main-content" class="main-content main-content--testimonials">
    <?php //echo thegem_page_title(); ?>

    <div class="container">
        <?php 
        $paged = max(1, get_query_var('paged', 1));
        $testimonials_query = new WP_Query([
            'post_type'      => 'testim_and_reviews',
            'posts_per_page' => 5,
            'paged'          => $paged,
        ]);

        if ($testimonials_query->have_posts()) : ?>
            <div class="testimonials clearfix item-animation-disabled">
                <?php while ($testimonials_query->have_posts()) : $testimonials_query->the_post(); ?>
                    <article class="testimonial clearfix">
                        <!-- Testimonial Image -->
                        <div class="gem-compact-item-left">
                            <div class="gem-compact-item-image">
                                <a class="default" href="#0">
                                    <?php 
                                    $test_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                    $placeholder = 'http://leotwelve.com/24/ek/wp-content/uploads/2024/11/SplitShire-8565-scaled.jpg';
                                    ?>
                                    <img 
                                        src="<?php echo esc_url($test_image ?: $placeholder); ?>" 
                                        class="img-responsive wp-post-image" 
                                        alt="<?php echo esc_attr(get_the_title()); ?>" 
                                        style="height: 150px; width: 100%; object-fit: cover;">
                                </a>
                            </div>
                        </div>

                        <!-- Testimonial Content -->
                        <div class="gem-compact-item-right">
                            <div class="gem-compact-item-content">
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
                <div class="testimonials-pagination">
                    <?php
                    echo paginate_links([
                        'base'      => get_pagenum_link(1) . '%_%',
                        'format'    => 'page/%#%',
                        'current'   => $paged,
                        'total'     => $testimonials_query->max_num_pages,
                        'prev_text' => '« ' . __('prev', 'thegem'),
                        'next_text' => __('next', 'thegem') . ' »',
                    ]);
                    ?>
                </div>
                <div class="jump-to-testim-form">
                    <a class="gem-button" href="https://leotwelve.com/24/ek/laat-een-reactie-achter/">
                        Laat een reactie achter<span class="bc-arrow-right"></span>
                    </a>
                </div>
            </section>

        <?php else : ?>
            <p class="no-testimonials"><?php esc_html_e('No testimonials found.', 'thegem'); ?></p>
        <?php 
        endif; 
        wp_reset_postdata(); 
        ?>
    </div>
</div>
</div>
<?php get_footer(); ?>
