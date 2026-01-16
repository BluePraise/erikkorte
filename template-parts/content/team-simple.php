<?php
/**
 * Team Members - Simple Display
 *
 * Displays team members from CPT with only image and name
 * Use this template for team overview pages or sidebars
 *
 * Usage:
 * <?php get_template_part('template-parts/content/team-simple'); ?>
 */

// Query team members from CPT
$team_query = new WP_Query(array(
    'post_type' => 'team_member',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
));

if ($team_query->have_posts()): ?>
    <div class="team-simple-grid">
        <div class="row g-4">
            <?php
            while ($team_query->have_posts()): $team_query->the_post();
                $profile_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                $name = get_the_title();
                $designation = get_field('member_designation');
            ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="team-member-simple text-center">
                        <!-- Team Member Image -->
                        <div class="team-member-image mb-3">
                            <?php if ($profile_image): ?>
                                <img class="img-fluid rounded" src="<?php echo esc_url($profile_image); ?>" alt="<?php echo esc_attr($name); ?>">
                            <?php else: ?>
                                <div class="placeholder-image bg-light d-flex align-items-center justify-content-center rounded" style="height: 200px;">
                                    <i class="fa-solid fa-user fa-2x text-muted"></i>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Team Member Info -->
                        <h3 class="team-member-name h5 mb-1"><?php echo esc_html($name); ?></h3>
                        <?php if ($designation): ?>
                            <p class="team-member-designation text-muted small mb-0"><?php echo esc_html($designation); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
<?php else: ?>
    <p class="text-center">Geen teamleden gevonden.</p>
<?php endif; ?>
