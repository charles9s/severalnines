<?php

$class_name = '';
if ( ! empty( $block['className'] ) ) {
	$class_name = $block['className'];
}

$is_admin = is_admin() ? '' : 'href="#'. $class_name .'"';

$template = array(
	array(
		'acf/icon-picker',
		array(
			'align' => 'center',
			'data'  => array(
				'icon'  => 'logo-ccx',
				'align' => 'center',
			),
		),
	),
	array(
		'core/paragraph',
		array(
			'content' => 'Maecenas suscipit, nunc sed consequat aliquam',
			'align'   => 'center',
		),
	),
);

$custom_link = get_field( 'custom_link' );


if ($custom_link && !is_admin()):
	$button_link_target = $custom_link['target'] ? $custom_link['target'] : '_self';
	$button_link_rel    = '_blank' === $button_link_target ? 'rel="noreferrer"' : '';
	$is_admin = 'href="' . $custom_link['url'] . '"target="' . $button_link_target . '"' . $button_link_rel;
endif;

$allowed_blocks = array( 'core/heading', 'core/paragraph' );
?>

<a class="product-button <?php echo $class_name ?>" <?php echo $is_admin ?> ">
	<?php echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>'; ?>
</a>
