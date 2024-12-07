<?php

/* Template Name: Familiekamers */

get_header();

$team_section = get_field('familiekamers-section');
?>


<div class="hero-banner" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);">
		 <div class="container">
            <h1 class="banner-heading"><?php the_title(); ?></h1>
			</div>
            <div class="breadcrumbs-container">
				<?php echo the_breadcrumb(); ?>
            </div>
</div>


<div class="gallery-content-section">
<div class="container-fluid my-lg-5 my-3">
    <div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="text-content-wrapper">
			 <?php the_content(); ?>
<?php
$gallery = get_field('gallery_col'); // Get the gallery field, which returns an array of image URLs

if ($gallery): // Check if the gallery has images
    echo '<div class="two-col-gallery">';
    foreach ($gallery as $image_url): // Loop through each image URL
        // Get the image ID from the URL
        $image_id = attachment_url_to_postid($image_url);
        
        // Get the image title and caption    
        $image_caption = get_post_field('post_excerpt', $image_id);
		$image_description = get_post_field('post_content', $image_id);
        
echo '<div class="gallery-item">';
    echo '<a href="' . esc_url($image_url) . '" data-lightbox="roadtrip">';
        echo '<div class="gallery-image">';
            echo '<img class="w-100" src="' . esc_url($image_url) . '" alt="' . esc_attr($image_caption) . '">';
        echo '</div>';
        // Display the title and caption if available
        echo '<div class="title-caption-col">';
		if ($image_caption) {
                echo '<h3>' . esc_html($image_caption) . '</h3>';
            }
           if ($image_description) {
                    echo '<p>' . esc_html($image_description) . '</p>';
            }         
        echo '</div>';
    echo '</a>';
echo '</div>';
    endforeach;
    echo '</div>';
else:
    echo '<p>No images found in the gallery.</p>';
endif;
?>


			</div>
		</div>
    </div>
	</div>
</div>
<?php

get_footer();

?>