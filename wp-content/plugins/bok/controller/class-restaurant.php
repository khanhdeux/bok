<?php
namespace Bok\Controller;
/**
 * Class Bok_Restaurant
 */
class Restaurant extends Base {

    protected static $instance;

    const POST_TYPE_NAME = 'restaurant';

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
    private function __construct() {
        /* Create custom post type*/
        add_action('init', array(__CLASS__, 'createPostType'));
        /* Filter the single_template with our custom function*/
        add_filter('single_template',  array(__CLASS__, 'initTemplate'));
        /* Include js/css scripts*/
        add_action('after_setup_theme', array(__CLASS__, 'initScripts'));

        //init the meta box slider
        /**@var \Bok\Controller\Metabox_Slider $metaboxSlider */
        \Bok\Controller\Metabox_Slider::getInstance('slider_image', 'Slider',['restaurant'] );

        //init metabox wysiwug
        /**@var \Bok\Controller\Metabox_Wysiwyg $metaboxEditor */
        \Bok\Controller\Metabox_Wysiwyg::getInstance('restaurant_lunch_menu', 'Mittagtisch',['restaurant']);

        //init metabox wysiwug
        /**@var \Bok\Controller\Metabox_Wysiwyg $metaboxEditor */
        \Bok\Controller\Metabox_Wysiwyg::getInstance('restaurant_day_menu', 'Mittag',['restaurant']);

        //init metabox wysiwug
        /**@var \Bok\Controller\Metabox_Wysiwyg $metaboxEditor */
        \Bok\Controller\Metabox_Wysiwyg::getInstance('restaurant_evening_menu', 'Abend',['restaurant']);
    }

    public function initScripts() {
        add_action('wp_enqueue_scripts', array(__CLASS__, 'customRestaurantScripts'));
    }

    /**
     * Includes js scripts
     */
    public function customRestaurantScripts() {
        wp_enqueue_script('bokGoogleMaps', plugins_url( BOK__PLUGIN_NAME . '/js/bok.googlemaps.js'), array('jquery'));
    }

    /**
     * Create custom post type
     */
    public function createPostType() {
        $labels = array(
            'name' => _x('Restaurants', 'post type general name', 'bok'),
            'singular_name' => _x('Restaurant', 'post type singular name', 'bok'),
            'menu_name' => _x('Restaurants', 'admin menu', 'bok'),
            'name_admin_bar' => _x('Restaurant', 'add new on admin bar', 'bok'),
            'add_new' => _x('Add New', 'restaurant', 'bok'),
            'add_new_item' => __('Add New Restaurant', 'bok'),
            'new_item' => __('New Restaurant', 'bok'),
            'edit_item' => __('Edit Restaurant', 'bok'),
            'view_item' => __('View Restaurant', 'bok'),
            'all_items' => __('All Restaurants', 'bok'),
            'search_items' => __('Search Restaurants', 'bok'),
            'parent_item_colon' => __('Parent Restaurants:', 'bok'),
            'not_found' => __('No Restaurants found.', 'bok'),
            'not_found_in_trash' => __('No Restaurants found in Trash.', 'bok')
        );

        $args = array(
            'labels' => $labels,
            'description' => __('Restaurants for our site.', 'bok'),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => self::POST_TYPE_NAME),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
            'menu_icon' => 'dashicons-admin-multisite'
        );

        register_post_type(self::POST_TYPE_NAME, $args);
        flush_rewrite_rules();
    }

    /**
     * Init single restaurant template
     *
     * @param $single
     * @return string
     */
    public function initTemplate($single) {
        global $post;

        /* Checks for single template by post type */
        if ( $post->post_type == self::POST_TYPE_NAME ) {
            $templateFile = 'single-' . self::POST_TYPE_NAME . '.php';
            if ( file_exists( BOK__PLUGIN_DIR . 'templates/' . $templateFile ) ) {
                return BOK__PLUGIN_DIR . 'templates/' . $templateFile;
            }
        }

        return $single;
    }
}