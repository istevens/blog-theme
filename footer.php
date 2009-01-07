<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

<div class="yui-gb">
    <div class="yui-u first">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('left') ) : ?>
            <h2>About</h2>
            <p>Ian Stevens is a software developer living in Toronto, Canada.</p>
        <?php endif; ?>
    </div>
    <div class="yui-u">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('middle') ) : ?>
            <h2>Elsewhere</h2>
            <p>Visit me on the following networks:</p>
            <ul>
                <li>Facebook</li>
                <li>Twitter</li>
                <li>Delicious</li>
                <li>LinkedIn</li>
                <li>ClaimID</li>
            </ul>
            <p>And using the following IM services:</p>
            <ul>
                <li>MSN</li>
                <li>GMail</li>
                <li>Yahoo</li>
                <li>AIM</li>
                <li>ICQ<//li>
            </ul>
        <?php endif; ?>
    </div>
    <div class="yui-u">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('right') ) : ?>
            <h2>Recent Comments</h2>
        <?php endif; ?>
    </div>
</div>

<div id="ft">
</div>

</div>
</div>
		<?php wp_footer(); ?>
</div>
</body>
</html>
