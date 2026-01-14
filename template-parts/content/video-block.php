<?php
/**
 * Template part for video block (Flexible Content)
 *
 * @package ErikKorte
 */

$video_embed = get_sub_field('video_embed');

if (!$video_embed) {
    return;
}
?>

<div class="video-block">
    <div class="container-fluid my-lg-5 my-3">
        <div class="row">
            <div class="col-lg-12">
                <?php echo wp_kses_post($video_embed); ?>
            </div>
        </div>
    </div>
</div>
