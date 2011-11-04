<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<nav class="content" id="archives">

<nav id="month_archives">
    <h1>Archives by Year</h1>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
</nav>

<nav id="category_archives">
    <h1>Archives by Subject</h1>
    <ul>
         <?php wp_list_categories(); ?>
    </ul>
</nav>

</nav>

<?php get_footer(); ?>
