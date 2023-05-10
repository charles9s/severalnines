<?php

get_header();

$get_archive_title = get_the_archive_title();
global $wp_query;
?>

<main id="primary" class="site-main">
	<div class="blocks">
		<div class="container">
			<div class="grid">
				<section class="archive-section">

					<header class="archive-header">
						<h1><?php echo $get_archive_title; ?></h1>
					</header>

					<?php

					$taxonomy_objects = get_object_taxonomies( get_post_type(), 'objects' ); // <--- change cpt with the custom post type
					$category         = get_queried_object();

					if ( isset( $_GET['cat'] ) ) {
						$get_type = $_GET['cat'];
					}

					if ( isset( $_GET['tax'] ) ) {
						$get_tax = $_GET['tax'];
					}

					// Let's check that taxonomy is not empty
					if ( ! empty( $taxonomy_objects ) ) {
						?>
						<?php

						if ( get_post_type() === 'resources' ) {

							?>
							<div class="filters-list col-12" id="categories">
							<?php

							$taxonomy_blog = get_object_taxonomies( get_post_type() );

							// Get the term IDs assigned to post.
							$terms = get_terms(
								$taxonomy_blog[0],
								array(
									'orderby'    => 'name',
									'order'      => 'ASC',
									'hide_empty' => true,
								)
							);

							if ( ! isset( $_GET['tax'] ) ) {
								$get_tax = $taxonomy_blog[0];
							}

							$all_class = ( empty( $get_type ) ) ? 'class=active' : '';
							?>

						<ul class="categories-list">
							<li>
								<a href="<?php echo esc_html( get_post_type_archive_link( get_post_type() ) ); ?>" <?php echo esc_html( $all_class ); ?>><?php echo esc_html( _e( 'All', 'severalnines' ) ); ?></a>
							</li>

							<?php
							foreach ( $terms as $category ) {
								$category_name = $category->name;
								$class         = '';

								if ( isset( $_GET['cat'] ) ) {
									$class = ( $get_type === $category->slug ) ? 'class=active' : '';
								}
								$cat_link = get_post_type_archive_link( get_post_type() ) . '?cat=' . $category->slug;

								?>

								<li>
									<a href="<?php echo esc_html( $cat_link ); ?>" <?php echo esc_html( $class ); ?>><?php echo esc_html( $category_name ); ?></a>
								</li>

								<?php
							}
							?>
						</ul>
							<?php
						} else {
							?>
						<div class="filters col-12" id="categories">
							<?php
							foreach ( $taxonomy_objects as $taxonomy_slug => $taxonomy_object ) {
								$terms = get_terms( $taxonomy_slug, 'hide_empty=0' );

								if ( ! empty( $terms ) && $taxonomy_slug != 'post_tag' ) {
									?>
							<div class="select-wrapper">
								<span class="cats-select-label"><?php echo $taxonomy_object->label; ?></span>
								<select onchange="location = this.value;">

								<option value="<?php echo get_post_type_archive_link( get_post_type() ) . '#categories'; ?>" selected data-type='all'><?php echo 'All' . ' ' . $taxonomy_object->label; ?></option>
										<?php
										foreach ( $terms as $term ) {
											$category_name = $term->name;
											$class         = '';
											$term_slug     = $term->slug;

											if ( isset( $_GET['cat'] ) ) {
												$class = ( $get_type === $term->slug ) ? 'selected' : '';
											}

											if (get_post_type() == 'post') {
												$cat_link = get_post_type_archive_link( get_post_type() ) . '?filter-'. $taxonomy_slug .'=' . $term->slug . '#categories';
											} else {
												$cat_link = get_post_type_archive_link( get_post_type() ) . '?cat=' . $term->slug . '&tax=' . $taxonomy_object->name . '#categories';
											}

											?>
									<option <?php echo esc_html( $class ); ?> value="<?php echo esc_html( $cat_link ); ?>"><?php echo esc_html( $category_name ); ?></option>
											<?php
										}
										?>

								</select>
							</div>
									<?php
								}
							}
						}

						$all_class = ( empty( $get_type ) ) ? 'class=active' : '';

						?>

						</div>
						<hr>
						<?php

						$paged_blog = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
						if ( empty($get_tax) ) {
							if (empty($category->taxonomy)) {
								$get_tax = '';
							}else {
								$get_tax = $category->taxonomy;
							}
						}

						if (is_tax()) {
							$get_type = $category->slug;
						}
						$args = $wp_query->query;
						$args['post_type'] = get_post_type();
						$args['posts_per_page'] = 12;
						$args['paged'] = $paged_blog;
						$args['status'] = 'published';						

						if ( isset( $get_type ) ) {

							$args['tax_query'] = array(
								array(
									'taxonomy' => $get_tax,
									'field'    => 'slug',
									'terms'    => $get_type,
								),
							);
						}
						$wp_query = new WP_Query( $args );
						$max_pages = $wp_query->max_num_pages;						
						if ( $wp_query->have_posts() ) :
							?>
							<div class="col-md-12 archive-list">
								<div class="archive-wrapper">
								<?php
								/* Start the Loop */
								while ( $wp_query->have_posts() ) :
									$wp_query->the_post();

									$terms = get_the_terms( $post->ID, $get_tax );

									set_query_var( 'archive_terms', $terms );

									get_template_part( 'template-parts/archive', 'content-' . get_post_type(), $terms );


								endwhile;
								wp_reset_postdata();
								wp_reset_query();
								?>
								</div>
							</div>
							<?php
						endif;						
						// If tax is empty show sorry msg
					} else {

						?>
						<div class="col-12 no-show" style="margin-bottom: 80px">
							<h3 style="text-align: center;max-width: 780px;margin: 0 auto;display: block;"><?php _e( 'Sorry, could not find any blog posts with requested filters. Try a different combination.', 'severalnines' ); ?></h3>
						</div>
						<?php
					}
					?>
				</section>
		</div>
	</div>
	<?php if ( ! empty( $wp_query ) ) : 
		?>
			
			<?php if ( ( $max_pages ) > 1 ) : ?>

			<?php cntrst_pagination_archives_posts( $max_pages ); ?>

		<?php endif; ?>

	<?php endif; ?>
	<?php get_template_part( 'template-parts/post', 'cover-with-subscribe' ); ?>
</main><!-- #main -->

<?php

get_footer();
