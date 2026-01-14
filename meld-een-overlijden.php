<?php

/* Template Name: Meld een overlijden */

get_header();

get_template_part('template-parts/hero-banner');
?>

<div class="inner-page-outer content-wrapper">
	<div class="row">
		<div class="col-12">
			<?php the_content(); ?>
			<?php
			$link = get_field('call_us');
			if ($link):
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
			?>
				<a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>