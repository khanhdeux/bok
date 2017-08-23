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

require_once( plugin_dir_path( __FILE__ ) . 'class-page-template.php' );
require_once( plugin_dir_path( __FILE__ ) . 'modules/'  .  'class-restaurant-post-type.php' );

add_action( 'init', 'retaurant_post_type' );
add_action( 'plugins_loaded', array( 'PageTemplater', 'get_instance' ) );