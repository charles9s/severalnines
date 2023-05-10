<?php

/**
 * Accordion Block Template.
 */

$class_name = 'block-accordion';
if ( ! empty( $block['className'] ) ) {
	$$class_name .= ' ' . $block['className'];
}

// Enable easier edit mode for Gutenberg with admin class

$front_or_back = is_admin() ? 'admin' : '';

$template = array(
	array(
		'core/heading',
		array(
			'level'     => 3,
			'content'   => 'Lorem ipsum dolor sit amet',
			'className' => 'toggle-accordion',
			'lock' => array(
				'move'   => true,
				'remove' => true,
			),
		),
	),
	array(
		'core/group',
		array(
			'className' => 'inner',
			'lock' => array(
				'move'   => true,
				'remove' => true,
			),
		),
		array(
			array(
				'core/paragraph',
				array(
					'content' => 'Proin sollicitudin mauris nec mauris venenatis interdum',
				),
			),
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph', 'core/group', 'core/list', 'core/image', 'core/table', 'core/code', 'core/video', 'core/separator' );

?>

<div class="<?php echo $class_name; ?>">
	<div class="accordion-box <?php echo $front_or_back; ?>">
			<?php echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>'; ?>
	</div>
</div>

