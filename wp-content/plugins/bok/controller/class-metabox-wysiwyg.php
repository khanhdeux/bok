<?php
namespace Bok\Controller;
/**
 * Class Metabox_Slider
 */
class Metabox_Wysiwyg extends Metabox_Base {

    protected $metaboxKey = '';

    protected $editorID = '';

    /**
     * Initializes
     *
     */
    protected function __construct() {
        call_user_func_array(array('parent', '__construct'), func_get_args());
        $this->metaboxKey =  'custom_wysiwyg_metabox_' .  strtolower($this->id);
        $this->editorID =  'custom_wysiwyg_editor_' .  strtolower($this->id);

        add_action('admin_init', array($this, 'wysiwyg_register_meta_box'));
        add_action('save_post', array($this, 'wysiwyg_save_meta'));
    }

    public static function getInstance() {
        $class = get_called_class();
        return new $class(func_get_args());
    }

    public function wysiwyg_register_meta_box(){
        $post_types = $this->getPostTypes();
        foreach ($post_types as $pt) {
            add_meta_box($this->metaboxKey, $this->name, array($this, 'wysiwyg_render_meta_box'), $pt);
        }
    }

    public function wysiwyg_render_meta_box(){
        global $post;

        $meta_box_id = $this->metaboxKey;
        $editor_id = $this->editorID;

        //Add CSS & jQuery goodness to make this work like the original WYSIWYG
        echo "
                <style type='text/css'>
                        #$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
                        #$editor_id{width:100%;}
                        #$meta_box_id #editorcontainer{background:#fff !important;}
                        #$meta_box_id #{$editor_id}_fullscreen{display:none;}
                </style>

                <script type='text/javascript'>
                        jQuery(function($){
                                $('#$meta_box_id #editor-toolbar > a').click(function(){
                                        $('#$meta_box_id #editor-toolbar > a').removeClass('active');
                                        $(this).addClass('active');
                                });

                                if($('#$meta_box_id #edButtonPreview').hasClass('active')){
                                        $('#$meta_box_id #ed_toolbar').hide();
                                }

                                $('#$meta_box_id #edButtonPreview').click(function(){
                                        $('#$meta_box_id #ed_toolbar').hide();
                                });

                                $('#$meta_box_id #edButtonHTML').click(function(){
                                        $('#$meta_box_id #ed_toolbar').show();
                                });

				//Tell the uploader to insert content into the correct WYSIWYG editor
				jQuery('#media-buttons a').bind('click', function(){
					var customEditor = $(this).parents('#$meta_box_id');
					if(customEditor.length > 0){
						edCanvas = document.getElementById('$meta_box_id');
					}
					else{
						edCanvas = document.getElementById('content');
					}
				});
                        });
                </script>
        ";

        //Create The Editor
        $content = get_post_meta($post->ID, $this->id, true);
        wp_editor($content, $editor_id);

        //Clear The Room!
        echo "<div style='clear:both; display:block;'></div>";
    }

    public function wysiwyg_save_meta(){
        if(isset($_REQUEST[$this->editorID]))
            update_post_meta($_REQUEST['post_ID'], $this->id, $_REQUEST[$this->editorID]);
    }
}