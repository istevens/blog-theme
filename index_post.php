<article id="post-<?php the_ID(); ?>" <?php post_class($first); ?>>
    <?php if(in_category('32') or in_category('33')) {
        if (in_category('32')) {
            $title = get_the_content();
            $content = "";
            $link = "http://twitter.com/istevens/status/".get_post_meta($post->ID, 'aktt_twitter_id', 'true');
            $link_verb = "See";
            $link_text = " on Twitter";
            $verb = "Tweeted";
        } else if (in_category('33')) {
            $ext = get_post_meta($post->ID, 'link', 'true');
            $link = get_permalink();
            $title = "<a href=\"".$ext."\">".$post->post_title."</a>";
            $content = get_the_excerpt();
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
            $content = str_replace(' &hellip;', '&#160;&#8230;&#160;<a href="'.get_permalink($post->ID).'">Read more.</a>', $content);
            $link_verb = "Go to";
            $link_text = "";
            $verb = "Linked";
        } ?>
        <h1><?php echo $title; ?></h1>
        <?php if ($content != "") { 
            echo $content;
        } ?>
        <footer>
            <a class="external" href="<?php echo $link ?>" title="<?php echo $link_verb; ?> '<?php the_title_attribute(); echo "'".$link_text."\"><span class=\"verb\">".$verb ?> on</span> <date pubdate datetime="<?php the_time(XML_DATE); ?>"><?php the_time('M j \a\t G:i') ?></date></a>
        </footer>

    <?php } else { ?>
        <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to &#8220;<?php the_title_attribute(); ?>&#8221;"><?php the_title(); ?></a></h1>
        <p class="date"><time pubdate datetime="<?php the_time(XML_DATE); ?>"><?php the_time('M j, Y'); ?></time></p>

        <?php
        if($first) {
            the_content('Read the rest of this entry &#xbb;');
        }
        else {
            the_excerpt();
        }
        ?>

    <?php } ?>
</article>
