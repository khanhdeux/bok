<?php
/*
 * Visual Composer - Pricing Table
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */

add_shortcode( 'vc_rydon_pricing_table', 'vc_rydon_pricing_table_shortcode' );
function vc_rydon_pricing_table_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'title'          => '',
		'price'          => '',
		'link'           => '',
		'active'         => 'no',
		'show_button'    => 'yes',
		'button_text'    => __( 'Buy it now', 'mental' ),
		'items'          => '',
		'columns_count'  => '4',
	), $atts, 'vc_rydon_pricing_table' );

	$items = explode( ',', $atts['items'] );

	ob_start();
	?>

	<div class="col-md-<?php echo esc_attr( $atts['columns_count'] ); ?>">
		<div class="price-table <?php echo ( $atts['active'] == 'yes' ) ? 'active' : '' ?>">
			<header class="price-header">
				<h3><?php echo esc_html( $atts['price'] ); ?></h3>

				<p><?php echo esc_html( $atts['title'] ); ?></p>
			</header>
			<ul class="price-descr">
				<?php foreach ( $items as $item ): ?>
					<li><?php echo esc_html( $item ); ?></li>
				<?php endforeach ?>
			</ul>
			<?php if ( $atts['show_button'] == 'yes' ): ?>
				<footer class="price-footer">
					<a href="<?php echo esc_url( $atts['link'] ); ?>"
					   class="btn btn-default"><?php echo esc_html( $atts['button_text'] ); ?></a>
				</footer>
			<?php endif ?>
		</div>
	</div>

	<?php
	return ob_get_clean();
}

vc_map( array(
	'icon'            => 'icon-wpb-vc_carousel',
	'name'            => __( 'Rydon Pricing Table', 'mental' ),
	"base"            => "vc_rydon_pricing_table",
	"content_element" => true,
	"category"        => __( 'Rydon Elements' ),
	"params"          => array(
		array(
			'type'       => 'textfield',
			'param_name' => 'title',
			'heading'    => __( 'Title', 'mental' )
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'price',
			'heading'    => __( 'Price', 'mental' )
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'link',
			'heading'    => __( 'Link', 'mental' )
		),
		array(
			'type'       => 'dropdown',
			'param_name' => 'active',
			'heading'    => __( 'Active', 'mental' ),
			'value'      => array(
				__( 'No', 'mental' )  => 'no',
				__( 'Yes', 'mental' ) => 'yes',
			)
		),
		array(
			'type'       => 'dropdown',
			'param_name' => 'show_button',
			'heading'    => __( 'Show button', 'mental' ),
			'class'      => '',
			'value'      => array(
				__( 'Yes', 'mental' ) => 'yes',
				__( 'No', 'mental' )  => 'no',
			)
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'button_text',
			'value'      => __( 'Buy it now', 'mental' ),
			'heading'    => __( 'Button text', 'mental' )
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'items',
			'heading'    => __( 'Price Items (comma separated)', 'mental' )
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
	)
) );