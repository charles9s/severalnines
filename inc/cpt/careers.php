<?php
function register_careers_post_type() {

	$labels = array(
		'name'               => _x( 'Careers', 'post type general name', 'severalnines' ),
		'singular_name'      => _x( 'Career', 'post type singular name', 'severalnines' ),
		'menu_name'          => _x( 'Careers', 'admin menu', 'severalnines' ),
		'name_admin_bar'     => _x( 'Career', 'add new on admin bar', 'severalnines' ),
		'add_new'            => _x( 'Add Career', 'add new item', 'severalnines' ),
		'add_new_item'       => __( 'Add Career', 'severalnines' ),
		'new_item'           => __( 'New Career', 'severalnines' ),
		'edit_item'          => __( 'Edit Career', 'severalnines' ),
		'view_item'          => __( 'Look Career', 'severalnines' ),
		'all_items'          => __( 'All Careers', 'severalnines' ),
		'search_items'       => __( 'Search Career', 'severalnines' ),
		'parent_item_colon'  => __( 'Parent Career', 'severalnines' ),
		'not_found'          => __( 'No Careers', 'severalnines' ),
		'not_found_in_trash' => __( 'No Careers in trash', 'severalnines' ),
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
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-welcome-learn-more',
		'show_in_rest'       => true,
		'rewrite'            => array(
			'slug' => _x( 'careers', 'slug', 'severalnines' ),
			'with_front' => false,
		),
		'supports'           => array( 'title', 'editor', 'revisions', 'excerpt', 'thumbnail' ),
	);
	register_post_type( 'careers', $args );	
}

add_action( 'init', 'register_careers_post_type' );