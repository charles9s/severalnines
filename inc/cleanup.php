<?php

/*
 * Cleanup emojis
 */

function cntrst_cleanup() {
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

}
add_action( 'init', 'cntrst_cleanup' );

/*
 * Remove links from admin bar
 */

function cntrst_remove_toolbar_links( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'customize' );
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->remove_node( 'comments' );
	$wp_admin_bar->remove_node( 'updates' );
	$wp_admin_bar->remove_node( 'update-core' );
}
add_action( 'admin_bar_menu', 'cntrst_remove_toolbar_links', 999 );

/*
 * Remove type tag from script and style. This creates cleaner HTML Validation, because it removes so many warnings.
 */

add_filter( 'style_loader_tag', 'cntrst_remove_type_attr', 10, 2 );
add_filter( 'script_loader_tag', 'cntrst_remove_type_attr', 10, 2 );
add_filter( 'autoptimize_html_after_minify', 'cntrst_remove_type_attr', 10, 2 );

function cntrst_remove_type_attr( $tag, $handle ) {
	return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}
