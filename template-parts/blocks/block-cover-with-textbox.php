<?php

$class_name = 'cover-with-text-box';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$image_cover = get_field( 'image-cover' ) ? get_field( 'image-cover' ) : get_field( 'image-cover', 'options' );
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

$heading   = get_field( 'heading', 'options' );
$body_text = get_field( 'body_text', 'options' );
$link_text = get_field( 'link', 'options' );

if ( $link_text ) :
	$link_target = $link_text['target'] ? $link_text['target'] : '_self';
	$link_rel    = '_blank' === $link_target ? 'rel="noreferrer"' : '';
endif;


?>
<section class="<?php echo $class_name; ?>">
	<div class="background" style="background-image: url('<?php echo wp_get_attachment_image_url( $image_cover, 'full' ); ?>')">
		<div class="container">
			<?php if ( $manual ) : ?>
				<div class="<?php echo $set_box; ?>">
					<?php echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>'; ?>
				</div>
			<?php else : ?>
				<div class="text-box">
					<div class="wp-block-group">
						<div class="wp-block-group__inner-container">
							<h2><?php echo $heading; ?></h2>
							<p><?php echo $body_text; ?></p>
						</div>
					</div>
				<?php if ( $link_text ) : ?>
					<div class="text- acf-button-block">
						<a class="btn pink btn-block" href="<?php echo $link_text['url']; ?>" title="<?php echo $link_text['title']; ?>" target="<?php echo $link_target; ?>" <?php echo $link_rel; ?>><?php echo $link_text['title']; ?></a>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			</div>
		</div>
	</div>
</section>
