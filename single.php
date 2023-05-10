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
						get_template_part( 'template-parts/post', 'hero' );
					?>
					<div class="container">
						<div class="content col-12 col-md-7">
							<?php the_content(); ?>
						</div>
						<aside class="sidebar col-12 col-md-5 col-bleed-x">
							<div class="sidebar-content">
							<?php

							$products = get_the_terms( get_the_ID(), 'related-product' );
							$products_title = get_field( 'blog_related') ?? __( 'Related Products', 'severalnines' );

							if ( $products ) :

								?>
								<h5><?php echo $products_title; ?></h5>
								<ul class="related-products">
									<?php

									foreach ( $products as $product ) :

										$prod_img  = get_field( 'product_image', $product->taxonomy . '_' . $product->term_id );
										$prod_desc = get_field( 'product_description', $product->taxonomy . '_' . $product->term_id );
										$prod_link = get_field( 'product_link', $product->taxonomy . '_' . $product->term_id );

										?>
										<li class="product">
											<a href="<?php echo $prod_link; ?>"">
												<?php if ( $prod_img ) : ?>
													<img src="<?php echo esc_html( get_stylesheet_directory_uri() . '/assets/img/acf/' . $prod_img . '.svg' ); ?>" alt="<?php echo $prod_img; ?>">
												<?php endif; ?>
												<?php if ( $prod_desc ) : ?>
													<p><?php echo $prod_desc; ?></p>
												<?php endif; ?>
											</a>
										</li>
										<?php
										endforeach;

									?>
								</ul>

							<?php endif; ?>
							</div>
						</aside>
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
