<?php

$featured_posts = get_field('featured', 'option');

?>

<div class="archive-selections">
	<?php

	if ( $featured_posts ) :
		$sticky = get_option( 'sticky_posts' );
		if(!empty($sticky)){
			array_unshift($featured_posts,$sticky[0]);
		}
		$ppp = 4;
		$args = array(
		'posts_per_page' => $ppp,
		'post_status'    => 'published',
		'post__in'       => $featured_posts,
		'orderby'				 => 'post__in'
		);

		$query = new WP_Query( $args );

	?>
	<div class="background">
		<div class="curved-corner-topleft"></div>
				<div class="container">
				<?php
				while ( $query->have_posts() ) {
					$query->the_post();
					get_template_part( 'template-parts/archive-content', get_post_type() );
				}
				wp_reset_postdata();
				?>
				</div>
		<div class="curved-corner-bottomright"></div>
		</div>
	<?php endif; ?>
</div>
