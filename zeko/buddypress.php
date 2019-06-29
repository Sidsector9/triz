<?php
/**
 * The template for displaying buddypress.
 *
 * The template for displaying full width content.
 *
 * @package Zeko
 */
 
 // Access global variable directly to set content_width
if ( isset( $GLOBALS['content_width'] ) ) {
	$GLOBALS['content_width'] = 1120;
}

get_header(); ?>

<div class="wrap">
	<div class="content-area">
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
</div><!-- .wrap -->
<?php
get_footer();
