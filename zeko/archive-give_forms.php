<?php
/**
 * The template for displaying give forms archive page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zeko
 */

get_header(); ?>
<div class="wrap">
	<?php
	
	$args = array(
	'post_type' => 'give_forms',
	'posts_per_page' => get_theme_mod( 'zeko_forms_number' ),
	);

	$form_query = new WP_Query( $args );
	if ( $form_query->have_posts() ) : ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="flexcontainer">
			<?php
			/* Start the Loop */
			while ( $form_query->have_posts() ) : $form_query->the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'components/page/content-give', get_post_format() );

			endwhile;

		else :

			get_template_part( 'components/post/content', 'none' );

		endif; ?>
		</div><!-- .flexcontainer -->
		</main>
	</div><!-- #primary -->
</div><!-- .wrap -->
<?php
get_footer();
