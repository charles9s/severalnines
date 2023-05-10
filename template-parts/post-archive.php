<?php

$ppp = 3;
$taxonomy_blog = get_object_taxonomies( get_post_type() );
$post_cat = get_the_category( get_the_ID());

$args = array(
	'post_type'      => get_post_type(),
	'posts_per_page' => $ppp,
	'post__not_in'   => array( get_the_ID() ),
);

if ( $post_cat ) {

	$args['tax_query'] = array(
		array(
			'taxonomy' => $taxonomy_blog[0],
			'field'    => 'id',
			'terms'    => $post_cat[0]->term_id,
		),
	);
}

$query = new WP_Query( $args );

?>
	<section class="archive-block">
		<div class="container">
			<div class="grid">
				<header class="col-12 block-header">
						<h2 class="section-title"><?php echo __( 'Related content', 'severalnines' ); ?></h2>
				</header>
				<div class="col-12 archive-list">
					<div class="archive-wrapper">
					<?php
					while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part( 'template-parts/archive-content', get_post_type() );
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
wp_reset_postdata();
?>
