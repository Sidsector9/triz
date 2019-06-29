( function( $ ) {
	
	'use strict';

	$(window).scroll(function(){
		var sticky = $('.fixed-header .header-top'),
		scroll = $(window).scrollTop();
		if (scroll >= 300) sticky.addClass('fixed');
		else sticky.removeClass('fixed');
	});
	
	$(window).scroll(function(){
		var sticky = $('.fixed-mobile-menu .main-navigation'),
		scroll = $(window).scrollTop();
		if (scroll >= 300) sticky.addClass('fixed');
		else sticky.removeClass('fixed');
	});
	
	var offset = 100;
	var speed = 500;
	var duration = 900;
	$(window).scroll(function(){
		if ($(this).scrollTop() < offset) {
			$('.scroll-to-top') .fadeOut(duration);
		} else {
			$('.scroll-to-top') .fadeIn(duration);
		}
		});
	$('.scroll-to-top').on('click', function(){
		$('html, body').animate({scrollTop:0}, speed);
		return false;
	});
	
} )( jQuery );
