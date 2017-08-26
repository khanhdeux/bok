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

define( 'BOK__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'BOK__PLUGIN_NAME', 'bok');

// Load the autoloader.
include_once( 'lib/autoloader.php' );

// Load template
include_once( 'template.php' );

// Init restaurant post type
\Bok\Controller\Restaurant::getInstance();

//init template
add_action( 'plugins_loaded', array( __NAMESPACE__  . '\\Template', 'init' ));

//init the meta box slider
/**@var \Bok\Controller\Metabox_Slider $metaboxSlider */
$metaboxSlider = \Bok\Controller\Metabox_Slider::getInstance();
$metaboxSlider->setName('Slider Images');
$metaboxSlider->setPostTypes(['restaurant']);