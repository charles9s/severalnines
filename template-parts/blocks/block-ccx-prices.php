<?php

$class_name = 'ccx-prices-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$clouds        = get_field( 'cloud_services', 'options' );
$section_title = get_field( 'section_title', 'options' );
$select_tag    = get_field( 'select_tag', 'options' );

$template = array();
$options  = array();

$i   = 0;
$len = count( $clouds );

foreach ( $clouds as $cloud ) :
	if ( $i === 0 ) {
		$cloud_service_option = '<option selected value="' . str_replace( ' ', '-', strtolower( $cloud['service'] ) ) . '">' . $cloud['service'] . '</option>';
		$cloud_service_class  = str_replace( ' ', '-', strtolower( $cloud['service'] ) ) . ' ' . 'show';
	} else {
		$cloud_service_class  = str_replace( ' ', '-', strtolower( $cloud['service'] ) ) . ' ' . 'hide';
		$cloud_service_option = '<option value="' . str_replace( ' ', '-', strtolower( $cloud['service'] ) ) . '">' . $cloud['service'] . '</option>';
	}
	array_push( $options, $cloud_service_option );
	array_push(
		$template,
		array(
			'core/group',
			array(
				'className' => $cloud_service_class,
			),
			array(
				array(
					'core/heading',
					array(
						'level'     => 3,
						'content'   => $cloud['service'],
						'textAlign' => 'center',
					),
				),
				array(
					'core/table',
					array(
						'className' => 'extended',
						'head'      => array(
							array(
								'cells' => array(
									array(
										'content' => 'Instance',
										'tag'     => 'th',
									),
									array(
										'content' => 'Memory',
										'tag'     => 'th',
									),
									array(
										'content' => 'vCPU',
										'tag'     => 'th',
									),
									array(
										'content' => 'Hourly price',
										'tag'     => 'th',
									),
									array(
										'content' => 'Monthly price',
										'tag'     => 'th',
									),
								),
							),
						),
						'body'      => array(
							array(
								'cells' => array(
									array(
										'content' => 'Small',
										'tag'     => 'td',
									),
									array(
										'content' => '8GB',
										'tag'     => 'td',
									),
									array(
										'content' => '2vCPU',
										'tag'     => 'td',
									),
									array(
										'content' => '$0.30',
										'tag'     => 'td',
									),
									array(
										'content' => '$217.00',
										'tag'     => 'td',
									),
								),
							),
							array(
								'cells' => array(
									array(
										'content' => 'Medium',
										'tag'     => 'td',
									),
									array(
										'content' => '8GB',
										'tag'     => 'td',
									),
									array(
										'content' => '2vCPU',
										'tag'     => 'td',
									),
									array(
										'content' => '$0.30',
										'tag'     => 'td',
									),
									array(
										'content' => '$217.00',
										'tag'     => 'td',
									),
								),
							),
							array(
								'cells' => array(
									array(
										'content' => 'Large',
										'tag'     => 'td',
									),
									array(
										'content' => '8GB',
										'tag'     => 'td',
									),
									array(
										'content' => '2vCPU',
										'tag'     => 'td',
									),
									array(
										'content' => '$0.30',
										'tag'     => 'td',
									),
									array(
										'content' => '$217.00',
										'tag'     => 'td',
									),
								),
							),
							array(
								'cells' => array(
									array(
										'content' => 'X-Large',
										'tag'     => 'td',
									),
									array(
										'content' => '8GB',
										'tag'     => 'td',
									),
									array(
										'content' => '2vCPU',
										'tag'     => 'td',
									),
									array(
										'content' => '$0.30',
										'tag'     => 'td',
									),
									array(
										'content' => '$217.00',
										'tag'     => 'td',
									),
								),
							),
							array(
								'cells' => array(
									array(
										'content' => 'XX-Large',
										'tag'     => 'td',
									),
									array(
										'content' => '8GB',
										'tag'     => 'td',
									),
									array(
										'content' => '2vCPU',
										'tag'     => 'td',
									),
									array(
										'content' => '$0.30',
										'tag'     => 'td',
									),
									array(
										'content' => '$217.00',
										'tag'     => 'td',
									),
								),
							),
						),
					),
				),
				array(
					'core/table',
					array(
						'head' => array(
							array(
								'cells' => array(
									array(
										'content' => 'Data storage',
										'tag'     => 'th',
									),
									array(
										'content' => 'Monthly price',
										'tag'     => 'th',
									),
								),
							),
						),
						'body' => array(
							array(
								'cells' => array(
									array(
										'content' => 'General Purpose SSD (gp2)',
										'tag'     => 'td',
									),
									array(
										'content' => '$0.119 / GB',
										'tag'     => 'td',
									),
								),
							),
							array(
								'cells' => array(
									array(
										'content' => 'Provisioned IOPS SSD (io2)',
										'tag'     => 'td',
									),
									array(
										'content' => '$0.149 / GB',
										'tag'     => 'td',
									),
								),
							),
						),
					),
				),
				array(
					'core/table',
					array(
						'head' => array(
							array(
								'cells' => array(
									array(
										'content' => 'IOPS',
										'tag'     => 'th',
									),
									array(
										'content' => 'Monthly price',
										'tag'     => 'th',
									),
								),
							),
						),
						'body' => array(
							array(
								'cells' => array(
									array(
										'content' => 'General Purpose SSD (gp2)',
										'tag'     => 'td',
									),
									array(
										'content' => '$0.119 / GB',
										'tag'     => 'td',
									),
								),
							),
							array(
								'cells' => array(
									array(
										'content' => 'Provisioned IOPS SSD (io2)',
										'tag'     => 'td',
									),
									array(
										'content' => '$0.149 / GB',
										'tag'     => 'td',
									),
								),
							),
						),
					),
				),
				array(
					'core/table',
					array(
						'head' => array(
							array(
								'cells' => array(
									array(
										'content' => 'Data egress',
										'tag'     => 'th',
									),
									array(
										'content' => 'Monthly price',
										'tag'     => 'th',
									),
								),
							),
						),
						'body' => array(
							array(
								'cells' => array(
									array(
										'content' => '10TB',
										'tag'     => 'td',
									),
									array(
										'content' => '$0.119 / GB',
										'tag'     => 'td',
									),
								),
							),
							array(
								'cells' => array(
									array(
										'content' => 'Next 40TB',
										'tag'     => 'td',
									),
									array(
										'content' => '$0.149 / GB',
										'tag'     => 'td',
									),
								),
							),
							array(
								'cells' => array(
									array(
										'content' => 'Next 100TB',
										'tag'     => 'td',
									),
									array(
										'content' => '$0.119 / GB',
										'tag'     => 'td',
									),
								),
							),
							array(
								'cells' => array(
									array(
										'content' => 'Over 150TB',
										'tag'     => 'td',
									),
									array(
										'content' => '$0.149 / GB',
										'tag'     => 'td',
									),
								),
							),
						),
					),
				),
			),
		),
	);
	$i++;
endforeach;

$allowed_blocks = array( 'core/table', 'core/heading', 'core/group' );
?>

<section class="ccx <?php echo $class_name; ?>">
	<?php if ( $section_title ) : ?>
	<div class="section-header">
		<h2><?php echo $section_title; ?></h2>
	</div>
	<?php endif; ?>
	<div class="select-wrapper">
	<span class="cats-select-label"><?php echo $select_tag; ?></span>
		<select class="cloud-services" id="service-select">
			<?php foreach ( $options as $option ) : ?>
				<?php echo $option; ?>
			<?php endforeach; ?>
		</select>
	</div>
		<div class="wrapper">
			<?php
			echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
			?>
		</div>
</section>
