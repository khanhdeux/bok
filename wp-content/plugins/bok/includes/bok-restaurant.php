<?php

/**
 * Class Bok_Restaurant
 */
class Bok_Restaurant {

    public function create() {
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
        flush_rewrite_rules();
    }
}