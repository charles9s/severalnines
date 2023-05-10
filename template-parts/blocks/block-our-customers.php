<?php

$class_name = 'our-customer-logos-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$title = get_field( 'title' );
$subtext = get_field( 'subtext' );

?>

<?php if ( have_rows( 'our-customer-logos' ) ) : ?>
<section class="<?php echo $class_name; ?>">
	<div class="container">
		<h2 class="title has-text-align-center"><?php echo $title; ?></h2>
        <p class="subtext has-text-align-center"><?php echo $subtext; ?></p>
		<div class="icons">
			<?php
			while ( have_rows( 'our-customer-logos' ) ) :
				the_row();

				$icon  = get_sub_field( 'logo' );
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
<section class="our-customer-logos-block">
	<div class="container">
		<h2 style="text-align: center;">Set your logos from block edit mode</h2>
	</div>
</section>
<?php endif; ?>
