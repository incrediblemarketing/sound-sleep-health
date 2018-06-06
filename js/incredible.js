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
  miniGallery();
  recentPosts();
  testimonialsRotator();
  scrolltoID();
});

$(window).load(function(){

});

$(window).resize(function(){

});

})(jQuery);
