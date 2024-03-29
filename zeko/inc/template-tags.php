<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Zeko
 */

if ( ! function_exists( 'zeko_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function zeko_posted_on() {

	/* translators: used between list items, there is a space after the comma */
	$separate_meta = esc_html__( ', ', 'zeko' );

	// Let's get a nicely formatted string for the published date
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	
	// Sticky
	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . esc_html__( 'Featured', 'zeko' ) . '</span>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	// Wrap that in a link, and preface it with 'Posted on'
	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'zeko' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	// Get the author name; wrap it in a link
	$byline = sprintf(
		'<span class="byline-prefix">%1$s</span> %2$s',
		esc_html_x( 'by', 'post author', 'zeko' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	// Check to make sure we have more than one category before writing to page
	// Also, don't show when blog posts appear on static front page
	$categories_list = get_the_category_list( $separate_meta );
	if ( $categories_list && zeko_categorized_blog() && 'posts' !== get_option( 'show_on_front' ) ) {
		$categories_list = sprintf( '<span class="cat-prefix">%1$s</span> %2$s', esc_html_x( 'in', 'prefaces list of categories assigned to the post', 'zeko' ), $categories_list ); // WPCS: XSS OK.
	}

	// Finally, let's write all of this to the page
	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	// Make sure $categories actually exists before trying to echo.
	if ( $categories_list ) {
		echo '<span class="cat-links"> ' . $categories_list . '</span>'; // WPCS: XSS OK.
	}
}
endif;


if ( ! function_exists( 'zeko_portfolio_meta' ) ) :
/**
 * Prints the portfolio Category
 */
function zeko_portfolio_meta() {
	/* translators: used between list items, there is a space after the comma */
	$separate_meta = esc_html__( ', ', 'zeko' );
	$categories = get_the_term_list( $post->ID, 'jetpack-portfolio-type', esc_html_x( 'Type: ', 'prefaces list of categories assigned to post', 'zeko' ), $separate_meta, '' );

	echo '<span class="cat-links"> ' . $categories . '</span>'; // WPCS: XSS OK.
}
endif;


if ( ! function_exists( 'zeko_edit_post_link' ) ) :
/**
 * Prints the post's edit link
 */
function zeko_edit_post_link() {
	// Display 'edit' link
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'zeko' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;


if ( ! function_exists( 'zeko_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function zeko_entry_footer() {

	/* translators: used between list items, there is a space after the comma */
	$separate_meta = esc_html__( ', ', 'zeko' );

	// Display Tags for posts and portfolio projects
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		the_tags( sprintf( '<span class="tags-links">%s ', esc_html__( 'Tagged', 'zeko' ) ), $separate_meta, '</span>' );
	} else if ( 'jetpack-portfolio' === get_post_type() ) {
		$tags_list = get_the_term_list( $post->ID, 'jetpack-portfolio-tag', '', $separate_meta, '' );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'zeko' ) . '</span>', $tags_list );
		}
	}

	// Display link to comments
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'zeko' ), esc_html__( '1 Comment', 'zeko' ), esc_html__( '% Comments', 'zeko' ) );
		echo '</span>';
	}

	zeko_edit_post_link();
}
endif;


/**
 * Returns an accessibility-friendly link to edit a post or page.
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 */
function zeko_edit_link( $id ) {
	if ( is_page() ) :
		$type = esc_html__( 'Page', 'zeko' );
	elseif ( get_post( $id ) ) :
		$type = esc_html__( 'Post', 'zeko' );
	endif;
	$link = edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %1$s %2$s', 'zeko' ),
			esc_html( $type ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
	return $link;
}


/**
 * Display a front page section.
 *
 * @param WP_Customize_Partial $partial Partial associated with a selective refresh request.
 * @param integer              $id Front page section to display.
 */
function zeko_front_page_section( $partial = null, $id = 0 ) {
	if ( is_a( $partial, 'WP_Customize_Partial' ) ) {
		// Find out the id and set it up during a selective refresh.
		global $zekocounter;
		$id = str_replace( 'panel_', '', $partial->id );
		$zekocounter = $id;
	}

	global $post; // Modify the global post object before setting up post data.
	if ( get_theme_mod( 'panel_' . $id ) ) {
		$post = get_post( get_theme_mod( 'panel_' . $id ) );
		setup_postdata( $post );
		set_query_var( 'panel', $id );

		get_template_part( 'template-parts/page/content', 'front-page-panels' );

		wp_reset_postdata();
	} elseif ( is_customize_preview() ) {
		// The output placeholder anchor.
		echo '<article class="panel-placeholder panel zeko-panel' . $id . '" id="panel' . $id . '"><span class="zeko-panel-title">' . sprintf( esc_html__( 'Front Page Section %1$s Placeholder', 'zeko' ), $id ) . '</span></article>';
	}
}


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function zeko_categorized_blog() {
	$category_count = get_transient( 'zeko_categories' );
	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );
		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );
		set_transient( 'zeko_categories', $category_count );
	}
	return $category_count > 1;
}
/**
 * Flush out the transients used in twentyseventeen_categorized_blog.
 */
function zeko_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'zeko_categories' );
}
add_action( 'edit_category', 'zeko_category_transient_flusher' );
add_action( 'save_post',     'zeko_category_transient_flusher' );

if ( ! function_exists( 'zeko_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Zeko 1.0
 */
function zeko_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
