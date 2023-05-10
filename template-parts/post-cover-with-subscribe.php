<?php

$image_cover = get_field( 'image-cover-subscribe', 'option' );

$heading			 = get_field( 'heading_subscribe', 'option' );
$iframe				 = get_field( 'subscribe_iframe', 'option' );
$below_iframe  = get_field( 'body_below', 'option', false );


?>
<section class="cover-with-text-box subscribe">
	<div class="background" style="background-image: url('<?php echo wp_get_attachment_image_url( $image_cover, 'full' ); ?>')">
		<div class="container">
			<div class="text-box">
				<h3><?php echo $heading; ?></h3>
				<?php /* echo $iframe; */ ?>
				<?php  if ( $iframe ): 
						echo do_shortcode( $iframe );
					   endif; ?>
				<p class="small-grey"><?php echo $below_iframe ?></p>
			</div>
		</div>
	</div>
</section>
