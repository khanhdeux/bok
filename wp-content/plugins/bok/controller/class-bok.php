<?php
/**
 * Created by PhpStorm.
 * User: khanhdeux
 * Date: 27.08.17
 * Time: 00:21
 */

namespace Bok\Controller;


class Bok extends Base {

    protected static $instance;

    public static function getInstance() {
        $class = get_called_class();

        if (!self::$instance[$class]) {
            self::$instance[$class] = new self;
        }

        return self::$instance[$class];
    }
    /**
     * Constructors
     */
    private function __construct() {
        add_action('after_setup_theme', array(__CLASS__, 'init'));
    }

    /**
     * Returns an instance of this class.
     */
    public static function init() {
        add_action('wp_enqueue_scripts', array(__CLASS__, 'initScripts'));
    }

    /**
     * Custom Tiny Responsive Lightbox Gallery Plugin For jQuery - Viewbox
     */
    public function initScripts() {
        wp_enqueue_script('bootstrapJS', plugins_url( BOK__PLUGIN_NAME . '/js/bootstrap.min.js'), array('jquery'));
        wp_enqueue_style( 'bootstrapCSS', plugins_url( BOK__PLUGIN_NAME . '/css/bootstrap.min.css'));
    }
}