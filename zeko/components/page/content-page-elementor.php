<?php
/**
 * Template part for displaying page content in builder-page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zeko
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zeko' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->