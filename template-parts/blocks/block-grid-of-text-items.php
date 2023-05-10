<?php

$class_name = 'grid-of-text-items-block';
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
						'core/image',
						array(
							'url' => 'https://via.placeholder.com/400x315',
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
							'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel nulla ac metus mattis pretium. Donec ultrices nibh velit, accumsan eleifend enim feugiat et. Aliquam tristique tortor vitae feugiat tincidunt. Sed tempus augue eros, vel feugiat lacus suscipit et. Donec eget posuere turpis',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => '<a href="#">Learn More</a>',
						),
					),
				),
			),
			array(
				'core/column',
				array(),
				array(
					array(
						'core/image',
						array(
							'url' => 'https://via.placeholder.com/400x315',
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
							'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel nulla ac metus mattis pretium. Donec ultrices nibh velit, accumsan eleifend enim feugiat et. Aliquam tristique tortor vitae feugiat tincidunt. Sed tempus augue eros, vel feugiat lacus suscipit et. Donec eget posuere turpis',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => '<a href="#">Learn More</a>',
						),
					),
				),
			),
			array(
				'core/column',
				array(),
				array(
					array(
						'core/image',
						array(
							'url' => 'https://via.placeholder.com/400x315',
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
							'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel nulla ac metus mattis pretium. Donec ultrices nibh velit, accumsan eleifend enim feugiat et. Aliquam tristique tortor vitae feugiat tincidunt. Sed tempus augue eros, vel feugiat lacus suscipit et. Donec eget posuere turpis',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => '<a href="#">Learn More</a>',
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
						'core/image',
						array(
							'url' => 'https://via.placeholder.com/400x315',
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
							'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel nulla ac metus mattis pretium. Donec ultrices nibh velit, accumsan eleifend enim feugiat et. Aliquam tristique tortor vitae feugiat tincidunt. Sed tempus augue eros, vel feugiat lacus suscipit et. Donec eget posuere turpis',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => '<a href="#">Learn More</a>',
						),
					),
				),
			),
			array(
				'core/column',
				array(),
				array(
					array(
						'core/image',
						array(
							'url' => 'https://via.placeholder.com/400x315',
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
							'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel nulla ac metus mattis pretium. Donec ultrices nibh velit, accumsan eleifend enim feugiat et. Aliquam tristique tortor vitae feugiat tincidunt. Sed tempus augue eros, vel feugiat lacus suscipit et. Donec eget posuere turpis',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => '<a href="#">Learn More</a>',
						),
					),
				),
			),
			array(
				'core/column',
				array(),
				array(
					array(
						'core/image',
						array(
							'url' => 'https://via.placeholder.com/400x315',
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
							'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel nulla ac metus mattis pretium. Donec ultrices nibh velit, accumsan eleifend enim feugiat et. Aliquam tristique tortor vitae feugiat tincidunt. Sed tempus augue eros, vel feugiat lacus suscipit et. Donec eget posuere turpis',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => '<a href="#">Learn More</a>',
						),
					),
				),
			),
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph', 'core/columns', 'core/column', 'core/group' );
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
