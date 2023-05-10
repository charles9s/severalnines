<?php

$class_name = 'home-hero-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$hero_image = get_field( 'image' );
$hero_mask  = get_field( 'mask' ) ? 'split-mask skip-lazy' : 'skip-lazy';

$template = array(
	array(
		'core/heading',
		array(
			'level'       => 1,
			'placeholder' => 'Set your heading here',
		),
	),
	array(
		'core/paragraph',
		array(
			'placeholder' => 'Set your paragraph here',
		),
	),
	array(
		'core/group',
		array(
			'className' => 'button-wrapper',
		),
		array(
			array(
				'acf/button',
				array(
					'data' => array(
						'link'  => array(
							'title'  => 'Set your button here',
							'url'    => '#',
							'target' => '_self',
						),
						'type'  => 'standard',
						'color' => 'pink',
					),
				),
			),
			array(
				'acf/button',
				array(
					'data' => array(
						'link'  => array(
							'title'  => 'Set your button here',
							'url'    => '#',
							'target' => '_self',
						),
						'type'  => 'standard',
						'color' => 'transparent',
					),
				),
			),
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph', 'acf/button', 'core/group' );
$has_image      = ! empty( $hero_image ) ? 'has-image' : 'no-image';
?>

<section class="<?php echo $class_name; ?>">
	<div class="theme">
		<div class="grid <?php echo esc_html( $has_image ); ?>">
			<div class="box col-12 col-md-auto col-bleed">
				<div class="content">
					<?php
					echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
					?>
				</div>
			</div>
			<?php if ( $hero_image ) : ?>
				<div class="image col-12 col-md-auto col-bleed">
					<div class="image-wrapper">
						<?php echo wp_get_attachment_image( $hero_image, 'hero', '', array( 'class' => $hero_mask ), true ); ?>
					</div>
					
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="round-shape">
					</div>
</section>
