<?php

/**
 * Archive Block Template.
 */

$class_name = 'archive-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$archive       = get_field( 'archive' );
$archive_title = get_field( 'archive_title' );

$ppp = 3;

$args = array(
	'post_type'      => $archive,
	'posts_per_page' => $ppp,
	'post_status'    => 'published',
	'post__not_in'   => array( get_the_ID() ),
);

$query = new WP_Query( $args );

?>
	<section class="<?php echo $class_name; ?>">
		<div class="container">
			<?php if ( $archive_title ) : ?>
				<header class="block-header col-12">
						<h2 class="section-title"><?php echo esc_html( $archive_title ); ?></h2>
				</header>
				<?php
			endif;
			?>
			<div class="archive-list col-12">
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
	</section>
<?php
wp_reset_postdata();
?>
