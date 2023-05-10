<?php

$class_name = 'text-and-media-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$text_and_media_image   = get_field( 'image' );
$hero_shape             = get_field( 'shape' ) ? 'image-shape' : '';
$text_and_media_reverse = get_field( 'reverse' ) === true ? 'reverse' : '';


$template = array(
	array(
		'core/heading',
		array(
			'level'   => 2,
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
		),
	),
	array(
		'core/paragraph',
		array(
			'content' => 'Maecenas suscipit, nunc sed consequat aliquam, odio nibh commodo odio, non posuere dui nulla at ipsum. Donec cursus fringilla pellentesque',
		),
	),
	array(
		'acf/button',
		array(
			'data' => array(
				'link'  => array(
					'title'  => 'Phasellus vel',
					'url'    => '#',
					'target' => '_self',
				),
				'color' => 'transparent',
			),
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph', 'acf/button' );
$has_image      = ! empty( $text_and_media_image ) ? 'has-image' : 'no-image';
?>

<section class="<?php echo $class_name; ?>">
	<div class="theme">
		<div class="grid <?php echo esc_html( $text_and_media_reverse . ' ' . $has_image ); ?>">
			<div class="box col-12 col-md-auto col-bleed">
				<div class="content">
					<?php
					echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
					?>
				</div>
			</div>
			<?php if (empty($text_and_media_image) && is_admin()): ?>
			<div class="image col-12 col-md-auto col-bleed">
					<div class="image-wrapper">
							<h3 style="text-align: center">Set your image from block edit mode</h3>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( $text_and_media_image ) : ?>
				<div class="image col-12 col-md-auto col-bleed">
					<div class="image-wrapper">
						<?php echo wp_get_attachment_image( $text_and_media_image, 'text-media', '', array( 'class' => $hero_shape ) ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
