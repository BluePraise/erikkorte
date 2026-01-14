<?php
get_header();

get_template_part('template-parts/hero-banner');
?>

<div class="content-wrapper">

        <?php the_content(); ?>

</div>

<?php get_footer(); ?>