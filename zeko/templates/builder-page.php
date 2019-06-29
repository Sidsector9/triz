<?php
/**
 * Template Name: Page Builder Template
 * The template for displaying about page.
 *
 * @package Zeko
 */

get_header(); ?>

	<div class="builder-content">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'components/page/content', 'page-elementor' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) {
					comments_template();
				}
			?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->

<?php
get_footer();
