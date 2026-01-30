<?php
/**
 * Template part for two-column content (Flexible Content)
 *
 * @package ErikKorte
 */

$left_content = get_sub_field('left_content');
$right_content = get_sub_field('right_content');
$left_image = get_sub_field('left_image');
$partners_logo = get_sub_field('partners_logo');
?>

<div class="two-column-block">
    <div class="container-fluid my-lg-5 my-3">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <?php if ($left_image) : ?>
                    <img src="<?php echo esc_url($left_image); ?>" class="img-fluid" alt="<?php echo esc_attr(get_the_title()); ?>">
                <?php endif; ?>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="text-content-wrapper">
                    <?php echo wp_kses_post($right_content); ?>
                    <?php if ($partners_logo) : ?>
                        <img src="<?php echo esc_url($partners_logo); ?>" alt="Partners Logo">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
