<?php
/**
 * Template part for displaying page content in give archive page.
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
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>
	<?php endif; ?>

	<div class="project-archive-content">
		<div class="project-archive-content-wrapper">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</header>

			<div class="entry-content">
				<?php
					the_excerpt();

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
		</div>
	</div>

</article><!-- #post-## -->
</div><!-- .grid-item -->
