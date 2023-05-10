<?php
$class_name = 'choose-product-block download-cc';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
$downloads = get_field( 'downloads' );
$template = array(
	array(
		'core/heading',
		array(
			'level'       	=> 1,
			'placeholder' 	=> 'Set your heading here',
            'content'       => 'Download instructions'
		),
	),
    array(
		'core/heading',
		array(
			'level'       	=> 5,
			'placeholder' 	=> 'Set your heading here',
            'content'       => 'Choose your preferred installation method:',
			'className'		=> 'method',
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph');
?>
<section class="<?php echo $class_name; ?>">
    <div class="background">
       <div class="curved-corner-topleft"></div>
       <div class="container">
            <div class="content text-center">
                <?php  
                    echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
					if( !empty($downloads)){ ?>
						<div class="wp-container-2 wp-block-column is-vertically-aligned-center center_logo">
							<?php foreach ($downloads as $key => $value) { 
								$icon = $value['icon'] ; 
								if($key % 2 == 0){
									$c =  "pink clustercontrol"; 
								}
								else{
									$c =  "transparent ccx";
								}
								if ( isset($value['pdf']) && $value['pdf'] != '' ) {
									$href = $value['pdf'];
								}else{
									$href = 'javascript:void(0);';
								} ?>
								<a class="product-button btn <?php echo $c ?> btn-block" href="<?php echo $href; ?>">
									<div class="icon">
										<img class="skip-lazy" src="<?php echo esc_html( get_stylesheet_directory_uri() . '/assets/img/acf/' . $icon . '.svg' ); ?>" alt="<?php echo $icon; ?>">
									</div> <?php echo $value['title'] ?>
								</a>								
							<?php } ?>
						</div> <?php
					} 
				?>                													
            </div>
       </div>
    </div>
 </section>