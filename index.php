<?php

get_header();

// Standard fields for custom texts
$main_header   = get_field('main_blog_header', 'option');
$filter_header = get_field('filter_blog_header', 'option');

?>

<main id="primary" class="site-main">
	<div class="blocks">
		<section class="archive-section">
			<?php if ($main_header): ?>
				<header class="archive-header">
					<h1><?php echo $main_header; ?></h1>
				</header>
				<?php else: ?>
				<header class="archive-header">
					<h1><?php echo __( 'Severalnines Database Blog', 'severalnines' ); ?></h1>
				</header>
				<?php endif;

					// Featured posts template called here
					get_template_part( 'template-parts/archive-featured-post-articles');

					$taxonomy_objects = get_object_taxonomies( get_post_type(), 'objects' );

					// Let's check that taxonomy is not empty
				if ( ! empty( $taxonomy_objects ) ) { ?>

					<div class="filter-header" id="categories">
						<?php if ($filter_header): ?>
							<h2><?php echo $filter_header; ?></h2>
						<?php else: ?>
							<h2><?php echo __( 'Latest posts', 'severalnines' ); ?></h2>
						<?php endif; ?>
					</div>

					<?php

					global $wp;

					if ( '' === get_option( 'permalink_structure' ) ) {
						$form_action = remove_query_arg( array(
							'page',
							'paged',
							'product-page'
						), add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) );
					} else {
						$form_action = preg_replace( '%\/page/[0-9]+%', '', home_url( trailingslashit( $wp->request ) ) );
					}

					?>

					<form id="severalnines-filters-form" action="<?= $form_action; ?>">

						<?php

						$filter_cat  = isset( $_GET['filter-category'] ) ? $_GET['filter-category'] : '';
						$filter_prod = isset( $_GET['filter-related-product'] ) ? $_GET['filter-related-product'] : '';
						$filter_tech = isset( $_GET['filter-related-technology'] ) ? $_GET['filter-related-technology'] : '';

						?>

						<input type="hidden" name="paged" value="1">
						<input type="hidden" name="filter-category" value="<?= $filter_cat ?>">
						<input type="hidden" name="filter-related-product" value="<?= $filter_prod ?>">
						<input type="hidden" name="filter-related-technology" value="<?= $filter_tech ?>">

						<div class="filters col-12">
						<?php

						foreach ( $taxonomy_objects as $taxonomy_slug => $taxonomy_object ) {
							$terms = get_terms( $taxonomy_slug, 'hide_empty=0' );
							if ( empty( $get_tax ) ) {
								$get_tax = $taxonomy_object->name;
							}

							$get_filters = array( $filter_cat, $filter_prod, $filter_tech );

								// We don't need post tag filtering

							if ( ! empty( $terms ) && $taxonomy_slug != 'post_tag' ) { ?>
							<div class="select-wrapper">
								<span class="cats-select-label"><?php echo $taxonomy_object->label; ?></span>
								<select name="filter-<?php echo $taxonomy_slug?>" id="filter-<?php echo $taxonomy_slug?>">
								<option value="" selected data-type='all'><?php echo 'All' . ' ' . $taxonomy_object->label; ?></option>
										<?php
										foreach ( $terms as $term ) {
											$category_name = $term->name;
											$term_slug     = $term->slug;
											$selected      = in_array( $term_slug, $get_filters) ? 'selected' : '';
											?>
												<option <?php echo $selected ?> value="<?php echo esc_html( $term_slug ); ?>"><?php echo esc_html( $category_name ); ?></option>
											<?php
										}
										?>

								</select>
							</div>

								<?php
							}
						}

						$all_class = ( empty( $get_type ) ) ? 'class=active' : '';

						?>

						</div>
					<hr>
					</form>

						<div class="container">
							<div class="archive-list">
								<?php
								if ( have_posts() ) { ?>
								<div class="archive-wrapper">
									<?php
									/* Start the Loop */
									while ( have_posts() ) :
										the_post();

										$terms = get_the_terms( $post->ID, $get_tax );

										set_query_var( 'archive_terms', $terms );

										get_template_part( 'template-parts/archive', 'content-' . get_post_type(), $terms );

										endwhile;
										wp_reset_postdata();
										wp_reset_query();
									?>
								</div>
										<?php

										$args = array(
											'base'      => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
											'format'    => '',
											'current'   => max( 1, get_query_var( 'paged' ) ),
											'prev_text' => '',
											'next_text' => '',
											'type'      => 'list',
											'end_size'  => 1,
											'mid_size'  => 2,
										);

										?>

										<?php echo the_posts_pagination($args); ?>

									</div>
								</div>
									<?php

									// If tax is empty show sorry msg
								} else {

									?>
						<div class="col-12 no-show" style="margin-bottom: 80px">
							<h3 style="text-align: center;max-width: 780px;margin: 0 auto;display: block;"><?php _e( 'Sorry, could not find any blog posts with requested filters. Try a different combination.', 'severalnines' ); ?></h3>
						</div>
									<?php
					}
				}
				?>

		</section>

	<?php get_template_part( 'template-parts/post', 'cover-with-subscribe' ); ?>
	</div>
</main><!-- #main -->

<?php

get_footer();
