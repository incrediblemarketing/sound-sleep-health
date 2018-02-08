'use strict';

(function($) {

function stickyHeader(){
  var stickyTop = $('#header').height() + 200;

  $(window).scroll(function(){
    if($(window).scrollTop() >= stickyTop){
      $('#stickyHeader').addClass('slideDown');
    }else{
      $('#stickyHeader').removeClass('slideDown');
    }
  });
}

function dataAttributes(){
  $('[data-bg]').each(function(){
    var bg = $(this).data('bg');
    $(this).css('background','#fff url("'+bg+'") top center/cover no-repeat');
  });
  
  $('[data-bgc]').each(function(){
    var bgcolor = $(this).data('bgc');
    $(this).css('background-color',bgcolor);
  });
  
  $('[data-color]').each(function(){
    var color = $(this).data('color');
    $(this).css('color',color);
  });
  
  $('[data-size]').each(function(){
    var size = $(this).data('size');
    $(this).css('font-size', size);
  });
}

function gMaps(){              
  if($('#map').length > 0){
    var longitude = 0;
    var latitude = 0;
    var overlay = 0;
    
    $('[data-long]').each(function(){
      longitude = $(this).data('long');
    });
    $('[data-lat]').each(function(){
      latitude = $(this).data('lat');
    });
    $('[data-co]').each(function(){
       overlay = $(this).data('co');
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
  if($('.sh-row').length > 0) {
    var $w = $(window).width();
    if($w > 768){
    $('.sh-row').each(function(){  
      var highestBox = 0;
      $('.sh-col', this).each(function(){
        if($(this).height() > highestBox) {
          highestBox = $(this).height(); 
        }
      });  
      $('.sh-col',this).height(highestBox);
    }); 
    }
  }
}

function procedureToggle(){
  $('.procedure-header').click(function(){
    if(!$(this).hasClass('active')){
      $('.procedure-info.active').toggle('slow');
      $('.procedure-info.active').toggleClass('active');
      $('.procedure-header.active').toggleClass('active');
    }
    $(this).next('.procedure-info').toggle('slow');
    $(this).next('.procedure-info').toggleClass('active');
    $(this).toggleClass('active');
  });
}

function homeProcedures(){
  $('#procedures .owl-carousel').owlCarousel({
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
  $('.mini-gallery').owlCarousel({
    loop:false,
    margin:0,
    nav:true,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    items: 1
  });
}

function recentPosts(){
  $('.postsslider').owlCarousel({
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
  $('.testimonials-rotator').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    items:1
  });
}

function proceduresRotator(){
  var procedures = $('.procedures-rotator');
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
  
  $('.procedures').hover(function(){
    $(this).find('.info, .cover').fadeToggle(300);
  });
}

function scrolltoID(){
  $('.scroll').click(function() {
    $('body').animate({scrollTop: $('#' + $(this).attr('target')).offset().top - 70}, 1000);
  });
}

$(document).ready(function(){
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

$(window).load(function(){
  equalHeights();
});

$(window).resize(function(){
  equalHeights();
});

})(jQuery);
