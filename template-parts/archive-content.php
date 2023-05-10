<?php

$get_term_attrs = get_query_var( 'archive_terms' );

if ( $get_term_attrs ) :
	$term_link = get_term_link( $get_term_attrs[0]->term_id, $get_term_attrs[0]->taxonomy );
	$term_name = $get_term_attrs[0]->name;
endif;

?>

<div class="box">
	<div class="box-content">
		<div class="image-wrapper">
			<a href="<?php echo esc_html( get_permalink() ); ?>" title="<?php the_title(); ?>">
				<?php if ( has_post_thumbnail( get_the_ID() ) ) { ?>
					<?php echo get_the_post_thumbnail( get_the_ID(), 'archive' ); ?>
				<?php } ?>
			</a>
		</div>
		<div class="meta-content">
			<?php if ( ! empty( $get_term_attrs ) ) : ?>
				<a class="tax-link <?php echo esc_html( disable_admin_link() ); ?>" href="<?php echo esc_html( $term_link ); ?>" title="taksonomia-<?php echo esc_html( $term_name ); ?>">
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
