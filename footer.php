<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

<?php if ( function_exists('dynamic_sidebar') ) {?>
<div class="yui-gb">
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

<div id="ft">
</div>

</div>
</div>
		<?php wp_footer(); ?>
</div>
</body>
</html>
