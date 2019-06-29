<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Zeko
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function zeko_body_classes( $classes ) {
	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options
	if ( is_customize_preview() ) {
		$classes[] = 'zeko-customizer';
	}

	// Add class on front page
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'zeko-front-page';
	}

	// Add class if no custom header or featured images
	$header_image = get_header_image();
	if ( ! has_header_image() && ( ! has_post_thumbnail() || is_home() ) ) {
		$classes[] = 'no-header-image';
	}
	
	// Add class for the header layouts.
	if ( 'fixed-header' === get_theme_mod( 'zeko_header_layout' ) ) {
		$classes[] = 'fixed-header';
	}
	if ( 'static-header' === get_theme_mod( 'zeko_header_layout' ) ) {
		$classes[] = 'static-header';
	}
	
	if ( 'center-header' === get_theme_mod( 'zeko_header_layout' ) ) {
		$classes[] = 'center-header';
	}
	
	// Add class for the header layouts.
	if ( 'fixed-mobile-menu' === get_theme_mod( 'zeko_mobile_menu_layout' ) ) {
		$classes[] = 'fixed-mobile-menu';
	}
	if ( 'default-mobile-menu' === get_theme_mod( 'zeko_mobile_menu_layout' ) ) {
		$classes[] = 'default-mobile-menu';
	}

	// Add class if footer image has been added
	$footer_image = get_theme_mod( 'zeko_footer_image' );
	if ( isset( $footer_image ) ) {
		$classes[] = 'zeko-footer-image';
	}
	
	// Add class for the sidebar position
	if ( 'sidebar-right' === get_theme_mod( 'zeko_blog_sidebar_layout' ) ) {
		$classes[] = 'right-sidebar-layout';
	}
	
	if ( 'sidebar-left' === get_theme_mod( 'zeko_blog_sidebar_layout' ) ) {
		$classes[] = 'left-sidebar-layout';
	}
	
	if ( 'no-sidebar' === get_theme_mod( 'zeko_blog_sidebar_layout' ) ) {
		$classes[] = 'no-sidebar-layout';
	}
	
	// Add class if sidebar is used
	if ( is_active_sidebar( 'sidebar-1' ) && ! zeko_is_frontpage() ) {
		$classes[] = 'has-sidebar';
	}
		// Add class if sidebar is used
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	
		
	// Add class for the blog layout
	if ( 'grid-two' === get_theme_mod( 'zeko_blog_sidebar_layout' ) ) {
		$classes[] = 'grid-two';
	}
	
	if ( 'grid-three' === get_theme_mod( 'zeko_blog_sidebar_layout' ) ) {
		$classes[] = 'grid-three';
	}
	
	return $classes;
}
add_filter( 'body_class', 'zeko_body_classes' );

/*
 * Count our number of active panels
 * Primarily used to see if we have any panels active, duh.
 */
function zeko_panel_count() {
	$panels = array( '1', '2', '3', '4' );
	$panel_count = 0;

	foreach ( $panels as $panel ) :
		if ( get_theme_mod( 'zeko_panel' . $panel ) ) :
			$panel_count++;
		endif;
	endforeach;

	return $panel_count;
}

/**
 * Checks to see if we're on the homepage or not.
 */
function zeko_is_frontpage() {
	if ( is_front_page() && ! is_home() ) :
		return true;
	else :
		return false;
	endif;
}
