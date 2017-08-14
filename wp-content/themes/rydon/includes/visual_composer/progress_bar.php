<?php
/*
 * Visual Composer - Progress Bar
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */

// Progress Bar
add_shortcode( 'vc_rydon_progress_bar', 'vc_rydon_progress_bar_shortcode' );
function vc_rydon_progress_bar_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'title'          => '',
        'id'             => 'progress_bar',
        'columns_count'  => '4',
	), $atts, 'vc_rydon_progress_bar' );

	ob_start();
	?>

	<div class="col-md-<?php echo esc_attr( $atts['columns_count'] ); ?>" id="<?php echo esc_attr( $atts['id'] ); ?>">
        <h4><?php echo esc_html( $atts['title'] ); ?></h4>
		<?php echo do_shortcode( $content ) ?>
	</div>

	<?php
	return ob_get_clean();
}

// Progress Bar Item
add_shortcode( 'vc_rydon_progress_bar_item', 'vc_rydon_progress_bar_item_shortcode' );
function vc_rydon_progress_bar_item_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'title' => '',
		'value' => '',
	), $atts, 'vc_rydon_progress_bar_item' );

	ob_start();
	?>

	<div class="progress-bar-block">
		<label><?php echo esc_html( $atts['title'] ); ?></label>

		<div class="value"><?php echo esc_html( $atts['value'] ); ?>%</div>
		<div class="progress">
			<div class="progress-bar animate" role="progressbar" aria-valuenow="<?php echo (int) $atts['value'] ?>"
			     aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (int) $atts['value'] ?>%;">
			</div>
		</div>
	</div>

	<?php
	return ob_get_clean();
}

// Progress Bar
vc_map( array(
	'icon'                    => 'icon-wpb-graph',
	'name'                    => __( 'Rydon Progress Bar', 'rydon' ),
	"base"                    => "vc_rydon_progress_bar",
	"as_parent"               => array( 'only' => 'vc_rydon_progress_bar_item' ),
	"content_element"         => true,
	"category"                => __( 'Rydon Elements' ),
	"params"                  => array(
		array(
			'type'       => 'textfield',
			'param_name' => 'title',
			'heading'    => __( 'Title', 'rydon' )
		),
        array(
			'type'       => 'textfield',
			'param_name' => 'id',
			'heading'    => __( 'ID', 'rydon' ),
			'value'      => 'progress_bar'
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
	"js_view"                 => 'VcColumnView'
) );

// Progress Bar Item
vc_map( array(
	'icon'            => 'icon-wpb-graph',
	'name'            => __( 'Rydon Progress Bar Item', 'rydon' ),
    "as_child"        => array( 'only' => 'vc_rydon_progress_bar' ),
	"base"            => "vc_rydon_progress_bar_item",
	"content_element" => true,
	"category"        => __( 'Rydon Elements' ),
	"params"          => array(
		array(
			'type'       => 'textfield',
			'param_name' => 'title',
			'heading'    => __( 'Title', 'rydon' )
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'value',
			'heading'    => __( 'Value %', 'rydon' )
		),
	)
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Vc_Rydon_Progress_Bar extends WPBakeryShortCodesContainer {
	}
}