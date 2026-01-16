<?php

/**
 * Template Name: Flexible Page
 *
 * @package ErikKorte
 */

get_header();

get_template_part('template-parts/hero-banner');
?>

<div class="content-wrapper">

<?php
if (have_rows('flexible_content')) :
    while (have_rows('flexible_content')) : the_row();

        $layout = get_row_layout();

        switch ($layout) {
            case 'text_block':
                get_template_part('template-parts/content/text-block');
                break;

            case 'gallery_block':
                get_template_part('template-parts/content/gallery-block');
                break;

            case 'video_block':
                get_template_part('template-parts/content/video-block');
                break;

            case 'team_block':
                get_template_part('template-parts/content/team-block');
                break;

            case 'two_column_block':
                get_template_part('template-parts/content/two-column-block');
                break;

            case 'cta_block':
                get_template_part('template-parts/content/cta-block');
                break;
        }

    endwhile; ?>
</div>
<?php else :
    // Fallback to default content if no flexible content
?>
    <div class="content-wrapper">
        <?php the_content(); ?>
    </div>
<?php
endif;
get_footer();
