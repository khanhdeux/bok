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
     * Initializes the plugin by setting filters and administration functions.
     */
    protected function __construct() {
        parent::__construct();

        /* Include js/css scripts*/
        add_action('after_setup_theme', array($this, 'initScripts'));

        //init metabox
        /**@var \Bok\Controller\Metabox_Wysiwyg $metaboxEditor */
        \Bok\Controller\Metabox_Text::getInstance('recipe_video_id', 'Youtube ID',['recipe']);
    }

    public function initScripts() {
        add_action('wp_enqueue_scripts', array($this, 'customRecipeScripts'));
    }

    /**
     * Includes js scripts
     */
    public function customRecipeScripts() {
        wp_enqueue_script('youtubePopup', plugins_url( BOK__PLUGIN_NAME . '/js/youtubePopup.jquery.js'), array('jquery'), false, false);
        wp_enqueue_script('slickJS', plugins_url( BOK__PLUGIN_NAME . '/js/slick.js'), array('jquery'), false, false);
//        wp_enqueue_style( 'youtubeModalCSS', plugins_url( BOK__PLUGIN_NAME . '/css/youtubeModal.css'));
        wp_enqueue_style( 'slickCSS', plugins_url( BOK__PLUGIN_NAME . '/css/slick.css'));
        wp_enqueue_style( 'slickThemeCSS', plugins_url( BOK__PLUGIN_NAME . '/css/slick-theme.css'));
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