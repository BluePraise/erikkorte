<?php
/**
 * Front Page Template (Auto-detected as Homepage)
 *
 * Home page using flexible content blocks:
 * - home-hero-block: Hero image with intro and numbered features
 * - services-block: Service grid with icons
 * - home-team-block: Team members with contact info
 * - testimonials-block: Testimonial carousel
 *
 * @package ErikKorte
 */

get_header();

// Check if flexible content field exists
if (have_rows('homepage_content')):
    while (have_rows('homepage_content')): the_row();
        $layout = get_row_layout();

        // Route to appropriate content block
        switch ($layout) {
            case 'home_hero':
                get_template_part('template-parts/content/home-hero-block');
                break;
            case 'services':
                get_template_part('template-parts/content/services-block');
                break;
            case 'home_team':
                get_template_part('template-parts/content/home-team-block');
                break;
            case 'testimonials':
                get_template_part('template-parts/content/testimonials-block');
                break;
        }
    endwhile;
else:
    // Fallback if no flexible content configured
    echo '<div class="container-fluid my-5"><p>No content configured. Please add content blocks in the page editor.</p></div>';
endif;

get_footer();

?>