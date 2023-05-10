<footer class="site-footer">
	<div class="wrapper-mid">
		<div class="wrapper">
			<div class="site-footer__mid">
				<div class="column logo socialmedia">
					<a class="logo" href="<?php echo esc_html( home_url() ); ?>">
						<img class="lazyloaded"
							src="<?php echo esc_html( get_template_directory_uri() ); ?>/assets/img/seve9-logo-white.svg"
							alt="severalnines white logo">
					</a>
					<?php if ( have_rows( 'footer_some', 'option' ) ) : ?>
						<ul class="severalnines-socialmedia">
							<?php
							while ( have_rows( 'footer_some', 'option' ) ) :
								the_row();
								$link_some   = get_sub_field( 'link', 'option' );
								$link_url    = $link_some['url'];
								$link_title  = $link_some['title'];
								$link_target = $link_some['target'] ? $link_some['target'] : '_self';
								$link_rel    = '_blank' === $link_target ? 'rel="noreferrer"' : '';
								?>
								<li>
									<a target="_blank" class="icon-<?php echo esc_html( $link_title ); ?>" href="<?php echo esc_html( $link_url ); ?>" target="<?php echo esc_html( $link_target ); ?>" <?php echo esc_html( $link_rel ); ?> title="<?php echo esc_html( $link_title ); ?>">
										<span class="screen-reader-text"><?php echo esc_html( $link_title ); ?></span>
									</a>
								</li>
								<?php
							endwhile;
							?>
						</ul>
						<?php
					endif;
					?>
					</div>
					<div class="column footer-menu">
					<?php

					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu'           => 'footer',
							'menu_class'     => 'menu-footer',
							'container'      => false,
							'fallback_cb'    => '__return_false',
						)
					);

					$subscribe_title = get_field('subscribe_column_title', 'option');
					$subscribe_excerpt = get_field('subscribe_column_excerpt', 'option');
					$subscribe_iframe = get_field('subscribe_column_iframe', 'option'); 
					/*$subscribe_iframe = get_field('subscribe_iframe', 'option');*/
					$subscribe_below = get_field('subscribe_column_below', 'option', false);

					?>
				</div>
				<div class="column subscribe">
					<?php if ( $subscribe_title ): ?>
						<h3><?php echo $subscribe_title ?></h3>
					<?php endif; ?>
					<?php if ( $subscribe_excerpt ): ?>
						<p><?php echo $subscribe_excerpt ?></p>
					<?php endif; ?>
					<?php if ( $subscribe_iframe ): ?>
						<div class="iframe-wrapper">
							<?php echo do_shortcode( $subscribe_iframe )?>
						</div>
					<?php endif; ?>
					<?php if ( $subscribe_below ): ?>
						<p class="small-grey"><?php echo $subscribe_below ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper-bottom">
		<div class="wrapper">
			<div class="site-footer__bottom">
				<?php if ( have_rows( 'footer_some', 'option' ) ) : ?>
					<ul class="severalnines-socialmedia">
						<?php
						while ( have_rows( 'footer_some', 'option' ) ) :
							the_row();
							$link_some   = get_sub_field( 'link', 'option' );
							$link_url    = $link_some['url'];
							$link_title  = $link_some['title'];
							$link_target = $link_some['target'] ? $link_some['target'] : '_self';
							$link_rel    = '_blank' === $link_target ? 'rel="noreferrer"' : '';
							?>
							<li>
								<a target="_blank" class="icon-<?php echo esc_html( $link_title ); ?>" href="<?php echo esc_html( $link_url ); ?>" target="<?php echo esc_html( $link_target ); ?>" <?php echo esc_html( $link_rel ); ?> title="<?php echo esc_html( $link_title ); ?>">
									<span class="screen-reader-text"><?php echo esc_html( $link_title ); ?></span>
								</a>
							</li>
							<?php
						endwhile;
						?>
					</ul>
					<?php
				endif;

				$copyright = get_field( 'copyright', 'options' );

				?>
				<div class="site-footer__copyright bottom-left">
				<?php if ( $copyright): ?>
					<p><?php echo $copyright ?></p>
				<?php endif; ?>
				</div>
				<div class="site-footer__mandatory-links bottom-right">
				<?php
				if ( have_rows( 'footer_mandatory-links-bottom-right', 'option' ) ) :
					?>
					<ul class="mandatory-links">
						<?php
						while ( have_rows( 'footer_mandatory-links-bottom-right', 'option' ) ) :
							the_row();
							$link_botright = get_sub_field( 'link', 'option' );
							$link_url      = $link_botright['url'];
							$link_title    = $link_botright['title'];
							$link_target   = $link_botright['target'] ? $link_botright['target'] : '_self';
							$link_rel      = '_blank' === $link_target ? 'rel="noreferrer"' : '';
							?>
							<li><a href="<?php echo esc_html( $link_url ); ?>"
										target="<?php echo esc_html( $link_target ); ?>" <?php echo esc_html( $link_rel ); ?>
										title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>
							</li>
							<?php
						endwhile;
						?>
					</ul>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

</footer>
</div>
<?php wp_footer(); ?>
<!-- The Modal -->
<div id="s9s_modal" class="modal image_lightbox_popup">
  <span id="s9s_modal-close" class="modal-close">&times;</span>
  <img id="s9s_modal-content" class="modal-content">
</div>
<div class="modal image_lightbox_popup gravity_form_cst_popup" id="footer_form">
	<span class="modal-close">&times;</span>
	<div class="Form_design">
		<div class="button_popup_content"><?php echo do_shortcode( get_field( 'default_popup_form', 'option' ) ); ?> </div>
	</div>
</div>
<?php 	/*Including pardot tracking scripts*/
	if( is_singular() ){
		global $post;
		$pardot_account_id = get_field('pardot_account_id', $post->ID);
		$default_pardot_campaign_id = get_field('default_pardot_campaign_id', $post->ID);
		if ($pardot_account_id == '' || $default_pardot_campaign_id == '') {
			$pardot_account_id = get_field('pardot_account_id', 'option');
			$default_pardot_campaign_id = get_field('default_pardot_campaign_id', 'option');
		}
		if( $pardot_account_id != '' && $default_pardot_campaign_id != ''){ ?>
			<!-- Pardot tracking Code -->
			<script type="text/javascript">
				piAId = '<?php echo $pardot_account_id ?>';
				piCId = '<?php echo $default_pardot_campaign_id ?>';
				piHostname = 'pi.pardot.com';
				(function() {
					function async_load(){
						var s = document.createElement('script'); s.type = 'text/javascript';
						s.src = ('https:' == document.location.protocol ? 'https://pi' : 'http://cdn') + '.pardot.com/pd.js';
						var c = document.getElementsByTagName('script')[0]; c.parentNode.insertBefore(s, c);
					}
					if(window.attachEvent) { window.attachEvent('onload', async_load); }
					else { window.addEventListener('load', async_load, false); }
				})();
			</script>
			<!-- End Pardot tracking Code -->
		<?php }
	} ?>
</body>
</html>
