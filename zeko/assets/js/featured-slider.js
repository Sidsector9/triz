( function( $ ) {
	"use strict";
	// Featured Posts Slider
	$(document).ready(function(){
		$('.featured-slider').slick({
			dots: true,
			slidesToShow: 1,
			autoplay: true,
			autoplaySpeed: 3000,
			cssEase: 'ease',
			draggable: true,
			pauseOnHover: true,
			infinite: true,
			adaptiveHeight: true,
		});
	});
	
} )( jQuery );
