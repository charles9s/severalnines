<?php

/**
 * Basic Hero Template.
 */

$class_name = 'basic-hero-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$template = array(
	array(
		'core/heading',
		array(
			'level'       => 1,
			'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
			'textAlign' => 'center',
		),
	),
	array(
		'core/paragraph',
		array(
			'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat odio porttitor ligula sollicitudin lacinia. Pellentesque vel mi vulputate, blandit mi eget, convallis quam.',
			'align' => 'center',
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph', 'acf/button' );

?>

<section class="<?php echo $class_name; ?>">
	<header class="basic-hero-header">
		<?php
		echo '<InnerBlocks template_lock="insert" allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
		?>
	</header>
</section>
