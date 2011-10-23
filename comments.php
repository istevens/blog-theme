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

<?php if ( have_comments() ) : ?>
    <h1><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h1>

    <nav>
        <?php
            previous_comments_link();
            next_comments_link();
        ?>
    </nav>

    <ol>
        <?php
            wp_list_comments(array('callback' => 'html5_comment'));
        ?>
    </ol>

    <nav>
        <?php
            previous_comments_link();
            next_comments_link();
        ?>
    </nav>

 <?php else : // this is displayed if there are no comments so far ?>

    <?php if ('open' == $post->comment_status) : ?>
        <!-- If comments are open, but there are no comments. -->

    <?php else : // comments are closed ?>
        <!-- If comments are closed. -->
        <p class="nocomments">Comments are closed.</p>

    <?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

    <h2><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h2>

    <p><?php cancel_comment_reply_link(); ?></p>

    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
        <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

    <?php else : ?>
    <?php if ( $user_ID ) : ?>
        <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

    <?php else : ?>

        <p>
            <input required type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
            <label for="author">Name <?php if ($req) echo "(required)"; ?></label>
        </p>

        <p>
            <input required type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
            <label for="email">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label>
        </p>

        <p>
            <input type="url" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
            <label for="url">Website</label>
        </p>

    <?php endif; ?>

    <p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
    <p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />

    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>

    </form>

<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
