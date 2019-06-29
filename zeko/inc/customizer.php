<?php
/**
 * Zeko Theme Customizer.
 *
 * @package Zeko
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zeko_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->remove_section('colors');

	/**
	 * Add the Theme Options section
	 */
	$wp_customize->add_panel( 'zeko_options_panel', array(
		'title'          => esc_html__( 'Theme Options', 'zeko' ),
		'description'    => esc_html__( 'Configure your theme settings', 'zeko' ),
	) );
	
	/* Header Layout */
	$wp_customize->add_section( 'zeko_header', array(
		'title'           => esc_html__( 'Header Options', 'zeko' ),
		'panel'           => 'zeko_options_panel',
	) );
	$wp_customize->add_setting( 'zeko_header_layout', array(
		'default'           => 'fixed-header',
		'sanitize_callback' => 'zeko_sanitize_choices',
	) );
	$wp_customize->add_control( 'zeko_header_layout', array(
		'label'             => esc_html__( 'Header Options', 'zeko' ),
		'section'           => 'zeko_header',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'fixed-header'   => esc_html__( 'Fixed Header', 'zeko' ),
			'static-header'   => esc_html__( 'Static Header', 'zeko' ),
			'center-header'   => esc_html__( 'Center Header', 'zeko' ),
		)
	) );
	
	$wp_customize->add_setting( 'zeko_logo_position', array(
		'default'           => 'default-logo',
		'sanitize_callback' => 'zeko_sanitize_choices',
	) );
	$wp_customize->add_control( 'zeko_logo_position', array(
		'label'             => esc_html__( 'Logo Position', 'zeko' ),
		'section'           => 'zeko_header',
		'priority'          => 2,
		'type'              => 'radio',
		'choices'           => array(
			'default-logo'   => esc_html__( 'Default (Left or Up depending on the header option)', 'zeko' ),
			'right-logo'   => esc_html__( 'Alternative (Right or Down depending on the header option)', 'zeko' ),
		)
	) );
	
	$wp_customize->add_setting( 'zeko_mobile_menu_layout', array(
		'default'           => 'default-mobile-menu',
		'sanitize_callback' => 'zeko_sanitize_choices',
	) );
	$wp_customize->add_control( 'zeko_mobile_menu_layout', array(
		'label'             => esc_html__( 'Mobile Menu Options', 'zeko' ),
		'section'           => 'zeko_header',
		'priority'          => 3,
		'type'              => 'radio',
		'choices'           => array(
			'fixed-mobile-menu'   => esc_html__( 'Sticky Menu', 'zeko' ),
			'default-mobile-menu'   => esc_html__( 'Default Menu', 'zeko' ),
		)
	) );
	
	/**
	* Search Bar
	*/
	$wp_customize->add_section( 'zeko_search', array(
		'title'           => esc_html__( 'Search', 'zeko' ),
		'panel'           => 'zeko_options_panel',
		'description'	  => esc_html__( 'Hide or Show Search', 'zeko' ),
	) );
	$wp_customize->add_setting( 'zeko_search_top', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'zeko_search_top', array(
		'label'             => esc_html__( 'Hide Search Box', 'zeko' ),
		'section'           => 'zeko_search',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );
	$wp_customize->selective_refresh->add_partial( 'zeko_search_top', array(
		'selector'            => '.search-form',
		'render_callback'     => 'zeko_options_panel',
		'container_inclusive' => true,
	) );
	
	//Hero Options
	$wp_customize->add_section( 'zeko_hero_options', array(
		'title'    => esc_html__( 'Front Page Hero Image', 'zeko' ),
		'active_callback' => 'is_front_page',
		'description'       => esc_html__( 'Hero image is featured image of the page you select to be your front page. Caption text is text added to the editor of that same page.', 'zeko' ),
		'panel'           => 'zeko_options_panel',
	) );
	
	$wp_customize->add_setting( 'zeko_hero_hide', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_sanitize_checkbox',
	) );
	$wp_customize->add_control('zeko_hero_hide', array(
				'label'      => esc_html__( 'Hide Hero Image & Caption', 'zeko' ),
				'section'    => 'zeko_hero_options',
				'type'		 => 'checkbox',
				'priority'	 => 1
	) );
	
	$wp_customize->add_setting( 'zeko_overlay', array(
		'default'           => '0.7',
		'sanitize_callback' => 'zeko_sanitize_overlay',
	) );

	$wp_customize->add_control( 'zeko_overlay', array(
		'label'   => esc_html__( 'Hero Image Opacity', 'zeko' ),
		'section' => 'zeko_hero_options',
		'type'    => 'select',
		'priority'          => 2,
		'choices' => array(
						'0.0' => '0%',
						'0.1' => '10%',
						'0.2' => '20%',
						'0.3' => '30%',
						'0.4' => '40%',
						'0.5' => '50%',
						'0.6' => '60%',
						'0.7' => '70%',
						'0.8' => '80%',
						'0.9' => '90%',
						'1.0' => '100%',
					),
	) );
	
	/* Mobile Caption Background Color */
	$wp_customize->add_setting( 'zeko_black_bg_caption_color', array(
		'default'           => '#1b1f22',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'zeko_black_bg_caption_color', array(
		'label'             => esc_html__( 'Caption background color on smaller devices', 'zeko' ),
		'settings'          => 'zeko_black_bg_caption_color',
		'section'           => 'zeko_hero_options',
		'priority'          => 3,
	) ) );
	
	$wp_customize->selective_refresh->add_partial( 'zeko_hero_hide', array(
		'selector'            => '.wrap.hero-container-outer',
		'render_callback'     => 'zeko_options_panel',
		'container_inclusive' => true,
	) );
	
	//Featured Slider
	$wp_customize->add_section( 'zeko_featured_slider_options', array(
		'title'    => esc_html__( 'Front Page Featured Slider', 'zeko' ),
		'active_callback' => 'is_front_page',
		'panel'           => 'zeko_options_panel',
	) );
	
	$wp_customize->add_setting( 'zeko_featured_slider', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_sanitize_checkbox',
	) );
	$wp_customize->add_control('zeko_featured_slider', array(
				'label'      => esc_html__( 'Show featured slider on the front page', 'zeko' ),
				'settings'   => 'zeko_featured_slider',
				'section'    => 'zeko_featured_slider_options',
				'type'		 => 'checkbox',
				'priority'	 => 1
	) );
	
	$wp_customize->add_setting( 'zeko_featured-slider_post_number', array(
		'default'           => '3',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'zeko_featured-slider_post_number', array(
		'label'             => esc_html__( 'Number of posts', 'zeko' ),
		'description'       => esc_html__( 'Enter number of posts to display in the slider.', 'zeko' ),
		'settings'           => 'zeko_featured-slider_post_number',
		'section'            => 'zeko_featured_slider_options',
		'priority'          => 2,
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'zeko_featured-slider_post_category', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'zeko_featured-slider_post_category', array(
		'label'             => esc_html__( 'Post Category', 'zeko' ),
		'description'       => esc_html__( 'Enter post category to display in slider.', 'zeko' ),
		'settings'           => 'zeko_featured-slider_post_category',
		'section'            => 'zeko_featured_slider_options',
		'priority'          => 3,
		'type'              => 'text',
	) );
	
	// Child Pages
	$wp_customize->add_section( 'zeko_child_page_options', array(
		'title'    => esc_html__( 'Front Page Child Pages', 'zeko' ),
		'active_callback' => 'is_front_page',
		'panel'           => 'zeko_options_panel',
	) );
	
	$wp_customize->add_setting( 'zeko_child_page_title_link', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_sanitize_checkbox',
	) );
	$wp_customize->add_control('zeko_child_page_title_link', array(
				'label'      => esc_html__( 'Enable Child Page Title Link', 'zeko' ),
				'settings'   => 'zeko_child_page_title_link',
				'section'    => 'zeko_child_page_options',
				'type'		 => 'checkbox',
				'priority'	 => 1
	) );
	
	$wp_customize->add_setting( 'zeko_child_page_layout', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_sanitize_checkbox',
	) );
	$wp_customize->add_control('zeko_child_page_layout', array(
				'label'      => esc_html__( 'Enable Child Page Column Layout', 'zeko' ),
				'settings'   => 'zeko_child_page_layout',
				'section'    => 'zeko_child_page_options',
				'type'		 => 'checkbox',
				'priority'	 => 2
	) );
	
	
	// Panel 1
	$wp_customize->add_section( 'zeko_panel1', array(
		'title'           => esc_html__( 'Front Page Panel 1', 'zeko' ),
		'active_callback' => 'is_front_page',
		'panel'           => 'zeko_options_panel',
		'description'     => esc_html__( 'Add an image to your panel by setting a featured image in the page editor. If you don&rsquo;t select a page, this panel will not be displayed.', 'zeko' ),
	) );

	$wp_customize->add_setting( 'zeko_panel1', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_sanitize_numeric_value',
	) );

	$wp_customize->add_control( 'zeko_panel1', array(
		'label'   => esc_html__( 'Panel Content', 'zeko' ),
		'section' => 'zeko_panel1',
		'type'    => 'dropdown-pages',
	) );

	$wp_customize->add_setting( 'zeko_panel1_layout', array(
		'default'           => 'right-column',
		'sanitize_callback' => 'zeko_sanitize_layout',
	) );

	$wp_customize->add_control( 'zeko_panel1_layout', array(
		'label'   => esc_html__( 'Panel Layout', 'zeko' ),
		'description'     => esc_html__( 'Position content to the right or left in case the page you choosed have a featured image uploaded.', 'zeko' ),
		'section' => 'zeko_panel1',
		'type'    => 'radio',
		'choices' => array(
			'right-column' => esc_html__( 'Right', 'zeko' ),
			'left-column' => esc_html__( 'Left', 'zeko' ),
			'custom-column' => esc_html__( 'Custom', 'zeko' ),
		),
	) );

	// Panel 2
	$wp_customize->add_section( 'zeko_panel2', array(
		'title'           => esc_html__( 'Front Page Panel 2', 'zeko' ),
		'active_callback' => 'is_front_page',
		'panel'           => 'zeko_options_panel',
		'description'     => esc_html__( 'Add an image to your panel by setting a featured image in the page editor. If you don&rsquo;t select a page, this panel will not be displayed.', 'zeko' ),
	) );

	$wp_customize->add_setting( 'zeko_panel2', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_sanitize_numeric_value',
	) );

	$wp_customize->add_control( 'zeko_panel2', array(
		'label'   => esc_html__( 'Panel Content', 'zeko' ),
		'section' => 'zeko_panel2',
		'type'    => 'dropdown-pages',
	) );

	$wp_customize->add_setting( 'zeko_panel2_layout', array(
		'default'           => 'right-column',
		'sanitize_callback' => 'zeko_sanitize_layout',
	) );

	$wp_customize->add_control( 'zeko_panel2_layout', array(
		'label'   => esc_html__( 'Panel Layout', 'zeko' ),
		'description'     => esc_html__( 'Position content to the right or left in case the page you choosed have a featured image uploaded.', 'zeko' ),
		'section' => 'zeko_panel2',
		'type'    => 'radio',
		'choices' => array(
			'right-column' => esc_html__( 'Right', 'zeko' ),
			'left-column' => esc_html__( 'Left', 'zeko' ),
			'custom-column' => esc_html__( 'Custom', 'zeko' ),
		),
	) );
	
	// Panel 3
	$wp_customize->add_section( 'zeko_panel3', array(
		'title'           => esc_html__( 'Front Page Panel 3', 'zeko' ),
		'active_callback' => 'is_front_page',
		'panel'           => 'zeko_options_panel',
		'description'     => esc_html__( 'Add an image to your panel by setting a featured image in the page editor. If you don&rsquo;t select a page, this panel will not be displayed.', 'zeko' ),
	) );

	$wp_customize->add_setting( 'zeko_panel3', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_sanitize_numeric_value',
	) );

	$wp_customize->add_control( 'zeko_panel3', array(
		'label'   => esc_html__( 'Panel Content', 'zeko' ),
		'section' => 'zeko_panel3',
		'type'    => 'dropdown-pages',
	) );

	$wp_customize->add_setting( 'zeko_panel3_layout', array(
		'default'           => 'right-column',
		'sanitize_callback' => 'zeko_sanitize_layout',
	) );

	$wp_customize->add_control( 'zeko_panel3_layout', array(
		'label'   => esc_html__( 'Panel Layout', 'zeko' ),
		'description'     => esc_html__( 'Position content to the right or left in case the page you choosed have a featured image uploaded.', 'zeko' ),
		'section' => 'zeko_panel3',
		'type'    => 'radio',
		'choices' => array(
			'right-column' => esc_html__( 'Right', 'zeko' ),
			'left-column' => esc_html__( 'Left', 'zeko' ),
			'custom-column' => esc_html__( 'Custom', 'zeko' ),
		),
	) );
	
	// Panel 4
	$wp_customize->add_section( 'zeko_panel4', array(
		'title'           => esc_html__( 'Front Page Panel 4', 'zeko' ),
		'active_callback' => 'is_front_page',
		'panel'           => 'zeko_options_panel',
		'description'     => esc_html__( 'Add an image to your panel by setting a featured image in the page editor. If you don&rsquo;t select a page, this panel will not be displayed.', 'zeko' ),
	) );

	$wp_customize->add_setting( 'zeko_panel4', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_sanitize_numeric_value',
	) );

	$wp_customize->add_control( 'zeko_panel4', array(
		'label'   => esc_html__( 'Panel Content', 'zeko' ),
		'section' => 'zeko_panel4',
		'type'    => 'dropdown-pages',
	) );

	$wp_customize->add_setting( 'zeko_panel4_layout', array(
		'default'           => 'right-column',
		'sanitize_callback' => 'zeko_sanitize_layout',
	) );

	$wp_customize->add_control( 'zeko_panel4_layout', array(
		'label'   => esc_html__( 'Panel Layout', 'zeko' ),
		'description'     => esc_html__( 'Position content to the right or left in case the page you choosed have a featured image uploaded.', 'zeko' ),
		'section' => 'zeko_panel4',
		'type'    => 'radio',
		'choices' => array(
			'right-column' => esc_html__( 'Right', 'zeko' ),
			'left-column' => esc_html__( 'Left', 'zeko' ),
			'custom-column' => esc_html__( 'Custom', 'zeko' ),
		),
	) );
	

	// Footer Image
	$wp_customize->add_section( 'zeko_footer_settings', array(
		'title'	  => esc_html__( 'Front Page Footer Image', 'zeko' ),
		'panel'	  => 'zeko_options_panel',
		'default' => '',
		'active_callback' => 'is_front_page',
	) );

	$wp_customize->add_setting('zeko_footer_image', array(
		'transport'			=> 'refresh',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		'zeko_footer_image', array(
		'label'		=> esc_html__( 'Footer Image', 'zeko' ),
		'section'	=> 'zeko_footer_settings',
		'priority'          => 1,
		'description' => esc_html__( 'Add an image to be displayed at the bottom of the Front Page template, above the footer.', 'zeko' ),
	) ) );
	
	/* Footer Image Info */
	$wp_customize->add_setting( 'zeko_footer_info', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'zeko_footer_info', array(
		'label'             => esc_html__( 'Caption Text', 'zeko' ),
		'description'       => esc_html__( 'Enter the text for the caption box', 'zeko' ),
		'section'           => 'zeko_footer_settings',
		'priority'          => 2,
		'type'              => 'textarea',
	) );
	
	$wp_customize->selective_refresh->add_partial( 'zeko_footer_info', array(
		'selector'            => '.footer-image-info',
		'render_callback'     => 'zeko_panel',
		'container_inclusive' => true,
	) );
	
	
	//Grid Template Options
	$wp_customize->add_section( 'zeko_grid_layout_options', array(
		'title'           => esc_html__( 'Grid Template Options', 'zeko' ),
		'panel'	  => 'zeko_options_panel',
	) );
	/* Child Pages Image Link */
	$wp_customize->add_setting( 'zeko_image_link', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'zeko_image_link', array(
		'label'             => esc_html__( 'Enable Child Page Featured Image Link', 'zeko' ),
		'section'           => 'zeko_grid_layout_options',
		'priority'          => 1,
		'type'              => 'checkbox',
	) );
		
	/* Child Pages Title Link */
	$wp_customize->add_setting( 'zeko_child_title_link', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'zeko_child_title_link', array(
		'label'             => esc_html__( 'Enable Child Page Title Link', 'zeko' ),
		'section'           => 'zeko_grid_layout_options',
		'priority'          => 2,
		'type'              => 'checkbox',
	) );
	
	//Blog Options
	$wp_customize->add_section( 'zeko_blog_layout_options', array(
		'title'           => esc_html__( 'Blog Options', 'zeko' ),
		'panel'	  => 'zeko_options_panel',
	) );
	$wp_customize->add_setting( 'zeko_blog_sidebar_layout', array(
		'default'           => 'sidebar-right',
		'sanitize_callback' => 'zeko_sanitize_choices',
	) );
	$wp_customize->add_control( 'zeko_blog_sidebar_layout', array(
		'label'      => esc_html__( 'Blog Layout', 'zeko' ),
		'description'       => esc_html__( 'Choose the best blog layout for your site.', 'zeko' ),
		'section'           => 'zeko_blog_layout_options',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'sidebar-right'   => esc_html__( 'Right Sidebar - blog/archive/single', 'zeko' ),
			'sidebar-left'  => esc_html__( 'Left Sidebar - blog/archive/single', 'zeko' ),
			'no-sidebar'  => esc_html__( 'No Sidebar - blog/archive/single' , 'zeko' ),
			'grid-two'  => esc_html__( 'Grid Two & Sidebar - blog/archive', 'zeko' ),
			'grid-three'  => esc_html__( 'Grid Three & No Sidebar - blog/archive', 'zeko' ),
		)
	) );
	
	/* Post Display */
	$wp_customize->add_setting( 'zeko_post_type', array(
		'default'           => 'full-lenght',
		'sanitize_callback' => 'zeko_sanitize_choices',
	) );
	$wp_customize->add_control( 'zeko_post_type', array(
		'label'             => esc_html__( 'Blog Page - Post Display', 'zeko' ),
		'section'           => 'zeko_blog_layout_options',
		'settings'          => 'zeko_post_type',
		'priority'          => 2,
		'type'              => 'radio',
		'choices'           => array(
			'full-lenght'   => esc_html__( 'Full Length', 'zeko' ),
			'excerpt-lenght'  => esc_html__( 'Excerpt', 'zeko' ),
		)
	) );
	
	/* Post Settings */
	$wp_customize->add_setting( 'zeko_posted_on', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_sanitize_checkbox',
	) );
	$wp_customize->add_control('zeko_posted_on', array(
				'label'      => esc_html__( 'Hide Post Meta', 'zeko' ),
				'section'    => 'zeko_blog_layout_options',
				'settings'   => 'zeko_posted_on',
				'type'		 => 'checkbox',
				'priority'	 => 3
	) );
	
	$wp_customize->add_setting( 'zeko_author_bio', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_sanitize_checkbox',
	) );
	$wp_customize->add_control('zeko_author_bio', array(
		'label'      => esc_html__( 'Hide Author Bio', 'zeko' ),
		'section'           => 'zeko_blog_layout_options',
		'settings'   => 'zeko_author_bio',
		'type'		 => 'checkbox',
		'priority'	 => 4
	) );
	
	
	/**
	* Adds the individual sections for copyright
	*/
	$wp_customize->add_section( 'zeko_copyright_section' , array(
		'title'    => esc_html__( 'Copyright Settings', 'zeko' ),
		'panel'	  => 'zeko_options_panel',
	) );
	
	// Scroll to top icon
	$wp_customize->add_setting( 'scrolltotop', array(
		'default'	=> true,
		'sanitize_callback' => 'zeko_sanitize_checkbox'
	) );
	
	$wp_customize->add_control( 'scrolltotop', array(
		'label'			=> esc_html__('Enable "scroll to top" button ', 'zeko'),
		'section'		=> 'zeko_copyright_section',
		'type'			=> 'checkbox',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'zeko_copyright', array(
		'default'           => esc_html__( 'Proudly powered by WordPress. Zeko Theme by Anariel Design. All rights reserved', 'zeko' ),
		'sanitize_callback' => 'zeko_sanitize_text',
	) );
	$wp_customize->add_control( 'zeko_copyright', array(
		'label'             => esc_html__( 'Copyright text', 'zeko' ),
		'section'           => 'zeko_copyright_section',
		'settings'          => 'zeko_copyright',
		'type'		        => 'text',
		'priority'          => 2,
	) );
	
	$wp_customize->add_setting( 'zeko_copyright_link', array(
		'default'           => 'default-link',
		'sanitize_callback' => 'zeko_sanitize_choices',
	) );
	$wp_customize->add_control( 'zeko_copyright_link', array(
		'label'             => esc_html__( 'Copyright Link', 'zeko' ),
		'section'           => 'zeko_copyright_section',
		'settings'          => 'zeko_copyright_link',
		'priority'          => 3,
		'type'              => 'radio',
		'choices'           => array(
			'default-link'   => esc_html__( 'Default (Homepage)', 'zeko' ),
			'custom-link'  => esc_html__( 'Custom URL', 'zeko' ),
		)
	) );
	
	/* Copyright Custom Link */
	$wp_customize->add_setting( 'zeko_copyright_custom_link', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'zeko_copyright_custom_link', array(
		'section'           => 'zeko_copyright_section',
		'priority'          => 4,
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'hide_copyright', array(
		'sanitize_callback' => 'zeko_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'hide_copyright', array(
		'label'             => esc_html__( 'Hide copyright text', 'zeko' ),
		'section'           => 'zeko_copyright_section',
		'settings'          => 'hide_copyright',
		'type'		        => 'checkbox',
		'priority'          => 5,
	) );
	
	/**
	* Shop Sidebar
	*/
	$wp_customize->add_section( 'zeko_shop_section' , array(
		'title'       => esc_html__( 'WooCommerce Options', 'zeko' ),
		'panel'	  => 'zeko_options_panel',
		'active_callback' => 'is_meta_active',
	) );
	$wp_customize->add_setting( 'zeko_shop_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'zeko_shop_sidebar', array(
		'label'             => esc_html__( 'Check this box if you want to hide sidebar on the WooCommerce pages', 'zeko' ),
		'section'           => 'zeko_shop_section',
		'settings'          => 'zeko_shop_sidebar',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );
	$wp_customize->add_setting( 'zeko_shop_single_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'zeko_shop_single_sidebar', array(
		'label'             => esc_html__( 'Check this box if you want to hide sidebar on WooCommerce single product page', 'zeko' ),
		'section'           => 'zeko_shop_section',
		'settings'          => 'zeko_shop_single_sidebar',
		'type'		        => 'checkbox',
		'priority'          => 2,
	) );
	
	/* Give Forms Number */
	$wp_customize->add_section( 'zeko_forms_section' , array(
		'title'       => esc_html__( 'Give Options', 'zeko' ),
		'panel'	  => 'zeko_options_panel',
		'active_callback' => 'is_meta_one_active',
	) );
	$wp_customize->add_setting( 'zeko_forms_number', array(
		'default'           => '4',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'zeko_forms_number', array(
		'label'             => esc_html__( 'Number of forms on Give donations page', 'zeko' ),
		'description'       => esc_html__( 'Enter number of forms you want to show.', 'zeko' ),
		'section'           => 'zeko_forms_section',
		'settings'          => 'zeko_forms_number',
		'priority'          => 1,
		'type'              => 'text',
	) );
	
	/* Image Options */
	$wp_customize->add_section( 'zeko_image_section' , array(
		'title'       => esc_html__( 'Image Options', 'zeko' ),
		'panel'	  => 'zeko_options_panel',
	) );
	$wp_customize->add_setting( 'zeko_image_color', array(
		'default'           => 'false',
		'sanitize_callback' => 'zeko_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'zeko_image_color', array(
		'label'             => esc_html__( 'Check this box if you want to convert images to black and white', 'zeko' ),
		'section'           => 'zeko_image_section',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );
	
	/**
	* Color Settings
	*/
	$wp_customize->add_section( 'zeko_color_settings', array(
		'title'           => esc_html__( 'Colors', 'zeko' ),
	) );
	
	/* Background */
	$wp_customize->add_setting( 'zeko_bg_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'zeko_bg_color', array(
		'label'             => esc_html__( 'Background Color', 'zeko' ),
		'description'       => esc_html__( 'Change the page background color', 'zeko' ),
		'settings'          => 'zeko_bg_color',
		'section'           => 'zeko_color_settings',
		'priority'          => 1,
	) ) );
	
	/* Accent Colors */
	$wp_customize->add_setting( 'zeko_colors_accent', array(
		'default'           => '#9e0022',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'zeko_colors_accent', array(
		'label'             => esc_html__( 'Accent Color', 'zeko' ),
		'description'       => esc_html__( 'Change the main accent color', 'zeko' ),
		'settings'          => 'zeko_colors_accent',
		'section'           => 'zeko_color_settings',
		'priority'          => 2,
	) ) );
	
	/* White Color */
	$wp_customize->add_setting( 'zeko_white_bg_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'zeko_white_bg_color', array(
		'label'             => esc_html__( 'White Background Color', 'zeko' ),
		'description'       => esc_html__( 'Change elements with white background and border color', 'zeko' ),
		'settings'          => 'zeko_white_bg_color',
		'section'           => 'zeko_color_settings',
		'priority'          => 3,
	) ) );
	
	/* White Text Color */
	$wp_customize->add_setting( 'zeko_white_text_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'zeko_white_text_color', array(
		'label'             => esc_html__( 'White Text Color', 'zeko' ),
		'description'       => esc_html__( 'Change white text color', 'zeko' ),
		'settings'          => 'zeko_white_text_color',
		'section'           => 'zeko_color_settings',
		'priority'          => 4,
	) ) );
	
	/* Black Color */
	$wp_customize->add_setting( 'zeko_black_bg_color', array(
		'default'           => '#1b1f22',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'zeko_black_bg_color', array(
		'label'             => esc_html__( 'Black Background and Border Color', 'zeko' ),
		'description'       => esc_html__( 'Change elements with black background and border color', 'zeko' ),
		'settings'          => 'zeko_black_bg_color',
		'section'           => 'zeko_color_settings',
		'priority'          => 5,
	) ) );
	
	/* Black Text Color */
	$wp_customize->add_setting( 'zeko_black_text_color', array(
		'default'           => '#1b1f22',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'zeko_black_text_color', array(
		'label'             => esc_html__( 'Black Text Color', 'zeko' ),
		'description'       => esc_html__( 'Change black text color', 'zeko' ),
		'settings'          => 'zeko_black_text_color',
		'section'           => 'zeko_color_settings',
		'priority'          => 6,
	) ) );
	
	/* Gray Color */
	$wp_customize->add_setting( 'zeko_gray_bg_color', array(
		'default'           => '#fbfbfb',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'zeko_gray_bg_color', array(
		'label'             => esc_html__( 'Light Gray Background Color', 'zeko' ),
		'description'       => esc_html__( 'Change elements with light gray background color', 'zeko' ),
		'settings'          => 'zeko_gray_bg_color',
		'section'           => 'zeko_color_settings',
		'priority'          => 7,
	) ) );
	
	/* Gray Border Color */
	$wp_customize->add_setting( 'zeko_gray_border_color', array(
		'default'           => '#efefef',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'zeko_gray_border_color', array(
		'label'             => esc_html__( 'Light Gray Border Color', 'zeko' ),
		'description'       => esc_html__( 'Change elements with light gray border color', 'zeko' ),
		'settings'          => 'zeko_gray_border_color',
		'section'           => 'zeko_color_settings',
		'priority'          => 8,
	) ) );
	
	/***** Register Custom Controls *****/

	class Liber_Upgrade extends WP_Customize_Control {
		public function render_content() {  ?>
			<p class="zeko-upgrade-thumb">
				<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
			</p>
			<p class="textfield zeko-upgrade-text">
				<a href="<?php echo esc_url('http://www.anarieldesign.com/documentation/zeko/'); ?>" target="_blank" class="button button-secondary">
					<?php esc_html_e('Visit Documentation', 'zeko'); ?>
				</a>
			</p>
			<p class="textfield zeko-upgrade-title">
				<a href="<?php echo esc_url('http://www.anarieldesign.com/support/'); ?>" class="button button-secondary" target="_blank">
					<?php esc_html_e('Support Page', 'zeko'); ?>
				</a>
			</p>
			<p class="zeko-upgrade-button">
				<a href="http://www.anarieldesign.com/themes/" target="_blank" class="button button-secondary">
					<?php esc_html_e('More Themes by Anariel Design', 'zeko'); ?>
				</a>
			</p><?php
		}
	}

	/***** Add Sections *****/

	$wp_customize->add_section('zeko_upgrade', array(
		'title' => esc_html__('Theme Info', 'zeko'),
		'priority' => 600
	) );

	/***** Add Settings *****/

	$wp_customize->add_setting('zeko_options[premium_version_upgrade]', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'esc_attr'
	) );

	/***** Add Controls *****/

	$wp_customize->add_control(new Liber_Upgrade($wp_customize, 'premium_version_upgrade', array(
		'section' => 'zeko_upgrade',
		'settings' => 'zeko_options[premium_version_upgrade]',
		'priority' => 1
	) ) );
	
}
add_action( 'customize_register', 'zeko_customize_register' );


/**
 * Sanitize a numeric value
 */
function zeko_sanitize_numeric_value( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	} else {
		return 0;
	}
}

//Checkboxes
function zeko_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

//Text
function zeko_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

//Radio Buttons and Select Lists
function zeko_sanitize_choices( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );

	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}

/**
 * Sanitize a radio button
 */
function zeko_sanitize_layout( $input ) {
	$valid = array(
		'right-column' => esc_html__( 'Right', 'zeko' ),
		'left-column' => esc_html__( 'Left', 'zeko' ),
		'custom-column' => esc_html__( 'Custom', 'zeko' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/*
 * Output our custom CSS to change background colour/opacity of panels.
 * Note: not very pretty, but it works.
 */
function zeko_customizer_css( $control ) {
	if ( get_theme_mod( 'zeko_overlay' ) ) :
		?>
			<style type="text/css">
			.overlay-bg {
				opacity: <?php echo esc_attr( get_theme_mod( 'zeko_overlay' ) ); ?>;
			}
			</style>
		<?php
	endif;
}
add_action( 'wp_head', 'zeko_customizer_css' );

/* Sanitize overlay setting */
function zeko_sanitize_overlay( $input ) {

	$choices = array(
					'0.0',
					'0.1',
					'0.2',
					'0.3',
					'0.4',
					'0.5',
					'0.6',
					'0.7',
					'0.8',
					'0.9',
					'1.0',
				);

	if ( ! in_array( $input, $choices ) ) {
		$input = '0.0';
	}

	return $input;
}

//WooCommerce section
function is_meta_active(){
	if( !class_exists( 'WooCommerce' ) ){
		// If it doesn't exist it won't show the section/panel/control
	return false;
	} else {
		return true;
	}
}

//Give section
function is_meta_one_active(){
	if( !class_exists( 'Give' ) ){
		// If it doesn't exist it won't show the section/panel/control
	return false;
	} else {
		return true;
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zeko_customize_preview_js() {
	wp_enqueue_script( 'zeko_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'zeko_customize_preview_js' );

/**
 * Some extra JavaScript to improve the user experience in the Customizer for this theme.
 */
function zeko_panels_js() {
	wp_enqueue_script( 'zeko_extra_js', get_template_directory_uri() . '/assets/js/panel-customizer.js', array(), '20151116', true );
}
add_action( 'customize_controls_enqueue_scripts', 'zeko_panels_js' );

/***** Enqueue Customizer JS *****/
function zeko_customizer_js() {
	wp_localize_script('zeko-customizer', 'zeko_links', array(
		'title'	=> esc_html__('Theme Related Links:', 'zeko'),
		'themeURL' => esc_url('http://www.anarieldesign.com/themes/animals-charity-wordpress-theme/'),
		'themeLabel' => esc_html__('Theme Info Page', 'zeko'),
		'docsURL' => esc_url('http://www.anarieldesign.com/documentation/zeko/'),
		'docsLabel'	=> esc_html__('Theme Documentation', 'zeko'),
	));
}
add_action('customize_controls_enqueue_scripts', 'zeko_customizer_js');
