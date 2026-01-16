<?php
/**
 * Template part for team members block (Flexible Content)
 * Queries the Team Member CPT to display team members
 *
 * @package ErikKorte
 */

$title = get_sub_field('title');
?>

<div class="team-block">
    <div class="container-fluid my-lg-5 my-3">
        <?php if ($title) : ?>
            <div class="row">
                <div class="col-12">
                    <h2 class="main_title center"><?php echo esc_html($title); ?></h2>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <?php
            // Query Team Member CPT
            $team_query = new WP_Query(array(
                'post_type'      => 'team_member',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC'
            ));

            if ($team_query->have_posts()) :
                while ($team_query->have_posts()) : $team_query->the_post();
                    $member_photo = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    $member_name = get_the_title();
                    $member_designation = get_field('member_designation');
            ?>
                    <div class="col-12 col-md-3 mb-4">
                        <?php if ($member_photo) : ?>
                            <img src="<?php echo esc_url($member_photo); ?>" class="img-fluid mb-2" alt="<?php echo esc_attr($member_name); ?>">
                        <?php endif; ?>
                        <h4><?php echo esc_html($member_name); ?></h4>
                        <?php if ($member_designation) : ?>
                            <p class="text-muted"><?php echo esc_html($member_designation); ?></p>
                        <?php endif; ?>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="col-12">Geen teamleden gevonden.</p>';
            endif;
            ?>
        </div>
    </div>
</div>
