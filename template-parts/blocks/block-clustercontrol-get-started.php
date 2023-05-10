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
							'content' => 'ClusterControl',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => 'Vivamus imperdiet neque non tincidunt luctus. Donec malesuada blandit felis',
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
							'content'   => 'Donec malesuada blandit felis',
						),
					),
					array('core/html',
						array(
							'content'   => 'Donec malesuada blandit felis',
						),
					),
				),
			),
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph');
?>

<section class="clustercontrol <?php echo $class_name; ?>" id="clustercontrol">
	<div class="background">
		<div class="container">
			<?php
			echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
			?>
		</div>
	</div>
</section>
