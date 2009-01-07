<?php
/**
 * @package WordPress
 * @subpackage New Monkey
 */

get_header(); $page = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

<div class="yui-gd">

<?php if(is_home() and !get_query_var('paged')) { ?>
<div class="side yui-u first"><div id="tweets">
    <h2>Latest Online Activity</h2>
    <?php $first = $page == 1 ? 'first-post': ''; query_posts('category_name=tweets&showposts=10'); ?>
    <?php while (have_posts()) : the_post(); ?>
        <div <?php post_class($first . " entry"); $first = ''; ?> >
            <h3><?php echo get_the_content() ?></h3>
            <p class="postmeta">
                <a href="http://twitter.com/istevens/status/<?php echo get_post_meta($post->ID, 'aktt_twitter_id', 'true') ?>" title="See '<?php the_title_attribute(); ?>' on Twitter">On Twitter on <?php the_time('Y-m-d \a\t G:i') ?></a>
                <?php comments_popup_link('Comment &#187;', '1 Comment &#187;', '% Comments &#187;', 'comments'); ?>
            </p>
        </div>
    <?php endwhile; ?>
</div></div>
<?php } ?>

<div id="blog" class="yui-u">
    <?php $first = $page == 1 ? 'first-post': ''; ?>
    <?php query_posts('cat=-32&paged=' . $page); ?>
    <?php while (have_posts()) : the_post(); ?>

        <div <?php post_class($first) ?> id="post-<?php the_ID(); ?>">
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to &ldquo;<?php the_title_attribute(); ?>&rdquo;"><?php the_title(); ?> <span class="date"><?php the_time('M j'); ?></span></a></h2>

            <div class="entry">
                <?php 
                if($first) {
                    the_content('Read the rest of this entry &raquo;');
                }
                else {
                    the_excerpt();
                    ?>
                    <p class="postmeta">
                        <a href="<?php the_permalink() ?>" rel="bookmark">Continue reading &ldquo;<?php the_title_attribute(); ?>&rdquo;</a>
                        (<?php comments_popup_link('0 comments', '1 comment', '% comments') ?>)
                    </p>
                <?php
                }
                ?>
            </div>
        </div>

        <?php $first = ''; ?>

    <?php endwhile; ?>

    <p class="navigation">
        <span class="next"><?php next_posts_link('&laquo; Older Entries') ?></span>
        <span class="previous"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
    </p>

</div>

<?php get_footer(); ?>
