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
    <?php if(!is_singular()) { ?>
        <section>
            <?php dynamic_sidebar('middle') ?>
        </section>
        <section>
            <?php dynamic_sidebar('right') ?>
        </section>
    <?php } ?>
    <?php } ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>
