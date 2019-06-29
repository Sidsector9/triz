<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zeko
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php get_template_part( 'components/header/header', 'image' ); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'zeko' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="header-top">
			<?php if('right-logo' === get_theme_mod( 'zeko_logo_position' )) : ?>
			<div class="wrap right-logo">
				<?php if( ! get_theme_mod( 'zeko_search_top' ) ) : ?>
					<div class="search-toggle">
						<button id="#search-container" class="screen-reader-text" aria-expanded="false" aria-controls="search-container">
							<span id="top-search-form-toggle-span" class="genericon genericon-search" aria-hidden="true"></span>
							<span id="top-search-form-toggle-menu" class="top-search-form-toggle-menu top-menu-button"><?php esc_html_e( 'Search', 'zeko' ); ?></span>
						</button>
					</div>
					<div id="search-container" class="search-box-wrapper hide">
						<div class="search-box">
							<?php get_search_form(); ?>
						</div>
					</div>
				<?php endif; ?>
				<?php get_template_part( 'components/navigation/navigation', 'top' ); ?>
				<?php get_template_part( 'components/header/site', 'branding' ); ?>
			</div>

			<?php else: ?>
			<div class="wrap">
				<?php get_template_part( 'components/header/site', 'branding' ); ?>
				<?php get_template_part( 'components/navigation/navigation', 'top' ); ?>
				<?php if( ! get_theme_mod( 'zeko_search_top' ) ) : ?>
					<div class="search-toggle">
						<button id="#search-container" class="screen-reader-text" aria-expanded="false" aria-controls="search-container">
							<span id="top-search-form-toggle-span" class="genericon genericon-search" aria-hidden="true"></span>
							<span id="top-search-form-toggle-menu" class="top-search-form-toggle-menu top-menu-button"><?php esc_html_e( 'Search', 'zeko' ); ?></span>
						</button>
					</div>
					<div id="search-container" class="search-box-wrapper hide">
						<div class="search-box">
							<?php get_search_form(); ?>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			</div>
		</div><!-- .header-top -->

	</header>

	<div id="content" class="site-content">
