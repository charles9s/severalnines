<?php

$class_name = 'customer-story';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$quote      = get_field( 'quote' ) ? get_field( 'quote' ) : 'Set your customer story from edit mode';
$logo_image = get_field( 'logo' );
$link       = get_field( 'link' );
$author     = get_field( 'author' );
$author_pos = get_field( 'author_pos' );

$class_name .= get_field( 'logo' ) ? '' : ' no-logo';

if ( $link ) :
	$link_target = $link['target'] ? $link['target'] : '_self';
	$link_rel    = '_blank' === $link_target ? 'rel="noreferrer"' : '';
endif;

?>
<div class="<?php echo $class_name; ?>">
	<div class="wrapper">
		<blockquote>
			<p><?php echo esc_html( $quote ); ?></p>
		</blockquote>
		<div class="bottom">
			<?php if ( $logo_image ) : ?>
			<div class="logo">
				<?php echo wp_get_attachment_image( $logo_image, 'medium' ); ?>
			</div>
			<?php endif; ?>
			<?php if ( $author ) : ?>
				<div class="author">
					<cite><?php echo esc_html( $author ); ?></cite>
				<?php if ( $author_pos ) : ?>
					<span><?php echo esc_html( $author_pos ); ?></span>
				<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php if ( $link ) : ?>
			<div class="button-wrapper">
				<a class="btn transparent btn-block <?php echo esc_html( disable_admin_link() ); ?>" href="<?php echo esc_html( $link['url'] ); ?>" title="<?php echo esc_html( $link['title'] ); ?>" target="<?php echo esc_html( $link_target ); ?>"
					<?php echo esc_html( $link_rel ); ?>>
					<?php echo esc_html( $link['title'] ); ?>
				</a>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
