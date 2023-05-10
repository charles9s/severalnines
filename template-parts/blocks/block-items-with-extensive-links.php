<?php

$class_name = 'items-with-extensive-links-block';
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
					'content'   => 'Suspendisse vel nulla ac metus mattis pretium',
				),
			),
			array(
				'core/paragraph',
				array(
					'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
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
							'data' => array(
								'icon' => 'confirmation-grey',
							),
						),
					),
					array(
						'core/heading',
						array(
							'level'   => 4,
							'content' => 'Mauris venenatis interdum',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => '<span class="has-inline-color has-grey-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel nulla ac metus mattis pretium. Donec ultrices nibh velit, accumsan eleifend enim feugiat et</span>',
						),
					),
					array(
						'core/separator',
					),
					array(
						'core/list',
						array(
							'values' => '<li><a href="#">List product features... 1</a></li>',
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
							'data' => array(
								'icon' => 'confirmation-grey',
							),
						),
					),
					array(
						'core/heading',
						array(
							'level'   => 4,
							'content' => 'Mauris venenatis interdum',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => '<span class="has-inline-color has-grey-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel nulla ac metus mattis pretium. Donec ultrices nibh velit, accumsan eleifend enim feugiat et</span>',
						),
					),
					array(
						'core/separator',
					),
					array(
						'core/list',
						array(
							'values' => '<li><a href="#">List product features... 1</a></li>',
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
							'data' => array(
								'icon' => 'confirmation-grey',
							),
						),
					),
					array(
						'core/heading',
						array(
							'level'   => 4,
							'content' => 'Interdum et malesuada',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => '<span class="has-inline-color has-grey-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel nulla ac metus mattis pretium. Donec ultrices nibh velit, accumsan eleifend enim feugiat et</span>',
						),
					),
					array(
						'core/separator',
					),
					array(
						'core/list',
						array(
							'values' => '<li><a href="#">List product features... 1</a></li>',
						),
					),
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
							'data' => array(
								'icon' => 'confirmation-grey',
							),
						),
					),
					array(
						'core/heading',
						array(
							'level'   => 4,
							'content' => 'Suspendisse vel nulla',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => '<span class="has-inline-color has-grey-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel nulla ac metus mattis pretium. Donec ultrices nibh velit, accumsan eleifend enim feugiat et</span>',
						),
					),
					array(
						'core/separator',
					),
					array(
						'core/list',
						array(
							'values' => '<li><a href="#">List product features... 1</a></li>',
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
							'data' => array(
								'icon' => 'confirmation-grey',
							),
						),
					),
					array(
						'core/heading',
						array(
							'level'   => 4,
							'content' => 'Mauris vel ornare metus',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => '<span class="has-inline-color has-grey-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel nulla ac metus mattis pretium. Donec ultrices nibh velit, accumsan eleifend enim feugiat et</span>',
						),
					),
					array(
						'core/separator',
					),
					array(
						'core/list',
						array(
							'values' => '<li><a href="#">List product features... 1</a></li>',
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
							'data' => array(
								'icon' => 'confirmation-grey',
							),
						),
					),
					array(
						'core/heading',
						array(
							'level'   => 4,
							'content' => 'Interdum et malesuada',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => '<span class="has-inline-color has-grey-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel nulla ac metus mattis pretium. Donec ultrices nibh velit, accumsan eleifend enim feugiat et</span>',
						),
					),
					array(
						'core/separator',
					),
					array(
						'core/list',
						array(
							'values' => '<li><a href="#">List product features... 1</a></li>',
						),
					),
				),
			),
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph', 'core/columns', 'core/column', 'acf/icon-picker', 'core/separator', 'core/list', 'core/group' );
?>

<section class="<?php echo $class_name; ?>">
	<div class="container">
		<div class="content">
			<?php
			echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
			?>
		</div>
	</div>
</section>
