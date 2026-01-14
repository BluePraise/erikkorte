<?php
/**
 * Template part for text block (Flexible Content)
 *
 * @package ErikKorte
 */

$content = get_sub_field('content');
$width = get_sub_field('width') ?: 'full'; // full, narrow, wide

$container_class = $width === 'narrow' ? 'container' : 'container-fluid';
?>

<div class="content-block">
    <div class="<?php echo esc_attr($container_class); ?> my-lg-5 my-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-content-wrapper">
                    <?php echo wp_kses_post($content); ?>
                </div>
            </div>
        </div>
    </div>
</div>
