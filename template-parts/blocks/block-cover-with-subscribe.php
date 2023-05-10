<?php

$class_name = 'cover-with-text-box';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$image_cover = get_field( 'image-cover-subscribe', 'option' ) ? get_field( 'image-cover-subscribe', 'option' ) : get_field( 'image-cover' );
$manual      = get_field( 'manual' );

$set_box = is_admin() ? 'no-box' : 'text-box';

$template = array(
	array(
		'core/group',
		array(),
		array(
			array(
				'core/heading',
				array(
					'level'   => 2,
					'content' => 'Lorem ipsum dolor sit amet',
				),
			),
			array(
				'core/paragraph',
				array(
					'content' => 'Proin sollicitudin mauris nec mauris venenatis interdum',
				),
			),
		),
	),
	array(
		'acf/button',
		array(
			'data' => array(
				'link'  => array(
					'title'  => 'Lorem amet',
					'url'    => '#',
					'target' => '_self',
				),
				'color' => 'pink',
			),
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph', 'acf/button' );

$heading			 = get_field( 'heading_subscribe', 'options' );
$iframe				 = get_field( 'subscribe_iframe', 'options' );
$below_iframe  = get_field( 'body_below', 'options', false );

?>
<section class="subscribe <?php echo $class_name; ?>">
	<div class="background" style="background-image: url('<?php echo wp_get_attachment_image_url( $image_cover, 'full' ); ?>')">
		<div class="container">
			<?php if ( $manual ) : ?>
			<div class="<?php echo $set_box; ?>">
				<?php echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>'; ?>
			</div>
			<?php else : ?>
			<div class="text-box">
				<h3><?php echo $heading; ?></h3>
				<?php /* echo $iframe; */ ?>
				<?php  if ( $iframe ): 
						echo do_shortcode( $iframe );
					   endif; ?>
				<p class="small-grey"><?php echo $below_iframe ?></p>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
