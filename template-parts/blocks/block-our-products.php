<?php

$class_name = 'our-products-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$reverse_shapes = get_field( 'reverse' );
$top_curves     = get_field( 'reverse' ) ? 'curved-corner-topright' : 'curved-corner-topleft';
//$top_curves     = get_field( 'reverse' ) ? 'curved-corner-topleft' : 'curved-corner-topright';
$bottom_curves  = get_field( 'reverse' ) ? 'curved-corner-bottomright' : 'curved-corner-bottomleft';

$template = array(
	array(
		'core/group',
		array(
			'className' => 'section-header',
		),
		array(
			array(
				'acf/icon-picker',
				array(
					'align' => 'center',
					'data'  => array(
						'icon' => 'ico-database-w',
					),
				),
			),
			array(
				'core/paragraph',
				array(
					'align'     => 'center',
					'content'   => '<span class="has-inline-color has-white-color">MINITITLE HERE</span>',
					'className' => 'mini-title',
				),
			),
			array(
				'core/heading',
				array(
					'textAlign' => 'center',
					'level'     => 2,
					'content'   => '<span class="has-inline-color has-white-color">Suspendisse vel nulla ac metus mattis pretium</span>',
				),
			),
			array(
				'core/paragraph',
				array(
					'content' => '<span class="has-inline-color has-white-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>',
					'align'   => 'center',
				),
			),
		),
	),
	array(
		'core/columns',
		array(),
		array(
			array(
				'core/column',
				array(),
				array(
					array(
						'acf/icon-picker',
						array(
							'align' => 'center',
							'data'  => array(
								'icon' => 'logo-clustercontrol',
							),
						),
					),
					array(
						'core/image',
						array(
							'url'   => 'https://via.placeholder.com/660x510',
							'align' => 'center',
						),
					),
					array(
						'core/heading',
						array(
							'level'     => 3,
							'content'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a egestas enim.',
							'textAlign' => 'center',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => 'vel feugiat lacus suscipit et. Donec eget posuere turpis',
							'align'   => 'center',
						),
					),
					array(
						'acf/button',
						array(
							'data' => array(
								'link'  => array(
									'title'  => 'Set your button here',
									'url'    => '#',
									'target' => '_self',
								),
								'type'  => 'standard',
								'color' => 'pink',
							),
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => '<a href="#">Lorem ipsum dolor</a>',
							'align'   => 'center',
						),
					),
				),
			),
			array(
				'core/column',
				array(),
				array(
					array(
						'acf/icon-picker',
						array(
							'align' => 'center',
							'data'  => array(
								'icon'  => 'logo-ccx',
								'align' => 'center',
							),
						),
					),
					array(
						'core/image',
						array(
							'url'   => 'https://via.placeholder.com/660x510',
							'align' => 'center',
						),
					),
					array(
						'core/heading',
						array(
							'level'     => 3,
							'content'   => 'Proin lectus ipsum, convallis ac diam non',
							'textAlign' => 'center',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
							'align'   => 'center',
						),
					),
					array(
						'acf/button',
						array(
							'data' => array(
								'link'  => array(
									'title'  => 'Set your button here',
									'url'    => '#',
									'target' => '_self',
								),
								'type'  => 'standard',
								'color' => 'pink',
							),
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => '<a href="#">Lorem ipsum dolor</a>',
							'align'   => 'center',
						),
					),
				),
			),
		),
	),
);

$allowed_blocks = array( 'acf/icon-picker', 'core/heading', 'core/paragraph', 'acf/button', 'core/image' );

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
