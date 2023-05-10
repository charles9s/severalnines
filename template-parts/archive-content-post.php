<?php

$taxonomy_product    = get_the_terms( $post, 'related-product' );
$taxonomy_technology = get_the_terms( $post, 'related-technology' );

?>

<div class="box <?php echo get_post_type(); ?>">
	<div class="box-content">
		<div class="image-wrapper">
			<a href="<?php echo esc_html( get_permalink() ); ?>" title="<?php the_title(); ?>">
				<?php if ( has_post_thumbnail( get_the_ID() ) ) { ?>
					<?php echo get_the_post_thumbnail( get_the_ID(), 'archive' ); ?>
				<?php } ?>
			</a>
		</div>
			<div class="text-area">
				<div class="taxonomy-meta">
					<?php

					if ( $taxonomy_product ) {
						foreach ( $taxonomy_product as $tax_p ) {
							$icon = get_field( 'tax_image', 'related-product_' . $tax_p->term_id );
							?>
						<a class="<?php echo $tax_p->taxonomy; ?>" href="<?php echo get_term_link( $tax_p->term_id ); ?>">
							<img src="<?php echo esc_html( get_stylesheet_directory_uri() . '/assets/img/acf/' . $icon . '.svg' ); ?>" alt="<?php echo $icon; ?>">
						</a>
							<?php
						}
					}

					if ( $taxonomy_technology ) {
						foreach ( $taxonomy_technology as $tax_tech ) {
							$icon = get_field( 'tax_image', 'related-technology_' . $tax_tech->term_id );
							if ( $icon ) {
								?>
						<a class="<?php echo $tax_tech->taxonomy; ?>" href="<?php echo get_term_link( $tax_tech->term_id ); ?>">
							<img src="<?php echo esc_html( get_stylesheet_directory_uri() . '/assets/img/acf/' . $icon . '.svg' ); ?>" alt="<?php echo $icon; ?>">
						</a>
								<?php
							}
						}
					}

					?>
			</div>
			<div class="meta-content">
				<span class="date"><?php echo get_the_date(); ?></span>
				<span class="author"><?php echo get_the_author(); ?></span>
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
</div>
