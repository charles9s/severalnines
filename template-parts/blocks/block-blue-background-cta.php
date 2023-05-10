<?php

/**
 * Blue background CTA Template.
 */

$class_name = 'blue-background-cta';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$reverse_shapes = get_field( 'reverse' );
$top_curves     = get_field( 'reverse' ) ? 'curved-corner-topleft' : 'curved-corner-topright';
$bottom_curves  = get_field( 'reverse' ) ? 'curved-corner-bottomright' : 'curved-corner-bottomleft';

$template = array(
	array(
		'core/heading',
		array(
			'level'     => 2,
			'content'   => '<span class="has-inline-color has-white-color">Proin sollicitudin mauris nec mauris venenatis interdum</span>',
			'textAlign' => 'center',
		),
	),
	array(
		'acf/button',
		array(
			'data'  => array(
				'link'  => array(
					'title'  => 'Lorem amet',
					'url'    => '#',
					'target' => '_self',
				),
				'color' => 'pink',
			),
			'align' => 'center',
		),
	),
);

$allowed_blocks = array( 'core/heading', 'acf/button', 'acf/icon-picker', 'core/paragraph' );

?>
<section class="<?php echo $class_name; ?>">
	<div class="background">
		<div class="<?php echo $top_curves; ?>"></div>
		<div class="container">
				<?php echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>'; ?>
		</div>
		<div class="<?php echo $bottom_curves; ?>"></div>
	</div>
</section>
