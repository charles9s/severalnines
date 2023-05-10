<section class="hero-post">
	<div class="container">
		<div class="content-wrap">
			<header class="content">
				<?php $post_type = get_post_type();

				if ( $post_type == 'post' ) {
					$post_type = 'podcast';
				} elseif ( $post_type == 'resources' ) {
					$terms     = wp_get_post_terms( $post->ID, 'resource_type' );
					if ($terms) {
						$post_type = $terms[0]->name;
					}
				}

				?>
				<p class="post-type"><?php echo $post_type; ?></p>
				<h1><?php the_title(); ?></h1>
				<?php if ( $post_type == 'podcast' ) : ?>
				<div class="author">
					<p><?php the_author(); ?></p>
				</div>
				<div class="meta">
					<div class="date">
						<p><?php echo __( 'Published ', 'severalnines' ); ?><time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time></p>
					</div>
					<?php
					$terms_cat = get_the_terms( get_the_ID(), 'category' );
					$terms_tech = get_the_terms( get_the_ID(), 'related-technology' );
					if ( ! empty( $terms_cat ) || !empty( $terms_tech ) ) :
						?>
					<span class="dot">.</span>
					<ul class="categories">
						<?php

						if ($terms_cat):
							foreach ( $terms_cat as $term ) :
								echo '<li><a href="' . get_term_link( $term->term_id ) . '">' . $term->name . '</a></li>';
							endforeach;
						endif;

						if ($terms_tech):
							foreach ( $terms_tech as $term ) :
								echo '<li><a href="' . get_term_link( $term->term_id ) . '">' . $term->name . '</a></li>';
							endforeach;
						endif;
						?>
					</ul>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</header>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="image-wrapper">
				<?php echo get_the_post_thumbnail(get_the_ID(), 'post-podcast', array('loading' => 'eager')); ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
</section>
