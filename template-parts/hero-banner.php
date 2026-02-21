<?php
/**
 * Template part for displaying the hero banner
 *
 * @package ErikKorte
 */


// Banner image is set via Featured Image in the page editor.
$banner_image = get_the_post_thumbnail_url(get_the_ID(), 'full');

$banner_title = isset($args['title']) ? $args['title'] : get_the_title();
?>

<div class="hero-banner"<?php if ($banner_image) : ?> style="background-image: url(<?php echo esc_url($banner_image); ?>);"<?php endif; ?>>
    <div class="container">
        <h1 class="banner-heading"><?php echo esc_html($banner_title); ?></h1>
    </div>
    <div class="breadcrumbs-container">
        <?php echo the_breadcrumb(); ?>
    </div>
</div>

<?php if (!is_front_page()) : ?>
<div class="content-wrapper">
<?php endif; ?>
