<?php if( get_theme_mod( 'hide_copyright' ) == '') { ?>
<div class="site-info">
	<div class="wrap">
		<?php
			if ( function_exists( 'the_privacy_policy_link' ) ) {
			the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
			}
		?>
		<?php
			/**
			* Fires before the Zeko footer text for footer customization.
			*
			* @since Zeko 1.0
			*/
			do_action( 'zeko_credits' );
		?>
		<?php esc_attr_e('&copy;', 'zeko'); ?>
		<?php if('custom-link' === get_theme_mod( 'zeko_copyright_link' )) : ?>
			<a href="<?php echo wp_kses_post( get_theme_mod( 'zeko_copyright_custom_link' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"> <?php echo esc_textarea ( get_theme_mod( 'zeko_copyright', 'Zeko Theme by Anariel Design. Proudly powered by WordPress.' ) ); ?> </a>
		<?php else: ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"> <?php echo esc_textarea ( get_theme_mod( 'zeko_copyright', 'Zeko Theme by Anariel Design. Proudly powered by WordPress.' ) ); ?> </a>
		<?php endif; ?>
	</div><!-- .wrap -->
</div><!-- .site-info -->
<?php } // end if ?>
<?php if ( get_theme_mod( 'scrolltotop', true ) ) { ?>
	<div class="wrap center">
		<a class="scroll-to-top" href="#"></a>
	</div><!-- .wrap -->
<?php } ?>
