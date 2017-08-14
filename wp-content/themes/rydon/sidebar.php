<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */

// Setup
global $rydon_option;
$sidebarLogo = get_theme_mod('rydon_customizer_sidebar_logo', TRUE);

// Div
echo '<div id="sidebar">';

// Logo
if($sidebarLogo == 1) { 
	echo '<a id="sidebar-logo" href="'.esc_url( home_url( '/' ) ).'"><h1>'.get_bloginfo('name').'</h1></a>'; 
}

// Widgets
if ( is_active_sidebar( 1 ) ) {
	echo '<ul id="sidebar-widgets">';
		dynamic_sidebar( 1 );
	echo '</ul>';
}

// Close div
echo '</div>';
?>