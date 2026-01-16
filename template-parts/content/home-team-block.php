<?php
/**
 * Home Team Block
 *
 * Displays team members from Custom Post Type with contact info
 * Queries team_member CPT and displays with phone/email
 *
 * ACF Fields Required (from flexible content):
 * - team_heading (text)
 * - team_description (textarea)
 * - quality_mark (image) - from Site Settings
 *
 * Team data comes from team_member CPT with ACF fields:
 * - Featured Image (thumbnail)
 * - member_designation (text)
 * - member_email (email)
 * - member_phone (text)
 */

$team_heading = get_sub_field('team_heading');
$team_description = get_sub_field('team_description');
$quality_mark = get_field('logo_image', 'option'); // Quality mark from site settings
?>

<!-- Team Section -->
<section class="team bg-white py-5">
    <div class="container-fluid">
        <div class="wpb_wrapper">
            <?php if ($team_heading): ?>
                <h2 class="section-title text-center"><?php echo esc_html($team_heading); ?></h2>
            <?php endif; ?>
            <?php if ($team_description): ?>
                <p class="section-intro"><?php echo esc_html($team_description); ?></p>
            <?php endif; ?>
        </div>

        <div class="row py-4 g-4">
            <?php
            // Query team members from CPT
            $team_query = new WP_Query(array(
                'post_type' => 'team_member',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));

            if ($team_query->have_posts()):
                while ($team_query->have_posts()): $team_query->the_post();
                    $profile_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    $name = get_the_title();
                    $designation = get_field('member_designation');
                    $email = get_field('member_email');
                    $phone = get_field('member_phone');
            ?>
                    <div class="col-12 col-lg-3">
                        <div class="team-member card text-center h-100">
                            <!-- Team Member Image -->
                            <div class="team-member-image">
                                <?php if ($profile_image): ?>
                                    <img class="card-img-top" src="<?php echo esc_url($profile_image); ?>" alt="<?php echo esc_attr($name); ?>">
                                <?php else: ?>
                                    <div class="placeholder-image bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
                                        <i class="fa-solid fa-user fa-3x text-muted"></i>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Team Member Info -->
                            <div class="team-member-info card-body p-0">
                                <div class="card-title team-member-name styled-subtitle"><?php echo esc_html($name); ?></div>
                                <div class="separator"></div>
                                <a class="card-text team-link phone-link" href="tel:<?php echo esc_attr($phone); ?>">
                                    <i class="fa-solid fa-phone"></i> <?php echo esc_html($phone); ?>
                                </a>
                                <a class="card-text team-link email-link" href="mailto:<?php echo esc_attr($email); ?>">
                                    <i class="fa-regular fa-envelope"></i> <?php echo esc_html($email); ?>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();

                // Quality mark after team members
                if ($quality_mark):
            ?>
                    <div class="wpb_single_image quality-mark text-center mt-4">
                        <img src="<?php echo esc_url($quality_mark); ?>" alt="Quality Mark">
                    </div>
            <?php
                endif;
            else:
            ?>
                <p class="text-center">Geen teamleden gevonden.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
