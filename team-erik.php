<?php

/* Template Name: Team Erik */

/**
 * DEPRECATED: This template is deprecated in favor of the Flexible Page template.
 * Please migrate to page-flexible.php using Two Column Block + Team Block.
 * See FLEXIBLE-CONTENT-GUIDE.md for migration instructions.
 */

get_header();

get_template_part('template-parts/hero-banner');
?>

<div class="content-wrapper">

		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<?php if ($erik_image = get_field('erik_korte')): ?>
						<img src="<?php echo $erik_image; ?>" class="img-fluid" alt="Hero Image">
					<?php else: ?>
						<p>No Image Found.</p>
					<?php endif; ?>
				</div>
				<div class="col-lg-8 col-md-8">
					<div class="text-content-wrapper">
					<?php the_content(); ?>
					<?php if ($partners_logo = get_field('partners_logo')): ?>
					<img src="<?php echo $partners_logo; ?>"/>
					<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="row">
				<?php if ($title = get_field('title')): ?>
					<h1 class="main_title center"><?php echo $title; ?></h1>
				<?php endif; ?>
				<?php 
				$team_section = get_field('team-section');
				if(!empty($team_section)){ ?>
					<?php foreach ($team_section as $key => $person) { ?>
						<div class="col-12 col-md-3">
							<img src="<?php echo $person['team-image'] ?>" class="img-fluid" alt="Team Member">
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div> <!-- .container-fluid -->
</div>
<?php

get_footer();

?>