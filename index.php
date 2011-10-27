<?php
/**
 * @package WordPress
 * @subpackage New Monkey
 */

get_header();
$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$home = is_home() and !get_query_var('paged');
?>

<section id="content">

<section id="blog">
    <?php
        $first = $page == 1 ? 'first-post': '';
        query_posts('cat=-32,-33&paged=' . $page);
        while (have_posts()) : the_post();
            include('index_post.php');
            $first = '';
        endwhile;
    ?>

    <nav>
        <?php next_posts_link('&laquo; Older Entries') ?>
        <?php previous_posts_link('Newer Entries &raquo;') ?>
    </nav>

</section>

<?php if($home) { ?>
<section id="online">
    <h1>Latest Online Activity</h1>
    <?php
        $first = $page == 1 ? 'first-post': '';
        query_posts('cat=32,33&showposts=10');
        while (have_posts()) : the_post(); 
            include('index_post.php');
            $first = '';
        endwhile;
    ?>
</section>
<?php } ?>

</section>

<?php get_footer(); ?>
