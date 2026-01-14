<?php
/**
 * Home Team Block
 *
 * Displays team members with contact info and quality mark
 * More detailed than generic team-block.php (includes phone/email)
 *
 * ACF Fields Required:
 * - team_heading (text)
 * - team_description (textarea)
 * - quality_mark (image)
 * - team_members (repeater)
 *   - member_profile_image (image)
 *   - member_name (text)
 *   - member_designation (text)
 *   - member_email (email)
 *   - member_phone (text)
 */

$team_heading = get_sub_field('team_heading');
$team_description = get_sub_field('team_description');
$quality_mark = get_sub_field('quality_mark');
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
            <?php if (have_rows('team_members')): ?>
                <?php while (have_rows('team_members')): the_row();
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
                                    <i class="fa-solid fa-phone"></i> <?php echo esc_html($phone); ?>
                                </a>
                                <a class="card-text team-link email-link" href="mailto:<?php echo esc_attr($email); ?>">
                                    <i class="fa-regular fa-envelope"></i> <?php echo esc_html($email); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                <?php if ($quality_mark): ?>
                    <div class="wpb_single_image quality-mark text-center mt-4">
                        <img src="<?php echo esc_url($quality_mark); ?>" alt="Quality Mark">
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <p>No team members found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
