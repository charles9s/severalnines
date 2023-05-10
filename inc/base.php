<?php
if (session_id() === "") { session_start(); }
if ( ! function_exists( 'cntrst_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cntrst_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cntrst, use a find and replace
		 * to change 'severalnines' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'severalnines', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'severalnines' ),
				'footer'  => esc_html__( 'Footer', 'severalnines' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add wide support for grouping
		add_theme_support( 'align-wide' );

		// We add Gutenberg admin style support here with path to current compiled css file
		add_theme_support( 'editor-styles' );

		// Modify styles in assets/css/admin.scss
		add_editor_style( 'assets/dist/admin.css' );

		// Disable WordPress Lazy Load, We need more extensive lazyload with a plugin
		add_filter( 'wp_lazy_loading_enabled', '__return_false' );
	}
}
add_action( 'after_setup_theme', 'cntrst_setup' );

/*
 *  Register image sizes
 */

function cntrst_register_image_sizes() {

        add_image_size( 'hero-wide', 1352, 762, true );
	add_image_size( 'hero-square', 900, 900, true );
	add_image_size( 'post-hero', 480, 360, true );
	add_image_size( 'text-media', 1120, 1120, true );
	add_image_size( 'contact', 170, 80, true );
	add_image_size( 'archive', 600, 340, true );
}

add_action( 'init', 'cntrst_register_image_sizes', 1 );

/*
 * Enqueue scripts and styles.
 */
function cntrst_frontend_scripts_and_styles() {

	$js_version  = filemtime( get_stylesheet_directory() . '/assets/js/app.js' );
	$css_version = filemtime( get_stylesheet_directory() . '/assets/css/layout.scss' );

	wp_enqueue_style( 'cntrst-style', get_template_directory_uri() . '/assets/dist/layout.css', array(), $css_version );
	wp_enqueue_script( 'cntrst-scripts', get_template_directory_uri() . '/assets/dist/frontend.js', array( 'jquery' ), $js_version, true );

}

add_action( 'wp_enqueue_scripts', 'cntrst_frontend_scripts_and_styles' );

function cntrst_admin_scripts_and_styles() {

	$admin_js_version = filemtime( get_stylesheet_directory() . '/assets/js/app-admin.js' );
	wp_enqueue_script( 'cntrst-admin-scripts', get_template_directory_uri() . '/assets/dist/admin.js', array(), $admin_js_version, true );
	wp_enqueue_style( 'cntrst-body-admin-styles', get_template_directory_uri() . '/assets/css/body-styles-admin.css' );
}

add_action( 'admin_enqueue_scripts', 'cntrst_admin_scripts_and_styles' );

/*
 * Call favicons to head
 */

function cntrst_get_favicon() { ?>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_html( get_template_directory_uri() ); ?>/assets/img/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_html( get_template_directory_uri() ); ?>/assets/img/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_html( get_template_directory_uri() ); ?>/assets/img/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo esc_html( get_template_directory_uri() ); ?>/assets/img/favicons/site.webmanifest">
	<link rel="mask-icon" href="<?php echo esc_html( get_template_directory_uri() ); ?>/assets/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">
	<link rel="shortcut icon" href="<?php echo esc_html( get_template_directory_uri() ); ?>/assets/img/favicons/favicon.ico">
	<?php
}

add_action( 'wp_head', 'cntrst_get_favicon' );

/*
 * Set Advanced custom fields acf-json savepoint
 */

add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );

function my_acf_json_save_point( $path ) {

	// update path
	$path = get_stylesheet_directory() . '/acf-json';

	// return
	return $path;

}

/*
 *  Shorthand for defining excerpt without echoing it
 *  Use excerpt if one exists --> generate one of chosen length if not
 *  Use ... only if there is more content to see
 */

function cntrst_get_excerpt( $length, $id = null ) {

	$excerpt = '';

	if ( has_excerpt( $id ) ) :
		$excerpt = get_the_excerpt( $id );
	else :
		if ( $id ) {
			$excerpt = $str = mb_substr( wp_strip_all_tags( get_post_field( 'post_content', $id ) ), 0, $length );
			if ( strlen( get_post_field( 'post_content', $id ) ) > $length ) :
				$excerpt .= '...';
			endif;
		} else {
			$excerpt = $str = mb_substr( wp_strip_all_tags( get_the_content() ), 0, $length );
			if ( strlen( get_the_content() ) > $length ) :
				$excerpt .= '...';
			endif;
		}
	endif;

	return $excerpt;

}

/*
 * Our standard pagination function
 */

function cntrst_pagination_archives_posts( $numbers ) {

	if ( $numbers <= 1 ) {
		/** Stop execution if there's only 1 page */
		return;
	}

	$max   = $numbers;
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$links = array();

	/** Add current page to the array */
	if ( $paged >= 1 ) {
		$links[] = $paged;
	}

	/** Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="custom-pagination"><div class="container"><nav class="pagination" aria-label="Pagination Navigation"><ul>' . "\n";

	/** Previous Post Link */
	if ( get_previous_posts_link() ) {
		$aria = ' aria-label="' . __( 'Next page', 'severalnines' ) . '"';
		printf( '<li class="previous">%s</li>' . "\n", get_previous_posts_link( '<i class="arrow left"></i>' ) );
	}

	/** Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 === $paged ? ' class="active"' : '';
		$aria  = 'aria-label="' . __( 'Go to page' ) . ' 1"';

		printf( '<li%s><a href="%s" ' . $aria . '>%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) ) {
			echo '<li class="dots">…</li>';
		}
	}

	/** Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged === $link ? ' class="active"' : '';

		if ( $class === true ) {
			$aria = ' aria-label="' . __( 'Go to page ' . $paged ) . '" aria-current="page"';
		} else {
			$aria = ' aria-label="' . __( 'Go to page ' ) . $link . '"';
		}

		printf( '<li%s><a href="%s" ' . $aria . '>%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/** Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) ) {
			echo '<li class="dots">…</li>' . "\n";
		}

		$class = $paged === $max ? ' class="active"' : '';

		printf( '<li%s><a href="%s"  ' . $aria . '>%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/** Next Post Link */
	if ( get_next_posts_link() ) {
		if( $paged < $max ){
			$aria = ' aria-label="' . __( 'Next', 'severalnines' ) . '"';
			printf( '<li class="next">%s</li>' . "\n", get_next_posts_link( '<i' . $aria . ' class="arrow right"></i>' ) );
		}		
	}

	echo '</ul></nav></div></div>' . "\n";

}


/*
 * Clean archive title with this function
 */

function cntrst_archive_title( $title ) {

	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}

	return $title;
}

add_filter( 'get_the_archive_title', 'cntrst_archive_title' );

/*
 * Adds disabled class in gutenberg editor for links so we can't accidentally click them in our blocks
 */

function disable_admin_link() {
	return is_admin() === true ? 'disabled' : '';
}


/*
 * Adds ACF repeater field option to Primary menu. This is a separate menu from the primary and is located top right. Also there's option for a link button.
 */
add_filter( 'wp_nav_menu_items', 'my_wp_nav_menu_items', 10, 2 );

function my_wp_nav_menu_items( $items, $args ) {

	// get menu
	$menu = wp_get_nav_menu_object( $args->menu );

	// modify primary only
	if ( 'primary' === $args->theme_location ) {

		// vars
		$button_right = get_field( 'button_right', $menu );

		$html_rightside = '<li class="right-side"><ul>';

		if ( have_rows( 'right_menu_items', $menu ) ) :
			while ( have_rows( 'right_menu_items', $menu ) ) :
				the_row();
					$link            = get_sub_field( 'link_for_nav', $menu );
					$link_target     = $link['target'] ? $link['target'] : '_self';
					$link_rel        = '_blank' === $link_target ? 'rel="noreferrer"' : '';
					$html_rightside .= '<li class="menu-item-right"><a href="' . $link['url'] . '" target="' . $link_target . '">' . $link['title'] . '</a></li>';
			endwhile;
		endif;

		if ( $button_right ) {
			$button_target = $button_right['target'] ? $button_right['target'] : '_self';
			$html_rightside .= '<li class="button"><a class="btn" href="' . $button_right['url'] . '" target="' . $button_target . '">' . $button_right['title'] . '</a>';
		}

		// append html
		$items = '<li class="left-side"><ul>' . $items . '</ul></li>' . $html_rightside . '</ul></li>';

	}

	// return
	return $items;

}

/*
 * Add description option for menu items. This is used for only sub-menu items.
 */

function prefix_nav_description( $item_output, $item, $depth, $args ) {
	if ( ! empty( $item->description ) ) {
		$item_output = str_replace( $args->link_after . '</a>', '<span class="menu-item-description">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
	}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );

/*
 * Get termlist for case study hero
 */

function get_taxonomy_term_list( $post_type, $taxonomy, $tax_name, $name ) {

	$query_tax = get_object_taxonomies( $post_type );

	if ( in_array( $taxonomy, $query_tax ) ) : ?>

		<div class="<?php echo $tax_name; ?> tax">

		<?php

		$terms = get_the_terms( get_the_ID(), $taxonomy );

		if ( ! empty( $terms ) ) :
			?>
			<i class="icon-<?php echo $tax_name; ?>"></i>
			<span class="tax-name"><?php echo __( $name, 'severalnines' ); ?></span>
			<span class="term">
				<?php
				$resultstr = array();
				foreach ( $terms as $term ) :
					$resultstr[] = $term->name;
				endforeach;
				echo implode( ', ', $resultstr );
				?>
			</span>
		<?php endif; ?>
		</div>

		<?php
	endif;

}

/*
 * Open script fields for header, body and footer
 */

add_action('wp_head', 'cntrst_head_scripts');
function cntrst_head_scripts(){
	the_field('scripts_head', 'options');
	/*addional css*/
	if (is_singular()) {
		global $post;
		the_field('custom_css', $post->ID);
	}
}

add_action('wp_footer', 'cntrst_footer_scripts');
function cntrst_footer_scripts(){
	the_field('scripts_footer', 'options');
	/*addional js*/
	if (is_singular()) {
		global $post;
		the_field('custom_js', $post->ID);
	}
}

add_action('wp_body_open', 'cntrst_body_open');
function cntrst_body_open() {
	the_field('scripts_body', 'options');
}

/*
 * Allow svg images for media
 */
add_filter( 'wp_check_filetype_and_ext', function( $data, $file, $filename, $mimes) {
	global $wp_version;
	if( $wp_version == '4.7' || ( (float) $wp_version < 4.7 ) ) {
		return $data;
	}
  $filetype = wp_check_filetype( $filename, $mimes );
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
}, 10, 4 );

function sh_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'sh_mime_types' );
function sh_fix_svg() {
	echo '<style type="text/css">.attachment-266x266, .thumbnail img { width: 100% !important; height: auto !important;} </style>';
}
add_action( 'admin_head', 'sh_fix_svg' );

/* Enableing default image support for ACF image type */
add_action('acf/render_field_settings/type=image', 'severalnines_add_default_value_to_image_field');
function severalnines_add_default_value_to_image_field($field) {
	acf_render_field_setting( $field, array(
		'label'				=> 'Default Image',
		'instructions'		=> 'Appears when creating a new post',
		'type'				=> 'image',
		'name'				=> 'default_value',
	));
}
/*---------------------------------------------------------------------------------------------------------------------------------------
| Adding a user role authenticated user to set a default role when user registers through Cluser Control Product registration form  - SB |
----------------------------------------------------------------------------------------------------------------------------------------*/
add_role('authenticated_user', __(
	'Authenticated User'),
	array(
		'read'            => true, // Allows a user to read
	)
);
/*------------------------------------------------------------------
| Hide wordpress adminbar for "authenticated_user" user role  - SB |
--------------------------------------------------------------------*/
add_action('after_setup_theme', 's9s_remove_admin_bar');
function s9s_remove_admin_bar() {
	if ( current_user_can('authenticated_user') ) {
		show_admin_bar(false);
	}
}

/**
 * Sends cURL request to Pardot form handler.
 */
function _s9s_features_pardot_form_handler_send_request ($url, $data) {

	if (empty ($data) || !is_array ($data) || count ($data) == 0) {
		return false;
	}
	
	$content = http_build_query ($data, '', '&');

	$ch = curl_init ();
	curl_setopt ($ch, CURLOPT_URL, 'http://go.pardot.com/'.$url);
	curl_setopt ($ch, CURLOPT_HTTPHEADER, Array (
		'POST /'.$url.' HTTP/1.1',
		'Host: go.pardot.com',
		'Content-Length: '.strlen ($content)
		));
	curl_setopt ($ch, CURLOPT_POST, true);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, $content);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	$res = curl_exec ($ch);
	$code = curl_getinfo ($ch, CURLINFO_HTTP_CODE);
	curl_close ($ch);
	
	if ($code == 200) {
		return true;
	}
	else {
		return $code;
	}
}
/* Getting user ip */
function _s9s_get_user_ip () {
	if (array_key_exists ('HTTP_CF_CONNECTING_IP', $_SERVER)) {
		$ip = trim ($_SERVER['HTTP_CF_CONNECTING_IP']);		
		if (false !== preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/', $ip)) {
			return $ip;
		}
	}
	elseif (array_key_exists ('HTTP_X_FORWARDED_FOR', $_SERVER)) {
		$ip = trim ($_SERVER['HTTP_X_FORWARDED_FOR']);		
		if (false !== preg_match ('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/', $ip)) {
			return $ip;
		}
	}
	else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

/*Get user location data using ipstack*/
function get_location_info_using_ipstack($ip) {
	$ch = curl_init('https://api.ipstack.com/'.$ip.'?access_key='.IP_SLACK_ACCESS_KEY);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$json = curl_exec($ch);
	curl_close($ch);
	$api_result = json_decode($json, true);
	if(!empty($api_result) && !isset($api_result['error'])){
		$_SESSION['location']['country_code'] = $api_result['country_code'];
		$_SESSION['location']['region_code'] = $api_result['region_code'];
	}
}
/*ignore sticky posts from sticking on the top*/
function s9s__posts_order( $query ) {
	$query->set( 'ignore_sticky_posts', 1 );
	return;
}
add_action( 'pre_get_posts', 's9s__posts_order', 1 );

/*if gravity form submission session not set redirect user back to get started*/
add_action('wp_head', 'user_redirect_to_get_started');
function user_redirect_to_get_started(){
	global $post;
	if( $post->post_name == 'download' && $post->post_type == 'product' ){
		if(!isset($_SESSION['__garvity__entry_id']) || $_SESSION['__garvity__entry_id'] == ''){
			$redirect_url = site_url().'/get-started/';
			wp_redirect($redirect_url);
    			exit;
		}
	}
}
/*check cluster control form submission cookie and set session if cookies exits*/
add_action('wp_head', 'check_form_4_cookie');
function check_form_4_cookie() {
	if (isset($_COOKIE['__garvity__entry_id']) && $_COOKIE['__garvity__entry_id'] != '' && is_page('get-started') && isset($_SESSION)) {
		$_SESSION['__garvity__entry_id'] = $_COOKIE['__garvity__entry_id'];		
	}	
}