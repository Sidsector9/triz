<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zeko
 */

get_header(); ?>


<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

			<?php // Show the selected frontpage content
				if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'components/page/content', 'front-page' ); ?>
				<?php endwhile; ?>
			<?php endif; ?>


		<?php
		// Get each of our panels and show the post data
		$panels = array( '1', '2', '3', '4' );
		$titles = array();

		global $zekocounter; // Used in components/page/content-front-page-panels.php file.

		if ( 0 !== zeko_panel_count() || is_customize_preview() ) : //If we have pages to show...

			$zekocounter = 1;

			foreach ( $panels as $panel ) :
				if ( get_theme_mod( 'zeko_panel' . $panel ) ) :
					$post = get_post( get_theme_mod( 'zeko_panel' . $panel ) );
					setup_postdata( $post );
					set_query_var( 'zeko_panel', $panel );

					$titles[] = get_the_title(); //Put page titles in an array for use in navigation
					get_template_part( 'components/page/content', 'front-page-panels' );

					wp_reset_postdata();
				else :
					// output placeholder anchor
					echo '<article class="zeko-panel panel-placeholder">';
					echo '<span class="panel zeko-panel' . esc_attr( $zekocounter ) .' label-placeholder" id="panel' . esc_attr( $zekocounter ) . '">';
					echo '<span class="zeko-panel-title">' . sprintf( esc_html__( 'Panel %1$s Placeholder', 'zeko' ), esc_attr( $zekocounter ) ) . '</span>';
					echo '</span></article>';
				endif;

				$zekocounter++;
			endforeach;
			?>

	<?php endif; // if ( 0 !== zeko_panel_count() )
	?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
