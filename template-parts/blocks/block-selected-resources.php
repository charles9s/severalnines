<?php

$class_name = 'archive-block selected-resources';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
$resource_title = get_field( 'resource_title' ) ? get_field( 'resource_title' ) : 'Selected resources';
$featured_posts = get_field( 'featured_posts' );
if ( $featured_posts ) :
	
	$ppp = 3;	
	$args = array(
		'post_type' 		=> 'any',
		'posts_per_page' 	=> $ppp,
		'post_status'    	=> 'published',
		'post__in'       	=> $featured_posts,
		'post__not_in'   	=> array( get_the_ID() ),
		'orderby'			=> 'post__in'
	);
	$query = new WP_Query( $args );
	?>
	<section class="<?php echo $class_name; ?>">
		<div class="container">
			<?php if ( $resource_title ) : ?>
				<header class="block-header col-12">
						<h2 class="section-title"><?php echo esc_html( $resource_title ); ?></h2>
				</header>
				<?php
			endif;
			?>
			<div class="archive-list col-12">
					<div class="archive-wrapper">
					<?php
					while ( $query->have_posts() ) {
						$query->the_post();
						if( in_array(get_the_ID(), $featured_posts)){
							get_template_part( 'template-parts/archive-content', get_post_type() );
						}
					}
					?>
					</div>
			</div>
		</div>
	</section>
	<?php
	wp_reset_postdata();
	else :
		?>
	<section class="archive-block selected-resources">
		<div class="container">
			<h2 style="text-align: center; margin-bottom: 60px;">Set your resources from block edit mode</h2>
		</div>
	</section>
<?php endif; ?>
