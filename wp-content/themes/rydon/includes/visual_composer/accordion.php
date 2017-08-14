<?php
/*
 * Visual Composer - Accordion
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */

// Accordion
add_shortcode( 'vc_rydon_accordion', 'vc_rydon_accordion_shortcode' );
function vc_rydon_accordion_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'title'          => '',
        'id'             => 'accordion',
        'columns_count'  => '4',
	), $atts, 'vc_rydon_accordion' );

	ob_start();
	?>

	<div class="col-md-<?php echo esc_attr( $atts['columns_count'] ); ?>" id="<?php echo esc_attr( $atts['id'] ); ?>">
        <h4><?php echo esc_html( $atts['title'] ); ?></h4>
		<?php echo do_shortcode( $content ) ?>
	</div>

	<?php
	return ob_get_clean();
}

// Accordion Item
add_shortcode( 'vc_rydon_accordion_item', 'vc_rydon_accordion_item_shortcode' );
function vc_rydon_accordion_item_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'title'     => '',
		'parent_id' => 'accordion',
		'opened'    => 'no',
	), $atts, 'vc_rydon_accordion_item' );

	$collapse_id = 'collapse' . rand( 0, 9999 );

	ob_start();
	?>

	<div class="accordion-group panel">
		<a class="accordion-header" data-toggle="collapse" data-parent="#<?php echo esc_attr( $atts['parent_id'] ) ?>" href="#<?php echo esc_attr( $collapse_id ); ?>">
			<?php echo esc_html( $atts['title'] ); ?>
		</a>

		<div id="<?php echo esc_attr( $collapse_id ); ?>" class="collapse <?php echo ( $atts['opened'] == 'yes' ) ? 'in' : '' ?>">
			<div class="accordion-body">
				<?php echo wpautop( do_shortcode( $content ) ) ?>
			</div>
		</div>
	</div>

	<?php
	return ob_get_clean();
}

// Accordion
vc_map( array(
	'icon'                    => 'icon-wpb-ui-accordion',
	'name'                    => __( 'Rydon Accordion', 'rydon' ),
	"base"                    => "vc_rydon_accordion",
	"as_parent"               => array( 'only' => 'vc_rydon_accordion_item' ),
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
			'value'      => 'accordion'
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

// Accordion Item
vc_map( array(
	'icon'                    => 'icon-wpb-ui-accordion',
	'name'                    => __( 'Rydon Accordion Item', 'rydon' ),
	"base"                    => "vc_rydon_accordion_item",
	"as_child"                => array( 'only' => 'vc_rydon_accordion' ),
	"content_element"         => true,
	"is_container"            => true,
	"category"                => __( 'Rydon Elements' ),
	"params"                  => array(
		array(
			'type'       => 'textfield',
			'param_name' => 'title',
			'heading'    => __( 'Title', 'rydon' )
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'parent_id',
			'heading'    => __( 'Parent ID', 'rydon' ),
			'value'      => 'accordion'
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
			'type'       => 'textarea_html',
			'param_name' => 'content'
		)
	),
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Vc_Rydon_Accordion extends WPBakeryShortCodesContainer {
	}
}