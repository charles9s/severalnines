<?php

$class_name = 'faq-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$template = array(
	array(
		'core/heading',
		array(
			'level'     => 2,
			'content'   => 'FAQ',
			'className' => 'faq-title',
			'lock' => array(
				'move'   => true,
				'remove' => true,
			),
		),
	),
	array(
		'core/group',
		array(
			'className' => 'grouping-boxes',
			'lock' => array(
				'move'   => true,
				'remove' => true,
			),
		),
		array(
			array(
				'acf/accordion',
			),
			array(
				'core/paragraph',
				array(
					'content' => 'Example: <a href="http://example.com">Link</a>',
				),
			),
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph', 'acf/accordion', 'core/group' );
?>

<section class="<?php echo $class_name; ?>">
	<div class="container">
		<?php echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>'; ?>
	</div>
</section>
