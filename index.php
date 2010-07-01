<?php
/**
 * @package WordPress
 * @subpackage New Monkey
 */

get_header(); $page = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

<section id="content">

<?php if(is_home() and !get_query_var('paged')) { ?>
<section id="online">
    <h1>Latest Online Activity</h1>
    <?php $first = $page == 1 ? 'first-post': ''; query_posts('cat=32,33&showposts=10'); ?>
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class($first); $first = ''; ?> >
            <?php if (in_category('32')) {
                $title = get_the_content();
                $content = "";
                $link = "http://twitter.com/istevens/status/".get_post_meta($post->ID, 'aktt_twitter_id', 'true');
                $link_verb = "See";
                $link_text = " on Twitter";
                $verb = "Tweeted";
            } else if (in_category('33')) {
                $link = get_post_meta($post->ID, 'link', 'true');
                $title = "<a href=\"".$link."\">".$post->post_title."</a>";
                $content = get_the_excerpt();
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]&gt;', $content);
                $content = str_replace(' &hellip;', '&#160;&#8230;&#160;<a href="'.get_permalink($post->ID).'">Read more.</a>', $content);
                $link_verb = "Go to";
                $link_text = "";
                $verb = "Linked";
            } ?>
            <h1><?php echo $title; ?></h1>
            <?php if ($content != "") { 
                echo $content;
            } ?>
            <footer>
                <a href="<?php echo $link ?>" title="<?php echo $link_verb; ?> '<?php the_title_attribute(); echo "'".$link_text."\">".$verb ?> on <?php the_time('Y-m-d \a\t G:i') ?></a>
                <?php comments_popup_link('Comment &#187;', '1 Comment &#187;', '% Comments &#187;', 'comments'); ?>
            </footer>
        </article>
    <?php endwhile; ?>
</section>
<?php } ?>

<section id="blog">
    <?php $first = $page == 1 ? 'first-post': ''; ?>
    <?php query_posts('cat=-32,-33&paged=' . $page); ?>
    <?php while (have_posts()) : the_post(); ?>

        <article <?php post_class($first) ?> id="post-<?php the_ID(); ?>">
            <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to &#8220;<?php the_title_attribute(); ?>&#8221;"><?php the_title(); ?> <span class="date"><?php the_time('M j'); ?></span></a></h1>

            <?php
            if($first) {
                the_content('Read the rest of this entry &#xbb;');
            }
            else {
                the_excerpt();
                ?>
                <footer>
                    <p><a href="<?php the_permalink() ?>" rel="bookmark" title="Continue reading &ldquo;<?php the_title_attribute(); ?>&rdquo;">Read more</a></p>
                </footer>
            <?php
            }
            ?>
        </article>

        <?php $first = ''; ?>

    <?php endwhile; ?>

    <nav>
        <span class="next"><?php next_posts_link('&laquo; Older Entries') ?></span>
        <span class="previous"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
    </nav>

</section>
</section>

<?php get_footer(); ?>
