<?php
/**
 * Template part for displaying page content in front-page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zeko
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="clear">
	<div class="twocolumn">
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php } ?>
	</div><!-- .twocolumn -->

	<div class="twocolumn">
	<header class="entry-header">
		<?php if(!get_theme_mod( 'zeko_child_page_title_link' )) : ?>
			<?php
				the_title( '<h2 class="entry-title">', '</h2>' );
			?>
		<?php else: ?>
			<?php
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			?>
		<?php endif; ?>
	</header>
	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'zeko' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'zeko' ),
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>'
			) );
		?>
	</div><!-- .twocolumn -->
	</div><!-- .clear -->
	<footer class="entry-footer">
		<?php zeko_edit_link( get_the_ID() ); ?>
	</footer>
	</div>
</article><!-- #post-## -->
