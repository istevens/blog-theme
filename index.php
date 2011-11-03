<?php
/**
 * @package WordPress
 * @subpackage New Monkey
 */

get_header();
$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$paged = $page;
$home = is_home() and !get_query_var('paged');
?>

<section id="content">

<section id="blog">
    <?php
        $first = $page == 1 ? 'first-post': '';
        query_posts('cat=-32,-33&showposts=5&paged=' . $paged);
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
    <section class="fancy" id="mentioned">
        <h1>On My Mind</h1>
        <?php
            $first = $page == 1 ? 'first-post': '';
            query_posts('cat=32&showposts=3&paged=' . $paged);
            while (have_posts()) : the_post(); 
                include('index_post.php');
                $first = '';
            endwhile;
        ?>
    </section>

    <section class="fancy" id="read">
        <h1>Recently Read</h1>
        <?php
            $first = $page == 1 ? 'first-post': '';
            query_posts('cat=33&showposts=3&paged='. $paged);
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
