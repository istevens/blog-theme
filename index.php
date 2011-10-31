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
        query_posts('cat=-32,-33&showposts=5&paged=' . $page);
        while (have_posts()) : the_post();
            include('index_post.php');
            $first = '';
        endwhile;
    ?>

</section>

<nav class="between">
    <?php posts_nav_link(' ', 'Newer', 'Older') ?>
</nav>

<?php if($home) { ?>
<section id="online">
    <section id="mentioned">
        <h1>On My Mind</h1>
        <?php
            $first = $page == 1 ? 'first-post': '';
            query_posts('cat=32&showposts=3');
            while (have_posts()) : the_post(); 
                include('index_post.php');
                $first = '';
            endwhile;
        ?>
    </section>

    <section id="read">
        <h1>Recently Read</h1>
        <?php
            $first = $page == 1 ? 'first-post': '';
            query_posts('cat=33&showposts=3');
            while (have_posts()) : the_post(); 
                include('index_post.php');
                $first = '';
            endwhile;
        ?>
    </section>
</section>
<?php } ?>

</section>

<nav>
    <?php posts_nav_link(' ', 'Newer', 'Older') ?>
</nav>

<?php get_footer(); ?>
