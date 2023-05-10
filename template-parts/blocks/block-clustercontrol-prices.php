<?php

$class_name = 'clustercontrol-prices-block';
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
				'core/heading',
				array(
					'textAlign' => 'center',
					'level'     => 2,
					'content'   => 'Summary',
				),
			),
		),
	),
	array(
		'core/list',
		array(
			'values' => '<li>Feature</li><li>Plan</li><li>Advanced</li><li>Enterprise</li>',
		),
	),
	array(
		'core/table',
		array(
			'body'    => array(
				array(
					'cells' => array(
						array(
							'content' => 'Standalone',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Cluster/Replication',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Load Balancers',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Create Local Repositories',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Standalone',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
			),
			'caption' => 'Deployment',
		),
	),
	array(
		'core/table',
		array(
			'body'    => array(
				array(
					'cells' => array(
						array(
							'content' => 'Authentication using LDAP/Active Directory',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Cluster/Replication',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Standalone',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'SSL Encryption (MySQL & PostgreSQL)	',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
			),
			'caption' => 'Monitoring',
		),
	),
	array(
		'core/table',
		array(
			'body'    => array(
				array(
					'cells' => array(
						array(
							'content' => 'Standalone',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Cluster/Replication',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Load Balancers',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Create Local Repositories',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
			),
			'caption' => 'Deployment',
		),
	),
	array(
		'core/table',
		array(
			'body'    => array(
				array(
					'cells' => array(
						array(
							'content' => 'Standalone',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Cluster/Replication',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Load Balancers',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Create Local Repositories',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Standalone',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
			),
			'caption' => 'Deployment',
		),
	),
	array(
		'core/table',
		array(
			'body'    => array(
				array(
					'cells' => array(
						array(
							'content' => 'Authentication using LDAP/Active Directory',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Cluster/Replication',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Standalone',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'SSL Encryption (MySQL & PostgreSQL)	',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Standalone',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
			),
			'caption' => 'Monitoring',
		),
	),
	array(
		'core/table',
		array(
			'body'    => array(
				array(
					'cells' => array(
						array(
							'content' => 'Standalone',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Cluster/Replication',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Load Balancers',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Create Local Repositories',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Standalone',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
			),
			'caption' => 'Deployment',
		),
	),
	array(
		'core/table',
		array(
			'body'    => array(
				array(
					'cells' => array(
						array(
							'content' => 'Authentication using LDAP/Active Directory',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Cluster/Replication',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Standalone',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'SSL Encryption (MySQL & PostgreSQL)	',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Standalone',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
			),
			'caption' => 'Monitoring',
		),
	),
	array(
		'core/table',
		array(
			'body'    => array(
				array(
					'cells' => array(
						array(
							'content' => 'Authentication using LDAP/Active Directory',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<span class="has-inline-color has-pink-color">12</span>',
							'tag'     => 'td',
						),
						array(
							'content' => 'Unlimited',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Cluster/Replication',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<span class="has-inline-color has-pink-color">Web/email</span>',
							'tag'     => 'td',
						),
						array(
							'content' => 'Web/email/phone',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Authentication using LDAP/Active Directory',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<span class="has-inline-color has-pink-color">12</span>',
							'tag'     => 'td',
						),
						array(
							'content' => 'Unlimited',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Cluster/Replication',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
				array(
					'cells' => array(
						array(
							'content' => 'Authentication using LDAP/Active Directory',
							'tag'     => 'td',
						),
						array(
							'content' => '-',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark-pink.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
						array(
							'content' => '<img src="' . get_template_directory_uri () . '/assets/img/icons-checkmark.svg" alt="icon checkmark" />',
							'tag'     => 'td',
						),
					),
				),
			),
			'caption' => 'Support',
		),
	),
	array(
		'core/group',
		array(
			'className' => 'button-wrapper',
		),
		array(
			array(
				'acf/button',
				array(
					'data' => array(
						'link'  => array(
							'title'  => 'Lorem amet',
							'url'    => '#',
							'target' => '_self',
						),
						'color' => 'transparent',
					),
				),
			),
			array(
				'acf/button',
				array(
					'data' => array(
						'link'  => array(
							'title'  => 'Lorem amet',
							'url'    => '#',
							'target' => '_self',
						),
						'color' => 'pink',
					),
				),
			),
			array(
				'acf/button',
				array(
					'data' => array(
						'link'  => array(
							'title'  => 'Lorem amet',
							'url'    => '#',
							'target' => '_self',
						),
						'color' => 'pink',
					),
				),
			),
		),
	),
);

$is_admin = is_admin() ? 'admin' : '';

$allowed_blocks = array( 'core/table', 'acf/button' );
?>

<section class="clustercontrol <?php echo $class_name; ?>">
		<div class="wrapper <?php echo $is_admin; ?>">
			<?php
			echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
			?>
		</div>
</section>
