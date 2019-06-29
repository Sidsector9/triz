<?php
//////////////////////////////////////////////////////////////////
// Customizer - Add CSS
//////////////////////////////////////////////////////////////////
function zeko_customizer_custom_css() {
	?>
	<style type="text/css">

		body { background:<?php echo get_theme_mod( 'zeko_bg_color' ); ?>; }
		
		/*--------------------------------------------------------------
		# Accent Color
		--------------------------------------------------------------*/
		.emphasis, .dropcap, .entry-content a, .entry-content a:visited, .entry-meta a, .site-footer a, .site-info a, #secondary a, .site-description, .site-description a, .front-child-page .more-link, ul.list li:before, ul.slick-dots .slick-active button, .panel-content .recent-posts h3.entry-title a:after,
		.project-archive-content-wrapper h3.entry-title a:after, .project-terms a:hover, .scroll-to-top:before, .woocommerce .woocommerce-message:before, .woocommerce .woocommerce-info:before, .woocommerce .star-rating span:before,
		.woocommerce ul.products li.product .woocommerce-loop-category__title:hover, .woocommerce ul.products li.product .woocommerce-loop-product__title:hover, .woocommerce ul.products li.product h3:hover, .nav-links a, a.author-link, #comments a,
		.woocommerce .site-main .woocommerce-review-link, #tribe-events-content .tribe-events-tooltip h4, #tribe_events_filters_wrapper .tribe_events_slider_val, .single-tribe_events a.tribe-events-gcal, .single-tribe_events a.tribe-events-ical,
		body .tribe-events-month-event-title a:hover, #tribe-events-content a:hover, .tribe-events-adv-list-widget .tribe-events-widget-link a:hover, .tribe-events-back a, .tribe-events-back a:hover, .tribe-events-event-meta a:hover, .tribe-events-list-widget .tribe-events-widget-link a:hover,
		.ps-member-is-online, .ps-focus-title>span>span, .woocommerce ul.products li.product a.added_to_cart, .entry-summary a.woocommerce-review-link, h3.pet-title:hover,
		.wp-block-quote.is-large cite, .wp-block-quote.is-large footer, .wp-block-quote.is-style-large cite, .wp-block-quote.is-style-large footer, .wp-block-quote cite, .wp-block-quote footer,
		.wp-block-pullquote cite, .wp-block-pullquote footer, body .bc-cart-item-total-price.bc-cart-item--on-sale, body .bc-product__price--sale, body .bc-single-product__rating-reviews a, body .bc-cart-item__remove-button,
		body .bc-link, .bc-product-quick-view__content-inner a.bc-link.bc-single-product__reviews-anchor, .bc-product-quick-view__content-inner .bc-product__price--sale,
		body .bc-load-items__trigger-btn, body .bc-no-results__button { color:<?php echo get_theme_mod( 'zeko_colors_accent' ); ?>; }
		
		button, input[type="button"], input[type="reset"], input[type="submit"], .main-navigation li.color a, .entry-content a.button, .button, .featured-post, .project-terms a.current-type, .bypostauthor::before,
		.site-footer .social-links a:hover::before, .site-footer .social-links a:focus::before, .give-btn, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
		.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #tribe-events .tribe-events-button, #tribe-events .tribe-events-button:hover, #tribe_events_filters_wrapper input[type=submit], 
		.tribe-events-button, .tribe-events-button.tribe-active:hover, .tribe-events-button.tribe-inactive, .tribe-events-button:hover, .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-], .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]>a,
		#tribe-bar-form .tribe-bar-submit input[type=submit], #tribe-events td.tribe-events-present div[id*="tribe-events-daynum-"], #tribe-events td.tribe-events-present div[id*="tribe-events-daynum-"] > a,
		#tribe-events-content .tribe-events-calendar td.tribe-events-present.mobile-active:hover, .tribe-events-calendar td.tribe-events-present.mobile-active, .tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-],
		.tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-] a, .front-page-content-area .button, .front-page-content-area .entry-content a.button, .pets-search-form .button, div.wpforms-container-full .wpforms-form input[type=submit],
		div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button, body span.bc-product-flag--sale { background:<?php echo get_theme_mod( 'zeko_colors_accent' ); ?>; }
		
		.front-child-page h2.entry-title:before, .panel-content h2.entry-title:before, .wrap.footer-image-info h3:before, .page-template-full-width-page h1.entry-title:before, .page-template-causes-page .entry-header h1:before,
		.page-template-testimonial-page .entry-header h1:before, .single h1.entry-title:before, .blog h2.entry-title:before, .archive h2.entry-title:before, .search h3.entry-title:before, .page-template-grid-page .entry-header h1:before,
		.woocommerce span.onsale, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .page-template-grid-page .entry-header h1:before, .page-template-left-sidebar-page .entry-header h1:before,
		.page-template-right-sidebar-page .entry-header h1:before, body .bc-btn, body button.bc-btn, body a.bc-btn, body .entry-content .bc-btn, body .entry-content button.bc-btn, body .entry-content a.bc-btn, 
		body .bigcommerce-cart__item-count, body .bc-account-login__form input[type="submit"], body .bc-product-flag--sale, body .bc-alert--success, body .bc-account-login__form input[type=submit][disabled], 
		body .bc-btn[disabled], .entry-content .bc-btn[disabled], body .entry-content a.bc-btn[disabled], body .entry-content button.bc-btn[disabled], body a.bc-btn[disabled], button.bc-btn[disabled], 
		.bc-product-quick-view__content-inner button.bc-btn, .bc-product-quick-view__content-inner .bc-product-flag--sale { background-color:<?php echo get_theme_mod( 'zeko_colors_accent' ); ?>; }
		
		.dropcap { border-right-color:<?php echo get_theme_mod( 'zeko_colors_accent' ); ?>; }
		
		blockquote, .wp-block-quote:not(.is-large):not(.is-style-large), .wp-block-quote.is-large, .wp-block-quote.is-style-large, .wp-block-pullquote { border-left-color:<?php echo get_theme_mod( 'zeko_colors_accent' ); ?>; }
		
		.woocommerce .woocommerce-message, .woocommerce .woocommerce-info { border-top-color:<?php echo get_theme_mod( 'zeko_colors_accent' ); ?>; }
		
		.entry-content a.button, .button, .causes-projects .post-thumbnail, .page-template-grid-page .post-thumbnail, .give_forms .post-thumbnail, body .zeko-panel .panel-content .give-form-title, .panel-content .recent-posts .post-thumbnail img,
		.front-page-content-area .button, .main-navigation ul ul a:hover, .main-navigation ul ul a:focus, .main-navigation .current-menu-item > a, .main-navigation li.color a, .main-navigation .sub-menu a:hover, .front-page-content-area .button, .front-page-content-area .entry-content a.button, .main-navigation.toggled a:hover,
		.main-navigation.toggled a:focus, .main-navigation ul .current-menu-item ul ul li a, .main-navigation .sub-menu .current-menu-item > a { border-bottom-color:<?php echo get_theme_mod( 'zeko_colors_accent' ); ?>; }
		
		/*--------------------------------------------------------------
		# White Background and Border Color
		--------------------------------------------------------------*/
		.site-header, .header-top, .site-footer .widget-area-block { background-color:<?php echo get_theme_mod( 'zeko_white_bg_color' ); ?>; }
		
		.hero, .featured-image-block .wrap, .zeko-panel:nth-child(2n+1) .panel-content, .zeko-panel:nth-child(2n+1), .featured-slider .slider-navigation, .panel-content .testimonials .entry-content, .comment-content,
		.wrap.footer-image-info, .social-links, h1.give-form-title.entry-title, .woocommerce .woocommerce-ordering select, form[id*=give-form] .give-donation-amount .give-currency-symbol, .fixed-mobile-menu .main-navigation.fixed { background:<?php echo get_theme_mod( 'zeko_white_bg_color' ); ?>; }
		
		.main-navigation.toggled ul ul a, .featured-slider:after, .front-page-content-area .entry-content a, .front-page-content-area .entry-content a:hover, .front-page-content-area .entry-content .edit-link a:hover { border-bottom-color:<?php echo get_theme_mod( 'zeko_white_bg_color' ); ?>; }

		/*--------------------------------------------------------------
		# White Text Color
		--------------------------------------------------------------*/
		button, input[type="button"], input[type="reset"], input[type="submit"], .main-navigation li.color a, .hero-container-inner, .front-page-content-area .entry-title, .front-page-content-area .button,
		.entry-content a.button, .button, body .button:hover, .button:hover, .hero .edit-link a, .featured-post, .project-terms a.current-type, .bypostauthor::before, .site-footer .social-links a::before, .give-btn,
		.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, 
		.woocommerce input.button.alt, woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, 
		.woocommerce input.button.alt:hover, .woocommerce span.onsale, .entry-content a.button, .entry-content a.button:visited, .front-page-content-area .button:visited, .front-page-content-area .button:hover, .entry-content a.button:hover,
		.woocommerce #respond input#submit.disabled, .woocommerce #respond input#submit:disabled, .woocommerce #respond input#submit:disabled[disabled], .woocommerce a.button.disabled, .woocommerce a.button:disabled, .woocommerce a.button:disabled[disabled], .woocommerce button.button.disabled, 
		.woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce input.button.disabled, .woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled],
		.entry-content a.button:visited, .front-page-content-area .button:visited, .front-page-content-area .entry-content a, .front-page-content-area .entry-content a:hover, .front-page-content-area .entry-content .edit-link a:hover, .front-page-content-area .entry-content .button:hover, .front-page-content-area .entry-content a.button,
		div.wpforms-container-full .wpforms-form input[type=submit], div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button,
		.entry-content a.wp-block-button__link { color:<?php echo get_theme_mod( 'zeko_white_text_color' ); ?>; }
		
		/*--------------------------------------------------------------
		# Black Background and Border Color
		--------------------------------------------------------------*/
		button:hover, button:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="reset"]:hover, input[type="reset"]:focus, input[type="submit"]:hover, input[type="submit"]:focus, .entry-content a.button:focus, 
		.button:focus, .main-navigation li.color a:focus, .main-navigation li.color a:hover, .overlay-bg, body .button:hover, .button:hover, .site-footer .social-links a::before, .give-btn:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, 
		.woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,
		.front-page-content-area .button:hover, .entry-content a.button:hover, .front-page-content-area .entry-content .button:hover, div.wpforms-container-full .wpforms-form input[type=submit]:hover, div.wpforms-container-full .wpforms-form button[type=submit]:hover,
		div.wpforms-container-full .wpforms-form .wpforms-page-button:hover, div.wpforms-container-full .wpforms-form input[type=submit]:focus, div.wpforms-container-full .wpforms-form button[type=submit]:focus, div.wpforms-container-full .wpforms-form .wpforms-page-button:focus { background:<?php echo get_theme_mod( 'zeko_black_bg_color' ); ?>; }
		
		.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content { background-color:<?php echo get_theme_mod( 'zeko_black_bg_color' ); ?>; }
		
		body .button:hover, .button:hover, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-checkout #payment ul.payment_methods, 
		.front-page-content-area .entry-content .button:hover, .front-page-content-area .button:hover, .front-page-content-area .entry-content a.button:hover { border-bottom-color:<?php echo get_theme_mod( 'zeko_black_bg_color' ); ?>; }
		
		.woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce #content div.product .woocommerce-tabs ul.tabs li { border-left-color:<?php echo get_theme_mod( 'zeko_black_bg_color' ); ?>; }
		.woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce #content div.product .woocommerce-tabs ul.tabs li { border-right-color:<?php echo get_theme_mod( 'zeko_black_bg_color' ); ?>; }
		.woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce #content div.product .woocommerce-tabs ul.tabs li { border-top-color:<?php echo get_theme_mod( 'zeko_black_bg_color' ); ?>; }
		
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active:before, .woocommerce div.product .woocommerce-tabs ul.tabs li:before, .woocommerce div.product .woocommerce-tabs ul.tabs li:after, .woocommerce div.product .woocommerce-tabs ul.tabs li.active:after { box-shadow:<?php echo get_theme_mod( 'zeko_black_bg_color' ); ?> 0 0 0; }

		input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="number"]:focus, input[type="tel"]:focus, input[type="range"]:focus,
		input[type="date"]:focus, input[type="month"]:focus, input[type="week"]:focus, input[type="time"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="color"]:focus, textarea:focus, .woocommerce div.product .woocommerce-tabs .panel,
		.woocommerce-checkout #payment, .woocommerce .quantity .qty, .woocommerce .woocommerce-ordering select, .front-page-content-area .button:hover, .entry-content a.button:hover, .menu-toggle:hover, .menu-toggle:focus { border-color:<?php echo get_theme_mod( 'zeko_black_bg_color' ); ?>; }
		
		/*--------------------------------------------------------------
		# Black Text Color
		--------------------------------------------------------------*/
		mark, body, button, input, select, textarea, a:hover, a:focus, a:active, .site-title a, .main-navigation a, .menu-toggle, .featured-slider button.slick-prev:after,  .featured-slider button.slick-next:after,
		.featured-slider button.slick-prev:after, .featured-slider button.slick-next:after, ul.slick-dots button, .zeko-panel .testimonials .entry-header h2, .entry-title a, .project-terms a, .woocommerce ul.products li.product .price, 
		.woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-checkout #payment div.payment_box, .woocommerce .woocommerce-breadcrumb a, .woocommerce .woocommerce-breadcrumb,
		.woocommerce ul.products li.product .woocommerce-loop-category__title, .woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce ul.products li.product h3, .main-navigation a:visited, .main-navigation a,
		.tribe-events-day .tribe-events-day-time-slot h5, body .tribe-events-month-event-title a, #tribe-events-content a, .tribe-events-adv-list-widget .tribe-events-widget-link a, .tribe-events-event-meta a, 
		.tribe-events-list-widget .tribe-events-widget-link a, .ps-alert, h3.pet-title, .wp-block-quote:not(.is-large):not(.is-style-large), .wp-block-quote.is-large, .wp-block-quote.is-style-large,
		.wp-block-pullquote, .bc-load-items__trigger-btn:focus, .bc-load-items__trigger-btn:hover, .bc-no-results__button:focus, .bc-no-results__button:hover { color:<?php echo get_theme_mod( 'zeko_black_text_color' ); ?>; }
		
		.front-page-content-area .button, .front-page-content-area .entry-content a.button { border-bottom-color:<?php echo get_theme_mod( 'zeko_colors_accent' ); ?>; }
		/*--------------------------------------------------------------
		# Light Gray Background Color
		--------------------------------------------------------------*/
		.contact-form, .panel-content, .zeko-panel, .blog .post.sticky, .entry-author, .testimonials .entry-content, .project-terms a, #comments, .widget.jetpack_subscription_widget, .site-footer a.scroll-to-top, .give_forms .give-form-wrap,
		body .zeko-panel .panel-content .give-form-wrap, .main-navigation ul, .page-template .give-form-wrap, body .wpcf7, .widget.widget_mc4wp_form_widget, div#buddypress, .single-tribe_venue .tribe-events-loop, .tribe-events-day .tribe-events-loop,
		.widget_peepsowidgetme, .tribe-events-list .tribe-events-event-cost span, body .pets-search-form, .wpforms-for,
		pre.wp-block-verse, .wp-block-verse pre, .bc-single-product__related { background:<?php echo get_theme_mod( 'zeko_gray_bg_color' ); ?>; }
		
		.site-info, .menu-toggle:focus, .woocommerce-checkout #payment div.payment_box, .ps-alert, .bc-product__gallery { background-color:<?php echo get_theme_mod( 'zeko_gray_bg_color' ); ?>; }
		
		/*--------------------------------------------------------------
		# Light Gray Border Color
		--------------------------------------------------------------*/
		td, th, input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], 
		input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"], textarea, select, .main-navigation li.color a:focus, .menu-toggle, .menu-toggle:focus, .blog .post.sticky,
		.entry-author, .testimonials .entry-content, .panel-content .testimonials .entry-content, #secondary .widget, .widget .tagcloud a, .widget .tagcloud a:visited, .widget.widget_tag_cloud a, .widget.widget_tag_cloud a:visited,
		.wp_widget_tag_cloud a, .wp_widget_tag_cloud a:visited, .widget .tagcloud a:hover, .widget .tagcloud a:focus, .widget.widget_tag_cloud a:hover, .widget.widget_tag_cloud a:focus, .wp_widget_tag_cloud a:hover, 
		.wp_widget_tag_cloud a:focus, .widget.jetpack_subscription_widget, .site-footer a.scroll-to-top, .give_forms .give-form-wrap, h1.give-form-title.entry-title, body .zeko-panel .panel-content .give-form-wrap,
		form[id*=give-form] .give-donation-amount #give-amount, form[id*=give-form] .give-donation-amount #give-amount-text, .widget.widget_mc4wp_form_widget, .give-form-wrap, div#buddypress, body .pets-search-form { border-color:<?php echo get_theme_mod( 'zeko_gray_border_color' ); ?>; }
		
		.header-top, .main-navigation, .blog .entry-meta, .archive .entry-meta, .search .entry-meta, .posts-navigation, .post-navigation .nav-links, .single .entry-footer, .archive h1.page-title, .search h1.page-title,
		#secondary h2.widget-title, #secondary h3.widget-title, .widget ul li, form[id*=give-form] .give-donation-amount .give-currency-symbol, .tribe-events-list .type-tribe_events { border-bottom-color:<?php echo get_theme_mod( 'zeko_gray_border_color' ); ?>; }
		
		.main-navigation, .front-child-page article:nth-child(2n), .blog .entry-meta, .archive .entry-meta, .search .entry-meta, .single .entry-meta, .posts-navigation, body:not(.zeko-front-page).blog .entry-footer, .post-navigation .nav-links,
		.single .entry-footer, .widget ul li, .social-links, .site-footer .widget-area-block, form[id*=give-form] .give-donation-amount .give-currency-symbol, .front-child-page article:nth-child(3n),
		.front-child-page article:nth-child(4n), .front-child-page article:nth-child(5n), .front-child-page article:nth-child(6n), .front-child-page article:nth-child(7n), .front-child-page article:nth-child(8n), .front-child-page article:nth-child(9n),
		.front-child-page article:nth-child(10n) { border-top-color:<?php echo get_theme_mod( 'zeko_gray_border_color' ); ?>; }
		
		form[id*=give-form] .give-donation-amount .give-currency-symbol.give-currency-position-before { border-left-color:<?php echo get_theme_mod( 'zeko_gray_border_color' ); ?>; }
		
		hr, .menu-toggle:hover { background-color:<?php echo get_theme_mod( 'zeko_gray_border_color' ); ?>; }
		
		@media screen and (min-width: 60em) {
		/*--------------------------------------------------------------
		# Accent Color
		--------------------------------------------------------------*/
		.panel-content .recent-posts .inner-content:hover, .causes-projects .project-archive-content-wrapper:hover, .give_forms .project-archive-content-wrapper:hover, .main-navigation a:hover,
		.main-navigation a:focus { border-bottom-color:<?php echo get_theme_mod( 'zeko_colors_accent' ); ?>; }

		.panel-content .recent-posts .entry-summary:nth-of-type(2):after, .panel-content .recent-posts .entry-summary:nth-of-type(3):after { border-color:<?php echo get_theme_mod( 'zeko_colors_accent' ); ?>; }
		
		.panel-content .recent-posts .entry-meta a { color:<?php echo get_theme_mod( 'zeko_colors_accent' ); ?>; }
		
		.featured-slider .caption .category a { background:<?php echo get_theme_mod( 'zeko_colors_accent' ); ?>; }
		
		
		/*--------------------------------------------------------------
		# White Background and Border Color
		--------------------------------------------------------------*/
		.featured-slider .entry-title a:hover, .featured-slider .category a:hover { border-bottom-color:<?php echo get_theme_mod( 'zeko_white_bg_color' ); ?>; }
		.featured-slider:after { border-color:<?php echo get_theme_mod( 'zeko_white_bg_color' ); ?>; }
		.site-header .search-box, .site-header .search-box-wrapper, .panel-content .recent-posts .inner-content, .causes-projects .project-archive-content-wrapper, .give_forms .project-archive-content-wrapper, .featured-slider .caption-innen:after { background:<?php echo get_theme_mod( 'zeko_white_bg_color' ); ?>; }
		
		/*--------------------------------------------------------------
		# White Text Color
		--------------------------------------------------------------*/
		.featured-slider .caption-innen, .featured-slider .entry-title a, .featured-slider .caption .category a { color:<?php echo get_theme_mod( 'zeko_white_text_color' ); ?>; }
		
		/*--------------------------------------------------------------
		# Black Text Color
		--------------------------------------------------------------*/
		.site-header .search-toggle:before, .site-header .search-toggle.active:before { color:<?php echo get_theme_mod( 'zeko_black_text_color' ); ?>; }
		.site-header .search-field:focus { border-color:<?php echo get_theme_mod( 'zeko_black_bg_color' ); ?>; }
		
		/*--------------------------------------------------------------
		# Light Gray Background Color
		--------------------------------------------------------------*/
		.panel-content .recent-posts .inner-content:hover, 	.main-navigation ul ul, .main-navigation ul ul ul ul, .main-navigation ul ul ul ul ul ul, .main-navigation ul ul ul ul ul ul ul ul, .main-navigation ul ul ul ul ul ul ul ul ul ul, 
		.main-navigation ul ul ul a:hover, .main-navigation ul ul ul a:focus, .main-navigation ul ul ul li:hover, .main-navigation ul ul ul li:focus, .main-navigation ul ul ul ul ul a:hover, .main-navigation ul ul ul ul ul a:focus, 
		.main-navigation ul ul ul ul ul li:hover, .main-navigation ul ul ul ul ul li:focus, .main-navigation ul ul ul ul ul ul ul a:hover, .main-navigation ul ul ul ul ul ul ul a:focus, .main-navigation ul ul ul ul ul ul ul li:hover, 
		.main-navigation ul ul ul ul ul ul ul li:focus, .main-navigation ul ul ul ul ul ul ul ul ul a:hover, .main-navigation ul ul ul ul ul ul ul ul ul a:focus, .main-navigation ul ul ul ul ul ul ul ul ul li:hover, .main-navigation ul ul ul ul ul ul ul ul ul li:focus, 
		.main-navigation ul ul ul ul ul ul ul ul ul ul ul a:hover, .main-navigation ul ul ul ul ul ul ul ul ul ul ul a:focus, .main-navigation ul ul ul ul ul ul ul ul ul ul ul li:hover, .main-navigation ul ul ul ul ul ul ul ul ul ul ul li:focus,
		.main-navigation ul ul ul, .main-navigation ul ul ul ul ul, .main-navigation ul ul ul ul ul ul ul, .main-navigation ul ul ul ul ul ul ul ul ul, .main-navigation ul ul ul ul ul ul ul ul ul ul ul,
		.main-navigation ul ul a:hover, .main-navigation ul ul a:focus, .main-navigation ul ul li:hover, .main-navigation ul ul li:focus, .main-navigation ul ul ul a:hover, .main-navigation ul ul ul a:focus, .main-navigation ul ul ul li:hover, 
		.main-navigation ul ul ul li:focus, .main-navigation ul ul ul ul a:hover, .main-navigation ul ul ul ul a:focus, .main-navigation ul ul ul ul li:hover, .main-navigation ul ul ul ul li:focus, .main-navigation ul ul ul ul ul ul a:hover, 
		.main-navigation ul ul ul ul ul ul a:focus, .main-navigation ul ul ul ul ul ul li:hover, .main-navigation ul ul ul ul ul ul li:focus, .main-navigation ul ul ul ul ul ul ul ul a:hover, .main-navigation ul ul ul ul ul ul ul ul a:focus, .main-navigation ul ul ul ul ul ul ul ul li:hover, 
		.main-navigation ul ul ul ul ul ul ul ul li:focus, .main-navigation ul ul ul ul ul ul ul ul ul ul a:hover, .main-navigation ul ul ul ul ul ul ul ul ul ul a:focus, .main-navigation ul ul ul ul ul ul ul ul ul ul li:hover, .main-navigation ul ul ul ul ul ul ul ul ul ul li:focus,
		.causes-projects .project-archive-content-wrapper:hover, .give_forms .project-archive-content-wrapper:hover { background:<?php echo get_theme_mod( 'zeko_gray_bg_color' ); ?>; }
		
		/*--------------------------------------------------------------
		# Light Gray Border Color
		--------------------------------------------------------------*/
		.site-header .search-form { border-color:<?php echo get_theme_mod( 'zeko_gray_border_color' ); ?>; }
		.post-navigation .nav-next { border-left-color:<?php echo get_theme_mod( 'zeko_gray_border_color' ); ?>; }
		.comment-meta { border-bottom-color:<?php echo get_theme_mod( 'zeko_gray_border_color' ); ?>; }
		
		.main-navigation ul { background: transparent; }
		
		}
		
		/*--------------------------------------------------------------
		# PeepSo
		--------------------------------------------------------------*/
		body .ps-btn.ps-btn-join { background:<?php echo get_theme_mod( 'zeko_white_bg_color' ); ?>!important; }
		body .ps-btn.ps-btn-join { color:<?php echo get_theme_mod( 'zeko_black_text_color' ); ?>!important; }
		
		#peepso-wrap .ps-btn-login, .ps-btn-primary, .ps-progress-bar>span, .ps-btn-login, .ps-button-action { background:<?php echo get_theme_mod( 'zeko_colors_accent' ); ?>!important; }
		#peepso-wrap .ps-btn-login:hover, .ps-btn-primary:hover, .ps-btn-login:hover, .ps-button-action:hover { background:<?php echo get_theme_mod( 'zeko_black_bg_color' ); ?>!important; }
		
		body .ps-btn.ps-btn-join:hover { background-color:<?php echo get_theme_mod( 'zeko_gray_bg_color' ); ?>!important; }
		
		.ps-input:focus, .ps-select:focus { border-color:<?php echo get_theme_mod( 'zeko_colors_accent' ); ?>!important; }

		@media screen and ( max-width: 59.999em ) {
		.hero-container-outer { background:<?php echo get_theme_mod( 'zeko_black_bg_caption_color' ); ?>; }
		}
		

		<?php if(get_theme_mod( 'zeko_shop_sidebar' )) : ?>
		.archive.woocommerce #secondary {
			display: none;
		}
		body:not(.zeko-front-page).post-type-archive-product #primary {
			max-width: 100%;
			width: 100%;
		}
		<?php endif; ?>
		
		<?php if(get_theme_mod( 'zeko_shop_single_sidebar' )) : ?>
		.single.woocommerce #secondary {
			display: none;
		}
		.single-product.has-sidebar #container {
			max-width: 100%;
			width: 100%;
		}
		<?php endif; ?>
		
		<?php if(get_theme_mod( 'zeko_image_color' )) : ?>
		#content img {
			filter: grayscale(100%);
			}
		<?php endif; ?>

	</style>
	<?php
}
add_action( 'wp_head', 'zeko_customizer_custom_css' );
?>