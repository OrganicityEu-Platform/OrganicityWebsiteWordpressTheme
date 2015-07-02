<?php
/**
 * The template for displaying the header.
 *
 * @package Organicity
 * @since 0.1.0
 */
$is_home = is_front_page();
$header_class = $is_home ? 'home' : '';

?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title('&#124;', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta name="description" content="OrganiCity is a new EU project with € 7.2m in funding that puts people at the centre of the development of future cities. The project brings together 3 leading smart cities and a total of 15 consortium members with great diversity in skills and experience.">
    <meta name="keywords" content="OrganiCity,EU,future,city,cities,innovation,innovative,co-creating">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="Organicity"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://www.organicity.eu/"/>
    <meta property="og:image" content="http://www.organicity.eu/social_image.png"/>
    <meta property="og:site_name" content="Organicity"/>
    <meta property="og:description" content="Organicity - Co-creating the Cities of the Future"/>

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Organicity" />
    <meta name="twitter:description" content="Organicity - Co-creating the Cities of the Future" />
    <meta name="twitter:url" content="http://www.organicity.eu/" />
    <meta name="twitter:image" content="http://www.organicity.eu/social_image.png" />

    <meta itemprop="name" content="Organicity">
    <meta itemprop="description" content="Organicity - Co-creating the Cities of the Future">
    <meta itemprop="image" content="http://www.organicity.eu/social_image.png">

    <!-- Standard Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <!-- For iPhone: -->
    <link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png">

    <!-- TypeKit - Freight Text -->
    <script src="//use.typekit.net/buo5xqw.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
    <!-- WP head -->
    <?php wp_head(); ?>
</head>

<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- this will become the main page header include -->
<header role="banner" class="<?php echo $header_class; ?>">


    <div class="header-bar">

        <a href="/" title="<?php _e('Organicity - link to homepage', 'organicity'); ?>">
            <span class="offscreen"><?php echo get_bloginfo('title'); ?></span>
            <img
                class="logo"
                src="<?php bloginfo('template_directory'); ?>/images/organicity_logo.png"
                alt="<?php _e('Organicity logo', 'organicity'); ?>"
                />
        </a>

        <div class="menu-wrapper">
            <div class="menuIcon">
                <a href="#menuExpand"><span> toggle menu</span></a>
            </div>
            <div class="menu">
                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
            </div>
        </div>

    </div>

    <?php if(is_tax( 'city' )):?>
    <h1>CITY PAGE</h1>
    <?php endif; ?>

    <?php if ($is_home) : ?>
        <div class=" title">
            <h2><?php echo get_bloginfo('description'); ?></h2>
            <?php if (rwmb_meta('organicity_header_anchor_link_visible')) : ?>
                <a
                    class="button button--bordered"
                    href="#main"
                    title="<?php echo rwmb_meta('organicity_header_anchor_link_title'); ?>"
                    >
                    <?php echo rwmb_meta('organicity_header_anchor_link_text'); ?>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>


</header>
