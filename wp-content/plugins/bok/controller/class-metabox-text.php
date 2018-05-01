<?php
namespace Bok\Controller;
/**
 * Class Metabox_Text
 */
class Metabox_Text extends Metabox_Base {

    public static function getInstance() {
        $class = get_called_class();
        return new $class(func_get_args());
    }

    /**
     * Initializes the plugin by setting filters and administration functions.
     */
    protected function __construct() {
        call_user_func_array(array('parent', '__construct'), func_get_args());
        add_action('after_setup_theme', array($this, 'init'));
    }

    /**
     * Returns an instance of this class.
     */
    public function init() {
        add_action('add_meta_boxes', array($this, 'custom_text_meta_box'));
        add_action('save_post', array($this, 'custom_text_meta_box_save'));
    }

    /**
     * Add metabox
     */
    public function custom_text_meta_box() {
        $post_types = $this->getPostTypes();
        foreach ($post_types as $pt) {
            add_meta_box($this->id, $this->name, array($this, 'custom_text_meta_box_func'), $pt, 'side', 'low');
        }
    }

    /**
     * Display metabox
     */
    public function custom_text_meta_box_func()
    {
        global $post;

        $values = get_post_custom( $post->ID );
        $text = isset( $values[$this->id] ) ? esc_attr( $values[$this->id][0] ) : "";

        // We'll use this nonce field later on when saving.
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
        <p>
            <label for="<?php echo $this->id; ?>"><?php echo $this->name; ?></label>
            <input type="text" name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>" value="<?php echo $text; ?>" />
        </p>
    <?php
    }

    public function custom_text_meta_box_save($post_id){
        // Bail if we're doing an auto save
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

        // if our nonce isn't there, or we can't verify it, bail
        if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

        // if our current user can't edit this post, bail
        if( !current_user_can( 'edit_post' ) ) return;

        // now we can actually save the data
        $allowed = array(
            'a' => array( // on allow a tags
                'href' => array() // and those anchors can only have href attribute
            )
        );

        // Make sure your data is set before trying to save it
        if( isset( $_POST[$this->id] ) )
            update_post_meta( $post_id, $this->id, wp_kses( $_POST[$this->id], $allowed ) );
    }
}