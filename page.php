<?php
get_header();
?>

<div class="hero-banner" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);">
		 <div class="container">
            <h1 class="banner-heading"><?php the_title(); ?></h1>
			</div>
            <div class="breadcrumbs-container">
				<?php echo the_breadcrumb(); ?>
            </div>
</div>
<div class="inner-page-outer">
<?php the_content(); ?>
</div>

<?php get_footer(); ?>