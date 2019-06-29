<?php
/**
 * Template part for displaying slider posts with excerpts
 *
 * Used for Recent Posts in Front Page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Zeko
 * @since 1.0
 * @version 1.0
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>

		<div class="caption">
		<div class="caption-innen">
			<div class="category">
				<?php the_category( ' ' ); ?>
			</div>
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->
		</div>
		</div><!-- .caption -->
	</article><!-- #post-## -->
