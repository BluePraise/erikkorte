<?php

/* Template Name: Contact Us */

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
<?php
    $contact_details = get_field('contact_us_details');
?>

<?php if(!empty($contact_details)){ ?>
<div class="container-fluid my-lg-5 my-3">
<div class="row contact-info-row">
    <?php foreach ($contact_details as $key => $row) { ?>
    <div class="col-sm-12 col-lg-3">
        <div class="icon">
            <img src="<?php echo $row['icon']; ?>"/>
        </div>
        <h2><?php echo $row['title']; ?></h2>
        <?php if($row['link'] != ''){ ?>
            <a href="<?php echo $row['link']; ?>">
                <p><?php echo $row['contant']; ?></p>
            </a>
        <?php }else{ ?>
            <p><?php echo $row['contant']; ?></p>
        <?php } ?>
    </div>
    <?php } ?>
</div>
</div>
<?php } ?>
<div class="container-fluid my-lg-5 my-3">
<div class="row">
    <div class="col-sm-12 col-lg-6">
        <?php echo get_field('map'); ?>
    </div> 
    <div class="col-sm-12 col-lg-6">
	<div class="contact-form">
        <?php 
		$form_code = get_field('form_code'); 
		if ($form_code) {
			echo do_shortcode($form_code);
		}
		?>
		</div>
    </div> 
</div>
</div>


<?php

get_footer();

?>