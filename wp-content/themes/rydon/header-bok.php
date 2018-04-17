<?php
/*
 * The template for displaying the header
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class();?>>

<div id="page-info" data-page-title="<?php wp_title(); ?>" <?php body_class();?>></div>

<div id="bok-nav">
    <nav class="navbar-default">
        <div class="container-fluid container container-800">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bok-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo get_site_url() ?>">
                    <img src="<?php echo esc_url( plugins_url( BOK__PLUGIN_NAME . '/images/logo.png') ); ?>" width="50" />
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bok-navbar-collapse">
                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                    <?php wp_nav_menu( array('theme_location' => 'primary', 'menu_class' => 'nav navbar-nav menu') );?>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</div>
