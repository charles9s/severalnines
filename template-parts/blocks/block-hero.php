<?php

$class_name = 'hero-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$hero_image = get_field( 'image' );
$hero_shape = get_field( 'shape' ) ? 'image-shape skip-lazy' : 'skip-lazy';

global $post;

$post_type = is_admin() ? $post->post_type : get_post_type();

if ( 'resources' === $post_type ) :

	$template = array(
		array(
			'core/paragraph',
			array(
				'content'   => '<span class="has-inline-color has-grey-color">LOREM IPSUM</span>',
				'className' => 'mini-title',
			),
		),
		array(
			'core/heading',
			array(
				'level'       => 1,
				'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
			),
		),
		array(
			'core/paragraph',
			array(
				'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat odio porttitor ligula sollicitudin lacinia. Pellentesque vel mi vulputate, blandit mi eget, convallis quam.',
			),
		),
	);

	else :

		$template = array(
			array(
				'core/paragraph',
				array(
					'content'   => '<span class="has-inline-color has-grey-color">MINITITLE HERE</span>',
					'className' => 'mini-title',
				),
			),
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
		);

	endif;

	$allowed_blocks = array('core/group', 'core/heading', 'core/paragraph', 'acf/button' );
	$has_image      = ! empty( $hero_image ) ? 'has-image' : 'no-image';

	$set_size = is_singular( 'resources' ) ? 'hero-wide' : 'hero-square';

	?>

<section class="<?php echo $post_type; ?> <?php echo $class_name; ?>">
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
				<div class="image col-12 col-md-auto">
					<div class="image-wrapper">
						<?php echo wp_get_attachment_image( $hero_image, $set_size, '', array( 'class' => $hero_shape ) ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
