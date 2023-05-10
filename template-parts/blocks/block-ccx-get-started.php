<?php

$class_name = 'get-started-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$template = array(
	array(
		'core/columns',
		array(),
		array(
			array(
				'core/column',
				array(),
				array(
					array(
						'core/heading',
						array(
							'level'   => 3,
							'content' => 'CCX',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => 'Vivamus imperdiet neque non tincidunt luctus. Donec malesuada blandit felis, eu tristique neque maximus vel. Cras rutrum quis nulla at volutpat. Praesent sed malesuada arcu. Vestibulum tempus euismod quam, in tincidunt felis ornare eget. Etiam non sollicitudin mi, ac imperdiet nulla.',
						),
					),
					array(
						'core/list',
						array(
							'values' => '<li>Lorem ipsum dol</li><li>Lorem ipsum dol</li><li>Lorem ipsum dol</li>',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => '<a href="#">Lorem ipsum dolor</a>',
						),
					),
				),
			),
			array(
				'core/column',
				array(),
				array(
					array(
						'core/heading',
						array(
							'level'     => 3,
							'content'   => 'Ut bibendum',
						),
					),
				),
			),
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph', 'core/list', 'core/button', 'core/html');
?>

<section class="ccx <?php echo $class_name; ?>" id="ccx">
	<div class="background">
		<div class="container">
			<?php
			echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
			?>
		</div>
	</div>
</section>
