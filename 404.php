<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<div class="content">
<h1>Someone f&#x273c;cked up.</h1>
<p>Whatever you want isn't here. If it used to be, I f&#x273c;cked up. Sorry.</p>
<p>In the meantime, try checking for what interests you on <a href="/">the front page</a> or the
<a href="<?php $page = get_page_by_title('archive'); echo get_permalink($page->ID); ?>">blog archive</a>.</p>
</div>

<?php get_footer(); ?>
