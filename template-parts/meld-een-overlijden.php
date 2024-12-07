<?php

/* Template Name: Meld een overlijden */

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
    <div class="row">
	<div class="col-12">
	<?php the_content(); ?>
	<?php 
	$link = get_field('call_us');
	if( $link ): 
		$link_url = $link['url'];
		$link_title = $link['title'];
		$link_target = $link['target'] ? $link['target'] : '_self';
		?>
		<a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
	<?php endif; ?>
    </div>
	</div>
</div>

<?php get_footer(); ?>