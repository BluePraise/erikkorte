<?php
/**
 * Template part for CTA block (Flexible Content)
 *
 * @package ErikKorte
 */

$content = get_sub_field('content');
$link = get_sub_field('link');
?>

<div class="cta-block">
    <div class="container-fluid my-lg-5 my-3">
        <div class="row">
            <div class="col-12">
                <?php if ($content) : ?>
                    <?php echo wp_kses_post($content); ?>
                <?php endif; ?>
                <?php if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                    <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <?php echo esc_html($link_title); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
