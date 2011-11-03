<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html> 
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <link href='http://fonts.googleapis.com/css?family=Slackey' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, print" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/detect.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/respond.min.js"></script>

    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php
        $body_class = '';
        if(is_front_page()) {
            $body_class = 'class="index"';
        } else if(is_archive()) {
            $body_class = 'class="archive"';
        } else {
            $body_class = 'class="single"';
        }
        wp_head();
    ?>
    </head>
<body <?php echo $body_class; ?>>

<header class="fancy">
    <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
    <h2 class="description"><?php bloginfo('description'); ?></h2>
</header>
