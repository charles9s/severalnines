<?php

$class_name = 'block-features';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$template = array(
	array(
		'core/paragraph',
		array(
			'content' => '<span class="has-inline-color has-grey-color">MINITITLE HERE</span>',
			'align'   => 'center',
		),
	),
	array(
		'core/heading',
		array(
			'level'     => 2,
			'content'   => 'Lorem ipsum dolor sit amet',
			'textAlign' => 'center',
		),
	),
	array(
		'core/paragraph',
		array(
			'content' => '<span class="has-inline-color has-blue-color">urabitur non mi est. Sed scelerisque dictum accumsan. Sed ultrices mi et turpis rhoncus efficitur</span>',
			'align'   => 'center',
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph' );
?>

<section class="<?php echo $class_name; ?>">
	<header class="section-header">
		<?php echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>'; ?>
	</header>
	<div class="background">
		<div class="curved-corner-topleft"></div>
		<div class="container">
				<?php
				$i = 0;
				while ( have_rows( 'features' ) ) :
					the_row();
					$icon        = get_sub_field( 'icon' );
					$block_title = get_sub_field( 'title' );
					$description = get_sub_field( 'description' );
					$block_link  = get_sub_field( 'link' );
					$link_or_not = $block_link ? 'has-link' : 'no-link';
					$text_or_not = $description ? 'has-text' : 'no-text';

					if ( $i % 4 === 0 ) :
						?>
					<ul class="row-container">
						<?php
					endif;

					if ( $block_link ) :
						$link_target = $block_link['target'] ? $block_link['target'] : '_self';
						$link_rel    = '_blank' === $link_target ? 'rel="noreferrer"' : '';
					endif;

					?>
					<li class="col-12 col-sm-auto <?php echo $link_or_not ?> <?php echo $text_or_not ?>">
						<?php if ($block_link): ?>
							<a class="<?php echo esc_html( disable_admin_link() ); ?>" href="<?php echo esc_html( $block_link['url'] ); ?>" title="<?php echo esc_html( $block_link['title'] ); ?>" target="<?php echo esc_html( $link_target ); ?>">
						<?php endif; ?>
							<div class="content">
								<?php if ($icon): ?>
									<img src="<?php echo esc_html( get_stylesheet_directory_uri() . '/assets/img/acf/' . $icon . '.svg' ); ?>" alt="<?php echo $icon; ?>">
								<?php endif; ?>
								<h3><?php echo $block_title; ?></h3>
							<?php if ( $description ) : ?>
								<p><?php echo $description; ?></p>
							<?php endif; ?>
							<?php if ($block_link): ?>
								<span><?php echo esc_html( $block_link['title'] ); ?></span>
							<?php endif; ?>
							</div>
						<?php if ($block_link): ?>
							</a>
						<?php endif; ?>
					</li>
					<?php
					$i++;
					if ( $i % 4 === 0 ) :
						?>
					</ul>
						<?php
					endif;
				endwhile;
				?>
				</ul>
		</div>
		<div class="curved-corner-bottomright"></div>
	</div>
</section>
