<?php

$class_name = 'icon-picker';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$icon  = get_field( 'icon' );
$align = $block['align'] ? 'text-' . $block['align'] : '';

?>
<div class="<?php echo $align; ?> <?php echo $class_name; ?>">
	<img class="skip-lazy" src="<?php echo esc_html( get_stylesheet_directory_uri() . '/assets/img/acf/' . $icon . '.svg' ); ?>" alt="<?php echo $icon; ?>">
</div>
