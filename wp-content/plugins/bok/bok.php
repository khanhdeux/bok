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

/**
 * Autoloads files when requested
 *
 * @since  1.0.0
 * @param  string $class_name Name of the class being requested
 */
function bok_class_file_autoloader( $class_name ) {

    /**
     * If the class being requested does not start with our prefix,
     * we know it's not one in our project
     */
    if ( 0 !== strpos( $class_name, 'Bok_' ) ) {
        return;
    }

    $file_name = str_replace(
        array( 'Bok_', '_' ),      // Prefix | Underscores
        array( '', '-' ),         // Remove | Replace with hyphens
        strtolower( $class_name ) // lowercase
    );

    // Compile our path from the current location
    $file = dirname( __FILE__ ) . '/includes/'. $file_name .'.php';

    // If a file is found
    if ( file_exists( $file ) ) {
        // Then load it up!
        require( $file );
    } else {
        $file = dirname( __FILE__ ) . '/'. $file_name .'.php';
        if ( file_exists( $file ) ) {
            // Then load it up!
            require( $file );
        }
    }
}

spl_autoload_register( 'bok_class_file_autoloader' );

add_action( 'plugins_loaded', array( 'Bok_Page_Template', 'get_instance' ) );
add_action( 'init', array( 'Bok_Restaurant', 'create' )  );

