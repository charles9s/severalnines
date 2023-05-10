<?php
$class_name = 'career-features';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
$template = array(
    array(
		'core/group',
		array(
			'className' => 'section-header',
		),
		array(
			array(
				'acf/icon-picker',
				array(
					'align' => 'center',
					'data'  => array(
						'icon' => 'ico-team-w',
					),
				),
			),
            array(
                'core/heading',
                array(
                    'textAlign' => 'center',
                    'level'     => 2,
                    'content'   => 'Join Severalnines',
                ),
            ),
			array(
				'core/paragraph',
				array(
					'content' => "A career at Severalnines means working alongside some of the smartest and most talented people in the open source database world. We’re headquartered in Kalmar, Sweden, and all work remotely from our home offices. Join us and be part of a company that’s changing the way people automate and manage their SQL and NoSQL open source databases – be it on-premises or in the cloud.",
					'align'   => 'center',
				),
			),
            array(
				'acf/button',
				array(
					'data' => array(
						'link'  => array(
							'title'  => 'Set your button here',
							'url'    => '#',
							'target' => '_self',
						),
						'type'  => 'standard',
						'color' => 'pink',
					),
				),
			),
		),
	),
);
$allowed_blocks = array( 'acf/icon-picker', 'core/heading', 'core/paragraph', 'acf/button');
?>
<section class="<?php echo $class_name; ?>">
    <div class="background">
       <div class="curved-corner-topleft"></div>
       <div class="container">
            <div class="content text-center">
                <?php  
                    echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
                ?>																	
            </div>
       </div>
       <div class="curved-corner-bottomright"></div>
    </div>
 </section>