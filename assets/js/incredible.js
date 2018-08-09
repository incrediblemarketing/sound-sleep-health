'use strict';

(function($) {

function sliders() {

  if (typeof im_sliders == 'function') {

    var sliders = new im_sliders();

    sliders.type('static_content', {
      slidesPerView:2,
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      },
    });

    sliders.type('recent_posts', {
      slidesPerView:3,
      loop:true
    });

    sliders.post_type('page', {
      slidesPerView:2,
      loop:true
    });

    sliders.id('slider-5b5b3dfe41cb4', {
      slidesPerView:4
    });

    sliders.init();
  }

}

// SET CSS DEFINED IN DATA ATTRIBUTES
// ==================================================
function data_css() {

  // background images
  $('[data-bg-image]').each(function(){
    var $this = $(this);
    $this.css({'background-image' : 'url("' + $this.data('bgImage') + '")'});
  });

  // background colors
  $('[data-bg-color]').each(function(){
    var $this = $(this);
    $this.css({'background-color' : $this.data('bgColor') });
  });

}

// function data_css

$(document).ready(function() {
  data_css();
  sliders();
});


})(jQuery);
