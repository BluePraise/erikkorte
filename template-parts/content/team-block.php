<?php
/**
 * Template part for team members block (Flexible Content)
 *
 * @package ErikKorte
 */

$team_members = get_sub_field('team_members');
$title = get_sub_field('title');

if (!$team_members) {
    return;
}
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
            <?php foreach ($team_members as $member) :
                $image = $member['team-image'] ?? '';
            ?>
                <div class="col-12 col-md-3">
                    <?php if ($image) : ?>
                        <img src="<?php echo esc_url($image); ?>" class="img-fluid" alt="Team Member">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
