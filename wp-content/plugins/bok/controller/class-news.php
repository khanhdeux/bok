<?php
namespace Bok\Controller;
/**
 * Class Bok_News
 */
class News extends Post_Type {

    protected $name = 'news';

    protected static $instance;

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
            'name' => _x('News', 'post type general name', 'bok'),
            'singular_name' => _x('News', 'post type singular name', 'bok'),
            'menu_name' => _x('News', 'admin menu', 'bok'),
            'name_admin_bar' => _x('News', 'add new on admin bar', 'bok'),
            'add_new' => _x('Add New', 'news', 'bok'),
            'add_new_item' => __('Add New News', 'bok'),
            'new_item' => __('New News', 'bok'),
            'edit_item' => __('Edit News', 'bok'),
            'view_item' => __('View News', 'bok'),
            'all_items' => __('All News', 'bok'),
            'search_items' => __('Search News', 'bok'),
            'parent_item_colon' => __('Parent News:', 'bok'),
            'not_found' => __('No News found.', 'bok'),
            'not_found_in_trash' => __('No News found in Trash.', 'bok')
        );

        $args = array(
            'labels' => $labels,
            'description' => __('News for our site.', 'bok'),
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
            'menu_icon' => 'dashicons-media-document'
        );

        register_post_type($this->name, $args);
        flush_rewrite_rules();
    }
}