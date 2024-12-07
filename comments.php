<?php
/**
 * Template for displaying comments.
 *
 * This file handles both displaying existing comments and the comment form.
 */

// Exit if accessed directly.
if (post_password_required()) {
    return;
}
?>

<div id="comments_box" class="comments-area">
    <?php if (have_comments()) : ?>
		<div class="comments-header">
        <h3 class="comments-title" id="comments">
			<?php
			$comments_number = get_comments_number();
			if ('1' === $comments_number) {
				echo __('Reactie <span>(1)<span>', 'textdomain'); // Singular: 1 Reactie
			} else {
				echo sprintf(
					__('Reacties <span>(%s)</span>', 'textdomain'), // Plural: X Reacties
					number_format_i18n($comments_number)
				);
			}
			?>
        </h3>
		<a href="#respond" class="jumpto-commentform btn gem-button btn-success choose-reminder">Voeg een bericht toe</a>
		</div>
        <ol class="commentlist">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                )
            );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

    <?php endif; // Check for have_comments(). ?>

    <?php
    // If comments are closed and there are comments, leave a note.
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'textdomain'); ?></p>
    <?php endif; ?>

    <?php
    // Display the comment form.
    comment_form();
    ?>

</div><!-- #comments -->
