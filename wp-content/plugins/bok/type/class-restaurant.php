<?php

namespace Bok\Type;
/**
 * Class Bok_Restaurant
 */
class Restaurant {

    const POST_TYPE = 'restaurant';

    /**
     * A reference to an instance of this class.
     */
    private static $instance;

    /**
     * Returns an instance of this class.
     */
    public static function init() {

        if ( null == self::$instance ) {
            self::$instance = new Restaurant();
        }

        return self::$instance;
    }

    /**
     * Initializes the plugin by setting filters and administration functions.
     */
    private function __construct() {
        $this->createPostType();
        //$this->initSlider();
    }

    public function createPostType() {
        $labels = array(
            'name'               => _x( 'Restaurants', 'post type general name', 'bok' ),
            'singular_name'      => _x( 'Restaurant', 'post type singular name', 'bok' ),
            'menu_name'          => _x( 'Restaurants', 'admin menu', 'bok' ),
            'name_admin_bar'     => _x( 'Restaurant', 'add new on admin bar', 'bok' ),
            'add_new'            => _x( 'Add New', 'restaurant', 'bok' ),
            'add_new_item'       => __( 'Add New Restaurant', 'bok' ),
            'new_item'           => __( 'New Restaurant', 'bok' ),
            'edit_item'          => __( 'Edit Restaurant', 'bok' ),
            'view_item'          => __( 'View Restaurant', 'bok' ),
            'all_items'          => __( 'All Restaurants', 'bok' ),
            'search_items'       => __( 'Search Restaurants', 'bok' ),
            'parent_item_colon'  => __( 'Parent Restaurants:', 'bok' ),
            'not_found'          => __( 'No Restaurants found.', 'bok' ),
            'not_found_in_trash' => __( 'No Restaurants found in Trash.', 'bok' )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Restaurants for our site.', 'bok' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'restaurant' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' , 'custom-fields'),
            'menu_icon'          => 'dashicons-admin-multisite'
        );

        register_post_type( self::POST_TYPE, $args );
        flush_rewrite_rules();
    }

    public function initSlider() {
        //init the meta box
        add_action( 'after_setup_theme', array( 'Bok_Restaurant' , 'custom_postimage_setup'));
    }

    public function custom_postimage_setup(){
        var_dump('ABCDE');
        exit();
        add_action( 'add_meta_boxes', array( $this, 'custom_postimage_meta_box') );
        add_action( 'save_post', array( $this, 'custom_postimage_meta_box_save') );
    }

    public function custom_postimage_meta_box(){
        //on which post types should the box appear?
        $post_types = array(self::POST_TYPE);
        foreach($post_types as $pt){
            add_meta_box('custom_postimage_meta_box','Slider Images', array ($this, 'custom_postimage_meta_box_func'),$pt,'side','low');
        }
    }

    function custom_postimage_meta_box_func($post){

        //an array with all the images (ba meta key). The same array has to be in custom_postimage_meta_box_save($post_id) as well.
        $meta_keys = array('second_featured_image','third_featured_image');

        foreach($meta_keys as $meta_key){
            $image_meta_val=get_post_meta( $post->ID, $meta_key, true);
            ?>
            <div class="custom_postimage_wrapper" id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
                <img src="<?php echo ($image_meta_val!=''?wp_get_attachment_image_src( $image_meta_val)[0]:''); ?>" style="width:100%;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" alt="">
                <a class="addimage button" onclick="custom_postimage_add_image('<?php echo $meta_key; ?>');"><?php _e('add image','yourdomain'); ?></a><br>
                <a class="removeimage" style="color:#a00;cursor:pointer;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" onclick="custom_postimage_remove_image('<?php echo $meta_key; ?>');"><?php _e('remove image','yourdomain'); ?></a>
                <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>" value="<?php echo $image_meta_val; ?>" />
            </div>
        <?php } ?>
        <script>
            function custom_postimage_add_image(key){

                var $wrapper = jQuery('#'+key+'_wrapper');

                custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
                    title: '<?php _e('select image','yourdomain'); ?>',
                    button: {
                        text: '<?php _e('select image','yourdomain'); ?>'
                    },
                    multiple: false
                });
                custom_postimage_uploader.on('select', function() {

                    var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
                    var img_url = attachment['url'];
                    var img_id = attachment['id'];
                    $wrapper.find('input#'+key).val(img_id);
                    $wrapper.find('img').attr('src',img_url);
                    $wrapper.find('img').show();
                    $wrapper.find('a.removeimage').show();
                });
                custom_postimage_uploader.on('open', function(){
                    var selection = custom_postimage_uploader.state().get('selection');
                    var selected = $wrapper.find('input#'+key).val();
                    if(selected){
                        selection.add(wp.media.attachment(selected));
                    }
                });
                custom_postimage_uploader.open();
                return false;
            }

            function custom_postimage_remove_image(key){
                var $wrapper = jQuery('#'+key+'_wrapper');
                $wrapper.find('input#'+key).val('');
                $wrapper.find('img').hide();
                $wrapper.find('a.removeimage').hide();
                return false;
            }
        </script>
        <?php
        wp_nonce_field( 'custom_postimage_meta_box', 'custom_postimage_meta_box_nonce' );
    }

    function custom_postimage_meta_box_save($post_id){

        if ( ! current_user_can( 'edit_posts', $post_id ) ){ return 'not permitted'; }

        if (isset( $_POST['custom_postimage_meta_box_nonce'] ) && wp_verify_nonce($_POST['custom_postimage_meta_box_nonce'],'custom_postimage_meta_box' )){

            //same array as in custom_postimage_meta_box_func($post)
            $meta_keys = array('second_featured_image','third_featured_image');
            foreach($meta_keys as $meta_key){
                if(isset($_POST[$meta_key]) && intval($_POST[$meta_key])!=''){
                    update_post_meta( $post_id, $meta_key, intval($_POST[$meta_key]));
                }else{
                    update_post_meta( $post_id, $meta_key, '');
                }
            }
        }
    }
}