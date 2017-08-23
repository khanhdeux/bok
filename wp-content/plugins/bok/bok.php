<?php
/*
Plugin Name: Bok Restaurant
Plugin URI: https://hoangx.de/bok
Description: Bok Restaurant in Hamburg, Germany.
Version: 1.0
Author: Quoc Khanh Nguyen
Author URI: https://hoangx.de/bok
License: GPLv2 or later
Text Domain: bok
*/

add_action( 'init', 'retaurant_post_type' );

/**
 * Register a restaurant post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function retaurant_post_type() {
    $labels = array(
        'name'               => _x( 'Restaurants', 'post type general name', 'bok' ),
        'singular_name'      => _x( 'Restaurant', 'post type singular name', 'bok' ),
        'menu_name'          => _x( 'Restaurants', 'admin menu', 'bok' ),
        'name_admin_bar'     => _x( 'Restaurant', 'add new on admin bar', 'bok' ),
        'add_new'            => _x( 'Add New', 'restaurant', 'bok' ),
        'add_new_item'       => __( 'Add New Restaurant', 'bok' ),
        'new_item'           => __( 'New Restaurant', 'bok' ),
        'edit_item'          => __( 'Edit Restaurant', 'bok' ),
        'view_item'          => __( 'View Restaurant', 'bok' ),
        'all_items'          => __( 'All Restaurants', 'bok' ),
        'search_items'       => __( 'Search Restaurants', 'bok' ),
        'parent_item_colon'  => __( 'Parent Restaurants:', 'bok' ),
        'not_found'          => __( 'No Restaurants found.', 'bok' ),
        'not_found_in_trash' => __( 'No Restaurants found in Trash.', 'bok' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Restaurants for our site.', 'bok' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'restaurant' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' , 'custom-fields'),
        'menu_icon'          => 'dashicons-admin-multisite'
    );

    register_post_type( 'restaurant', $args );
}