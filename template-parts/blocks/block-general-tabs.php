<?php

/**
 * Tabs Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'tabs-' . $block['id'];
if( !empty($block['anchor']) ) {
		$id = $block['anchor'];
}

$trimmed_id = preg_replace("/[^0-9]/", "", $block['id'] );
$int_id = (int)$trimmed_id;

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'tabs';
if( !empty($block['className']) ) {
		$class_name .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
		$class_name .= ' align' . $block['align'];
}

$title       = get_field( 'title_tabs' );
$description = get_field( 'description_tabs' );

?>
<section id="<?php echo esc_attr($id); ?>" class="block <?php echo esc_attr($class_name); ?>">
	<?php if ($title): ?>
		<header class="section-header">
			<h2 class="block-title"><?php echo $title; ?></h2>
			<p><?php echo $description; ?></p>
		</header>
	<?php endif; ?>
	<div class="tabs-wrapper">
	<?php if( have_rows('items') ): ?>
		<div class="images">
		<?php
		$i = 0;
		while( have_rows('items') ): the_row(); ?>
			<?php if ( get_sub_field('wysiwyg') ) : ?>
				<div class="item-image-container" data-id="<?php echo $int_id + $i; ?>">
					<?php echo get_sub_field('wysiwyg') ?>
				</div>
				<?php endif;
				$i++;
				endwhile; ?>
				</div>
				<div class="content">
					<?php
					$i = 0;
					while( have_rows('items') ): the_row(); ?>
					<div class="item-content-container" data-id="<?php echo $int_id + $i; ?>">
						<h3 class="heading"><?php the_sub_field('heading'); ?><span class="icon-plus"></span></h3>
					<div class="mobile-content">
						<p class="text-content"><?php the_sub_field('text_content'); ?></p>
					<div class="item-image-container" data-id="<?php echo $int_id + $i; ?>">
						<?php echo get_sub_field('wysiwyg'); ?>
					</div>
				</div>
			</div>
			<?php $i++;
		endwhile; ?>
		</div>
	<?php else: ?>
		<h3 style="text-align: center">Start adding tabs from block edit mode</h3>
	<?php endif; ?>
	</div>
</section>
