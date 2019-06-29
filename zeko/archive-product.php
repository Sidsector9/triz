<?php
/**
 * The template for displaying product archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zeko
 */

get_header(); ?>
<div class="wrap">
	<?php woocommerce_breadcrumb(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php woocommerce_content(); ?>

		</main>
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->
<?php
get_footer();
