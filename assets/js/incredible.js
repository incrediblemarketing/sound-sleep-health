'use strict';

(function($) {

function sliders() {

	if (typeof im_sliders == 'function') {

		var sliders = new im_sliders();

		// define slider options here

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
