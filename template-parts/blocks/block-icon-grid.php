<?php

$class_name = 'icon-grid-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$mini_title = get_field( 'mini-title' );

?>

<?php if ( have_rows( 'icon-grid-block' ) ) : ?>
<section class="<?php echo $class_name; ?>">
	<div class="container">
		<h2 class="mini-title"><?php echo $mini_title; ?></h2>
		<div class="icons">
			<?php
			while ( have_rows( 'icon-grid-block' ) ) :
				the_row();

				$icon  = get_sub_field( 'icon' );
				if(!empty($icon)){
					$image = wp_get_attachment_image( $icon['ID'], 'contact' ); ?>
					<div class="icon">
						<?php echo $image; ?>
					</div>
					<?php
				}
			endwhile;
			?>
		</div>
	</div>
</section>
<?php else : ?>
<section class="icon-grid-block">
	<div class="container">
		<h2 style="text-align: center;">Set your icons from block edit mode</h2>
	</div>
</section>
<?php endif; ?>
