<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <?php if (in_category('32')) { ?>
            <h1><a href="http://twitter.com/istevens/status/<?php echo get_post_meta($post->ID, 'aktt_twitter_id', 'true') ?>" rel="alternate"><?php $t = get_the_content(''); echo $t; ?></a></h1>
        <?php } else { ?>
            <?php if (in_category('33')) { ?>
                <h1><a href="<?php echo get_post_meta($post->ID, 'link', 'true') ?>" rel="alternate"><?php wp_title(''); ?></a></h1>
            <?php } else { ?>
                <h1><?php wp_title(''); ?></h1>
            <?php } ?>

            <?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>

            <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
        <?php } ?>

        <footer>
            <p>This entry was posted
            <?php /* This is commented, because it requires a little adjusting sometimes.
                You'll need to download this plugin, and follow the instructions:
                http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
                /* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
            on <date pubdate datetime="<?php the_time(XML_DATE); ?>"><?php the_time('l, F jS, Y') ?> at <?php the_time() ?></date>
            and is filed under <?php the_category(', ') ?>.
            <?php edit_post_link('Edit this entry','','.'); ?>
            </p>
            <?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
        </footer>

    </article>

    <?php comments_template(); ?>

    <nav>
        <?php
            previous_post_link('%link', '%title', FALSE, '32');
            next_post_link('%link', '%title', FALSE, '32');
        ?>
    </nav>

<?php endwhile; else: ?>

    <p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_footer(); ?>
