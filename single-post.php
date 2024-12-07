<?php
get_header(); ?>

<div class="hero-banner" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);">
    <div class="container">
        <h1 class="banner-heading"><?php the_title(); ?></h1>
    </div>
    <div class="breadcrumbs-container">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
        }
        ?>
    </div>
</div>

<div class="single-post-content">
    <div class="container-fluid my-lg-5 my-3">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="post-header">
                    <div class="post-meta">
                        <p>
                            <?php echo get_the_date(); ?> | <?php the_category(', '); ?> | By <?php the_author(); ?>
                        </p>
                    </div>
						<div class="post-nav-bar">
						<div class="post-comments">
						<?php
			$comments_number = get_comments_number();
			if ('0' === $comments_number) {
				echo __('<i class="fa-solid fa-comment"></i> <span>(0)<span>', 'textdomain');
			} else {
				echo sprintf(
					__('<i class="fa-solid fa-comment"></i> <span>(%s)</span>', 'textdomain'), 
					number_format_i18n($comments_number)
				);
			}
			?>
						</div>
				 <div class="post-navigation-icons">
            <?php
            // Previous Post Link
            $prev_post = get_previous_post();
            if (!empty($prev_post)) : ?>
                <a href="<?php echo get_permalink($prev_post->ID); ?>" class="prev-post">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            <?php endif; ?>

            <?php
            // Next Post Link
            $next_post = get_next_post();
            if (!empty($next_post)) : ?>
                <a href="<?php echo get_permalink($next_post->ID); ?>" class="next-post">
                   <i class="fa-solid fa-bars"></i>
                </a>
            <?php endif; ?>
        </div>
					</div>
						</div>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="post-tags">
                        <?php the_tags('<p>Tags: ', ', ', '</p>'); ?>
                    </div>
                </article>
            <?php endwhile;
        else : ?>
            <p><?php _e('No content found.', 'textdomain'); ?></p>
        <?php endif; ?>
    </div>
</div>

<div class="comment-section">
    <div class="container-fluid my-lg-5 my-3">
        <?php
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
        ?>
    </div>
</div>
<?php get_footer(); ?>
