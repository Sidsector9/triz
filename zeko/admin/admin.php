<?php

/***** Theme Info Page *****/

if (!function_exists('zeko_theme_info_page')) {
	function zeko_theme_info_page() {
		add_theme_page(esc_html__('Welcome to Zeko', 'zeko'), esc_html__('Theme Info', 'zeko'), 'edit_theme_options', 'charity', 'zeko_display_theme_page');
	}
}
add_action('admin_menu', 'zeko_theme_info_page');

if (!function_exists('zeko_display_theme_page')) {
	function zeko_display_theme_page() {
		$theme_data = wp_get_theme(); ?>
		<div class="theme-info-wrap">
			<h1>
				<?php printf(esc_html__('Welcome to %1s %2s', 'zeko'), $theme_data->Name, $theme_data->Version); ?>
			</h1>

			<p>
				<a href="<?php echo esc_url('http://www.anarieldesign.com/themes/animals-charity-wordpress-theme/'); ?>" target="_blank" class="button button-primary">
					<?php esc_html_e('Find more about Zeko', 'zeko'); ?>
				</a>
			</p>
		<div class="ad-row clearfix">
			<div class="ad-col-1-2">
				<div class="section">
					<div class="theme-description">
						<?php echo esc_html($theme_data['Description']); ?>
					</div>
				</div>
			</div>
			<div class="ad-col-1-2">
				<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="<?php esc_html_e('Theme Screenshot', 'zeko'); ?>" />
			</div></div>
			<hr>
			<div id="getting-started" class="bg">
				<h3>
					<?php printf(esc_html__('Getting Started with %s', 'zeko'), $theme_data->Name); ?>
				</h3>
				<div class="ad-row clearfix">
						<div class="section documentation">
							<h4>
								<?php esc_html_e('Theme Documentation', 'zeko'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Please check the documentation to get better overview of how the theme is structured.', 'zeko'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('http://www.anarieldesign.com/documentation/zeko/'); ?>" target="_blank" class="button button-primary">
									<?php esc_html_e('Visit Documentation', 'zeko'); ?>
								</a>
							</p>
						</div>
						<div class="section options">
							<h4>
								<?php esc_html_e('Theme Options', 'zeko'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Click "Customize" to open the Customizer. Zeko has implemented Customizer and added some useful options to help you style color elements, upload image logo, to choose different blog layouts and a lot more.', 'zeko'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo admin_url('customize.php'); ?>" class="button button-secondary">
									<?php esc_html_e('Customize', 'zeko'); ?>
								</a>
							</p>
						</div>
						<div class="section video">
							<h4>
								<?php esc_html_e('Support Page', 'zeko'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('There is a solution to every problem!', 'zeko'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('http://www.anarieldesign.com/support/'); ?>" class="button button-primary" target="_blank">
									<?php esc_html_e('Support Page', 'zeko'); ?>
								</a>
							</p>
						</div>
						<div class="section options">
							<h4>
								<?php esc_html_e('Theme Update Logs', 'zeko'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('View the full change log for our themes.', 'zeko'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('https://www.anarieldesign.com/theme-update-logs/'); ?>" class="button button-secondary" target="_blank">
									<?php esc_html_e('Theme Update Logs', 'zeko'); ?>
								</a>

							</p>
						</div>
						<div class="section recommend clear">
							<h4>
								<?php esc_html_e('Recommended Plugins', 'zeko'); ?>
							</h4>
							<p class="center"><?php esc_html_e('Plugins listed are not mandatory for theme to work! Install only the ones you need for your website!', 'zeko'); ?></p>
							<div class="zeko-tab-pane-half zeko-tab-pane-first-half">
							<!-- WooCommerce -->
							<p><strong><?php esc_html_e( 'WooCommerce', 'zeko' ); ?></strong></p>
							<p><?php esc_html_e( 'An e-commerce toolkit that helps you sell anything. Beautifully.', 'zeko' ); ?></p>

							<?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) { ?>

							<p><span class="zeko-w-activated button"><?php esc_html_e( 'Already activated', 'zeko' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=woocommerce' ), 'install-plugin_woocommerce' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install WooCommerce', 'zeko' ); ?></a></p>

							<?php
							}

							?>

							<!-- MailChimp for WordPress -->
							<p><strong><?php esc_html_e( 'MailChimp for WordPress', 'zeko' ); ?></strong></p>
							<p><?php esc_html_e( 'MailChimp for WordPress by ibericode. Adds various highly effective sign-up methods to your site.', 'zeko' ); ?></p>

							<?php if ( is_plugin_active( 'mailchimp-for-wp/mailchimp-for-wp.php' ) ) { ?>

							<p><span class="zeko-activated button"><?php esc_html_e( 'Already activated', 'zeko' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=mailchimp-for-wp' ), 'install-plugin_mailchimp-for-wp' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install MailChimp for WordPress', 'zeko' ); ?></a></p>

							<?php
							}

							?>
							<!-- Widget Visibility -->
							<p><strong><?php esc_html_e( 'Widget Visibility', 'zeko' ); ?></strong></p>
							<p><?php esc_html_e( 'Control what pages your widgets appear on.', 'zeko' ); ?></p>

							<?php if ( is_plugin_active( 'widget-visibility-without-jetpack/widget-visibility-without-jetpack.php' ) ) { ?>

							<p><span class="zeko-activated button"><?php esc_html_e( 'Already activated', 'zeko' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=widget-visibility-without-jetpack' ), 'install-plugin_widget-visibility-without-jetpack' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Widget Visibility', 'zeko' ); ?></a></p>

							<?php
							}

							?>
							<!-- Contact Form 7 -->
							<p><strong><?php esc_html_e( 'Contact Form 7', 'zeko' ); ?></strong></p>
							<p><?php esc_html_e( 'Just another contact form plugin. Simple but flexible.', 'zeko' ); ?></p>

							<?php if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) { ?>

							<p><span class="zeko-activated button"><?php esc_html_e( 'Already activated', 'zeko' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=contact-form-7' ), 'install-plugin_contact-form-7' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Contact Form 7', 'zeko' ); ?></a></p>

							<?php
							}

							?>
							<!-- WPForms -->
							<p><strong><?php esc_html_e( 'WPForms Lite', 'zeko' ); ?></strong></p>
							<p><?php esc_html_e( 'Contact Form by WPForms. Drag & Drop Form Builder for WordPress', 'zeko' ); ?></p>

							<?php if ( is_plugin_active( 'wpforms-lite/wpforms.php' ) ) { ?>

							<p><span class="zeko-activated button"><?php esc_html_e( 'Already activated', 'zeko' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=wpforms-lite' ), 'install-plugin_wpforms-lite' ) ); ?>" class="button button-primary"><?php esc_html_e( 'WPForms Lite', 'zeko' ); ?></a></p>

							<?php
							}

							?>

							</div>

							<div class="zeko-tab-pane-half">

							<!-- Elementor -->
							<p><strong><?php esc_html_e( 'Elementor', 'zeko' ); ?></strong></p>
							<p><?php esc_html_e( 'The most advanced frontend drag & drop page builder. Create high-end, pixel perfect websites at record speeds. Any theme, any page, any design.', 'zeko' ); ?></p>

							<?php if ( is_plugin_active( 'elementor/elementor.php' ) ) { ?>

							<p><span class="zeko-activated button"><?php esc_html_e( 'Already activated', 'zeko' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Elementor', 'zeko' ); ?></a></p>

							<?php
							}

							?>

							<!-- PeepSo -->
							<p><strong><?php esc_html_e( 'PeepSo', 'zeko' ); ?></strong></p>
							<p><?php esc_html_e( 'The Next Generation Social Networking', 'zeko' ); ?></p>

							<?php if ( is_plugin_active( 'peepso-core/peepso.php' ) ) { ?>

							<p><span class="zeko-activated button"><?php esc_html_e( 'Already activated', 'zeko' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=peepso-core' ), 'install-plugin_peepso-core' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install PeepSo', 'zeko' ); ?></a></p>

							<?php
							}

							?>

							<!-- Premium Soliloquy Slider -->
							<p><strong><?php esc_html_e( 'Premium Soliloquy Slider', 'zeko' ); ?></strong></p>

							<?php if ( is_plugin_active( 'soliloquy/soliloquy.php' ) ) { ?>

							<p><span class="zeko-activated button"><?php esc_html_e( 'Already activated', 'zeko' ); ?></span></p>

							<?php
							}
							else { ?>

							<p class="bg2"><?php esc_html_e( 'Plugin & license key can be found inside the plugins folder within the main folder you downloaded', 'zeko' ); ?></p>

							<?php
							}
							?>
							<!-- Custom Google Fonts Plugin -->
							<p><strong><?php esc_html_e( 'Custom Google Fonts Plugin', 'zeko' ); ?></strong></p>

							<?php if ( is_plugin_active( 'anariel-design-google-fonts/Fad_gfp.php' ) ) { ?>

							<p><span class="zeko-activated button"><?php esc_html_e( 'Already activated', 'zeko' ); ?></span></p>

							<?php
							}
							else { ?>

							<p class="bg2">
								<a href="<?php echo esc_url('https://github.com/anarieldesign/anariel-design-google-fonts/'); ?>" target="_blank">
									<?php esc_html_e('Plugin can be downloaded here', 'zeko'); ?>
								</a>
							</p>

							<?php
							}
							?>

							<!-- Custom Post Type Plugin -->
							<p><strong><?php esc_html_e( 'Custom Post Type Plugin', 'zeko' ); ?></strong></p>

							<?php if ( is_plugin_active( 'zeko-custom-post-type-plugin/anarielcustompostplugin.php' ) ) { ?>

							<p><span class="zeko-activated button"><?php esc_html_e( 'Already activated', 'zeko' ); ?></span></p>

							<?php
							}
							else { ?>

							<p class="bg2">
								<a href="<?php echo esc_url('https://github.com/anarieldesign/anariel-design-google-fonts/'); ?>" target="_blank">
									<?php esc_html_e('Plugin can be downloaded here', 'zeko'); ?>
								</a>
							</p>

							<?php
							}
							?>
							</div>
						</div>
						<div class="clear"></div>
						<div class="section bg1">
							<h3>
								<?php esc_html_e('More Themes by Anariel Design', 'zeko'); ?>
							</h3>
							<p class="about">
								<?php printf(esc_html__('Build Your Dream WordPress Site with Premium Niche Themes for Bloggers & Charities',  'zeko'), $theme_data->Name); ?>
							</p>
							<a target="_blank" href="<?php echo esc_url('http://www.anarieldesign.com/themes/'); ?>"><img src="http://www.anarieldesign.com/themedemos/marketimages/anarieldesign-themes.jpg" alt="<?php esc_html_e('Theme Screenshot', 'zeko'); ?>" /></a>
							<p>
								<a target="_blank" href="<?php echo esc_url('http://www.anarieldesign.com/themes/'); ?>" class="button button-primary advertising">
									<?php esc_html_e('More Themes', 'zeko'); ?>
								</a>
							</p>
						</div>
					</div>
			</div>
			<hr>
			<div id="theme-author">
				<p>
					<?php printf(esc_html__('%1s is proudly brought to you by %2s. %3s: %4s.', 'zeko'), $theme_data->Name, '<a target="_blank" href="http://www.anarieldesign.com/" title="Anariel Design">Anariel Design</a>', $theme_data->Name, '<a target="_blank" href="http://www.anarieldesign.com/themes/animals-charity-wordpress-theme/" title="Zeko Theme Demo">' . esc_html__('Theme Demo', 'zeko') . '</a>'); ?>
				</p>
			</div>
		</div><?php
	}
}

?>