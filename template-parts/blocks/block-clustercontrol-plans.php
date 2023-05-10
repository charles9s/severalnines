<?php

$class_name = 'clustercontrol-plans-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$template = array(
	array(
		'core/group',
		array(
			'className' => 'section-header',
		),
		array(
			array(
				'core/heading',
				array(
					'textAlign' => 'center',
					'level'     => 2,
					'content'   => 'Summary',
				),
			),
			array(
				'core/paragraph',
				array(
					'content' => 'Lorem ipsum dolor sit amet',
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
						'core/group',
						array(
							'className' => 'transparent',
						),
						array(
							array(
								'acf/icon-picker',
								array(
									'data' => array(
										'icon' => 'lozenge-solid',
									),
								),
							),
							array(
								'core/heading',
								array(
									'level'     => 3,
									'content'   => 'Ut bibendum',
									'textAlign' => 'center',
								),
							),
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => 'Lorem ipsum dolor sit amet',
						),
					),
					array(
						'core/list',
						array(
							'values' => '<li>Feature</li><li>Plan</li>',
						),
					),
					array(
						'core/paragraph',
						array(
							'content'   => '<span class="has-inline-color block has-grey-color">starts at</span><span class="bigger">$250</span>/month',
							'className' => 'prices',
						),
					),
					array(
						'acf/button',
						array(
							'data' => array(
								'link'  => array(
									'title'  => 'Lorem amet',
									'url'    => '#',
									'target' => '_self',
								),
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
						'core/group',
						array(
							'className' => 'pink',
						),
						array(
							array(
								'acf/icon-picker',
								array(
									'data' => array(
										'icon' => 'lozenge-cut',
									),
								),
							),
							array(
								'core/heading',
								array(
									'level'     => 3,
									'content'   => 'Ut bibendum',
									'textAlign' => 'center',
								),
							),
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => 'Lorem ipsum dolor sit amet',
						),
					),
					array(
						'core/list',
						array(
							'values' => '<li>Feature</li><li>Plan</li>',
						),
					),
					array(
						'core/paragraph',
						array(
							'content'   => '<span class="has-inline-color block has-grey-color">starts at</span><span class="bigger">$250</span>/month',
							'className' => 'prices',
						),
					),
					array(
						'acf/button',
						array(
							'data' => array(
								'link'  => array(
									'title'  => 'Lorem amet',
									'url'    => '#',
									'target' => '_self',
								),
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
						'core/group',
						array(
							'className' => 'transparent',
						),
						array(
							array(
								'acf/icon-picker',
								array(
									'data' => array(
										'icon' => 'lozenge-split',
									),
								),
							),
							array(
								'core/heading',
								array(
									'level'     => 3,
									'content'   => 'Ut bibendum',
									'textAlign' => 'center',
								),
							),
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => 'Lorem ipsum dolor sit amet',
						),
					),
					array(
						'core/list',
						array(
							'values' => '<li>Feature</li><li>Plan</li>',
						),
					),
					array(
						'core/paragraph',
						array(
							'content'   => '<span class="has-inline-color block has-grey-color">starts at</span><span class="bigger">$250</span>/month',
							'className' => 'prices',
						),
					),
					array(
						'acf/button',
						array(
							'data' => array(
								'link'  => array(
									'title'  => 'Lorem amet',
									'url'    => '#',
									'target' => '_self',
								),
								'color' => 'pink',
								'align' => 'center',
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

$allowed_blocks = array( 'core/heading', 'core/separator', 'core/paragraph', 'acf/button', 'core/columns', 'core/column', 'acf/icon-picker', 'core/group' );
?>

<section class="clustercontrol <?php echo $class_name; ?>" id="clustercontrol">
	<div class="background">
		<div class="shape"></div>
		<div class="curved-corner-topleft"></div>
		<div class="container">
			<?php
			echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
			?>
		</div>
		<div class="curved-corner-bottomright"></div>
	</div>
</section>
