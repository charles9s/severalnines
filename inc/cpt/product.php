<?php

function register_product_post_type() {

	$labels = array(
		'name'               => _x( 'Products', 'post type general name', 'severalnines' ),
		'singular_name'      => _x( 'Product', 'post type singular name', 'severalnines' ),
		'menu_name'          => _x( 'Products', 'admin menu', 'severalnines' ),
		'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'severalnines' ),
		'add_new'            => _x( 'Add Product', 'add new item', 'severalnines' ),
		'add_new_item'       => __( 'Add Product', 'severalnines' ),
		'new_item'           => __( 'New Product', 'severalnines' ),
		'edit_item'          => __( 'Edit Product', 'severalnines' ),
		'view_item'          => __( 'Look Product', 'severalnines' ),
		'all_items'          => __( 'All Products', 'severalnines' ),
		'search_items'       => __( 'Search Product', 'severalnines' ),
		'parent_item_colon'  => __( 'Parent Product', 'severalnines' ),
		'not_found'          => __( 'No Products', 'severalnines' ),
		'not_found_in_trash' => __( 'No Products in trash', 'severalnines' ),
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
		'hierarchical'       => true,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-products',
		'show_in_rest'       => true,
		'rewrite'   		 => array( 'slug' => 'product', 'with_front' => false ),  
		'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ),
	);
	register_post_type( 'product', $args );

}

add_action( 'init', 'register_product_post_type' );
