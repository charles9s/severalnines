<?php

/**
 * The template for displaying all single posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cntrst
 */

get_header();
?>

<main id="primary" class="site-main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content blocks col-12">
			
				<?php
				while ( have_posts() ) :
					the_post();
						get_template_part( 'template-parts/post', 'podcast' );
					?>
					<div class="container">
						<div class="content col-12 col-md-7">
							<!-- wp:columns -->

<!-- /wp:columns -->
							<?php the_content(); ?>
						</div>
						
					</div>
						<?php
						get_template_part( 'template-parts/post', 'archive' );
						get_template_part( 'template-parts/post', 'cover-with-subscribe' );
			endwhile;
				wp_reset_query();
				?>
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
</main><!-- #main -->

<?php
get_footer();
