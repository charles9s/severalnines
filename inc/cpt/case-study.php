<?php

function register_case_study_post_type() {

	$labels = array(
		'name'               => _x( 'Case studies', 'post type general name', 'severalnines' ),
		'singular_name'      => _x( 'Case study', 'post type singular name', 'severalnines' ),
		'menu_name'          => _x( 'Case studies', 'admin menu', 'severalnines' ),
		'name_admin_bar'     => _x( 'Case study', 'add new on admin bar', 'severalnines' ),
		'add_new'            => _x( 'Add Case study', 'add new item', 'severalnines' ),
		'add_new_item'       => __( 'Add Case study', 'severalnines' ),
		'new_item'           => __( 'New Case study', 'severalnines' ),
		'edit_item'          => __( 'Edit Case study', 'severalnines' ),
		'view_item'          => __( 'Look Case study', 'severalnines' ),
		'all_items'          => __( 'All Case studies', 'severalnines' ),
		'search_items'       => __( 'Search Case study', 'severalnines' ),
		'parent_item_colon'  => __( 'Parent Case study', 'severalnines' ),
		'not_found'          => __( 'No Case studies', 'severalnines' ),
		'not_found_in_trash' => __( 'No Case studies in trash', 'severalnines' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-media-spreadsheet',
		'show_in_rest'       => true,
		'rewrite'            => array(
			'slug' => _x( 'case-studies', 'slug', 'severalnines' ),
			'with_front' => false,
		),
		'supports'           => array( 'title', 'editor', 'revisions', 'excerpt' ),
	);
	register_post_type( 'case_study', $args );

	$labels = array(
		'name'               => _x( 'Industry', 'taxonomy general name', 'severalnines' ),
		'singular_name'      => _x( 'Industry', 'taxonomy singular name', 'severalnines' ),
		'search_items'       => __( 'Search case study industries', 'severalnines' ),
		'all_items'          => __( 'Search case study industries', 'severalnines' ),
		'parent_item'        => __( 'Parent case study industry', 'severalnines' ),
		'parent_item_colon'  => __( 'Parent case study industry:', 'severalnines' ),
		'edit_item'          => __( 'Edit case study industry', 'severalnines' ),
		'update_item'        => __( 'Update case study industry', 'severalnines' ),
		'add_new_item'       => __( 'Add new case study industry', 'severalnines' ),
		'delete_item'        => __( 'Delete case study industry', 'severalnines' ),
		'new_item_name'      => __( 'Add case study industry', 'severalnines' ),
		'not_found'          => __( 'Case study industry not found', 'severalnines' ),
		'not_found_in_trash' => __( 'No case study industries in trash', 'severalnines' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
		'rewrite'           => array(
			'slug' => _x( 'case-study/industry', 'slug', 'severalnines' ),
		),
	);

	register_taxonomy( 'case_study_industry', 'case_study', $args );

	$labels = array(
		'name'               => _x( 'Technology', 'taxonomy general name', 'severalnines' ),
		'singular_name'      => _x( 'Technology', 'taxonomy singular name', 'severalnines' ),
		'search_items'       => __( 'Search case study technologies', 'severalnines' ),
		'all_items'          => __( 'Search case study technologies', 'severalnines' ),
		'parent_item'        => __( 'Parent case study technology', 'severalnines' ),
		'parent_item_colon'  => __( 'Parent case study technology:', 'severalnines' ),
		'edit_item'          => __( 'Edit case study technology', 'severalnines' ),
		'update_item'        => __( 'Update case study technology', 'severalnines' ),
		'add_new_item'       => __( 'Add new case study technology', 'severalnines' ),
		'delete_item'        => __( 'Delete case study technology', 'severalnines' ),
		'new_item_name'      => __( 'Add case study technology', 'severalnines' ),
		'not_found'          => __( 'Case study technology not found', 'severalnines' ),
		'not_found_in_trash' => __( 'No case study technologies in trash', 'severalnines' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
		'rewrite'           => array(
			'slug' => _x( 'case-study/technology', 'slug', 'severalnines' ),
		),
	);

	register_taxonomy( 'case_study_technology', 'case_study', $args );

	$labels = array(
		'name'               => _x( 'Product', 'taxonomy general name', 'severalnines' ),
		'singular_name'      => _x( 'Product', 'taxonomy singular name', 'severalnines' ),
		'search_items'       => __( 'Search case study products', 'severalnines' ),
		'all_items'          => __( 'Search case study products', 'severalnines' ),
		'parent_item'        => __( 'Parent case study product', 'severalnines' ),
		'parent_item_colon'  => __( 'Parent case study product:', 'severalnines' ),
		'edit_item'          => __( 'Edit case study product', 'severalnines' ),
		'update_item'        => __( 'Update case study product', 'severalnines' ),
		'add_new_item'       => __( 'Add new case study product', 'severalnines' ),
		'delete_item'        => __( 'Delete case study product', 'severalnines' ),
		'new_item_name'      => __( 'Add case study product', 'severalnines' ),
		'not_found'          => __( 'Case study product not found', 'severalnines' ),
		'not_found_in_trash' => __( 'No case study technologies in trash', 'severalnines' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
		'rewrite'           => array(
			'slug' => _x( 'case-study/product', 'slug', 'severalnines' ),
		),
	);

	register_taxonomy( 'case_study_product', 'case_study', $args );
}

add_action( 'init', 'register_case_study_post_type' );
