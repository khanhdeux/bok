<?php
/*
 * Visual Composer - Section
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */

add_shortcode( 'vc_rydon_section', 'vc_rydon_section_shortcode' );
function vc_rydon_section_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'id'                         => 'section-' . rand( 1, 999 ),
		'title'                      => '',
		'description'                => '',
		'padding_top'                => '',
		'padding_bottom'             => '',
		'background_color'           => '#ffffff',
		'background_image'           => '',
		'classes'                    => '',
	), $atts, 'vc_rydon_section' );
    
	if( is_numeric( $atts['background_image'] ) ) {
		$atts['background_image'] = wp_get_attachment_url( $atts['background_image'] );
	}

	ob_start();
	?>

	<div class="section <?php echo @$atts['classes'] ?>" <?php echo empty( $atts['id'] ) ? '' : 'id="' . $atts['id'] . '"' ?> style="<?php if ( $atts['padding_top'] != '' ) { echo 'padding-top: ' . $atts['padding_top'] . 'px;'; } ?><?php if ( $atts['padding_bottom'] != '' ) { echo 'padding-bottom: ' . $atts['padding_bottom'] . 'px;'; } ?><?php if ( ! empty( $atts['background_color'] ) ) { echo 'background-color: ' . $atts['background_color'] . ';'; } ?><?php if ( ! empty( $atts['background_image'] ) ) { echo ' background-image: url(\'' . $atts['background_image'] . '\');'; } ?>">
        <section>
            <div class="container">
                
                <?php if(!empty( $atts['title'] )) { ?>
                <div class="section-title">
                    <h2><?php echo @$atts['title'] ?></h2>
                    <p class="section-descr"><?php echo @$atts['description'] ?></p>
                </div>
                <?php } ?>
                
                <div class="row"> 
                <?php echo do_shortcode( $content ) ?>
                </div>
                
            </div>
        </section>
	</div> <!-- section -->

	<?php
	return ob_get_clean();
}

vc_map( array(
	'icon'            => '',
	'name'            => __( 'Rydon Section', 'rydon' ),
	"base"            => "vc_rydon_section",
	"content_element" => true,
	"is_container"    => true,
	"category"        => __( 'Rydon Elements' ),
	"params"          => array(
		array(
			'type'       => 'textfield',
			'param_name' => 'title',
			'heading'    => __( 'Title', 'rydon' )
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'description',
			'heading'    => __( 'Description', 'rydon' )
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'padding_top',
			'heading'    => __( 'Top Padding', 'rydon' )
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'padding_bottom',
			'heading'    => __( 'Bottom Padding', 'rydon' )
		),
		array(
			'type'       => 'colorpicker',
			'param_name' => 'background_color',
			'heading'    => __( 'Background color', 'rydon' )
		),
		array(
			'type'       => 'attach_image',
			'param_name' => 'background_image',
			'heading'    => __( 'Background image URL', 'rydon' )
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'id',
			'heading'    => __( 'Section ID', 'rydon' ),
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'classes',
			'heading'    => __( 'Additional section classes', 'rydon' ),
		),
	),
	"js_view"         => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Vc_Rydon_Section extends WPBakeryShortCodesContainer {
	}
}