<?php
/*
 * Rydon functions and definitions
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */

// Add Redux Framework
require_once get_template_directory() . '/includes/redux/config.php';
global $rydon_option;

function removeDemoModeLink() {
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'removeDemoModeLink');


// Visual Composer support
if ( function_exists( 'vc_map' ) ) {
    require_once( 'includes/visual-composer.php' );
}
// Disable Visual Composer front end edition
if (function_exists('vc_disable_frontend')){
    vc_disable_frontend();
}
// Disable Visual Composer registraiton requirements
setcookie('vchideactivationmsg', '1', strtotime('+3 years'), '/');
setcookie('vchideactivationmsg_vc11', (defined('WPB_VC_VERSION') ? WPB_VC_VERSION : '1'), strtotime('+3 years'), '/');


// Required Plugins
require_once get_template_directory() . '/includes/tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'rydon_register_required_plugins' );

function rydon_register_required_plugins() {
    $plugins = array(
        array(
            'name'      => esc_html__( 'Redux Framework', 'rydon' ),
            'slug'      => 'redux-framework',
            'required'  => true,
        ),
        array(
            'name'      => 'Visual Composer',
            'slug'      => 'js_composer',
            'source'    => 'http://rydon.abdoweb.co/plugins/js_composer.zip',
            'required'  => true,
        ),
        array(
            'name'      => 'WordPress Importer',
            'slug'      => 'wordpress-importer',
            'required'  => false,
        ),
    );
    $config = array(
        'id'           => 'tgmpa',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '', 
        'is_automatic' => false,
        'message'      => '',
    );
    tgmpa( $plugins, $config );
}


// Enable support for Post Thumbnails on posts and pages.
add_theme_support( 'post-thumbnails' );


// Title Tag
add_theme_support('title-tag');


// Permalink Settings
add_action( 'init', function() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
} );


// This theme uses wp_nav_menu() Primary Menu.
register_nav_menus( array(
    'primary' => 'Primary Menu',
) );


// Post Formats
add_theme_support( 'post-formats', array( 'video','quote','aside' ) );


// Add Google Fonts
function rydon_add_google_fonts() {wp_enqueue_style( 'rydon-google-fonts', 'https://fonts.googleapis.com/css?family=Oxygen:400,300,700', false );}
add_action( 'wp_enqueue_scripts', 'rydon_add_google_fonts' );


// Translation
function rydon_setup(){
    load_theme_textdomain( 'rydon', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'rydon_setup' );


// StyleSheets
function rydon_enqueue_style() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
}
add_action( 'wp_enqueue_scripts', 'rydon_enqueue_style' );

if ( ! isset( $content_width ) ) $content_width = 900;

add_theme_support( 'automatic-feed-links' );

// Scripts
function rydon_enqueue_script() {
    wp_enqueue_script('jquery-rydon', get_template_directory_uri() . '/assets/js/jquery-rydon-2.1.4.custom.min.js');
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui-1.8.22.custom.min.js');
    wp_enqueue_script('masonry', get_template_directory_uri() . '/assets/js/jquery.masonry.min.js');
    wp_enqueue_script('googleapis', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC2M-gOhrUAy-PBfyBQNHEkDxCgtVzmkCQ');
    wp_enqueue_script('carousel', get_template_directory_uri() . '/assets/js/carousel.js');
    wp_enqueue_script('collapse', get_template_directory_uri() . '/assets/js/collapse.js');
    wp_enqueue_script('transition', get_template_directory_uri() . '/assets/js/transition.js');
    wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'rydon_enqueue_script' );


/// Add Inline Styles
function rydon_styles_method() {
    global $rydon_option;
    $customCSS = '';
    // Main Color
    if(isset($rydon_option['main-color']) && $rydon_option['main-color'] != '')
    {
        $customCSS .= ".mb-social a:hover, .services-item .sws-icon, .price-table:hover .price-header h3, .price-table.active .price-header h3, .btn-default, .btn-default:hover, .some-ff-block .smm-icon, .address-block:before, .phone-block:before, .email-block:before, .ft-single-post a:hover {color: {$rydon_option['main-color']};}
        .accordion-group a.accordion-header:hover, .progress-bar, .carousel-testimonials .carousel-indicators li.active {background-color: {$rydon_option['main-color']};}
        #nav a:hover { border-bottom: 1px solid {$rydon_option['main-color']};}
        .default-loading-icon:before { border-top-color: {$rydon_option['main-color']};}
        ";
    }
    // Link Color Regular
    if(isset($rydon_option['link-color']['regular']) && $rydon_option['link-color']['regular'] != '')
    {
        $customCSS .= "a, .single-post .sp-tags a, .single-post .sp-footer .social-block a { color: {$rydon_option['link-color']['regular']};}";
    }
    // Link Color Hover
    if(isset($rydon_option['link-color']['hover']) && $rydon_option['link-color']['hover'] != '')
    {
        $customCSS .= "a:hover, #nav-videochannel a:hover { color: {$rydon_option['link-color']['hover']};}";
    }
    wp_add_inline_style( 'style', $customCSS );
}
add_action( 'wp_enqueue_scripts', 'rydon_styles_method' );


// Post Options
function rydon_custom_meta() {
    add_meta_box( 'rydon_meta', esc_html__( 'Video Options', 'rydon' ), 'rydon_meta_callback', 'post', 'advanced','high' );
}
add_action( 'add_meta_boxes', 'rydon_custom_meta' );

function rydon_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'rydon_nonce' );
    $rydon_stored_meta = get_post_meta( $post->ID );
?>

<p>
    <big><?php esc_html_e( 'Self Hosted Video URL', 'rydon' )?></big>
    <input type="text" name="rydon_self_url" id="rydon_self_url" value="<?php if ( isset ( $rydon_stored_meta['rydon_self_url'] ) ) echo $rydon_stored_meta['rydon_self_url'][0]; ?>" /> <small><?php esc_html_e( 'Enter full URL to MP4 video. Example: http://www.w3schools.com/html/mov_bbb.mp4', 'rydon' )?></small>
</p>

<p>
    <big><?php esc_html_e( 'YouTube Video ID', 'rydon' )?></big>
    <input type="text" name="rydon_youtube_id" id="rydon_youtube_id" value="<?php if ( isset ( $rydon_stored_meta['rydon_youtube_id'] ) ) echo $rydon_stored_meta['rydon_youtube_id'][0]; ?>" /> <small><?php esc_html_e( 'Enter ID to YouTube video. Example: -QXmhpNRkfw', 'rydon' )?></small>
</p>

<p>
    <big><?php esc_html_e( 'Vimeo Video ID', 'rydon' )?></big>
    <input type="text" name="rydon_vimeo_id" id="rydon_vimeo_id" value="<?php if ( isset ( $rydon_stored_meta['rydon_vimeo_id'] ) ) echo $rydon_stored_meta['rydon_vimeo_id'][0]; ?>" /> <small><?php esc_html_e( 'Enter ID to Vimeo video. Example: 56351092', 'rydon' )?></small>
</p>

<p>
    <big><?php esc_html_e( 'Dailymotion Video ID', 'rydon' )?></big>
    <input type="text" name="rydon_dailymotion_id" id="dailymotionrydon_dailymotion_id" value="<?php if ( isset ( $rydon_stored_meta['rydon_dailymotion_id'] ) ) echo $rydon_stored_meta['rydon_dailymotion_id'][0]; ?>" />
    <small><?php esc_html_e( 'Enter ID to Dailymotion video. Example: x15z2w9', 'rydon' )?></small>
</p>

<?php
}

function rydon_meta_save( $post_id ) {

    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'rydon_nonce' ] ) && wp_verify_nonce( $_POST[ 'rydon_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    if( isset( $_POST[ 'rydon_self_url' ] ) ) {
        update_post_meta( $post_id, 'rydon_self_url', sanitize_text_field( $_POST[ 'rydon_self_url' ] ) );
    }
    if( isset( $_POST[ 'rydon_youtube_id' ] ) ) {
        update_post_meta( $post_id, 'rydon_youtube_id', sanitize_text_field( $_POST[ 'rydon_youtube_id' ] ) );
    }
    if( isset( $_POST[ 'rydon_vimeo_id' ] ) ) {
        update_post_meta( $post_id, 'rydon_vimeo_id', sanitize_text_field( $_POST[ 'rydon_vimeo_id' ] ) );
    }
    if( isset( $_POST[ 'rydon_dailymotion_id' ] ) ) {
        update_post_meta( $post_id, 'rydon_dailymotion_id', sanitize_text_field( $_POST[ 'rydon_dailymotion_id' ] ) );
    }

}
add_action( 'save_post', 'rydon_meta_save' );


// Sidebar Generator
function rydon_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Primary Sidebar', 'rydon' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Main sidebar that appears on the left.', 'rydon' ),
    ) );
}
add_action( 'widgets_init', 'rydon_widgets_init' );


// Rydon Comments
function rydon_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
<li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="cm-item">
        <?php endif; ?>
        <figure><?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $size='70' ); ?></figure>
        <div class="cm-body">
            <div class="cm-title-line">
                <span class="cm-title"><?php printf( esc_attr( '%s', 'rydon' ), get_comment_author() ); ?></span>
                <time><?php printf( esc_html__( '%1$s at %2$s', 'rydon' ), get_comment_date(), get_comment_time() ) ?></time>
                <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                <?php edit_comment_link(); ?>
            </div>
            <div class="cm-content">
                <?php comment_text(); ?>
            </div>
        </div>
        <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'rydon' ); ?></em>
        <br />

        <?php endif; ?>

        <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php } ?>