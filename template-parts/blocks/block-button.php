<?php

/**
 * Button Block Template.
 */

$class_name = 'acf-button-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
$id = $block['id']; $anchor_class = $_content = '';

if(get_field( 'show_popup' ) && get_field( 'pupup_content' ) && get_field( 'pupup_content' ) != '' ){
	$anchor_class = 'show_button_popup';
	$_content = apply_filters( 'the_content', get_field( 'pupup_content' ) );
}
if(get_field( 'show_popup' ) && $_content == ''){
	$anchor_class = 'show_footer_popup';
}
$button_color      = get_field( 'color' );
$button_dl         = get_field( 'download' ) ? 'download' : '';
$button_file       = get_field( 'file_url' ) ? get_field( 'file_url' ) : '';
$button_file_text  = get_field( 'file_button_text' );
$button_link       = get_field( 'link' );
$align             = $block['align'];
$button_link_title = ! empty( $button_link['title'] ) ? $button_link['title'] : __( 'Put text here', 'severalnines' );

if ( $button_link ) {
	$button_link_target = $button_link['target'] ? $button_link['target'] : '_self';
	$button_link_rel    = '_blank' === $button_link_target ? 'rel="noreferrer"' : ''; ?>

	<div class="text-<?php echo esc_html( $align ) ?> <?php echo $class_name ?>">
		<a <?php echo esc_html( $button_dl ); ?> class="btn <?php echo esc_html( $button_color ); ?> btn-block <?php echo esc_html( disable_admin_link() ); ?> <?php echo $anchor_class; ?>" href="<?php echo esc_html( $button_link['url'] ); ?>" title="<?php echo esc_html( $button_link['title'] ); ?>" target="<?php echo esc_html( $button_link_target ); ?>"
			<?php echo esc_html( $button_link_rel ); ?> data-button-id="<?php echo $id ?>">
			<?php echo esc_html( $button_link_title ); ?>
		</a>
	</div>

<?php } elseif ( $button_file_text ) { ?>

	<div class="text-<?php echo esc_html( $align ); ?> <?php echo $class_name; ?>">
		<a <?php echo esc_html( $button_dl ); ?> class="btn <?php echo esc_html( $button_color ); ?> btn-block <?php echo esc_html( disable_admin_link() ); ?>" href="<?php echo esc_html( $button_file ); ?>" ?>
			<?php echo $button_file_text; ?>
		</a>
	</div>

	<?php

} elseif ( empty( $button_file_text ) && empty( $button_link ) ) {
	?>
	<div class="text-<?php echo esc_html( $align ) ?> <?php echo $class_name; ?>">
		<a class="btn pink btn-block <?php echo esc_html( disable_admin_link() ); ?>" href="#" title="#" target="_self">
			Preview button
		</a>
	</div>
	<?php
}
if($_content != ''){ ?>
	<div class="modal image_lightbox_popup gravity_form_cst_popup" id="<?=$id?>">
		<span class="modal-close">&times;</span>
		<div class="Form_design">
			<div class="button_popup_content"><?php echo $_content ?> </div>
		</div>
	</div>
	<?php 
}
