<?php
get_header(); ?>

<div class="hero-banner" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_option('page_for_posts'), 'full'); ?>);">
    <div class="container">
        <h1 class="banner-heading">
            <?php single_cat_title(); // Display the category name ?>
        </h1>
    </div>
    <div class="breadcrumbs-container">
        <?php echo the_breadcrumb(); ?>
    </div>
</div>

<div class="blog-posts">
    <div class="container-fluid my-lg-5 my-3">
        <?php
        // Get the current category
        $category = get_queried_object();

        // Get the current page number
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        // Define custom query arguments
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 5, // Number of posts per page
            'paged'          => $paged,
            'cat' => get_queried_object_id(), // Current category ID
            'orderby'        => 'date', // Order by date
            'order'          => 'DESC', // Newest posts first
        );

        // Create a new WP_Query instance
        $query = new WP_Query($args);

        // Start the Loop
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="post">
				<div class="row">
				<div class="col-lg-2 col-md-4 mb-3 mb-md-0 pe-lg-0">
				<div class="post-img">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?> </a>
					</div> 
				</div>
				
				<div class="col-lg-10 col-md-8 ps-lg-4">
				<div class="post-content"> 
				   <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php the_excerpt(); ?></p>                  
					</div>
				</div>

					</div>
                </div>
            <?php endwhile;

            // Pagination
    echo '<div class="post-pagination">';
    echo paginate_links(array(
        'total' => $query->max_num_pages,
        'current' => $paged,
        'prev_text' => __('Previous', 'textdomain'),
        'next_text' => __('Next', 'textdomain'),
    ));
    echo '</div>';
else : ?>
    <p>No posts found</p>
<?php endif;
        // Reset post data
        wp_reset_postdata();
        ?>
    </div>
</div>

<?php get_footer(); ?>