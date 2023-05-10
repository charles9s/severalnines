<?php

function register_resources_post_type() {

	$labels = array(
		'name'               => _x( 'Resources', 'post type general name', 'severalnines' ),
		'singular_name'      => _x( 'Resource', 'post type singular name', 'severalnines' ),
		'menu_name'          => _x( 'Resources', 'admin menu', 'severalnines' ),
		'name_admin_bar'     => _x( 'Resource', 'add new on admin bar', 'severalnines' ),
		'add_new'            => _x( 'Add Resource', 'add new item', 'severalnines' ),
		'add_new_item'       => __( 'Add Resource', 'severalnines' ),
		'new_item'           => __( 'New Resource', 'severalnines' ),
		'edit_item'          => __( 'Edit Resource', 'severalnines' ),
		'view_item'          => __( 'Look Resource', 'severalnines' ),
		'all_items'          => __( 'All Resources', 'severalnines' ),
		'search_items'       => __( 'Search Resource', 'severalnines' ),
		'parent_item_colon'  => __( 'Parent Resource', 'severalnines' ),
		'not_found'          => __( 'No Resources', 'severalnines' ),
		'not_found_in_trash' => __( 'No Resources in trash', 'severalnines' ),
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
		'menu_icon'          => 'dashicons-id',
		'show_in_rest'       => true,
		'rewrite'            => array(
			'slug' => _x( 'resources', 'slug', 'severalnines' ),
			'with_front' => false,
		),
		'supports'           => array( 'title', 'editor', 'revisions', 'excerpt', 'thumbnail' ),
	);

	register_post_type( 'resources', $args );

	$labels = array(
		'name'               => _x( 'Resource types', 'taxonomy general name', 'severalnines' ),
		'singular_name'      => _x( 'Resource type', 'taxonomy singular name', 'severalnines' ),
		'search_items'       => __( 'Search resource types', 'severalnines' ),
		'all_items'          => __( 'Search resource types', 'severalnines' ),
		'parent_item'        => __( 'Parent resource type', 'severalnines' ),
		'parent_item_colon'  => __( 'Parent resource type:', 'severalnines' ),
		'edit_item'          => __( 'Edit resource type', 'severalnines' ),
		'update_item'        => __( 'Update resource type', 'severalnines' ),
		'add_new_item'       => __( 'Add new resource type', 'severalnines' ),
		'delete_item'        => __( 'Delete resource type', 'severalnines' ),
		'new_item_name'      => __( 'Add resource type', 'severalnines' ),
		'not_found'          => __( 'Resource type not found', 'severalnines' ),
		'not_found_in_trash' => __( 'No Resource types in trash', 'severalnines' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
		'rewrite'           => array(
			'slug' => _x( 'resource-type', 'slug', 'severalnines' ),
		),
	);

	register_taxonomy( 'resource_type', 'resources', $args );

}

add_action( 'init', 'register_resources_post_type' );
