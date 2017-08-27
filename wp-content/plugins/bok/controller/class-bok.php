<?php
/**
 * Created by PhpStorm.
 * User: khanhdeux
 * Date: 27.08.17
 * Time: 00:21
 */

namespace Bok\Controller;


class Bok extends Base {

    protected $overrideTemplates = array('template-home.php');

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
        //init template
        add_action( 'plugins_loaded', array( 'Bok\\Template', 'init' ));
        // init scripts
        add_action('after_setup_theme', array($this, 'init'));
        // Override templates
        add_filter('page_template',  array($this, 'overrideTemplates'));
        // Init restaurant post type
        \Bok\Controller\Restaurant::getInstance();
        // Init news post type
        \Bok\Controller\News::getInstance();
    }

    /**
     * Returns an instance of this class.
     */
    public function init() {
        add_action('wp_enqueue_scripts', array($this, 'initScripts'));
    }

    /**
     * Custom Tiny Responsive Lightbox Gallery Plugin For jQuery - Viewbox
     */
    public function initScripts() {
        wp_enqueue_script('bootstrapJS', plugins_url( BOK__PLUGIN_NAME . '/js/bootstrap.min.js'), array('jquery'));
        wp_dequeue_script('jquery-ui');
        wp_enqueue_script('jquery-bok-ui', plugins_url( BOK__PLUGIN_NAME . '/js/jquery-ui.js'), array('jquery'));
        wp_enqueue_script('bokInit', plugins_url( BOK__PLUGIN_NAME . '/js/bok.init.js'), array('jquery'), false, true);
        wp_enqueue_style( 'bootstrapCSS', plugins_url( BOK__PLUGIN_NAME . '/css/bootstrap.min.css'));
        wp_enqueue_style( 'jquery-uiCSS', plugins_url( BOK__PLUGIN_NAME . '/css/jquery-ui.css'));
        wp_enqueue_style( 'main', plugins_url( BOK__PLUGIN_NAME . '/css/main.css'));
    }

    /**
     * Overrides template
     *
     * @param $path
     * @param string $file
     * @return string
     */
    public function overrideTemplates($page_template) {
        $id = substr($page_template, strrpos($page_template, '/') + 1);

        if (in_array($id, $this->overrideTemplates)) {
            $page_template = BOK__PLUGIN_DIR . 'templates/' . $id;
        }

        return $page_template;
    }
}