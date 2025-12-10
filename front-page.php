<?php
/* Template Name: Front Page Template */
get_header();
?>

<?php
//Home Banner Section
$hero_image = get_field('hero_image');
$intro_text = get_field('intro_text');
$site_title = get_field('site_title');
$site_sub_title = get_field('site_sub_title');
$site_description = get_field('site_description');
$gem_heading = get_field('gem_heading');
// Services Section
$services_heading = get_field('heading');
$services_sub_heading = get_field('sub_heading');
$services_description = get_field('description');
// Team Section
$team_heading = get_field('team_heading');
$team_description = get_field('team_description');
//Quality Mark
$quality_mark = get_field('quality_mark');
?>

<!-- Hero Section -->
<section class="hero bg-white">
    <div class="container-fluid">
        <div class="row g-6">
            <div class="col-12 col-lg-6">
                <?php if ($hero_image): ?>
                    <img src="<?php echo esc_url($hero_image); ?>" class="img-fluid" alt="Hero Image">
                <?php else: ?>
                    <p>No Hero Image Found.</p>
                <?php endif; ?>
            </div>

            <div class="col-12 col-lg-6 px-4 py-0">
                <div class="homepage-intro">
                    <?php if ($intro_text): ?>
                        <div class="intro-welcome h4"><?php echo esc_html($intro_text); ?></div>
                    <?php endif; ?>
                    <?php if ($site_title): ?>
                        <h2 class="site-title"><?php echo esc_html($site_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($site_sub_title): ?>
                        <div class="site-subtitle"><?php echo esc_html($site_sub_title); ?></div>
                    <?php endif; ?>
                    <?php if ($site_description): ?>
                        <p><?php echo esc_html($site_description); ?></p>
                    <?php endif; ?>
                    <?php if ($gem_heading): ?>
                        <h4 class="title-h4"><?php echo esc_html($gem_heading); ?></h4>
                    <?php endif; ?>
                </div>

                <!-- Gems Repeater Field -->
                <div class="gem_textbox">
                    <?php if (have_rows('gem_text_section')): ?>
                        <div class="row g-3"> <!-- Single row wrapper with gutter -->
                            <?php $i = 1; ?>
                            <?php while (have_rows('gem_text_section')): the_row();
                                $text = get_sub_field('gem_text');
                            ?>
                                <div class="col-12"> <!-- Full width for each item -->
                                    <div class="row align-items-start">
                                        <div class="col-auto custom_count">
                                            <div class="count_num"><?php echo esc_html($i); ?></div>
                                        </div>
                                        <div class="col">
                                            <p class="mb-0"><?php echo esc_html($text); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <p>No content found in Gem Text Section.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="almelo services">
    <div class="container-fluid">
        <div class="wpb_wrapper">
            <h2 class="section-title text-center"><?php echo esc_html($services_sub_heading); ?></h2>
            <p class="section-intro"><?php echo esc_html($services_description); ?></p>
        </div>

        <div class="row">
            <?php
            // Check if the repeater field has rows of data
            if (have_rows('services')): ?>
                <?php
                $i = 1;
                // Loop through the rows of data
                while (have_rows('services')): the_row();
                    // Get subfields
                    $icon = get_sub_field('icon');
                    $service_heading = get_sub_field('heading');
                    $service_description = get_sub_field('description');
                    $services_url = get_sub_field('services_url');
                ?>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <a href="<?php echo esc_url($services_url); ?>" class="links_info">
                            <div class="quickfinder-item-box">
                                <div class="info_def">
                                    <div class="icon_box_info service-image">
                                        <img src="<?php echo esc_url($icon); ?>">
                                    </div>
                                </div>
                                <div class="quickfinder-item-info">
                                    <div class="quickfinder-item-title"><?php echo esc_html($service_heading); ?></div>
                                    <div class="quickfinder-item-text"><?php echo esc_html($service_description); ?></div>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php $i++;
                endwhile; ?>
            <?php else: ?>
                <p>No content found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Team Section -->
<section class="team bg-white py-5">
    <div class="container-fluid">
        <div class="wpb_wrapper">
            <!-- Team Section Title and Description -->
            <h2 class="section-title text-center"><?php echo esc_html($team_heading); ?></h2>
            <p class="section-intro"><?php echo esc_html($team_description); ?></p>
        </div>

        <div class="row py-4 g-4">
            <?php
            // Check if the repeater field has rows of data (team members)
            if (have_rows('team_members')): ?>
                <?php
                // Loop through the rows of data
                while (have_rows('team_members')): the_row();
                    // Get subfields for each team member
                    $profile_image = get_sub_field('member_profile_image');
                    $name = get_sub_field('member_name');
                    $designation = get_sub_field('member_designation');
                    $email = get_sub_field('member_email');
                    $phone = get_sub_field('member_phone');
                ?>
                    <div class="col-12 col-lg-3">
                        <div class="team-member card text-center h-100">
                            <!-- Team Member Image -->
                            <div class="team-member-image">
                                <?php if ($profile_image): ?>
                                    <img class="card-img-top" src="<?php echo esc_url($profile_image); ?>" alt="<?php echo esc_attr($name); ?>">
                                <?php else: ?>
                                    <img src="default-profile-image.jpg" alt="Default Profile Image">
                                <?php endif; ?>
                            </div>

                            <!-- Team Member Info -->
                            <div class="team-member-info card-body p-0">
                                <div class="card-title team-member-name styled-subtitle"><?php echo esc_html($name); ?></div>
                                <div class="card-text team-member-position date-color"><?php echo esc_html($designation); ?></div>
                                <div class="separator"></div>
                                <a class="card-text team-link phone-link" href="tel:<?php echo esc_attr($phone); ?>">
                                    <i class="bi bi-telephone"></i> <?php echo esc_html($phone); ?>
                                </a>
                                <a class="card-text team-link email-link" href="mailto:<?php echo esc_attr($email); ?>">
                                    <i class="bi bi-envelope"></i> <?php echo esc_html($email); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <div class="wpb_single_image quality-mark text-center mt-4">
                    <img src="<?php echo esc_url($quality_mark); ?>" alt="Quality Mark">
                </div>
            <?php else: ?>
                <p>No team members found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Quality Mark And testimonials -->
<section class="feedbacks bg-white">
    <div class="container-fluid">

        <div class="review_slider">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <?php
                    // Query arguments for Testimonials CPT
                    $args = array(
                        'post_type'      => 'testimonial',
                        'posts_per_page' => -1,
                        'order'          => 'DESC',
                        'orderby'        => 'date'
                    );

                    // Custom Query
                    $testimonial_query = new WP_Query($args);

                    // Initialize counter
                    $i = 0;

                    // Check if there are posts
                    if ($testimonial_query->have_posts()):
                        // Loop through posts
                        while ($testimonial_query->have_posts()): $testimonial_query->the_post();
                            // Determine active class for the first item
                            $class = ($i === 0) ? 'active' : '';
                    ?>
                            <div class="carousel-item <?php echo esc_attr($class); ?>">
                                <h3><?php the_title(); ?></h3>
                                <div class="testimonial-content">
                                    <?php the_content(); ?>
                                </div>
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </div>
                    <?php
                            $i++;
                        endwhile;
                    else:
                        echo '<p>No testimonials found.</p>';
                    endif;

                    // Reset post data
                    wp_reset_postdata();
                    ?>
                </div>
                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>