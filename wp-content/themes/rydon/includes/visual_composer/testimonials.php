<?php
/*
 * Visual Composer - Testimonials
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */

// Testimonials
add_shortcode( 'vc_rydon_testimonials', 'vc_rydon_testimonials_shortcode' );
function vc_rydon_testimonials_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'title'   => '',
	), $atts, 'vc_rydon_testimonials' );
    
    $rnd = rand( 1, 999 );

	ob_start();
	?>

	<div id="carousel-testimonials-<?php echo (int) $rnd; ?>" class="carousel-testimonials carousel slide" data-ride="carousel">
        
        <!-- Wrapper for slides -->
		<div class="carousel-inner text-center testimonials">
            <?php echo do_shortcode( $content ) ?>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-testimonials-<?php echo (int) $rnd; ?>" data-slide="prev">
			<span></span>
		</a>
		<a class="right carousel-control" href="#carousel-testimonials-<?php echo (int) $rnd; ?>" data-slide="next">
			<span></span>
		</a>

	</div>

	<?php
	return ob_get_clean();
}

// Testimonials Item
add_shortcode( 'vc_rydon_testimonials_item', 'vc_rydon_testimonials_item_shortcode' );
function vc_rydon_testimonials_item_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'title'     => '',
        'author'    => '',
        'citation'  => '',
		'opened'    => 'no',
	), $atts, 'vc_rydon_testimonials_item' );

	ob_start();
	?>

	<div class="item testimonial <?php echo ( $atts['opened'] == 'yes' ) ? 'active' : '' ?>">
        <p class="citation"><?php echo do_shortcode( $content ) ?></p>
        <p class="author"><?php echo esc_html( $atts['author'] ); ?></p>
	</div>

	<?php
	return ob_get_clean();
}

// Testimonials
vc_map( array(
	'icon'                    => 'icon-wpb-ui-pageable',
	'name'                    => __( 'Rydon Testimonials', 'rydon' ),
	"base"                    => "vc_rydon_testimonials",
    "show_settings_on_create" => false,
	"as_parent"               => array( 'only' => 'vc_rydon_testimonials_item' ),
	"content_element"         => true,
	"category"                => __( 'Rydon Elements' ),
	"params"                  => array(
		array(
			'type'       => 'textfield',
			'param_name' => 'title',
			'heading'    => __( 'Title', 'rydon' )
		),
	),
	"js_view"            => 'VcColumnView'
) );

// Testimonials Item
vc_map( array(
	'icon'                    => 'icon-wpb-ui-pageable',
	'name'                    => __( 'Rydon Testimonials Item', 'rydon' ),
	"base"                    => "vc_rydon_testimonials_item",
	"as_child"                => array( 'only' => 'vc_rydon_testimonials' ),
	"content_element"         => true,
	"is_container"            => true,
	"category"                => __( 'Rydon Elements' ),
	"params"                  => array(
		array(
			'type'       => 'textfield',
			'param_name' => 'author',
			'heading'    => __( 'Author', 'rydon' )
		),
		array(
			'type'       => 'dropdown',
			'param_name' => 'opened',
			'heading'    => __( 'Opened on start', 'rydon' ),
			'value'      => array(
				__( 'No', 'rydon' )  => 'no',
				__( 'Yes', 'rydon' ) => 'yes',
			)
		),
        array(
			'type'       => 'textarea',
			'param_name' => 'content',
			'heading'    => __( 'Citation', 'rydon' )
		),
	),
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Vc_Rydon_Testimonials extends WPBakeryShortCodesContainer {
	}
}