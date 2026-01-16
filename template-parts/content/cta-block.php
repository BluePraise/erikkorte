<?php
/**
 * Template part for CTA block (Flexible Content)
 *
 * Expected ACF fields:
 * - cta_button_label (text)
 * - cta_button_link (link)
 *
 * @package ErikKorte
 */

$button_label = get_sub_field('cta_button_label');
$button_link = get_sub_field('cta_button_link');

if (!$button_link) {
    return;
}
?>

<div class="cta-block">
    <div class="container-fluid my-lg-5 my-3">
        <div class="row">
            <div class="col-12 text-center">
                <?php
                $link_url = $button_link['url'];
                $link_title = $button_label ? $button_label : $button_link['title'];
                $link_target = $button_link['target'] ? $button_link['target'] : '_self';
                ?>
                <a class="btn btn-primary" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <?php echo esc_html($link_title); ?>
                </a>
            </div>
        </div>
    </div>
</div>
