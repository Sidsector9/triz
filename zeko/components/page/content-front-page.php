<article id="post-<?php the_ID(); ?>">
	<?php get_sidebar( 'front-slider' ); ?>
	<?php if ( get_theme_mod( 'zeko_featured_slider' )): ?>
		<div class="featured-slider">
			<?php // Show most recent posts.
				$recent_posts = new WP_Query( array(
					'posts_per_page'      => get_theme_mod( 'zeko_featured-slider_post_number' ),
					'category_name'       => get_theme_mod( 'zeko_featured-slider_post_category' ),
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				) );
		
			if($recent_posts-> have_posts()) : while($recent_posts-> have_posts()) : $recent_posts-> the_post();
			?>
			<div class="recent-post">
				<?php get_template_part( 'components/page/content', 'slider' ); ?>
			</div>
			<?php endwhile; endif;
			wp_reset_postdata();?>
		</div>
	<?php endif; ?>

	<?php if ( !get_theme_mod( 'zeko_hero_hide' )): ?>
	<div class="front-page-content-area">
		<?php
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			$zeko_page_image = $thumb['0'];
		?>
		<div id="hero" class="hero" style="background-image: url(<?php echo esc_url( $zeko_page_image ); ?>);">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'zeko-hero-thumbnail' ); ?>
			<?php endif; ?>
			<div class="wrap hero-container-outer">
			<div class="hero-container-inner">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php zeko_edit_link( get_the_ID() ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
			</div>
		</div>
			<span class="overlay-bg"></span>
		</div>

	</div><!-- .front-page-content-area -->
	<?php endif; ?>
	<?php
		$zeko_child_pages = new WP_Query( array(
			'post_type'      => 'page',
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'post_parent'    => $post->ID,
			'posts_per_page' => 10,
			'no_found_rows'  => true,
		) );
	?>
	<?php if(!get_theme_mod( 'zeko_child_page_layout' )) : ?>
	<?php if ( $zeko_child_pages->have_posts() ) :?>
		<div class="wrap front-child-page">
			<?php while ( $zeko_child_pages->have_posts() ) : $zeko_child_pages->the_post();
				get_template_part( 'components/page/content', 'grid' );
			endwhile;
			wp_reset_postdata();?>
		</div><!-- .child-pages -->
	<?php endif;?>
	<?php else: ?>
	<?php if ( $zeko_child_pages->have_posts() ) :?>
		<div class="wrap front-child-page">
			<div class="column-layout flexcontainer">
			<?php while ( $zeko_child_pages->have_posts() ) : $zeko_child_pages->the_post();
				get_template_part( 'components/page/content', 'grid-columns' );
			endwhile;
			wp_reset_postdata();?>
			</div><!-- .flexcontainer -->
		</div><!-- .child-pages -->
	<?php endif;?>
	<?php endif; ?>
</article><!-- #post-## -->
