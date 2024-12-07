<?php
get_header();

/**
 * The template used for displaying page content on home page
 */
if (is_singular('cpt_condolances')) {
    $candles = get_post_meta(get_the_ID(), 'cmb_condalances_candles', true);
    $deathGallery = get_post_meta(get_the_ID(), 'cmb_condalances_photos', true); // Fetch the gallery
}
?>
<div class="hero-banner" style="background-image: url('<?php echo esc_url(site_url('/wp-content/uploads/2024/12/03.jpg')); ?>');">
    <div class="container">
        <h1 class="banner-heading"><?php the_title(); ?></h1>
    </div>
</div>

<div class="block-content">
    <div class="container-fluid">
        <?php if (is_singular('cpt_condolances')) : ?>
            <div class="content--fullwidth col-md-10 col-xs-12 col-md-offset-1">
        <?php endif; ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content post-content">
                <?php if (is_singular('cpt_condolances')) : ?>
                    <!-- Condolences Gallery -->
                    <div id="condolances-slider">
                        <div class="preloader"><div class="preloader-spin"></div></div>
                        <div class="gem-gallery gem-gallery-hover-zooming-blur" data-autoscroll="5000"> 
                            <?php 
                            if (!empty($deathGallery)) {
                                foreach ($deathGallery as $attachment_id => $photo_url) : 
                                    $caption = wp_get_attachment_caption($attachment_id); // Fetch caption
                                    ?>
                                    <div class="gem-gallery-item"> 
                                        <div class="gem-gallery-item-image"> 
                                            <a href="<?php echo esc_url($photo_url); ?>" data-lightbox="roadtrip" data-full-image-url="<?php echo esc_url($photo_url); ?>"> 
                                                <svg width="20" height="10"><path d="M 0,10 Q 9,9 10,0 Q 11,9 20,10" /></svg> 
                                                <img src="<?php echo esc_url($photo_url); ?>" alt="" class="img-responsive"> 
                                                <span class="gem-gallery-caption slide-info"><?php echo esc_html($caption); ?></span> 
                                            </a> 
                                            <span class="gem-gallery-line"></span> 
                                        </div> 
                                    </div>  
                                <?php 
                                endforeach; 
                            } else {
                                echo '<p>No photos available in the gallery.</p>';
                            }
                            ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div style="margin-bottom: 40px">
                    <?php
                    if (is_singular('cpt_condolances')):
                        the_content();
                    endif;
                    ?>
                </div>

                <div class="text-center">
                    <div class="condolances-meta-item">
                        <h6 class="condolance-meta-label">Informatie</h6>
                        <?php echo do_shortcode('[condolances_meta]'); ?>
                    </div>

                    <div class="kaarsje--gif">
                        <img src="<?php echo esc_url(site_url('/wp-content/uploads/2020/02/kaarsje.gif')); ?>" alt="Gif van een kaarsje">
                    </div>
                    
                    <div class="condolances-meta">
                        <div class="condolances-meta-item">
                            <?php echo do_shortcode('[light_a_candle]'); ?>
                        </div>
                    </div>
                </div>

                <?php
                if (!is_singular('cpt_condolances')):
                    the_content();
                endif;
                wp_link_pages([
                    'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'thegem') . '</span>',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                ]);
                ?>
            </div><!-- .entry-content -->

            <?php
            if (comments_open() || get_comments_number()) {
                do_action('reactie_comment_content');
                do_action('tahlil_reactie_form');
                comments_template();
            }
            ?>
        </article><!-- #post-## -->
    </div>
</div>

<?php 
get_footer();
?>