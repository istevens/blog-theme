<?php
/**
 * @package WordPress
 * @subpackage New Monkey
 */

get_header(); $page = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

<div class="yui-gd">

<?php if(is_home() and !get_query_var('paged')) { ?>
<div class="side yui-u first"><div id="online">
    <h2>Latest Online Activity</h2>
    <?php $first = $page == 1 ? 'first-post': ''; query_posts('cat=32,33&showposts=10'); ?>
    <?php while (have_posts()) : the_post(); ?>
        <div <?php post_class($first . " entry"); $first = ''; ?> >
            <?php if (in_category('32')) {
                $title = get_the_content();
                $content = "";
                $link = "http://twitter.com/istevens/status/".get_post_meta($post->ID, 'aktt_twitter_id', 'true');
                $link_verb = "See";
                $link_text = " on Twitter";
                $verb = "Tweeted";
            } else if (in_category('33')) {
                $link = get_post_meta($post->ID, 'link', 'true');
                $title = "<a href=".$link.">".$post->post_title."</a>";
                $content = get_the_content();
                $link_verb = "Go to";
                $link_text = "";
                $verb = "Linked";
            } ?>
            <h3><?php echo $title; ?></h3>
            <?php if ($content != "") { 
                echo "<p>".$content."</p>";
            } ?>
            <p class="postmeta">
                <a href="<?php echo $link ?>" title="<?php echo $link_verb; ?> '<?php the_title_attribute(); echo "'".$link_text."\">".$verb ?> on <?php the_time('Y-m-d \a\t G:i') ?></a>
                <?php comments_popup_link('Comment &#187;', '1 Comment &#187;', '% Comments &#187;', 'comments'); ?>
            </p>
        </div>
    <?php endwhile; ?>
</div></div>
<?php } ?>

<div id="blog" class="yui-u">
    <?php $first = $page == 1 ? 'first-post': ''; ?>
    <?php query_posts('cat=-32,-33&paged=' . $page); ?>
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
</div>

<?php get_footer(); ?>
