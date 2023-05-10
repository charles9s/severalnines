<?php
$class_name = 'product career-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$hero_image = get_field( 'image' );
$title  = get_field( 'title' );

$template = array(
    array(
        'core/paragraph',
        array(
            'placeholder'   => 'SET TITLE TEXT HERE',
            'content'       => '<mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-grey-color">CAREERS</mark>',
            'className'     => 'mini-title',
        ),
    ),
    array(
        'core/heading',
        array(
            'level'       => 1,
            'placeholder' => 'Set your heading here',
            'content'      => '<mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-pink-color">Join </mark>the globally distributed Severalnines team'
        ),
    )
);
$allowed_blocks = array( 'core/heading', 'core/paragraph' );
$has_image      = ! empty( $hero_image ) ? 'has-image' : 'no-image';
?>

<section class="<?php echo $class_name; ?>">
    <div class="theme">
       <div class="grid has-image">
            <div class="box col-12 col-md-auto col-bleed">
                <div class="content">
                    <?php
                        echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
                    ?>
                </div>
            </div>
            <div class="image col-12 col-md-auto <?php echo esc_html( $has_image ); ?>">
                <div class="image-wrapper">
                    <?php echo wp_get_attachment_image( $hero_image, 'hero', '', array( 'class' => 'image-shape skip-lazy' ), true ); ?>			
                </div>
            </div>
       </div>
    </div>
</section>