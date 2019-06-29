<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zeko
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'zeko-recent-post-image' ); ?>
			</a>
		</div>
	<?php endif; ?>

	<div class="inner-content">
	<header class="entry-header">
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php zeko_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header>
	<div class="entry-summary">
		<?php the_excerpt( sprintf(
			__( 'Continue reading %s', 'zeko' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		) );?>
	</div>
	<footer class="entry-footer">
		<?php zeko_edit_post_link(); ?>
	</footer><!-- .entry-footer -->
	</div>

</article>
