<?php

$class_name = 'archive-block related-case-studies';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$related_title = get_field( 'related_title' ) ? get_field( 'related_title' ) : 'More like this';

$ppp = 3;

$args = array(
	'post_type'      => 'case_study',
	'posts_per_page' => $ppp,
	'post_status'    => 'publish',
	'post__not_in'   => array( get_the_ID() ),
);

$query = new WP_Query( $args );

?>
	<section class="<?php echo $class_name; ?>">
		<div class="container">
			<?php if ( $related_title ) : ?>
			<header class="block-header col-12 col-bleed-x">
					<h2 class="section-title"><?php echo esc_html( $related_title ); ?></h2>
			</header>
				<?php
			endif;
			?>
			<div class="archive-list col-12 col-bleed-x">
				<div class="archive-wrapper">
				<?php
				while ( $query->have_posts() ) {
					$query->the_post();
					get_template_part( 'template-parts/archive-content', 'case_study' );
				}
				?>
				</div>
			</div>
		</div>
	</section>
<?php
wp_reset_postdata();
?>
