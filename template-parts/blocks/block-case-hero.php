<?php

/**
 * Blue background CTA Template.
 */

$class_name = 'case-hero-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$hero_image = get_field( 'image' );
$logo_image = get_field( 'logo' );

$template = array(
	array(
		'core/heading',
		array(
			'level'   => 1,
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
		),
	),
	array(
		'core/paragraph',
		array(
			'content' => 'Duis diam augue, viverra vel tempor placerat, faucibus non nisl. Ut bibendum egestas ullamcorper. Mauris vel ornare metus. Interdum et malesuada fames ac ante ipsum primis in faucibus',
		),
	),
	array(
		'acf/button',
		array(
			'data' => array(
				'download'         => true,
				'color'            => 'transparent',
				'file_button_text' => 'Download case study',
			),
		),
	),
);

$allowed_blocks = array( 'core/heading', 'core/paragraph', 'acf/button' );
$has_image      = ! empty( $hero_image ) ? 'has-image' : 'no-image';

$datacenters = get_field( 'datacenters', get_the_ID() );
$hosting     = get_field( 'hosting', get_the_ID() );

?>

<section class="<?php echo $class_name; ?>">
	<div class="theme">
		<div class="grid <?php echo esc_html( $has_image ); ?>">
			<div class="box col-12 col-md-auto col-bleed">
				<div class="content">
					<?php if ( $logo_image ) : ?>
						<div class="logo">
							<?php echo wp_get_attachment_image( $logo_image, 'hero' ); ?>
						</div>
					<?php endif; ?>
					<?php echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '"/>'; ?>
				</div>
			</div>
			<?php if ( $hero_image ) : ?>
				<div class="image col-12 col-md-auto col-bleed">
					<div class="image-wrapper">
						<?php echo wp_get_attachment_image( $hero_image, 'hero-square', array( 'class' => 'skip-lazy')); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="case-taxonomies">
		<div id="curved-corner-topright"></div>
			<div class="wrapper">
			<?php

			get_taxonomy_term_list( 'case_study', 'case_study_industry', 'industry', 'Industry' );
			get_taxonomy_term_list( 'case_study', 'case_study_technology', 'technology', 'Technologies' );

			if ( $hosting ) :
				?>

			<div class="hosting tax">
				<i class="icon-hosting"></i>
				<span class="tax-name"><?php echo __( 'Hosting', 'severalnines' ); ?></span>
				<span class="term"><?php echo $hosting; ?></span>
			</div>

		<?php endif; ?>

		<?php if ( $datacenters ) : ?>

			<div class="datacenters tax">
				<i class="icon-data"></i>
				<span class="tax-name"><?php echo __( 'Datacenters', 'severalnines' ); ?></span>
				<span class="term"><?php echo $datacenters; ?></span>
			</div>

			<?php
		endif;

		get_taxonomy_term_list( 'case_study', 'case_study_product', 'product', 'Products' );

		?>

	</div>
	<div id="curved-corner-bottomleft"></div>
</section>
