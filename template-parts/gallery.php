<?php
/**
 * Template part for displaying gallery fields
 * Supports gallery_col and custom gallery fields
 *
 * Expected args:
 * - field_name (optional) - ACF field name to use (defaults to 'gallery_col')
 * - columns (optional) - 'two' or 'three' (defaults to 'three')
 *
 * @package ErikKorte
 */

// Get field name from args or use default
$field_name = isset($args['field_name']) ? $args['field_name'] : 'gallery_col';
$gallery_images = get_field($field_name);

if (!$gallery_images || empty($gallery_images)) {
    return;
}

// Default to 3 columns, can be overridden via args
$columns = isset($args['columns']) ? $args['columns'] : 'three';
$column_class = ($columns === 'two') ? 'col-md-6' : 'col-md-4';
$lightbox_group = 'gallery-' . $field_name; // Unique lightbox group per field
?>

<section class="gallery-section">
    <div class="container-fluid my-lg-5 my-3">
        <div class="row g-3">
            <?php foreach ($gallery_images as $image_url): ?>
                <div class="<?php echo esc_attr($column_class); ?>">
                    <a href="<?php echo esc_url($image_url); ?>" data-lightbox="<?php echo esc_attr($lightbox_group); ?>" data-title="">
                        <img src="<?php echo esc_url($image_url); ?>"
                             class="img-fluid gallery-image"
                             alt="Gallery Image">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
