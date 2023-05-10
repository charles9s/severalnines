<?php

$class_name = 'ccx-plans-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}


$template = array(
	array(
		'core/columns',
		array(),
		array(
			array(
				'core/column',
				array(),
				array(
					array(
						'core/heading',
						array(
							'level'   => 2,
							'content' => 'Ut bibendum',
						),
					),
					array(
						'core/paragraph',
						array(
							'content' => 'Vivamus imperdiet neque non tincidunt luctus. Donec malesuada blandit felis, eu tristique neque maximus vel. Cras rutrum quis nulla at volutpat. Praesent sed malesuada arcu. Vestibulum tempus euismod quam, in tincidunt felis ornare eget. Etiam non sollicitudin mi, ac imperdiet nulla.',
						),
					),
				),
			),
			array(
				'core/column',
				array(),
				array(
					array(
						'core/heading',
						array(
							'level'     => 3,
							'content'   => 'Ut bibendum',
							'textAlign' => 'center',
						),
					),
					array(
						'core/table',
						array(
							'body'    => array(
								array(
									'cells' => array(
										array(
											'content' => 'Instance specification',
											'tag'     => 'td',
										),
									),
								),
								array(
									'cells' => array(
										array(
											'content' => '+  Data storage',
											'tag'     => 'td',
										),
									),
								),
								array(
									'cells' => array(
										array(
											'content' => '+  IOPS',
											'tag'     => 'td',
										),
									),
								),
								array(
									'cells' => array(
										array(
											'content' => '+  Data Egress',
											'tag'     => 'td',
										),
									),
								),
							),
							'caption' => 'Nam ut nisl',
						),
					),
				),
			),
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph', 'core/table' );
?>

<section class="ccx <?php echo $class_name; ?>" id="ccx">
	<div class="background">
		<div class="shape"></div>
		<div class="curved-corner-topleft"></div>
		<div class="container">
			<?php
			echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
			?>
		</div>
		<div class="curved-corner-bottomright"></div>
	</div>
</section>
