<?php
/**
 * Template part for gallery block (Flexible Content)
 *
 * @package ErikKorte
 */

$gallery = get_sub_field('gallery');
$columns = get_sub_field('columns') ?: 'three'; // two, three
$section_class = get_sub_field('section_class') ?: '';

if (!$gallery) {
    return;
}

$gallery_class = ($columns === 'two') ? 'two-col-gallery' : 'three-col-gallery';
?>

<div class="gallery-content-section <?php echo esc_attr($section_class); ?>">
    <div class="container-fluid my-lg-5 my-3">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="text-content-wrapper">
                    <div class="gallery theme-gallery <?php echo esc_attr($gallery_class); ?>">
                        <?php foreach ($gallery as $image_url) :
                            $image_id = attachment_url_to_postid($image_url);
                            $image_caption = get_post_field('post_excerpt', $image_id);
                            $image_description = get_post_field('post_content', $image_id);
                        ?>
                            <div class="gallery-item">
                                <a href="<?php echo esc_url($image_url); ?>" data-lightbox="roadtrip">
                                    <div class="gallery-image">
                                        <img class="w-100" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_caption); ?>">
                                    </div>
                                    <div class="title-caption-col">
                                        <?php if ($image_caption) : ?>
                                            <h3><?php echo esc_html($image_caption); ?></h3>
                                        <?php endif; ?>
                                        <?php if ($image_description) : ?>
                                            <p><?php echo esc_html($image_description); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
