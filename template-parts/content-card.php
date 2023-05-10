<?php

/**
 * Template part for cards
 *
 * @package cntrst
 */

$post_type = get_post_type() === 'post' ? 'Blog' : get_post_type();
$post_cat  = get_the_category();

?>

<div class="col-12 col-sm-6 col-md-4 col-bleed-y box">
	<div class="box-content">
		<a class="image-link <?php echo esc_html( disable_admin_link() ); ?>" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
			<?php if ( $post_cat && $post_cat[0]->term_id != 1 ) : ?>
				<a href="<?php echo get_category_link( $post_cat[0]->term_id ); ?> "class="meta"><?php echo $post_cat[0]->cat_name; ?></a>
			<?php else : ?>
				<a href="<?php echo get_post_type_archive_link( $post_type ); ?>" class="meta"><?php echo $post_type; ?></a>
			<?php endif; ?>
		<a class="title-link <?php echo esc_html( disable_admin_link() ); ?>" href="<?php the_permalink(); ?>">
			<h3 class="archive-title">
				<?php the_title(); ?>
			</h3>
		</a>
	</div>
</div>
