<?php
/**
 * Home Hero Block
 *
 * Displays hero image with intro text and numbered features list
 * Used exclusively on front page
 *
 * ACF Fields Required:
 * - hero_image (image)
 * - intro_text (text)
 * - site_title (text)
 * - site_sub_title (text)
 * - site_description (textarea)
 * - feature_heading (text)
 * - feature_list (repeater)
 *   - feature_text (text)
 */

$hero_image = get_sub_field('hero_image');
$intro_text = get_sub_field('intro_text');
$site_title = get_sub_field('site_title');
$site_sub_title = get_sub_field('site_sub_title');
$site_description = get_sub_field('site_description');
$feature_heading = get_sub_field('feature_heading');
?>

<!-- Hero Section -->
<section class="hero bg-white">
    <div class="container-fluid">
        <div class="row g-6">
            <div class="col-12 col-lg-6">
                <?php if ($hero_image): ?>
                    <img src="<?php echo esc_url($hero_image); ?>" class="img-fluid" alt="Hero Image">
                <?php else: ?>
                    <p>No Hero Image Found.</p>
                <?php endif; ?>
            </div>

            <div class="col-12 col-lg-6 px-4 py-0">
                <div class="homepage-intro">
                    <?php if ($intro_text): ?>
                        <div class="intro-welcome h4"><?php echo esc_html($intro_text); ?></div>
                    <?php endif; ?>
                    <?php if ($site_title): ?>
                        <h2 class="site-title"><?php echo esc_html($site_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($site_sub_title): ?>
                        <div class="site-subtitle"><?php echo esc_html($site_sub_title); ?></div>
                    <?php endif; ?>
                    <?php if ($site_description): ?>
                        <p><?php echo esc_html($site_description); ?></p>
                    <?php endif; ?>
                    <?php if ($feature_heading): ?>
                        <h4 class="title-h4"><?php echo esc_html($feature_heading); ?></h4>
                    <?php endif; ?>
                </div>

                <!-- Features Repeater Field -->
                <div class="features_textbox">
                    <?php if (have_rows('feature_list')): ?>
                        <div class="row g-3">
                            <?php
                            $i = 1;
                            while (have_rows('feature_list')): the_row();
                                $text = get_sub_field('feature_text');
                            ?>
                                <div class="col-12">
                                    <div class="row align-items-start">
                                        <div class="col-auto custom_count">
                                            <div class="count_num"><?php echo esc_html($i); ?></div>
                                        </div>
                                        <div class="col">
                                            <p class="mb-0"><?php echo esc_html($text); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <p>No content found in Features Section.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
