<?php
/**
 * Template Name: Left Sidebar Template
 *
 * The template for displaying page with left sidebar.
 *
 * @package Zeko
 */

get_header(); ?>

<?php if ( has_post_thumbnail() ) : ?>
<div class="top-featured-image">
	<?php the_post_thumbnail(); ?>
</div><!-- .top-featured-image -->
<?php endif; ?>

<div class="wrap page-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'components/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main>
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->
<?php
get_footer();
