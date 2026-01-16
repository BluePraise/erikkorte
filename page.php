<?php
get_header();

get_template_part('template-parts/hero-banner');
?>

<div class="content-wrapper">

        <?php the_content(); ?>

        <?php
        // Legacy gallery_col field support
        if (get_field('gallery_col')) {
            get_template_part('template-parts/gallery');
        }

        // Uitvaarthuis Twente specific galleries
        if (get_field('uitvaarthuis_three_col_gallery')) {
            get_template_part('template-parts/gallery', null, [
                'field_name' => 'uitvaarthuis_three_col_gallery',
                'columns' => 'three'
            ]);
        }

        if (get_field('youtube_video')) {
            echo '<div class="container-fluid my-lg-5 my-3">';
            echo '<div class="video-wrapper">' . get_field('youtube_video') . '</div>';
            echo '</div>';
        }

        if (get_field('uitvaarthuis_two_col_gallery')) {
            get_template_part('template-parts/gallery', null, [
                'field_name' => 'uitvaarthuis_two_col_gallery',
                'columns' => 'two'
            ]);
        }
        ?>

</div>

<?php get_footer(); ?>