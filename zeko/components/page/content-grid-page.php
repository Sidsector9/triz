<?php
/**
 * Template part for displaying page content in grid-page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zeko
 */

?>

<div class="grid-item">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( '' !== get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
		<?php if(!get_theme_mod( 'zeko_image_link' )) : ?>
			<?php the_post_thumbnail( 'zeko-grid-page-image' ); ?>
		<?php else: ?>
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'zeko-grid-page-image' ); ?>
		</a>
		<?php endif; ?>
		</div>
	<?php endif; ?>

	<header class="entry-header">
		<?php if(!get_theme_mod( 'zeko_child_title_link' )) : ?>
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		<?php else: ?>
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
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
	</div>
	<footer class="entry-footer">
		<?php zeko_edit_link( get_the_ID() ); ?>
	</footer>

</article><!-- #post-## -->
</div><!-- .grid-item -->
