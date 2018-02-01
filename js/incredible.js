'use strict';

function stickyHeader(){
	var stickyTop = jQuery('#header').height() + 200;

	jQuery(window).scroll(function(){
		if(jQuery(window).scrollTop() >= stickyTop){
			jQuery('#stickyHeader').addClass('slideDown');
		}else{
			jQuery('#stickyHeader').removeClass('slideDown');
		}
	});
}

function dataAttributes(){
	jQuery('[data-bg]').each(function(){
		var bg = jQuery(this).data('bg');
		jQuery(this).css('background','#fff url("'+bg+'") top center/cover no-repeat');
	});
	
	jQuery('[data-bgc]').each(function(){
		var bgcolor = jQuery(this).data('bgc');
		jQuery(this).css('background-color',bgcolor);
	});
	
	jQuery('[data-color]').each(function(){
		var color = jQuery(this).data('color');
		jQuery(this).css('color',color);
	});
	
	jQuery('[data-size]').each(function(){
		var size = jQuery(this).data('size');
		jQuery(this).css('font-size', size);
	});
}

function gMaps(){						   
	if(jQuery('#map').length > 0){
		var longitude = 0;
		var latitude = 0;
		var overlay = 0;
		
		jQuery('[data-long]').each(function(){
			longitude = jQuery(this).data('long');
		});
		jQuery('[data-lat]').each(function(){
			latitude = jQuery(this).data('lat');
		});
		jQuery('[data-co]').each(function(){
			 overlay = jQuery(this).data('co');
		});
		if(overlay){
			var myArea = new google.maps.LatLng(longitude,latitude);
			var map = new GMaps({
				el: '#map',
				lat: latitude,
				lng: longitude,
				zoom: 15,
				disableDefaultUI: true,
				scrollwheel: false,
				navigationControl: false,
				mapTypeControl: false,
				scaleControl: false,
				draggable: false,
				styles: [{"featureType":"all","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"all","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":19}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":15}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":18},{"weight":1.2}]},{"featureType":"administrative.country","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.neighborhood","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":28},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":15}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]}]
			});	
		}else{
			var myArea = new google.maps.LatLng(longitude,latitude);
			var map = new GMaps({
				el: '#map',
				lat: latitude,
				lng: longitude,
				zoom: 15,
				disableDefaultUI: true,
				scrollwheel: false,
				navigationControl: false,
				mapTypeControl: false,
				scaleControl: false,
				draggable: false
			});
		}
		map.addMarker({
			lat: latitude,
			lng: longitude,
			title: 'Click to Get Directions'
		});
	}
}


function equalHeights(){
	if(jQuery('.sh-row').length > 0) {
		var $w = jQuery(window).width();
		if($w > 768){
		jQuery('.sh-row').each(function(){  
			var highestBox = 0;
			jQuery('.sh-col', this).each(function(){
				if(jQuery(this).height() > highestBox) {
					highestBox = jQuery(this).height(); 
				}
			});  
			jQuery('.sh-col',this).height(highestBox);
		}); 
		}
	}
}

function procedureToggle(){
	jQuery('.procedure-header').click(function(){
		if(!jQuery(this).hasClass('active')){
			jQuery('.procedure-info.active').toggle('slow');
			jQuery('.procedure-info.active').toggleClass('active');
			jQuery('.procedure-header.active').toggleClass('active');
		}
		jQuery(this).next('.procedure-info').toggle('slow');
		jQuery(this).next('.procedure-info').toggleClass('active');
		jQuery(this).toggleClass('active');
	});
}

function homeProcedures(){
	jQuery('#procedures .owl-carousel').owlCarousel({
		loop:false,
		margin:0,
		nav:true,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		responsive:{
			0:{
				items:1
			},
			768:{
				items:2
			},
			992:{
				items:3
			},
			1440:{
				items:4
			}
		}
	});
}

function miniGallery(){
	jQuery('.mini-gallery').owlCarousel({
		loop:false,
		margin:0,
		nav:true,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		items: 1
	});
}

function recentPosts(){
	jQuery('.postsslider').owlCarousel({
		loop:false,
		margin:30,
		nav:true,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		responsive:{
			0:{
				items:1
			},
			768:{
				items:3
			},
			1440:{
				items:4
			}
		}
	});
}

function testimonialsRotator(){
	jQuery('.testimonials-rotator').owlCarousel({
		loop:true,
		margin:30,
		nav:true,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		items:1
	});
}

function proceduresRotator(){
	var procedures = jQuery('.procedures-rotator');
	procedures.owlCarousel({
		loop:true,
		margin:0,
		nav:true,
		smartSpeed:1000,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		responsive:{
			0:{
				items:1
			},
			768:{
				items:3
			},
			1440:{
				items:4
			}
		}
	});
	
	jQuery('.procedures').hover(function(){
		jQuery(this).find('.info, .cover').fadeToggle(300);
	});
}

function scrolltoID(){
	jQuery('.scroll').click(function() {
		jQuery('body').animate({scrollTop: jQuery('#' + jQuery(this).attr('target')).offset().top - 70}, 1000);
	});
}

jQuery(document).ready(function(){
	stickyHeader();
	dataAttributes();
	proceduresRotator();
	homeProcedures();
	gMaps();
	miniGallery();
	recentPosts();
	testimonialsRotator();
	scrolltoID();
});

jQuery(window).load(function(){
	equalHeights();
});

jQuery(window).resize(function(){
	equalHeights();
});