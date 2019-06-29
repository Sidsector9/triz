jQuery(document).ready(function($) {
	$(window).scroll(function(e){
		if ($(window).width() > 800) {
			$('.header').css({
				'bottom' : -($(this).scrollTop()/3)+"px",
			}); 
			var thisdist = $(this).scrollTop();
			var headerheight = $(".header").outerHeight();
		} else {
			$('.header').css({'bottom' : 'auto'}); 	
		}
	});
	});
//##########################################
	// Menu
	//##########################################
$(document).ready(function() {
	var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
	});
<!-- Responsive Menu -->
$(document).ready(function() {	
jQuery("#responsive-menu select").change(function() {
window.location = jQuery(this).find("option:selected").val();
});
});