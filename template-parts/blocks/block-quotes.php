<?php

$class_name = '';
if ( ! empty( $block['className'] ) ) {
	$class_name = $block['className'] ? $block['className'] : '';
}

$type   = get_field( 'quote-type' );
$quote  = get_field( 'quote' );
$author = get_field( 'author' );

if ( $type == 'pullquote' ) : ?>
	<figure class="wp-acf-block-pullquote <?php echo $class_name; ?>">
		<blockquote>
			<p><?php echo esc_html( $quote ); ?></p>
			<?php if ( $author ) : ?>
				<cite><?php echo esc_html( $author ); ?></cite>
			<?php endif; ?>
		</blockquote>
	</figure>
<?php else : ?>
	<blockquote class="wp-acf-block-quote <?php echo $class_name; ?>">
		<p><?php echo esc_html( $quote ); ?></p>
		<?php if ( $author ) : ?>
			<cite><?php echo esc_html( $author ); ?></cite>
		<?php endif ?>
	</blockquote>
<?php endif; ?>
