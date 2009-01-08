<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

</div>

<div id="ft">
    <?php if ( function_exists('dynamic_sidebar') ) {?>
    <div id="sitemeta" class="yui-gb">
        <div class="yui-u first">
            <?php dynamic_sidebar('left') ?>
        </div>
        <div class="yui-u">
            <?php dynamic_sidebar('middle') ?>
        </div>
        <div class="yui-u">
            <?php dynamic_sidebar('right') ?>
        </div>
    </div>
    <?php } ?>
</div>

</div>
		<?php wp_footer(); ?>
</div>
</body>
</html>
