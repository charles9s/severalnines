<?php

if ( function_exists( 'get_field' ) ) {
	$pid = get_post();
	if ( has_blocks( $pid ) ) {
		$blocks = parse_blocks( $pid->post_content );
		foreach ( $blocks as $block ) {
			if ( $block['blockName'] == 'acf/hero' ) {
				// build new array from found images
				if ( ! empty( $block['attrs']['data']['image'] ) ) :
					$post_thumbnail = $block['attrs']['data']['image'];
				endif;
			}
		}
	}
}

$get_term_attrs = wp_get_post_terms( get_the_ID(), 'resource_type' );

if ( $get_term_attrs ) :
	$term_link = get_term_link( $get_term_attrs[0]->term_id, $get_term_attrs[0]->taxonomy );
	$term_name = $get_term_attrs[0]->name;
endif;

?>

<div class="box <?php echo get_post_type(); ?>">
	<div class="box-content">
		<div class="image-wrapper">
			<a href="<?php echo esc_html( get_permalink() ); ?>" title="<?php the_title(); ?>">
				<?php if ( has_post_thumbnail( get_the_ID() ) ) { ?>
					<?php echo get_the_post_thumbnail( get_the_ID(), 'archive' ); ?>
				<?php } elseif ( ! empty( $post_thumbnail ) ) { ?>
					<?php echo wp_get_attachment_image( $post_thumbnail, 'archive' ); ?>
				<?php } ?>
			</a>
		</div>
		<div class="meta-content">
			<?php if ( ! empty( $get_term_attrs ) ) : ?>
				<a class="tax-link disabled" href="<?php echo esc_html( $term_link ); ?>" title="taxonomy-<?php echo esc_html( $term_name ); ?>">
					<?php echo esc_html( $term_name ); ?>
				</a>
			<?php endif; ?>
		</div>
		<div class="content-wrapper">
			<a href="<?php echo esc_html( get_permalink() ); ?>" title="<?php the_title(); ?>">
				<h3 class="archive-title">
					<?php the_title(); ?>
				</h3>
			</a>
		</div>
	</div>
</div>
