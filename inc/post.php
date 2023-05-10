<?php

function post_taxonomies() {

	$labels = array(
		'name'               => _x( 'Products', 'taxonomy general name', 'severalnines' ),
		'singular_name'      => _x( 'Product', 'taxonomy singular name', 'severalnines' ),
		'search_items'       => __( 'Search post products', 'severalnines' ),
		'all_items'          => __( 'Search post products', 'severalnines' ),
		'parent_item'        => __( 'Parent post product', 'severalnines' ),
		'parent_item_colon'  => __( 'Parent post product:', 'severalnines' ),
		'edit_item'          => __( 'Edit post product', 'severalnines' ),
		'update_item'        => __( 'Update post product', 'severalnines' ),
		'add_new_item'       => __( 'Add new post product', 'severalnines' ),
		'delete_item'        => __( 'Delete post product', 'severalnines' ),
		'new_item_name'      => __( 'Add post product', 'severalnines' ),
		'not_found'          => __( 'Post product not found', 'severalnines' ),
		'not_found_in_trash' => __( 'No post products in trash', 'severalnines' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
		'rewrite'           => array(
			'slug' => _x( 'related-product', 'slug', 'severalnines' ),
		),
	);

	register_taxonomy( 'related-product', 'post', $args );

	$labels = array(
		'name'               => _x( 'Technologies', 'taxonomy general name', 'severalnines' ),
		'singular_name'      => _x( 'Technology', 'taxonomy singular name', 'severalnines' ),
		'search_items'       => __( 'Search post technologies', 'severalnines' ),
		'all_items'          => __( 'Search post technologies', 'severalnines' ),
		'parent_item'        => __( 'Parent post technology', 'severalnines' ),
		'parent_item_colon'  => __( 'Parent post technology:', 'severalnines' ),
		'edit_item'          => __( 'Edit post technology', 'severalnines' ),
		'update_item'        => __( 'Update post technology', 'severalnines' ),
		'add_new_item'       => __( 'Add new post technology', 'severalnines' ),
		'delete_item'        => __( 'Delete post technology', 'severalnines' ),
		'new_item_name'      => __( 'Add post technology', 'severalnines' ),
		'not_found'          => __( 'Post technology not found', 'severalnines' ),
		'not_found_in_trash' => __( 'No post technologies in trash', 'severalnines' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
		'rewrite'           => array(
			'slug' => _x( 'related-technology', 'slug', 'severalnines' ),
		),
	);

	register_taxonomy( 'related-technology', 'post', $args );

}

add_action( 'init', 'post_taxonomies' );

add_action( 'init', 'cp_change_post_object' );
// Change dashboard Posts to News
function cp_change_post_object() {
	$get_post_type              = get_post_type_object( 'post' );
	$labels                     = $get_post_type->labels;
	$labels->name               = 'Blog';
	$labels->singular_name      = 'Blog';
	$labels->add_new            = 'Add Blog';
	$labels->add_new_item       = 'Add Blog';
	$labels->edit_item          = 'Edit Blog';
	$labels->new_item           = 'Blog';
	$labels->view_item          = 'View Blog';
	$labels->search_items       = 'Search Blog';
	$labels->not_found          = 'No Blog found';
	$labels->not_found_in_trash = 'No Blog found in Trash';
	$labels->all_items          = 'All Blog';
	$labels->menu_name          = 'Blog';
	$labels->name_admin_bar     = 'Blog';
}

/* Podcast Post Type Start */

function cw_post_type_podcast() {
	$supports = array(
	'title', // post title
	'editor', // post content
	'author', // post author
	'thumbnail', // featured images
	'excerpt', // post excerpt
	'custom-fields', // custom fields
	'comments', // post comments
	'revisions', // post revisions
	'post-formats', // post formats
	);
	$labels = array(
	'name' => _x('podcasts', 'plural'),
	'singular_name' => _x('podcast', 'singular'),
	'menu_name' => _x('podcast', 'admin menu'),
	'name_admin_bar' => _x('podcast', 'admin bar'),
	'add_new' => _x('Add New', 'add new'),
	'add_new_item' => __('Add New podcast'),
	'new_item' => __('New podcast'),
	'edit_item' => __('Edit podcast'),
	'view_item' => __('View podcast'),
	'all_items' => __('All podcast'),
	'search_items' => __('Search podcast'),
	'not_found' => __('No podcast found.'),
	);
	$args = array(
	'supports' => $supports,
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'podcast'),
	'has_archive' => false,
	'hierarchical' => false,
	);
	register_post_type('podcast', $args);
	}
	add_action('init', 'cw_post_type_podcast');
	/*Podcast Post type end*/