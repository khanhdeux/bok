<?php
/*
Plugin Name: Bok Restaurant
Plugin URI: https://hoangx.de/bok
Description: Bok Restaurant in Hamburg, Germany.
Version: 1.0.0
Author: Quoc Khanh Nguyen
Author URI: https://hoangx.de/bok
License: GPLv2 or later
Text Domain: bok
*/
namespace Bok;

// Load the autoloader.
include_once( 'lib/autoloader.php' );

// Init restaurant post type
add_action( 'init', array( __NAMESPACE__ . '\\Controller\\Restaurant', 'init' ));
//init template
add_action( 'plugins_loaded', array( __NAMESPACE__  . '\\Template', 'init' ));
//init the meta box slider
add_action( 'after_setup_theme', array( __NAMESPACE__ . '\\Controller\\Metabox_Slider', 'init' ));