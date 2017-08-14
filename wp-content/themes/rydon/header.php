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
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>
    
    <body <?php body_class();?>>
        
        <div id="page-info" data-page-title="<?php wp_title(); ?>" <?php body_class();?>></div>