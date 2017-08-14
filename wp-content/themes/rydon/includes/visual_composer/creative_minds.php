<?php
/*
 * Visual Composer - Creative Minds
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */

add_shortcode( 'vc_rydon_creative_minds', 'vc_rydon_creative_minds_shortcode' );
function vc_rydon_creative_minds_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'title'          => '',
		'description'    => '',
		'image'          => '',
        'columns_count'  => '4',
	), $atts, 'vc_rydon_creative_minds' );

	if ( is_numeric( $atts['image'] ) ) {
		if ( $img_data = wp_get_attachment_image_src( $atts['image'], 'large' ) ) {
			$atts['image'] = $img_data[0];
		}
	}

	ob_start();
	?>

	<div class="col-md-<?php echo esc_attr( $atts['columns_count'] ); ?>">
		<figure>
            <img src="<?php echo esc_url( $atts['image'] ); ?>" alt="">
		</figure>
        <figcaption>
            <h5><?php echo esc_html( $atts['title'] ); ?></h5>
            <p><?php echo esc_html( $atts['description'] ); ?></p>
        </figcaption>

	</div>

	<?php
	return ob_get_clean();
}

vc_map( array(
	'icon'            => 'vc_icon-vc-gitem-post-author',
	'name'            => __( 'Rydon Creative Minds', 'rydon' ),
	"base"            => "vc_rydon_creative_minds",
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
			'param_name' => 'description',
			'heading'    => __( 'Description', 'rydon' )
		),
		array(
			'type'       => 'attach_image',
			'param_name' => 'image',
			'heading'    => __( 'Image', 'rydon' )
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