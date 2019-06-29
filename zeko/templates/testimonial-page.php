<?php
/**
 * Template Name: Testimonial Template
 *
 * The template for displaying Testimonials.
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

			<?php if ( have_posts() ) :

				while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'components/page/content', 'page' ); ?>

					<?php
					$testimonial_query = new WP_Query( array(
						'post_type'      => 'testimonials',
						'order'          => 'DSC',
						'orderby'        => 'order',
						'posts_per_page' => 30,
						'no_found_rows'  => true,
					) );
					?>

					<?php if ( $testimonial_query->have_posts() ) : ?>
						<div class="testimonials-content clear">

							<?php
							while ( $testimonial_query -> have_posts() ) : $testimonial_query -> the_post();
								get_template_part( 'components/features/testimonials/content', 'testimonials' );
							endwhile;
							?>

						</div><!-- .testimonials -->

						<?php
					endif;
					wp_reset_postdata();
					?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>


				<?php endwhile; // End of the loop. ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
<?php
get_footer();
