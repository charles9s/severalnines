<?php get_header(); ?>
<main id="site-content">
	<div class="page-404">
		<h2><?php _e('Uh oh,', 'severalnines' ); ?></h2>
		<h2><?php _e('we can\'t seem to find the page you\'re looking for.', 'severalnines' ); ?></h2>
		<nav class="page-404-nav">
			<a class="btn ghost" onclick="history.back()"><?php _e('Go back', 'severalnines' ); ?></a>
		</nav>
	</div>
</main><!-- #site-content -->
<?php get_footer(); ?>