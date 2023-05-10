<?php

$class_name = 'choose-product-block';
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
					'level'     => 1,
					'content'   => 'Get started',
					'textAlign' => 'center',
				),
			),
			array(
				'core/paragraph',
				array(
					'content' => 'Maecenas suscipit, nunc sed consequat aliquam, odio nibh commodo odio, non posuere dui nulla at ipsum. Donec cursus fringilla pellentesque',
					'align'   => 'center',
				),
			),
			array(
				'core/heading',
				array(
					'level'     => 3,
					'content'   => 'Choose your product',
					'textAlign' => 'center',
				),
			),
		),
	),
	array(
		'core/group',
		array(
			'className' => 'product-buttons-wrapper',
		),
		array(
			array(
				'acf/product-button',
				array(
					'className' => 'clustercontrol',
				),
			),
			array(
				'acf/product-button',
				array(
					'className' => 'ccx',
				),
			),
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph' );

?>

<section class="<?php echo $class_name; ?>">
	<?php echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>'; ?>
</section>
