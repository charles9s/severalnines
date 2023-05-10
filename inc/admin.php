<?php

/*
 *	Remove Wordpress default dashboard messages
 */

function remove_dashboard_meta() {
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
}
add_action( 'admin_init', 'remove_dashboard_meta' );

/*
 *	Create special super admin role for client
 */

/*add_role( 'super-administrator', 'Super Administrator', get_role( 'administrator' )->capabilities );*/

/*
 *	Create custom sidebar menu. Restrict integral settings access only for @contrast.fi users
 */

/*add_action( 'admin_menu', 'cntrst_customize_admin_menu', 9999 );

function cntrst_customize_admin_menu() {

	if ( ! strpos( get_userdata( get_current_user_id() )->user_email, 'contrast.fi') && get_userdata( get_current_user_id() )->roles[0] != 'super-administrator' )  {

		// Hide Advanced Custom Fields
		remove_menu_page( 'edit.php?post_type=acf-field-group' );

		// Hide "Updates" under Dashboard menu
		remove_submenu_page( 'index.php', 'update-core.php' );

		// Hide Comments
		remove_menu_page( 'edit-comments.php' );

		// Hide Plugins
		remove_menu_page( 'plugins.php' );

		// Hide Themes
		remove_menu_page( 'themes.php' );

		// Add Redirections as separate item
		if (function_exists( 'redirection_locale')):
			add_menu_page( __( 'Redirections', 'severalnines' ), 'Redirections', 'manage_options', 'tools.php?page=redirection.php', '', 'dashicons-flag', 75 );
		endif;

		// Add menu as separate item
		add_menu_page( __( 'Menus', 'severalnines' ), 'Menus', 'manage_options', 'nav-menus.php', '', 'dashicons-menu', 75 );

		// Add site health as separate item
		add_menu_page( __( 'Site health', 'severalnines' ), 'Site health', 'manage_options', 'site-health.php', '', 'dashicons-info-outline', 75 );

		// Hide Tools
		remove_menu_page( 'tools.php' );

		function hide_adminstrator_editable_roles( $roles ){
			if ( isset(	$roles['super-administrator'] ) ){
				unset( $roles['super-administrator'] );
			}
			return $roles;
		}

		add_action( 'editable_roles' , 'hide_adminstrator_editable_roles' );
	}

}*/

/*
 *  ACF Options Theme settings
 */

if ( function_exists( 'acf_add_options_page' ) ) {
	$parent = acf_add_options_page(
		array(
			'page_title' => 'Theme General Settings',
			'menu_title' => 'Theme Settings',
			'redirect'   => 'Theme Settings',
		)
	);
}


