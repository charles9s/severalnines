<?php
$class_name = 'careers_blog';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$template = array(    
    array(
        'core/heading',
        array(
            'textAlign' => 'center',
            'level'     => 2,
            'placeholder'   => 'Set your heading here',
            'content'   => 'Open job positions in Severalnines',
        ),
    ),
    array(
        'core/paragraph',
        array(
            'placeholder'   => 'Set job listing shortcode here',
            'content'       => '[careers limit="3"]'
        ),
    )
);
$allowed_blocks = array( 'core/heading', 'core/paragraph' );
?>
<section class="<?php echo $class_name; ?>">
    <div class="container">
        <div class="theme">
            <div class="grid">
                <div class="box col-12 col-md-auto col-bleed">
                    <div class="content">
                        <?php
                        echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
                        ?>
                    </div>
                </div>			
            </div>
        </div>
    </div>
</section>