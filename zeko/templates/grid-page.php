<?php
/**
 * Template Name: Grid Template
 *
 * The template for displaying child page content in a grid.
 *
 * @package Zeko
 */

get_header(); ?>

<div class="top-featured-image">
	<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail(); ?>
	<?php endif; ?>
</div><!-- .top-featured-image -->

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
			<?php
				$child_pages = new WP_Query( array(
					'post_type'      => 'page',
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
					'post_parent'    => $post->ID,
					'posts_per_page' => 999,
					'no_found_rows'  => true,
				) );
			?>
			<?php if ( $child_pages->have_posts() ) :?>
				<div class="flexcontainer">
					<?php while ( $child_pages->have_posts() ) : $child_pages->the_post();
						get_template_part( 'components/page/content', 'grid-page' );
					endwhile;
					wp_reset_postdata();?>
				</div><!-- .child-pages -->
			<?php endif;?>

		</main>
	</div><!-- #primary -->
</div><!-- .wrap -->
<?php
get_footer();
