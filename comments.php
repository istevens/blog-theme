<section id="comments">
<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');

    if ( post_password_required() ) { ?>
        <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
    <?php
        return;
    }
?>

<!-- You can start editing here. -->

    <nav>
        <?php if (('open' == $post-> comment_status)) { ?>
            <a href="#respond" class="comment_state">Respond to this post</a>
        <?php } else { ?>
            <span class="comment_state">Comments are closed</span>
        <?php } ?>
        <?php if ( have_comments() ) { ?>
            <a class="to_comments" href="#recorded_comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</a>
        <?php } ?>
    </nav>

<?php if ( have_comments() ) : ?>
    <ol id="recorded_comments">
        <?php
            wp_list_comments(array('callback' => 'html5_comment'));
        ?>
    </ol>

 <?php else : // this is displayed if there are no comments so far ?>

    <?php if ('open' == $post->comment_status) : ?>
        <!-- If comments are open, but there are no comments. -->

    <?php else : // comments are closed ?>
        <!-- If comments are closed. -->
        <p class="nocomments">Comments are closed.</p>

    <?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

    <form id="respond" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

    <h2><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h2>

    <p><?php cancel_comment_reply_link(); ?></p>

    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
        <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

    <?php else : ?>
    <?php if ( $user_ID ) : ?>
        <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

    <?php else : ?>

        <p>
            <label for="author">Name <?php if ($req) echo "(required)"; ?></label>
            <input required type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
        </p>

        <p>
            <label for="email">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label>
            <input required type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
        </p>

        <p>
            <label for="url">Website</label>
            <input type="url" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
        </p>

    <?php endif; ?>

    <p>
        <label for="comment">What do you want to say?</label>
        <textarea name="comment" id="comment" tabindex="4"></textarea>
    </p>
    <p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />

    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>

    </form>

<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
</section>
