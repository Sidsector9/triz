<?php
/**
 * components functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Zeko
 */

if ( ! function_exists( 'zeko_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the aftercomponentsetup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function zeko_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'zeko' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'zeko', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'zeko-featured-image', 2600, 900, true );

	add_image_size( 'zeko-featured-archive-image', 700, 9999 );

	add_image_size( 'zeko-causes-archive-image', 900, 600, true );

	add_image_size( 'zeko-recent-post-image', 348, 9999 );
	
	add_image_size( 'zeko-grid-page-image', 354, 9999 );

	add_image_size( 'zeko-thumbnail-avatar', 100, 100, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'top'=> esc_html__( 'Top Menu', 'zeko' ),
		'social'=> esc_html__( 'Social Menu', 'zeko' ),
	) );
	
	/* Add support for editor styles */
	add_editor_style( array( 'editor-style.css', zeko_fonts_url() ) );
	
	/*
	 * Enable support for custom logo.
	 *
	 *  @since Zeko 1.0
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 9999,
		'width'       => 9999,
		'flex-height' => true,
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'zeko_custom_background_args', array(
		'default-color' => '233131',
		'default-image' => '',
	) ) );

	// Add support to selectively refresh widgets in Customizer
	add_theme_support( 'customize_selective_refresh_widgets' );
	

	// Adding support for core block visual styles.
	add_theme_support( 'wp-block-styles' );
	
	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
		
	// Add support for custom color scheme.
	add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Strong Red', 'zeko' ),
				'slug'  => 'strong-red',
				'color' => '#9e0022',
			),
		) );
}
endif;
add_action( 'after_setup_theme', 'zeko_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zeko_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'zeko_content_width', 700 );
	
	//Adjust content_width value for page and attachement templates.
	if ( is_page_template( 'page-templates/grid-page.php' )
	|| is_page_template( 'page-templates/full-width-page.php' )) {
		$GLOBALS['content_width'] = 1120;
	}
}
add_action( 'after_setup_theme', 'zeko_content_width', 0 );


/**
 * Register custom fonts
 */
function zeko_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Open Sans, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$open_sans = esc_html_x( 'on', 'open_sans font: on or off', 'zeko' );

	/* Translators: If there are characters in your language that are not
	* supported by Karla, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$oswald = esc_html_x( 'on', 'Oswald font: on or off', 'zeko' );

	if ( 'off' !== $open_sans || 'off' !== $oswald ) {
		$font_families = array();

		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i';
		}

		if ( 'off' !== $oswald ) {
			$font_families[] = 'Oswald:200,300,400,500,600,700';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zeko_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'zeko' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'zeko' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'zeko' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your first footer area.', 'zeko' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'zeko' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here to appear in your second footer area.', 'zeko' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'zeko' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here to appear in your third footer area.', 'zeko' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Front Slider', 'zeko' ),
		'id'            => 'sidebar-5',
		'description'   => esc_html__( 'Add slider here to appear in your front page top area.', 'zeko' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// echo esc_attr( zeko_widget_column_class( 'sidebar-1' ) );
}
add_action( 'widgets_init', 'zeko_widgets_init' );


/**
 * Wrap avatars in div for easier styling
 */
function zeko_get_avatar( $avatar ) {
	if ( ! is_admin() ) {
		$avatar = '<span class="avatar-container">' . $avatar . '</span>';
	}
	return $avatar;
}
add_filter( 'get_avatar', 'zeko_get_avatar', 10, 5 );


/**
 * Use front-page.php when 'Front page displays' is set to a static page.
 * Will use custom page templates if set.
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults
 * to index.php), else $template.
 */
function zeko_front_page_template( $template ) {
	
	// Get the template for the page if it were displayed normally.
	$page_template = get_page_template();

	// Check the template name. If it's not a default page tmeplate file, ie
	// it's a custom page template, then use the custom template instead.
	if ( ! in_array( basename( $page_template ), array( 'single.php', 'singular.php', 'page.php' ), true ) ) {
		$template = $page_template;
	}

	// If is a blog post listing then use the default index template.
	if ( is_home() ) {
		return '';
	}

	// Use the page template that has been selected.
	return $template;

}
add_filter( 'frontpage_template',  'zeko_front_page_template' );
add_filter('the_excerpt', 'do_shortcode');

/*
 * Query whether WooCommerce is activated.
 */
function zeko_is_woocommerce_activated() {
	if ( class_exists( 'woocommerce' ) ) {
		return true;
	} else {
		return false;
	}
}

/*
 * Query whether Events Calendar is activated.
 */
function zeko_is_the_events_calendar_activated() {
	if ( class_exists( 'the-events-calendar' ) ) {
		return true;
	} else {
		return false;
	}
}

/*
 * Query whether BuddyPress is activated.
 */
function zeko_is_buddypress_activated() {
	if ( class_exists( 'buddypress' ) ) {
		return true;
	} else {
		return false;
	}
}

/*
 * Query whether bbPress is activated.
 */
function zeko_is_bbpress_activated() {
	if ( class_exists( 'bbpress' ) ) {
		return true;
	} else {
		return false;
	}
}

/*
 * Query whether Give is activated.
 */
function zeko_is_give_activated() {
	if ( class_exists( 'give' ) ) {
		return true;
	} else {
		return false;
	}
}


/**
 * Enqueue scripts and styles.
 */
function zeko_scripts() {
	wp_enqueue_style( 'zeko-style', get_stylesheet_uri() );

	wp_enqueue_style( 'zeko_fonts_url', zeko_fonts_url(), array(), null );

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/assets/fonts/genericons.css', array(), null );

	wp_enqueue_script( 'zeko-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0', true );

	wp_enqueue_script( 'zeko-global', get_template_directory_uri() . '/assets/js/global.js', array( 'jquery' ), '1.0', true );
	
	wp_enqueue_script( 'zeko-search', get_template_directory_uri() . '/assets/js/search.js', array( 'jquery' ), '1.0', true );
	
	// Add Slick Slider Styles
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0' );
	
	if ( zeko_is_woocommerce_activated() ) {
	wp_enqueue_style( 'zeko-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css', array(), '1.0' );
	}
	
	if ( zeko_is_the_events_calendar_activated() ) {
	wp_enqueue_style( 'zeko-events', get_template_directory_uri() . '/assets/css/tribe-events.css', array(), '1.0' );
	}
	
	if ( zeko_is_buddypress_activated() ) {
	wp_enqueue_style( 'zeko-bbpress', get_template_directory_uri() . '/assets/css/bbpress.css', array(), '1.0' );
	}
	
	if ( zeko_is_bbpress_activated() ) {
	wp_enqueue_style( 'zeko-bbpress', get_template_directory_uri() . '/assets/css/bbpress.css', array(), '1.0' );
	}
	
	if ( zeko_is_give_activated() ) {
	wp_enqueue_style( 'zeko-give', get_template_directory_uri() . '/assets/css/give.css', array(), '1.0' );
	}
	
	// only loaded on front page
	if ( is_front_page() ) {
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), '1.6.0', true );
		wp_enqueue_script( 'zeko-featured-slider', get_template_directory_uri() . '/assets/js/featured-slider.js', array( 'jquery' ), '1.0', true );
	}

	wp_enqueue_script( 'zeko-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '1.0', true );

	// Scroll effects (only loaded on front page in Customizer)
	if ( zeko_is_frontpage() && is_customize_preview() ) :
		wp_enqueue_script( 'scrollTo', get_template_directory_uri() . '/assets/js/jquery.scrollTo.js', array( 'jquery' ), '1.0', true );
	endif;

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'zeko_scripts' );

/**
 * Enqueue theme styles within Gutenberg.
 */
function zeko_gutenberg_styles() {

	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'zeko-gutenberg', get_theme_file_uri( '/editor.css' ), false, '1.1.2', 'all' );

	// Add custom fonts to Gutenberg.
	wp_enqueue_style( 'zeko-fonts', zeko_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'zeko_gutenberg_styles' );

/**
 * Enqueue the stylesheet.
 */
function zeko_enqueue_customizer_stylesheet() {
	
	wp_enqueue_style( 'zeko-customizer-css', get_template_directory_uri() . '/admin/customizer.css', array(), '1.0' );

}
add_action( 'customize_controls_print_styles', 'zeko_enqueue_customizer_stylesheet' );

if (!function_exists('zeko_admin_scripts')) {
	function zeko_admin_scripts($hook) {
		if ('appearance_page_charity' === $hook) {
			wp_enqueue_style('zeko-admin', get_template_directory_uri() . '/admin/admin.css');
		}
	}
}
add_action('admin_enqueue_scripts', 'zeko_admin_scripts');

if (is_admin()) {
	require get_template_directory() . '/admin/admin.php';
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Zeko Style.
 */
require get_template_directory() . '/inc/zeko_style.php';

/**
 * WooCommerce
 *
 * Unhook sidebar
 */
add_theme_support( 'woocommerce' );

/**
  * WooCommerce: change products per page
  * @return int
  */
function zeko_loop_shop_per_page() {
	return -1; //return any number, -1 === show all
};
add_filter('loop_shop_per_page', 'zeko_loop_shop_per_page', 40, 0);


/**
 * WooCommerce Category Page Featured Image
 *
 * @since Zeko 1.0
 */
function zeko_woocommerce_category_image() {
	if ( is_product_category() ){
		global $wp_query;
		$cat = $wp_query->get_queried_object();
		$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
		$image = wp_get_attachment_url( $thumbnail_id );
		if ( $image ) {
			echo '<img src="' . esc_url( $image ) . '" alt="" />';
		}
	}
}

/**
 * TGM Plugin Activation
 */
require get_template_directory() . '/assets/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'zeko_require_plugins' );

function zeko_require_plugins() {

	$plugins = array(
		// Custom Post Type Plugin
		array(
			'name'         => esc_html__( 'Zeko Custom Post Type', 'zeko' ), // The plugin name.
			'slug'         => 'zeko-custom-post-type', // The plugin slug (typically the folder name).
			'source'       => esc_url('https://github.com/anarieldesign/zeko-custom-post-type/archive/master.zip' ), // The plugin source.
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => esc_url('https://github.com/anarieldesign/zeko-custom-post-type/' ), // If set, overrides default API URL and points to an external URL.
		),

		// One Click Demo Import
		array(
			'name'      => esc_html__( 'One Click Demo Import', 'zeko' ),
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),
		// Woocommerce
		array(
			'name'      => esc_html__( 'Woocommerce', 'zeko' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		// Contact Form 7
		array(
			'name'      => esc_html__( 'Contact Form 7', 'zeko' ),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		// Give
		array(
			'name'      => esc_html__( 'Give', 'zeko' ),
			'slug'      => 'give',
			'required'  => false,
		),
		// MailChimp
		array(
			'name'      => esc_html__( 'MailChimp for WordPress', 'zeko' ),
			'slug'      => 'mailchimp-for-wp',
			'required'  => false,
		),
		// Elementor
		array(
			'name'      => esc_html__( 'Elementor', 'zeko' ),
			'slug'      => 'elementor',
			'required'  => false,
		),
		// The Events Calendar
		array(
			'name'      => esc_html__( 'The Events Calendar', 'zeko' ),
			'slug'      => 'the-events-calendar',
			'required'  => false,
		),
		// WPForms
		array(
			'name'      => esc_html__( 'WPForms Lite', 'zeko' ),
			'slug'      => 'wpforms-lite',
			'required'  => false,
		),

);
		$config = array(
		'id'           => 'zeko',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		);
	tgmpa( $plugins, $config );
}

/**
 * One Click Demo Import
 */
function zeko_ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => esc_html__( 'Demo Import', 'zeko' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/zeko-demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/zeko-widgets.json',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/zeko-customizer.dat',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'zeko_ocdi_import_files' );
function zeko_ocdi_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Top Menu', 'nav_menu' );
	$social_menu = get_term_by( 'name', 'Social Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
		'top' => $main_menu->term_id,
		'social' => $social_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title (esc_html__( 'Welcome to Zeko', 'zeko' ));
	$blog_page_id  = get_page_by_title (esc_html__( 'Latest News', 'zeko' ));

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'zeko_ocdi_after_import_setup' );
function zeko_ocdi_plugin_intro_notice ( $default_text ) {
	return wp_kses_post( str_replace ( 'Before you begin, make sure all the required plugins are activated.', esc_html__( 'Before you begin, make sure all the recommended plugins are activated.', 'zeko'), $default_text ) );
}
add_filter( 'pt-ocdi/plugin_intro_text', 'zeko_ocdi_plugin_intro_notice' );
