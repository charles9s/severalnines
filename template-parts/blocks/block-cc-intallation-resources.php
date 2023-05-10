<?php
$class_name = 'block-clusterControl';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
$resources = get_field( 'cc_installation_resources' );
$template = array(
    array(
        'acf/icon-picker',
        array(
            'align' => 'center',
            'data'  => array(
                'icon' => 'ico-settings-w',
            ),
        ),
    ),
	array(
		'core/heading',
		array(
            'textAlign' => 'center',
			'level'       	=> 2,
			'placeholder' 	=> 'Set your heading here',
            'content'       => 'ClusterControl Installation Resources',
            'className'		=> 'has-inline-color has-white-color',
		),
	)
);
$allowed_blocks = array( 'acf/icon-picker', 'core/heading' ); ?>
<section class="<?php echo $class_name; ?>">
    <div class="background">
        <div class="curved-corner-topright"></div>
            <div class="container">
                <div class="content text-center">
                    <?php  
                        echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
                    ?>																	
                </div>
                <?php if( !empty($resources)){ ?>
                    <ul class="row-container">
                        <?php foreach ($resources as $key => $value) { ?>
                            <li class="col-12 col-sm-auto has-link has-text">
                            <a class="" href="<?php echo $value['resource_link'] ?>" title="<?php echo $value['resource_text'] ?>" target="_self">
                                <div class="content">
                                    <h3><?php echo $value['resource_text'] ?></h3>
                                </div>
                            </a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
   </div>
</section>