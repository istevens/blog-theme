<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

<footer class="banner">
    <?php if ( function_exists('dynamic_sidebar') ) {?>
    <section class="fancy">
        <div class="footer_section_content"><?php dynamic_sidebar('left') ?></div>
    </section>
    <?php if(is_archive()) { ?>
        <section class="fancy">
            <div class="footer_section_content"><?php dynamic_sidebar('middle') ?></div>
        </section>
        <section class="fancy">
            <div class="footer_section_content"><?php dynamic_sidebar('right') ?></div>
        </section>
    <?php } ?>
    <?php } ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>
