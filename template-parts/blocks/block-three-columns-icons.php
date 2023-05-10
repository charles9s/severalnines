<?php

$class_name = 'three-columns-block';
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
							'level'   => 3,
							'content' => 'Ut bibendum',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel nulla ac metus mattis pretium. Donec ultrices nibh velit, accumsan eleifend enim feugiat et. Aliquam tristique tortor vitae feugiat tincidunt. Sed tempus augue eros, vel feugiat lacus suscipit et. Donec eget posuere turpis',
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
							'level'   => 3,
							'content' => 'Mauris vel ornare metus',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel nulla ac metus mattis pretium. Donec ultrices nibh velit, accumsan eleifend enim feugiat et. Aliquam tristique tortor vitae feugiat tincidunt. Sed tempus augue eros, vel feugiat lacus suscipit et. Donec eget posuere turpis',
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
							'level'   => 3,
							'content' => 'Interdum et malesuada',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel nulla ac metus mattis pretium. Donec ultrices nibh velit, accumsan eleifend enim feugiat et. Aliquam tristique tortor vitae feugiat tincidunt. Sed tempus augue eros, vel feugiat lacus suscipit et. Donec eget posuere turpis',
						),
					),
				),
			),
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph', 'acf/button', 'core/columns', 'core/column', 'acf/icon-picker', 'core/group' );
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
