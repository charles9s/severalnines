<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<?php wp_head(); ?>

</head>

<?php

/*
** Site main product is ClusterControl and we need this class for pricing and get started pages.
*/

if ( has_block( 'acf/choose-product' ) || has_block( 'acf/download-cc' ) ) {
	$class = 'clustercontrol';
} else {
	$class = '';
}

?>

<body <?php body_class( $class ); ?> itemscope="" itemtype="http://schema.org/WebPage"><!-- the Body  -->

<!-- Function to call body scripts  -->
<?php wp_body_open(); ?>

<?php

/*
** Here we check if we need float hero class. It adds transparency to header so we need to modify texts based on that.
** The condition is bit clumsy, cause the has_block works strangely at the moment in archives even though those pages don't have blocks.
*/

if ( is_singular( 'case_study' ) || is_singular( 'case_study' ) || is_singular( 'resources' ) || is_archive() || is_search() || is_404() ) {
	$float_hero = '';
} elseif ( has_block( 'acf/hero' ) || has_block( 'acf/home-hero' ) ) {
	$float_hero = 'float-header';
} else {
	$float_hero = '';
}

?>

<?php
// Checking if "Get Started" form is already submitted or not and TTL: 14 days

if ($_SERVER['REQUEST_URI'] == "/get-started/" && isset($_COOKIE['get_started_submitted'])) {
	if ($_COOKIE['get_started_submitted'] == true) {
		$base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
		$url = $base_url . '/clustercontrol/download';
		header('Location: ' . $url); exit;
	}
}

if (isset($_GET['qr'])) {
	echo $_GET['qr'];
	echo $_SERVER["REQUEST_URI"];
	if(!isset($_COOKIE['get_started_submitted']) || (isset($_COOKIE['get_started_submitted']) && $_COOKIE['get_started_submitted'] == false)) {
		setcookie('get_started_submitted', true, time() + (86400 * 14), '/', '.severalnines.com');
		$base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
		$url = $base_url . $_SERVER["REQUEST_URI"];
		header('Location: ' . $url); exit;
	}
}
?>

<div id="site">
	<header class="site-header <?php echo $float_hero; ?>" id="banner">
		<div class="main-bar">
			<a class="logo" href="<?php echo esc_html( home_url() ); ?>">
				<img loading="eager" src="<?php echo esc_html( get_template_directory_uri() ); ?>/assets/img/seve9-logo.svg" alt="severalnines logo">
			</a>
			<nav id="site-navigation" class="nav" aria-label="<?php esc_html_e( 'Main menu', 'severalnines' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu'           => 'Primary',
						'menu_class'     => 'menu',
						'container'      => false,
						'menu_id'        => 'menu-primary',
					)
				);
				?>
			</nav>

			<div class="hamburger hamburger--slider hidden-md-up" data-toggle-nav="">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</div>
	</header>
