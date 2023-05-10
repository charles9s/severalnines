<?php

if ( function_exists( 'get_field' ) ) {
	$pid = get_post();
	if ( has_blocks( $pid ) ) {
		$blocks = parse_blocks( $pid->post_content );
		foreach ( $blocks as $block ) {
			if ( $block['blockName'] == 'acf/case-hero' ) {
				if ( ! empty( $block['attrs']['data']['logo'] ) ) :
					$logo = $block['attrs']['data']['logo'];
				endif;
					$title = $block['innerBlocks'][0]['innerHTML'] ? $block['innerBlocks'][0]['innerHTML'] : get_the_title();
				if ( ! empty( $block['attrs']['data']['image'] ) ) :
					$post_thumbnail = $block['attrs']['data']['image'];
				endif;
			}
		}
	}
}

?>

<div class="box <?php echo get_post_type(); ?>">
	<div class="box-content">
		<div class="image-wrapper">
			<a href="<?php echo esc_html( get_permalink() ); ?>" title="<?php the_title(); ?>">
					<?php if ( has_post_thumbnail( get_the_ID() ) ) : ?>
						<?php echo get_the_post_thumbnail( get_the_ID(), 'archive' ); ?>
						<?php echo wp_get_attachment_image( $logo, 'logo' ); ?>
					<?php elseif ( ! empty( $post_thumbnail ) ) : ?>
						<?php echo wp_get_attachment_image( $post_thumbnail, 'archive' ); ?>
						<?php echo wp_get_attachment_image( $logo, 'logo' ); ?>
					<?php endif; ?>
			</a>
		</div>
		<div class="content-wrapper">
			<a href="<?php echo esc_html( get_permalink() ); ?>" title="<?php the_title(); ?>">
				<h3 class="archive-title">
					<?php echo strip_tags($title);?>
				</h3>
			</a>
		</div>
	</div>
</div>
