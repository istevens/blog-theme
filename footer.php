<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

<footer>
    <?php if ( function_exists('dynamic_sidebar') ) {?>
    <section>
        <?php dynamic_sidebar('left') ?>
    </section>
    <section>
        <?php dynamic_sidebar('middle') ?>
    </section>
    <section>
        <?php dynamic_sidebar('right') ?>
    </section>
    <?php } ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>
