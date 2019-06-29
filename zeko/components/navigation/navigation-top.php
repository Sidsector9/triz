<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'zeko' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'zeko' ); ?></button>
	<div class="menu-primary-menu-container">
	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id' => 'top-menu',
	) ); ?>
	</div><!-- .menu-primary-menu-container -->
</nav><!-- #site-navigation -->