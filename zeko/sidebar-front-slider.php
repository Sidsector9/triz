<?php
/**
 * The sidebar containing the front slider widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zeko
 */

if ( ! is_active_sidebar( 'sidebar-5' ) ) {
	return;
}
?>

<div class="top widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-5' ); ?>
</div><!-- #secondary -->
