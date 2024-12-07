<?php

/* Template Name: Team Erik */

get_header();

$team_section = get_field('team-section');
?>


<div class="hero-banner" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);">
		 <div class="container">
            <h1 class="banner-heading"><?php the_title(); ?></h1>
			</div>
            <div class="breadcrumbs-container">
				<?php echo the_breadcrumb(); ?>
            </div>
</div>


<div class="gallery-content-section my-lg-5 my-3">
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
</div>
</div>
<div class="container-fluid mb-lg-5 mb-3">
<div class="row">
	<?php if ($title = get_field('title')): ?>
		<h1 class="main_title center"><?php echo $title; ?></h1>
	<?php endif; ?>
    <?php if(!empty($team_section)){ ?>
        <?php foreach ($team_section as $key => $person) { ?>
            <div class="col-12 col-md-4">
                <img src="<?php echo $person['team-image'] ?>" style="max-width: 100%;">
            </div>
        <?php } ?>
    <?php } ?>
</div>
</div>

<?php

get_footer();

?>