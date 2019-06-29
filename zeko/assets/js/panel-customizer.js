/**
 * Theme Customizer enhancements, specific to panels, for a better user experience.
 *
 * This allows us to detect when the user has opened specific sections within the Customizer,
 * and adjust our preview pane accordingly.
 */

( function( $ ) {

	"use strict";

	wp.customize.bind( 'ready', function() {

		// Detect when the section for each panel is expanded (or closed) so we can adjust preview accordingly
		wp.customize.section( 'zeko_panel1' ).expanded.bind( function( isExpanding ) {
			// isExpanding will = true if you're entering the section, false if you're leaving it
			wp.customize.previewer.send( 'section-highlight', { section: 'zeko-panel1', expanded: isExpanding } );
		} );

		// Detect when the section for each panel is expanded (or closed) so we can adjust preview accordingly
		wp.customize.section( 'zeko_panel2' ).expanded.bind( function( isExpanding ) {
			// isExpanding will = true if you're entering the section, false if you're leaving it
			wp.customize.previewer.send( 'section-highlight', { section: 'zeko-panel2', expanded: isExpanding } );
		} );

		// Detect when the section for each panel is expanded (or closed) so we can adjust preview accordingly
		wp.customize.section( 'zeko_panel3' ).expanded.bind( function( isExpanding ) {
			// isExpanding will = true if you're entering the section, false if you're leaving it
			wp.customize.previewer.send( 'section-highlight', { section: 'zeko-panel3', expanded: isExpanding } );
		} );

		// Detect when the section for each panel is expanded (or closed) so we can adjust preview accordingly
		wp.customize.section( 'zeko_panel4' ).expanded.bind( function( isExpanding ) {
			// isExpanding will = true if you're entering the section, false if you're leaving it
			wp.customize.previewer.send( 'section-highlight', { section: 'zeko-panel4', expanded: isExpanding } );
		} );

		// Detect when the section for each panel is expanded (or closed) so we can adjust preview accordingly
		wp.customize.section( 'zeko_footer_settings' ).expanded.bind( function( isExpanding ) {
			// isExpanding will = true if you're entering the section, false if you're leaving it
			wp.customize.previewer.send( 'section-highlight', { section: 'zeko-footer-settings', expanded: isExpanding } );
		} );

	} );
} )( jQuery );
