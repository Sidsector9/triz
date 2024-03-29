<?php
/**
 * Template part for displaying posts.
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
				<?php the_post_thumbnail( 'zeko-featured-archive-image' ); ?>
			</a>
		</div>
	<?php endif; ?>

	<header class="entry-header">

		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>

		<?php if(!get_theme_mod('zeko_posted_on')) : ?>
			<div class="entry-meta">
				<?php zeko_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

	</header>
	<div class="entry-content">

		<?php if(get_theme_mod('zeko_post_type') == 'excerpt-lenght') : ?>
		<?php the_excerpt( sprintf(
			__( 'Continue reading %s', 'zeko' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		) );?>

		<?php else: ?>

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

		<?php endif; ?>
	</div>

</article><!-- #post-## -->
</div><!-- .grid-item -->
