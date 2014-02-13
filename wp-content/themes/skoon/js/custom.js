jQuery(document).ready(function($){
	
	"use strict";
	
	// Superfish Menu
	$('ul.sf-menu').superfish({
		delay:       300,                            // one second delay on mouseout 
		animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
		speed:       200,                          // faster animation speed
		autoArrows:  false
	});
	
	// Sticky Menu
	$("#main-nav").sticky({topSpacing:0});
	
	// Prepend Menu Icon
	$('#main-nav .wrapper').prepend('<div id="menu-icon"></div>');
	
	// Toggle Nav
	$('#menu-icon').on('click', function(){
		$('.sf-menu').slideToggle(250);
		$(this).toggleClass('active');
	});
	
	$(window).resize(function(){  
		var w = $(window).width();
		var navDisplay = $('.sf-menu');
		if(w > 1000 && navDisplay.is(':hidden')) {  
			navDisplay.removeAttr('style');
		}
	});
	
	// Carousel
	$('#carousel').jCarouselLite({
		speed: 600,
		easing: 'easeInOutQuart',
		btnNext: '.car-next',
		btnPrev: '.car-prev',
		visible: 5,
		circular: true,
		scroll: 5
	});
	
	// Fade In .back-to-top
	$('.back-to-top').hide();
	
	$(window).scroll(function () {
		if ($(this).scrollTop() > 1200) {
			$('.back-to-top').fadeIn();
		} else {
			$('.back-to-top').fadeOut();
		}
	});
	
	// Scroll body to 0px on click
	$('.back-to-top').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	
	// Search Form
	var $formValue = $('#s').val();
	
	$('#s').blur(
		function(){
			if(this.value.length === 0) {
				this.value = $formValue;
			}
		}
	);
	
	$('#s').focus(
		function(){
			if(this.value === $formValue) {
				this.value = '';
			}
		}
	);

	// Attaching Post Icons
	$('#carousel .format-standard .post-thumb a, #posts .format-standard .post-thumb a')
	.prepend('<span class="post-icon"></span>');
	
	$('#carousel .format-video .post-thumb a, #posts .format-video .post-thumb a')
	.prepend('<span class="post-icon"></span>');
	
	$('#carousel .format-audio .post-thumb a, #posts .format-audio .post-thumb a')
	.prepend('<span class="post-icon"></span>');

	$('#carousel .format-gallery .post-thumb a, #posts .format-gallery .post-thumb a')
	.prepend('<span class="post-icon"></span>');

	// CSS hacks
	$('#posts .post:nth-child(odd)').css('margin-right', '0');

	// Socialite
	$(window).bind("load", function() {
		Socialite.load($(this));
	});
	
});