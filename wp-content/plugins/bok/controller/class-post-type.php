<?php
namespace Bok\Controller;
/**
 * Class Bok_Restaurant
 */
class Post_Type extends Base {

    protected $name;

    public static function getInstance() {

    }

    /**
     * Initializes the plugin by setting filters and administration functions.
     */
    protected function __construct() {
        /* Create custom post type*/
        add_action('init', array($this, 'create'));
        /* Filter the single_template with our custom function*/
        add_filter('single_template',  array($this, 'registerTemplate'));
    }

    /**
     * Create custom post type
     */
    public function create() {}

    /**
     * Init single restaurant template
     *
     * @param $single
     * @return string
     */
    public function registerTemplate($single) {
        global $post;

        /* Checks for single template by post type */
        if ( $post->post_type == $this->name ) {
            $templateFile = 'single-' . $this->name . '.php';
            if ( file_exists( BOK__PLUGIN_DIR . 'templates/' . $templateFile ) ) {
                return BOK__PLUGIN_DIR . 'templates/' . $templateFile;
            }
        }

        return $single;
    }
}