<article <?php post_class($first) ?> id="post-<?php the_ID(); ?>">
    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to &#8220;<?php the_title_attribute(); ?>&#8221;"><?php the_title(); ?></a></h1>
    <p class="date"><time pubdate datetime="<?php the_time($XML_DATE); ?>"><?php the_time('M j, Y'); ?></time></p>

    <?php
    if($first) {
        the_content('Read the rest of this entry &#xbb;');
    }
    else {
        the_excerpt();
        ?>
    <?php
    }
    ?>
</article>
