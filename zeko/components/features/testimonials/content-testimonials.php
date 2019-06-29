<?php
/**
 * The template used for displaying testimonials.
 *
 * @package Zeko
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-thumbnail"><?php the_post_thumbnail( 'zeko-thumbnail-avatar' ); ?></div>
		<?php endif; ?>
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			<?php zeko_edit_link( get_the_ID() ); ?>
		</header>
		<?php the_content(); ?>
	</div>



</article>
