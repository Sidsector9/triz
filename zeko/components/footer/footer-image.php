<?php
/**
 * Displays footer image from Customizer on front-page.php
 *
 * @package Zeko
 */
?>
<?php
	$footer_image = get_theme_mod( 'zeko_footer_image' );
	$has_footer_image = '';
	if ( ! empty( $footer_image ) ) {
		$has_footer_image = ' has-footer-image';
	}
	if ( ( ! empty( $footer_image ) || is_customize_preview() ) && zeko_is_frontpage() ) { ?>
		<div class="footer-image zeko-panel <?php echo esc_attr( $has_footer_image ); ?>" style="background-image: url( <?php echo esc_url( $footer_image ); ?> )">
			<?php if ( get_theme_mod('zeko_footer_info' )) : ?>
				<div class="wrap footer-image-info"><?php echo wp_kses_post( get_theme_mod( 'zeko_footer_info' ) ); ?></div>
			<?php endif; ?>
			<span class="panel zeko-footer-settings">
				<span class="zeko-panel-title"><?php esc_html_e( 'Footer Image', 'zeko' ); ?></span>
			</span>
		</div>
	<?php }
?>