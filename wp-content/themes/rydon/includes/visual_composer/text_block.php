<?php
/*
 * Visual Composer - Text Block
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */

add_shortcode( 'vc_rydon_text_block', 'vc_rydon_text_block_shortcode' );
function vc_rydon_text_block_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'title'          => '',
		'columns_count'  => '4',
	), $atts, 'vc_rydon_text_block' );

	ob_start();
	?>

	<div class="col-md-<?php echo esc_attr( $atts['columns_count'] ); ?>">
        <h4><?php echo esc_html( $atts['title'] ); ?></h4>
		<p><?php echo do_shortcode( $content ) ?></p>
	</div>

	<?php
	return ob_get_clean();
}

vc_map( array(
	'icon'            => 'icon-wpb-layer-shape-text',
	'name'            => __( 'Rydon Text Block', 'rydon' ),
	"base"            => "vc_rydon_text_block",
	"content_element" => true,
	"category"        => __( 'Rydon Elements' ),
	"params"          => array(
		array(
			'type'       => 'textfield',
			'param_name' => 'title',
			'heading'    => __( 'Title', 'rydon' )
		),
		array(
			'type'       => 'textarea_html',
			'param_name' => 'content'
		),
        array(
			'type'       => 'dropdown',
			'param_name' => 'columns_count',
			'heading'    => __( 'Columns count', 'rydon' ),
			'value'      => array(
                __( 'Column 1', 'rydon' ) => 12,
                __( 'Column 2', 'rydon' ) => 6,
				__( 'Column 3', 'rydon' ) => 4,
				__( 'Column 4', 'rydon' ) => 3,
			),
		),
	),
) );