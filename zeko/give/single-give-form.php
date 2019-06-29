<?php
/**
 * The template for displaying all give single posts.
 *
 * @package Zeko
 */

get_header(); ?>

<div class="wrap">
	<div class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				while ( have_posts() ) : the_post();

					give_get_template_part( 'single-give-form/content', 'single-give-form' );

					the_post_navigation( array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous Post', 'zeko' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Post', 'zeko' ) . '</span> <span class="nav-title">%title</span>',
					) );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
<?php
get_footer();
