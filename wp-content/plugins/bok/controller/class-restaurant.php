<?php
namespace Bok\Controller;
/**
 * Class Bok_Restaurant
 */
class Restaurant extends Post_Type {

    protected static $instance;

    protected $name = 'restaurant';

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

        // init text telephone
        \Bok\Controller\Metabox_Text::getInstance('telephone', 'Telefon',['restaurant']);

        // init text address
        \Bok\Controller\Metabox_Text::getInstance('restaurant_address', 'Adresse',['restaurant']);

        //init the meta box slider
        /**@var \Bok\Controller\Metabox_Slider $metaboxSlider */
        \Bok\Controller\Metabox_Slider::getInstance('slider_image', 'Slider',['restaurant'] );

        //init metabox wysiwug
        /**@var \Bok\Controller\Metabox_Wysiwyg $metaboxEditor */
        \Bok\Controller\Metabox_Wysiwyg::getInstance('restaurant_lunch_menu', 'Getränke',['restaurant']);

        //init metabox wysiwug
        /**@var \Bok\Controller\Metabox_Wysiwyg $metaboxEditor */
        \Bok\Controller\Metabox_Wysiwyg::getInstance('restaurant_day_menu', 'Mittag',['restaurant']);

        //init metabox wysiwug
        /**@var \Bok\Controller\Metabox_Wysiwyg $metaboxEditor */
        \Bok\Controller\Metabox_Wysiwyg::getInstance('restaurant_evening_menu', 'Abend',['restaurant']);

        //init metabox wysiwug
        /**@var \Bok\Controller\Metabox_Wysiwyg $metaboxEditor */
        \Bok\Controller\Metabox_Wysiwyg::getInstance('restaurant_description', 'Beschreibung',['restaurant']);
    }

    public function initScripts() {
        add_action('wp_enqueue_scripts', array($this, 'customRestaurantScripts'));
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
    public function create() {
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
            'rewrite' => array('slug' => $this->name),
            'capability_type' => 'post',
            'has_archive' => false,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
            'menu_icon' => 'dashicons-admin-multisite'
        );

        register_post_type($this->name, $args);
        flush_rewrite_rules();
    }
}