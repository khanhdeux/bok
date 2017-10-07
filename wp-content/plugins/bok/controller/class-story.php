<?php
namespace Bok\Controller;
/**
 * Class Bok_Story
 */
class Story extends Post_Type {

    protected $name = 'story';

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
            'name' => _x('Story', 'post type general name', 'bok'),
            'singular_name' => _x('Story', 'post type singular name', 'bok'),
            'menu_name' => _x('Story', 'admin menu', 'bok'),
            'name_admin_bar' => _x('Story', 'add new on admin bar', 'bok'),
            'add_new' => _x('Add New', 'story', 'bok'),
            'add_new_item' => __('Add New Story', 'bok'),
            'new_item' => __('New Story', 'bok'),
            'edit_item' => __('Edit Story', 'bok'),
            'view_item' => __('View Story', 'bok'),
            'all_items' => __('All Story', 'bok'),
            'search_items' => __('Search Story', 'bok'),
            'parent_item_colon' => __('Parent Story:', 'bok'),
            'not_found' => __('No Story found.', 'bok'),
            'not_found_in_trash' => __('No Story found in Trash.', 'bok')
        );

        $args = array(
            'labels' => $labels,
            'description' => __('Story for our site.', 'bok'),
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