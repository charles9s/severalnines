<?php

/*
 * Remove WP 5.5 Pattern library
 */

add_action( 'after_setup_theme', 'cntrst_remove_core_patterns' );

function cntrst_remove_core_patterns() {

	remove_theme_support( 'core-block-patterns' );
	remove_theme_support( 'block-templates' );
}

/*
 * Remove WP 5.5 downloadable blocks feature
 */

remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
remove_action( 'enqueue_block_editor_assets', 'gutenberg_enqueue_block_editor_assets_block_directory' );

/*
 * Remove Gutenberg core styles to remove unnecessary request. These styles are in assets/css/gutenberg/_wp-core-styles.scss
 */

add_action( 'wp_print_styles', 'cntrst_deregister_styles', 100 );

function cntrst_deregister_styles() {
	wp_dequeue_style( 'wp-block-library' );
}

function my_plugin_block_categories( $categories ) {

	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'cntrst-blocks',
				'title' => __( 'Custom Blocks', 'severalnines' ),
			),
			array(
				'slug'  => 'pricing',
				'title' => __( 'Pricing', 'severalnines' ),
			),
			array(
				'slug'  => 'heros',
				'title' => __( 'Heros', 'severalnines' ),
			),
		)
	);

	return $categories;
}

add_filter( 'block_categories_all', 'my_plugin_block_categories', 10, 2 );


/*
 * Initiate custom blocks here
 */

add_action( 'acf/init', 'cntrst_acf_blocks_init' );
function cntrst_acf_blocks_init() {

	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type(
			array(
				'name'            => 'Home Hero',
				'icon'            => 'tide',
				'title'           => __( 'Home Hero', 'severalnines' ),
				'description'     => __( 'Bring text and image to homepage Hero', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-home-hero.php',
				'category'        => 'heros',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Hero',
				'icon'            => 'superhero',
				'title'           => __( 'Hero', 'severalnines' ),
				'description'     => __( 'Bring text and image to Hero', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-hero.php',
				'category'        => 'heros',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Basic Hero',
				'icon'            => 'shield-alt',
				'title'           => __( 'Basic Hero', 'severalnines' ),
				'description'     => __( 'Bring basic text heading Hero', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-basic-hero.php',
				'category'        => 'heros',
				'supports'        => array(
					'jsx' => true,
					'mode' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Case Hero',
				'icon'            => 'superhero-alt',
				'title'           => __( 'Case Hero', 'severalnines' ),
				'description'     => __( 'Bring text and image to Hero in case studies', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-case-hero.php',
				'category'        => 'heros',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Our Products',
				'icon'            => 'products',
				'title'           => __( 'Our Products', 'severalnines' ),
				'description'     => __( 'Bring our products columns to homepage', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-our-products.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx'  => true,
					'mode' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Archive',
				'icon'            => 'archive',
				'title'           => __( 'Archive', 'severalnines' ),
				'description'     => __( 'Set archive to content', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-archive.php',
				'category'        => 'layout',
				'supports'        => array(
					'align' => false,
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Text and media',
				'icon'            => 'admin-media',
				'title'           => __( 'Text and media', 'severalnines' ),
				'description'     => __( 'Bring text and image to content', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-text-and-media.php',
				'category'        => 'media',
				'supports'        => array(
					'jsx' => true,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Button',
				'icon'            => 'button',
				'title'           => __( 'Button', 'severalnines' ),
				'description'     => __( 'Severalnines buttons', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-button.php',
				'category'        => 'text',
				'supports'        => array(
					'align' => true,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Icon picker',
				'icon'            => 'art',
				'title'           => __( 'Icon picker', 'severalnines' ),
				'description'     => __( 'Severalnines icon picker', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-icon-picker.php',
				'category'        => 'media',
				'supports'        => array(
					'align' => true,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Icon grid',
				'icon'            => 'tagcloud',
				'title'           => __( 'Logo grid', 'severalnines' ),
				'description'     => __( 'Database icons' ),
				'render_template' => 'template-parts/blocks/block-icon-grid.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'align' => false,
				),
			)
		);
		acf_register_block_type(
			array(
				'name'              => 'our-customers',
				'title'             => __('Customer Logos', 'severalnines'),
				'description'       => __('Customer logos block', 'severalnines'),
				'render_template'   => 'template-parts/blocks/block-our-customers.php',
				'category'          => 'cntrst-blocks',
				'supports'        => array(
					'align' => false,
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Three columns icons',
				'icon'            => 'welcome-learn-more',
				'title'           => __( 'Benefits block', 'severalnines' ),
				'description'     => __( 'Creates 3 columns with icons', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-three-columns-icons.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx'  => true,
					'mode' => false,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Grid of text items',
				'icon'            => 'buddicons-activity',
				'title'           => __( 'Grid of text items', 'severalnines' ),
				'description'     => __( 'Creates 6 columns with optional images and links', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-grid-of-text-items.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx'  => true,
					'mode' => false,
					'align' => false,
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Items with extensive links',
				'icon'            => 'layout',
				'title'           => __( 'Items with extensive links', 'severalnines' ),
				'description'     => __( 'Creates 6 columns with optional icons and links', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-items-with-extensive-links.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx'  => true,
					'mode' => false,
					'align' => false,
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Cover with textbox',
				'icon'            => 'feedback',
				'title'           => __( 'CTA Block', 'severalnines' ),
				'description'     => __( 'Sets full background image with a textbox', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-cover-with-textbox.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Cover with subscribe',
				'icon'            => 'analytics',
				'title'           => __( 'CTA subscribe', 'severalnines' ),
				'description'     => __( 'Sets full background image with a subscribe', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-cover-with-subscribe.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Blue background CTA',
				'icon'            => 'screenoptions',
				'title'           => __( 'Blue background CTA', 'severalnines' ),
				'description'     => __( 'Sets blue background image with a textbox', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-blue-background-cta.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'mode' => false,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Company',
				'icon'            => 'businessperson',
				'title'           => __( 'Company', 'severalnines' ),
				'description'     => __( 'Sets company section', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-company.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Features',
				'icon'            => 'list-view',
				'title'           => __( 'Feature grid', 'severalnines' ),
				'description'     => __( 'Sets feature grid with icons', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-features.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Customer story',
				'icon'            => 'businesswoman',
				'title'           => __( 'Customer story', 'severalnines' ),
				'description'     => __( 'Set customer story' ),
				'render_template' => 'template-parts/blocks/block-customer-story.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Related stories',
				'icon'            => 'id',
				'title'           => __( 'Related stories', 'severalnines' ),
				'description'     => __( 'Related stories for case study', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-related-stories.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'align' => false,
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Selected resources',
				'icon'            => 'businessman',
				'title'           => __( 'Selected resources', 'severalnines' ),
				'description'     => __( 'Selected resources from other post type', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-selected-resources.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'align' => false,
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Faq',
				'icon'            => 'format-status',
				'title'           => __( 'Faq', 'severalnines' ),
				'description'     => __( 'Frequently asked questions', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-faq.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'mode' => false,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Choose product',
				'icon'            => 'buddicons-groups',
				'title'           => __( 'Choose product', 'severalnines' ),
				'description'     => __( 'Choose product buttons for pricing page', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-choose-product.php',
				'category'        => 'pricing',
				'supports'        => array(
					'jsx' => true,
					'mode' => false,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Product button',
				'icon'            => 'businessman',
				'title'           => __( 'Product button', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-product-button.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'mode' => false,
					'align' => false,
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'ClusterControl plans',
				'icon'            => 'star-empty',
				'title'           => __( 'ClusterControl plans', 'severalnines' ),
				'description'     => __( 'ClusetrControl plans descriptions', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-clustercontrol-plans.php',
				'category'        => 'pricing',
				'supports'        => array(
					'jsx' => true,
					'mode' => false,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'ClusterControl prices',
				'icon'            => 'marker',
				'title'           => __( 'ClusterControl prices', 'severalnines' ),
				'description'     => __( 'ClusterControl pricing tables', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-clustercontrol-prices.php',
				'category'        => 'pricing',
				'supports'        => array(
					'jsx' => true,
					'mode' => false,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
			acf_register_block_type(
			array(
				'name'            => 'ClusterControl Get started',
				'icon'            => 'coffee',
				'title'           => __( 'ClusterControl get started', 'severalnines' ),
				'description'     => __( 'ClusterControl get started grey background section', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-clustercontrol-get-started.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'mode' => false,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
			acf_register_block_type(
			array(
				'name'            => 'CCX get started',
				'icon'            => 'admin-network',
				'title'           => __( 'CCX get started', 'severalnines' ),
				'description'     => __( 'CCX get started grey background section', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-ccx-get-started.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'mode' => false,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'CCX prices',
				'icon'            => 'star-half',
				'title'           => __( 'CCX prices', 'severalnines' ),
				'description'     => __( 'CCX Pricing tables', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-ccx-prices.php',
				'category'        => 'pricing',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'CCX plans',
				'icon'            => 'star-filled',
				'title'           => __( 'CCX plans', 'severalnines' ),
				'description'     => __( 'CCX Plans descriptions', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-ccx-plans.php',
				'category'        => 'pricing',
				'supports'        => array(
					'jsx' => true,
					'mode' => false,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Quote',
				'icon'            => 'format-quote',
				'title'           => __( 'Quotes', 'severalnines' ),
				'description'     => __( 'Severalnines quotes', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-quotes.php',
				'category'        => 'text',
				'supports'        => array(
					'align' => false,
					'jsx'   => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'quote-type' => 'pullquote',
							'quote'      => 'Your quote comes here',
							'author'     => 'My author',
						),
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'Accordion',
				'icon'            => 'list-view',
				'title'           => __( 'Accordion', 'severalnines' ),
				'description'     => __( 'Set togglable accordion to content', 'severalnines' ),
				'category'        => 'layout',
				'render_template' => 'template-parts/blocks/block-accordion.php',
				'supports'        => array(
					'align' => false,
					'mode'  => false,
					'jsx'   => true,
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'image-tabs',
				'icon'            => 'embed-photo',
				'title'           => __( 'Image tabs', 'severalnines' ),
				'description'     => __( 'Set togglable tabs to content', 'severalnines' ),
				'category'        => 'cntrst-blocks',
				'render_template' => 'template-parts/blocks/block-general-tabs.php',
				'supports'        => array(
					'align' => false,
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'career-hero',
				'icon'            => 'tide',
				'title'           => __( 'Career Hero', 'severalnines' ),
				'description'     => __( 'Bring text and image to Career Hero', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-career-hero.php',
				'category'        => 'heros',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'career-join-us',
				'icon'            => 'star-filled',
				'title'           => __( 'Career Join Us', 'severalnines' ),
				'description'     => __( 'Set icon and text to join us', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-career-join-us.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'job-openings',
				'icon'            => 'businessman',
				'title'           => __( 'Job openings', 'severalnines' ),
				'description'     => __( 'Set job opening listing', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-job-openings.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'download-cc',
				'icon'            => 'download',
				'title'           => __( 'Download CC ', 'severalnines' ),
				'description'     => __( 'Set download links', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-download-cc.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'cc-intallation-resources',
				'icon'            => 'admin-generic',
				'title'           => __( 'CC Instaltion Resources ', 'severalnines' ),
				'description'     => __( 'Set resource links', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-cc-intallation-resources.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'additional-help',
				'icon'            => 'phone',
				'title'           => __( 'Additional-help ', 'severalnines' ),
				'description'     => __( 'Support link', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-additional-help.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'installation-scripts',
				'icon'            => 'html',
				'title'           => __( 'Installtion Scripts ', 'severalnines' ),
				'description'     => __( 'Set Installtion scripts', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-installation-scripts.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'docker-image',
				'icon'            => 'html',
				'title'           => __( 'Docker Image Installation ', 'severalnines' ),
				'description'     => __( 'Docker Image Installation Steps', 'severalnines' ),
				'render_template' => 'template-parts/blocks/block-docker-image.php',
				'category'        => 'cntrst-blocks',
				'supports'        => array(
					'jsx' => true,
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
					),
				),
			)
		);
		
	}
}

/**
 * Add support for custom color palettes in Gutenberg.
 */

function gutenberg_color_palette() {

	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => esc_html__( 'Black', 'severalnines' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
			array(
				'name'  => esc_html__( 'White', 'severalnines' ),
				'slug'  => 'white',
				'color' => '#fff',
			),
			array(
				'name'  => esc_html__( 'Blue', 'severalnines' ),
				'slug'  => 'blue',
				'color' => '#0a1250',
			),
			array(
				'name'  => esc_html__( 'Pink', 'severalnines' ),
				'slug'  => 'pink',
				'color' => '#B80B7B',
			),
			array(
				'name'  => esc_html__( 'Dark pink', 'severalnines' ),
				'slug'  => 'dark-pink',
				'color' => '#a1208a',
			),
			array(
				'name'  => esc_html__( 'Grey', 'severalnines' ),
				'slug'  => 'grey',
				'color' => '#70737a',
			),
			array(
				'name'  => esc_html__( 'Light grey 1', 'severalnines' ),
				'slug'  => 'light-grey-1',
				'color' => '#f0f1f5',
			),
		)
	);
}

add_action( 'after_setup_theme', 'gutenberg_color_palette' );

/*
 * Filter Gutenberg block library
 */

add_filter( 'allowed_block_types_all', 'cntrst_allowed_blocktypes' );

function cntrst_allowed_blocktypes( $allowed_block_types ) {

	return array(
		'core/paragraph',
		'core/heading',
		'core/columns',
		'core/gallery',
		'core/embed',
		'core/freeform',
		'core/image',
		'core/block',
		'core/code',
		'core/html',
		'core/list',
		'core/table',
		'core/subhead',
		'core/group',
		'core/video',
		'core/separator',
		'core/spacer',
		'acf/text-and-media',
		'acf/hero',
		'acf/basic-hero',
		'acf/case-hero',
		'acf/home-hero',
		'acf/our-products',
		'acf/choose-product',
		'acf/download',
		'acf/icon-grid',
		'acf/icon-picker',
		'acf/features',
		'acf/button',
		'acf/three-columns-icons',
		'acf/cover-with-textbox',
		'acf/cover-with-subscribe',
		'acf/quote',
		'acf/customer-story',
		'acf/selected-resources',
		'acf/blue-background-cta',
		'acf/accordion',
		'acf/faq',
		'acf/grid-of-text-items',
		'acf/items-with-extensive-links',
		'acf/company',
		'acf/clustercontrol-plans',
		'acf/clustercontrol-prices',
		'acf/clustercontrol-get-started',
		'acf/ccx-prices',
		'acf/ccx-plans',
		'acf/ccx-get-started',
		'acf/archive',
		'acf/image-tabs',
		'acf/our-customers',
		'acf/customers',
		'acf/career-hero',
		'acf/career-join-us',
		'acf/job-openings',
		'acf/download-cc',
		'acf/cc-intallation-resources',
		'acf/additional-help',
		'acf/installation-scripts',
		'acf/docker-image'
	);

}

/*
 * We need separate Javascript to remove unnecessary embed options from block library.
 * Also removes some unnecessary features in core blocks.
 */

function gutenberg_reset_enqueue() {
	wp_enqueue_script( 'gutenberg-reset-enqueue', get_template_directory_uri() . '/assets/js/reset.js', array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), '1.0', false );
}
add_action( 'enqueue_block_editor_assets', 'gutenberg_reset_enqueue' );

/*
 * We use block patterns to create our templates
 */

function cntrts_register_my_patterns() {

	register_block_pattern_category(
		'templates',
		array( 'label' => __( 'Templates', 'severalnines' ) )
	);

	register_block_pattern(
		'ccx',
		array(
			'title'       => __( 'CCX', 'severalnines' ),
			'description' => _x( 'Set CCX template', 'severalnines' ),
			'categories'  => array( 'templates' ),
			'content'     => '<!-- wp:acf/hero -->
												<!-- /wp:acf/hero -->
												<!-- wp:acf/icon-grid /-->
												<!-- wp:separator -->
												<hr class="wp-block-separator"/>
												<!-- /wp:separator -->
												<!-- wp:acf/three-columns-icons -->
												<!-- /wp:acf/three-columns-icons -->
												<!-- wp:acf/features -->
												<!-- /wp:acf/features -->
												<!-- wp:acf/grid-of-text-items -->
												<!-- /wp:acf/grid-of-text-items -->
												<!-- wp:acf/customer-story -->
												<!-- /wp:acf/customer-story -->
												<!-- wp:separator -->
												<hr class="wp-block-separator"/>
												<!-- /wp:separator -->
												<!-- wp:acf/text-and-media {"name":"acf/text-and-media","data":{"reverse":"1"},"align":"","mode":"preview"} -->
												<!-- /wp:acf/text-and-media -->
												<!-- wp:acf/text-and-media -->
												<!-- /wp:acf/text-and-media -->
												<!-- wp:acf/blue-background-cta  -->
												<!-- /wp:acf/blue-background-cta -->
												<!-- wp:acf/faq  -->
												<!-- /wp:acf/faq -->
												<!-- wp:acf/cover-with-textbox /-->',
		)
	);

	register_block_pattern(
		'clustercontrol',
		array(
			'title'       => __( 'ClusterControl', 'severalnines' ),
			'description' => _x( 'Set ClusterControl template', 'severalnines' ),
			'categories'  => array( 'templates' ),
			'content'     => '<!-- wp:acf/hero -->
												<!-- /wp:acf/hero -->
												<!-- wp:acf/icon-grid /-->
												<!-- wp:separator -->
												<hr class="wp-block-separator"/>
												<!-- /wp:separator -->
												<!-- wp:acf/features -->
												<!-- /wp:acf/features -->
												<!-- wp:acf/customer-story /-->
												<!-- wp:separator -->
												<hr class="wp-block-separator"/>
												<!-- /wp:separator -->
												<!-- wp:acf/text-and-media -->
												<!-- /wp:acf/text-and-media -->
												<!-- wp:acf/blue-background-cta -->
												<!-- /wp:acf/blue-background-cta -->
												<!-- wp:acf/faq -->
												<!-- /wp:acf/faq -->
												<!-- wp:acf/cover-with-textbox /-->',
		)
	);

	register_block_pattern(
		'integrations',
		array(
			'title'       => __( 'Integrations', 'severalnines' ),
			'description' => _x( 'Set integrations template', 'severalnines' ),
			'categories'  => array( 'templates' ),
			'content'     => '<!-- wp:acf/basic-hero -->
												<!-- /wp:acf/basic-hero -->
												<!-- wp:separator -->
												<hr class="wp-block-separator"/>
												<!-- /wp:separator -->
												<!-- wp:acf/grid-of-text-items -->
												<!-- /wp:acf/grid-of-text-items -->
												<!-- wp:separator -->
												<hr class="wp-block-separator"/>
												<!-- /wp:separator -->
												<!-- wp:acf/grid-of-text-items -->
												<!-- /wp:acf/grid-of-text-items -->
												<!-- wp:separator -->
												<hr class="wp-block-separator"/>
												<!-- /wp:separator -->
												<!-- wp:acf/grid-of-text-items -->
												<!-- /wp:acf/grid-of-text-items -->
												<!-- wp:acf/cover-with-textbox /-->',
		)
	);

	register_block_pattern(
		'security',
		array(
			'title'       => __( 'Security', 'severalnines' ),
			'description' => _x( 'Set security template', 'severalnines' ),
			'categories'  => array( 'templates' ),
			'content'     => '<!-- wp:acf/hero -->
												<!-- /wp:acf/hero -->
												<!-- wp:acf/text-and-media -->
												<!-- /wp:acf/text-and-media -->
												<!-- wp:acf/text-and-media {"name":"acf/text-and-media","data":{"reverse":"1"},"align":"","mode":"preview"} -->
												<!-- /wp:acf/text-and-media -->
												<!-- wp:acf/text-and-media -->
												<!-- /wp:acf/text-and-media -->
												<!-- wp:separator -->
												<hr class="wp-block-separator"/>
												<!-- /wp:separator -->
												<!-- wp:acf/faq -->
												<!-- /wp:acf/faq -->
												<!-- wp:acf/cover-with-textbox /-->',
		)
	);

	register_block_pattern(
		'features',
		array(
			'title'       => __( 'Features', 'severalnines' ),
			'description' => _x( 'Set feature template', 'severalnines' ),
			'categories'  => array( 'templates' ),
			'content'     => '<!-- wp:acf/hero -->
												<!-- /wp:acf/hero -->
												<!-- wp:acf/grid-of-text-items -->
												<!-- /wp:acf/grid-of-text-items -->
												<!-- wp:acf/blue-background-cta  -->
												<!-- /wp:acf/blue-background-cta -->
												<!-- wp:acf/items-with-extensive-links -->
												<!-- /wp:acf/items-with-extensive-links -->
												<!-- wp:acf/faq -->
												<!-- /wp:acf/faq -->
												<!-- wp:acf/cover-with-textbox /-->
				',
		)
	);	
	register_block_pattern(
		'get-started',
		array(
			'title'       => __( 'Get started', 'severalnines' ),
			'description' => _x( 'Set get started template', 'severalnines' ),
			'categories'  => array( 'templates' ),
			'content'     => '<!-- wp:acf/choose-product -->
												<!-- /wp:acf/choose-product -->
												<!-- wp:acf/clustercontrol-get-started -->
												<!-- /wp:acf/clustercontrol-get-started -->
												<!-- wp:acf/ccx-get-started -->
												<!-- /wp:acf/ccx-get-started -->',
		)
	);
	register_block_pattern(
		'home',
		array(
			'title'       => __( 'Homepage', 'severalnines' ),
			'description' => _x( 'Set homepage template', 'severalnines' ),
			'categories'  => array( 'templates' ),
			'content'     => '<!-- wp:acf/home-hero --> 
								<!-- /wp:acf/home-hero -->												
								<!-- wp:acf/our-customers /-->
								<!-- wp:acf/our-products -->
								<!-- /wp:acf/our-products -->
								<!-- wp:acf/icon-grid  -->
								<!-- /wp:acf/icon-grid -->
								<!-- wp:acf/customer-story -->
								<!-- /wp:acf/customer-story -->
								<!-- wp:separator -->
								<hr class="wp-block-separator"/>
								<!-- /wp:separator -->
								<!-- wp:acf/selected-resources  -->
								<!-- /wp:acf/selected-resources -->
								<!-- wp:acf/cover-with-textbox /-->
				',
		)
	);
	register_block_pattern(
		'pricing',
		array(
			'title'       => __( 'Pricing', 'severalnines' ),
			'description' => _x( 'Set pricing template', 'severalnines' ),
			'categories'  => array( 'templates' ),
			'content'     => '<!-- wp:acf/choose-product -->
												<!-- /wp:acf/choose-product -->
												<!-- wp:acf/clustercontrol-plans -->
												<!-- /wp:acf/clustercontrol-plans -->
												<!-- wp:acf/clustercontrol-prices -->
												<!-- /wp:acf/clustercontrol-prices -->
												<!-- wp:group {"tagName":"section","className":"clustercontrol"} -->
												<section class="wp-block-group clustercontrol"><!-- wp:html -->
												<h2>Insert your Pardot iframe form here</h2>
												<!-- /wp:html --></section>
												<!-- /wp:group -->
												<!-- wp:acf/ccx-plans -->
												<!-- /wp:acf/ccx-plans -->
												<!-- wp:acf/ccx-prices -->
												<!-- /wp:acf/ccx-prices -->
												<!-- wp:acf/blue-background-cta  -->
												<!-- /wp:acf/blue-background-cta -->
												<!-- wp:acf/faq  -->
												<!-- /wp:acf/faq -->
												<!-- wp:acf/cover-with-textbox /-->',
		)
	);
	register_block_pattern(
		'company',
		array(
			'title'       => __( 'Company', 'severalnines' ),
			'description' => _x( 'Set Company template', 'severalnines' ),
			'categories'  => array( 'templates' ),
			'content'     => '<!-- wp:acf/hero {"id":"block_624ea900c5eef","name":"acf/hero","data":{"image":313,"_image":"field_62230e8ebaa85","shape":"1","_shape":"field_624ea8971c1e4"},"align":"","mode":"preview"} -->
												<!-- wp:paragraph -->
												<p><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-grey-color">ABOUT US</mark></p>
												<!-- /wp:paragraph -->
												<!-- wp:heading {"level":1,"placeholder":"Set your heading here"} -->
												<h1>We’re Severalnines</h1>
												<!-- /wp:heading -->
												<!-- wp:paragraph -->
												<p>We make amazing products that help people, because we believe that everyone deserves the best service.</p>
												<!-- /wp:paragraph -->
												<!-- /wp:acf/hero -->
												<!-- wp:acf/three-columns-icons -->
												<!-- /wp:acf/three-columns-icons -->
												<!-- wp:separator -->
												<hr class="wp-block-separator"/>
												<!-- /wp:separator -->
												<!-- wp:heading {"textAlign":"center"} -->
												<h2 class="has-text-align-center">Our company</h2>
												<!-- /wp:heading -->
												<!-- wp:paragraph -->
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus egestas velit at dolor volutpat euismod. Mauris ut odio et quam tincidunt auctor vitae vitae urna. Mauris vehicula vestibulum ante vel suscipit. Etiam viverra auctor justo, at interdum justo efficitur vitae. Praesent fermentum porttitor lacus, non feugiat felis venenatis efficitur. </p>
												<!-- /wp:paragraph -->
												<!-- wp:separator -->
												<hr class="wp-block-separator"/>
												<!-- /wp:separator -->
												<!-- wp:acf/icon-grid /-->
												<!-- wp:separator -->
												<hr class="wp-block-separator"/>
												<!-- /wp:separator -->
												<!-- wp:acf/text-and-media {"id":"block_624eabb0ca21c","name":"acf/text-and-media","data":{"field_5f2423701f8d2":"313","field_624eabe51acd3":"1","field_5f2423df1f8d4":"1"},"align":"","mode":"preview"} -->
												<!-- /wp:acf/text-and-media -->
												<!-- wp:acf/text-and-media {"id":"block_624eac2a18405","name":"acf/text-and-media","data":{"image":313,"_image":"field_5f2423701f8d2","shape":"1","_shape":"field_624eabe51acd3","reverse":"0","_reverse":"field_5f2423df1f8d4"},"align":"","mode":"preview"} -->
												<!-- /wp:acf/text-and-media -->
												<!-- wp:acf/blue-background-cta {"id":"block_624eb899f63f4","name":"acf/blue-background-cta","data":{"field_6231830a87c1a":"1"},"align":"","mode":"preview", "className":"extended"} -->
												<!-- wp:acf/icon-picker {"id":"block_624ec0121a035","name":"acf/icon-picker","data":{"field_6228d113a9ade":"ico-user-w"},"align":"center","mode":"preview"} /-->
												<!-- wp:heading {"textAlign":"center"} -->
												<h2 class="has-text-align-center"><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-white-color">Proin sollicitudin mauris nec mauris venenatis interdum</mark></h2>
												<!-- /wp:heading -->
												<!-- wp:paragraph {"align":"center"} -->
												<p class="has-text-align-center"><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-white-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sagittis dictum elit, quis pharetra est congue cursus. Vestibulum et fringilla nisi, a cursus ipsum. </mark></p>
												<!-- /wp:paragraph -->
												<!-- /wp:acf/blue-background-cta -->
												<!-- /wp:acf/company /-->
												<!-- wp:acf/cover-with-textbox /-->',
		)
	);
	register_block_pattern(
		'careerspage',
		array(
			'title'       => __( 'Careers Page Template', 'severalnines' ),
			'description' => _x( 'Set Careers Page template', 'severalnines' ),
			'categories'  => array( 'templates' ),
			'content'     => '<!-- wp:acf/career-hero /-->
								<!-- wp:acf/career-join-us /-->
								<!-- wp:acf/job-openings /-->
								<!-- wp:acf/cover-with-textbox /-->',
		)
	);
}

add_action( 'init', 'cntrts_register_my_patterns' );

/**
 * Block template for posts
 *
 * @link https://www.billerickson.net/gutenberg-block-templates/
 */
function case_study_block_template() {

	$post_type_object = get_post_type_object( 'case_study' );
	$post_type_object->template = array(
		array( 'acf/case-hero' ),
		array(
			'core/heading',
			array(
				'level'   => 3,
				'content' => 'Background',
			),
		),
		array(
			'core/paragraph',
			array(
				'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Morbi magna nulla, blandit eu tortor ac, ultricies ornare diam.
					Suspendisse consequat vitae quam sit amet congue. Fusce vitae sapien quis leo lacinia sollicitudin non vitae nisi.
					Aliquam scelerisque orci id neque dignissim lobortis vulputate sit amet lorem.',
			),
		),
		array(
			'core/heading',
			array(
				'level'   => 3,
				'content' => 'Challenge',
			),
		),
		array(
			'core/paragraph',
			array(
				'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Morbi magna nulla, blandit eu tortor ac, ultricies ornare diam.
					Suspendisse consequat vitae quam sit amet congue. Fusce vitae sapien quis leo lacinia sollicitudin non vitae nisi.
					Aliquam scelerisque orci id neque dignissim lobortis vulputate sit amet lorem.',
			),
		),
		array(
			'core/heading',
			array(
				'level'   => 3,
				'content' => 'Solution',
			),
		),
		array(
			'core/paragraph',
			array(
				'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Morbi magna nulla, blandit eu tortor ac, ultricies ornare diam.
					Suspendisse consequat vitae quam sit amet congue. Fusce vitae sapien quis leo lacinia sollicitudin non vitae nisi.
					Aliquam scelerisque orci id neque dignissim lobortis vulputate sit amet lorem.',
			),
		),
		array(
			'core/heading',
			array(
				'level'   => 3,
				'content' => 'Outcome',
			),
		),
		array(
			'core/paragraph',
			array(
				'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Morbi magna nulla, blandit eu tortor ac, ultricies ornare diam.
					Suspendisse consequat vitae quam sit amet congue. Fusce vitae sapien quis leo lacinia sollicitudin non vitae nisi.
					Aliquam scelerisque orci id neque dignissim lobortis vulputate sit amet lorem.',
			),
		),
		array( 'core/separator' ),
		array( 'acf/three-columns-icons' ),
		array( 'acf/related-stories' ),
		array( 'acf/cover-with-textbox' ),
	);
}

add_action( 'init', 'case_study_block_template' );
