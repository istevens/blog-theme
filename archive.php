<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

<?php if (have_posts()) : ?>

    <section id="content">
    <section id="blog">
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is a category archive */ if (is_category()) { ?>
        <h1>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
        <h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        <h1>Archive for <?php the_time('F jS, Y'); ?></h1>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        <h1>Archive for <?php the_time('F, Y'); ?></h1>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        <h1>Archive for <?php the_time('Y'); ?></h1>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        <h1>Author Archive</h1>
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        <h1>Blog Archives</h1>
    <?php } ?>

    <?php
        $wp_query->query_vars["cat"] = -32;
        $wp_query->get_posts();
        $first = $page == 1 && (is_category() || is_tag() || is_author()) ? 'first-post': '';
        while (have_posts()) : the_post();
            include('index_post.php');
            $first = '';
        endwhile;
    ?>

    </section>
    </section>

    <nav>
        <?php posts_nav_link(' ', 'Newer', 'Older') ?>
    </nav>

 <?php else :

     if ( is_category() ) { // If this is a category archive
         printf("<h1 class='center'>Sorry, but there aren't any posts in the %s category yet.</h1>", single_cat_title('',false));
     } else if ( is_date() ) { // If this is a date archive
         echo("<h1>Sorry, but there aren't any posts with this date.</h1>");
     } else if ( is_author() ) { // If this is a category archive
         $userdata = get_userdatabylogin(get_query_var('author_name'));
         printf("<h1 class='center'>Sorry, but there aren't any posts by %s yet.</h1>", $userdata->display_name);
     } else {
         echo("<h1 class='center'>No posts found.</h1>");
     }
     get_search_form();

    endif;
?>

<?php get_footer(); ?>
