<?php
namespace Bok\Controller;
/**
 * Class Metabox_Slider
 */
class Metabox_Slider extends Base {

    protected static $instance;

    protected static $postTypes = array();

    protected static $name = 'Images';

    protected static $numOfImage = 6;

    public static function getInstance() {
        $class = get_called_class();

        if (!self::$instance[$class]) {
            self::$instance[$class] = new self;
        }

        return self::$instance[$class];
    }

    /**
     * Returns an instance of this class.
     */
    public static function init() {
        add_action('add_meta_boxes', array(__CLASS__, 'custom_postimage_meta_box'));
        add_action('save_post', array(__CLASS__, 'custom_postimage_meta_box_save'));
        add_action('wp_enqueue_scripts', array(__CLASS__, 'custom_slider_scripts'));
    }

    /**
     * Initializes the plugin by setting filters and administration functions.
     */
    private function __construct() {
        add_action('after_setup_theme', array(__CLASS__, 'init'));
    }

    /**
     * Custom Tiny Responsive Lightbox Gallery Plugin For jQuery - Viewbox
     */
    public function custom_slider_scripts() {
        wp_enqueue_script('viewbox', plugins_url( BOK__PLUGIN_NAME . '/js/jquery.viewbox.js'), array('jquery'));
        wp_enqueue_style( 'viewbox-theme', plugins_url( BOK__PLUGIN_NAME . '/css/viewbox.css'));
    }

    /**
     * On which post types should the box appear?
     */
    public function custom_postimage_meta_box() {
        $post_types = self::$postTypes;
        foreach ($post_types as $pt) {
            add_meta_box('custom_postimage_meta_box', self::$name, array(__CLASS__, 'custom_postimage_meta_box_func'), $pt, 'side', 'low');
        }
    }

    /**
     * Metabox init
     *
     * @param $post
     */
    function custom_postimage_meta_box_func($post) {
        //an array with all the images (ba meta key). The same array has to be in custom_postimage_meta_box_save($post_id) as well.
        $meta_keys = self::getMetaKeys();

        foreach ($meta_keys as $meta_key) {
            $image_meta_val = get_post_meta($post->ID, $meta_key, true);
            ?>
            <div class="custom_postimage_wrapper" id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
                <div style="width:33%;float:left">
                    <a style="float:left" class="addimage button"
                       onclick="custom_postimage_add_image('<?php echo $meta_key; ?>');"><?php _e('Select image', 'bok'); ?></a>
                </div>
                <div style="width:33%;float:left">
                    <img src="<?php echo($image_meta_val != '' ? wp_get_attachment_image_src($image_meta_val)[0] : ''); ?>"
                         style="width:150px;height:150px;display: <?php echo($image_meta_val != '' ? 'block' : 'none'); ?>" alt="">
                </div>
                <div style="width:33%;float:left">
                    <a class="removeimage"
                       style="float:left;color:#a00;cursor:pointer;display: <?php echo($image_meta_val != '' ? 'block' : 'none'); ?>"
                       onclick="custom_postimage_remove_image('<?php echo $meta_key; ?>');"><?php _e('Remove image', 'bok'); ?></a>
                </div>
                <div style="clear:both"></div>
                <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>"
                       value="<?php echo $image_meta_val; ?>"/>
            </div>
        <?php } ?>
        <script>
            function custom_postimage_add_image(key) {

                var $wrapper = jQuery('#' + key + '_wrapper');

                custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
                    title: '<?php _e('select image','bok'); ?>',
                    button: {
                        text: '<?php _e('select image','bok'); ?>'
                    },
                    multiple: false
                });
                custom_postimage_uploader.on('select', function () {

                    var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
                    var img_url = attachment['url'];
                    var img_id = attachment['id'];
                    $wrapper.find('input#' + key).val(img_id);
                    $wrapper.find('img').attr('src', img_url);
                    $wrapper.find('img').show();
                    $wrapper.find('a.removeimage').show();
                });
                custom_postimage_uploader.on('open', function () {
                    var selection = custom_postimage_uploader.state().get('selection');
                    var selected = $wrapper.find('input#' + key).val();
                    if (selected) {
                        selection.add(wp.media.attachment(selected));
                    }
                });
                custom_postimage_uploader.open();
                return false;
            }

            function custom_postimage_remove_image(key) {
                var $wrapper = jQuery('#' + key + '_wrapper');
                $wrapper.find('input#' + key).val('');
                $wrapper.find('img').hide();
                $wrapper.find('a.removeimage').hide();
                return false;
            }
        </script>
        <?php
        wp_nonce_field('custom_postimage_meta_box', 'custom_postimage_meta_box_nonce');
    }

    function custom_postimage_meta_box_save($post_id) {

        if (!current_user_can('edit_posts', $post_id)) {
            return 'not permitted';
        }

        if (isset($_POST['custom_postimage_meta_box_nonce']) && wp_verify_nonce($_POST['custom_postimage_meta_box_nonce'], 'custom_postimage_meta_box')) {

            //same array as in custom_postimage_meta_box_func($post)
            $meta_keys = self::getMetaKeys();
            foreach ($meta_keys as $meta_key) {
                if (isset($_POST[$meta_key]) && intval($_POST[$meta_key]) != '') {
                    update_post_meta($post_id, $meta_key, intval($_POST[$meta_key]));
                } else {
                    update_post_meta($post_id, $meta_key, '');
                }
            }

            update_post_meta($post_id, 'slider_image_count', intval(count(self::getMetaKeys())));
        }
    }

    public function getMetaKeys() {
        $meta_keys = array();

        for($i = 0; $i < self::$numOfImage; $i++) {
            $meta_keys[] = 'slider_image_' . $i;
        }

        return $meta_keys;
    }

    public function setPostTypes($postTypes) {
        self::$postTypes = $postTypes;
    }

    public function getPostTypes() {
        return self::$postTypes;
    }

    public function setName($name) {
        self::$name = $name;
    }

    public function getName() {
        return self::$name;
    }
}