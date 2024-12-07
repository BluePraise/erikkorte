<?php
get_header();
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
		<div class="container-fluid my-lg-5 my-3">
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
		</div>
        <?php
    endwhile;
else :
    echo '<p>No content found.</p>';
endif;
get_footer();
