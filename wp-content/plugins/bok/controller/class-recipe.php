<?php
namespace Bok\Controller;
/**
 * Class Bok_Recipe
 */
class Recipe extends Post_Type {

    protected static $instance;

    protected $name = 'recipe';

    public static function getInstance() {
        $class = get_called_class();

        if (!self::$instance[$class]) {
            self::$instance[$class] = new self;
        }

        return self::$instance[$class];
    }

    /**
     * Create custom post type
     */
    public function create() {
        $labels = array(
            'name' => _x('Recipe', 'post type general name', 'bok'),
            'singular_name' => _x('Recipe', 'post type singular name', 'bok'),
            'menu_name' => _x('Recipe', 'admin menu', 'bok'),
            'name_admin_bar' => _x('Recipe', 'add new on admin bar', 'bok'),
            'add_new' => _x('Add New', 'recipe', 'bok'),
            'add_new_item' => __('Add New Recipe', 'bok'),
            'new_item' => __('New Recipe', 'bok'),
            'edit_item' => __('Edit Recipe', 'bok'),
            'view_item' => __('View Recipe', 'bok'),
            'all_items' => __('All Recipe', 'bok'),
            'search_items' => __('Search Recipe', 'bok'),
            'parent_item_colon' => __('Parent Recipe:', 'bok'),
            'not_found' => __('No Recipe found.', 'bok'),
            'not_found_in_trash' => __('No Recipe found in Trash.', 'bok')
        );

        $args = array(
            'labels' => $labels,
            'description' => __('Recipe for our site.', 'bok'),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => $this->name),
            'capability_type' => 'post',
            'has_archive' => false,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
            'menu_icon' => 'dashicons-carrot'
        );

        register_post_type($this->name, $args);
        flush_rewrite_rules();
    }
}