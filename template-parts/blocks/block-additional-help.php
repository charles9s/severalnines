<?php 
$class_name = 'block-need-help';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
$template = array(
   	array(
		'core/heading',
		array(
            'textAlign' => 'center',
			'level'       	=> 2,
			'placeholder' 	=> 'Set your heading here',
            'content'       => 'Need Additional Help? 
                <a href="https://severalnines.com/about-us/contact_us">Contact Our Support Team</a>',
		),
	)
);
$allowed_blocks = array( 'core/heading' ); ?>
<section class="<?php echo $class_name; ?>">
    <?php   echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>'; ?>
</section>