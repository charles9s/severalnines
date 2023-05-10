<?php
/**
 * Template part for displaying posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cntrst
 */

?>

<div class="blocks container">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<time datetime="<?php echo get_the_date( 'Y-n-j' ); ?>" class="date"><?php echo get_the_date( 'j.n.Y' ); ?></time>
			<?php if ( has_excerpt() ) : ?>
				<p class="excerpt">
					<?php echo get_the_excerpt(); ?>
				</p>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_post_thumbnail( 'medium_large' ); ?>
			<?php the_content(); ?>
		</div><!-- .entry-content -->

	</article><!-- #post-<?php the_ID(); ?> -->
</div>
