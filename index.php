<?php
/**
 * @package WordPress
 * @subpackage New Monkey
 */

get_header();
$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$paged = $page;
$home = is_home() and !get_query_var('paged');
$cats = get_all_category_ids();

/**
 * This is why I need to built my own custom weblog, so I can have better 
 * control over the customization without a CPU cost.
 *
 * If I take the time to category a post, it probably should be on the front 
 * page, not twice.
 */
$tweets = 32;
$links = 33;
$feature_posts = $cats;
foreach($feature_posts as $i => $c) {
    if($c == $tweets || $c == $links) {
        unset($feature_posts[$i]);
    }
}
?>

<section id="content">

<section id="blog">
    <?php
        $first = $page == 1 ? 'first-post': '';
        query_posts(array('category__in' => $feature_posts, 'showposts' => 5, 'paged' => $paged));
        while (have_posts()) : the_post();
            include('index_post.php');
            $first = '';
        endwhile;
    ?>

</section>

<nav class="between banner">
    <?php posts_nav_link(' ', 'Newer', 'Older') ?>
</nav>

<?php
    $online_query = array('showposts' => 5, 'paged' => $paged);
    if($home) { ?>
<section id="online">
    <section id="mentioned">
        <h1 class="fancy">On My Mind</h1>
        <?php
            query_posts(array('cat' => 32) + $online_query);
            while (have_posts()) : the_post(); 
                include('index_post.php');
                $first = '';
            endwhile;
        ?>
    </section>

    <section id="read">
        <h1 class="fancy">Recently Read</h1>
        <?php
            query_posts(array('cat' => 33, 'category__not_in' => $feature_posts) + $online_query);
            while (have_posts()) : the_post(); 
                include('index_post.php');
                $first = '';
            endwhile;
        ?>
    </section>
</section>
<?php } ?>

</section>

<nav class="banner">
    <?php posts_nav_link(' ', 'Newer', 'Older') ?>
</nav>

<?php get_footer(); ?>
