'use strict';

// requires jQuery and Swiper.js

var im_sliders = function() {

	var slider_options = {
		'ids' : {},
		'post_types': {},
		'types': {},
	};

	this.id = function (id, options) {
		slider_options.ids[id] = options;
	};

	this.post_type = function (post_type, options) {
		slider_options.post_types[post_type] = options;
	};

	this.type = function (type, options) {
		slider_options.types[type] = options;
	};

	this.init = function () {
		// loop through each slider in order of heirarchy
		// and check for options before initializing
		jQuery('.slider').each(function() {
			var $this = jQuery(this);
			var $slider = $this.find('.swiper-container').eq(0);
			var id = $this.attr('id');
			var post_type = $this.data('postType');
			var type = $this.data('type');
			var options = {};

			// specific
			if (id in slider_options.ids) {
				options = slider_options.ids[id];

			// post_type
			} else if (post_type in slider_options.post_types) {
				options = slider_options.post_types[post_type];

			// type
			} else if (type in slider_options.types) {
				options = slider_options.types[type];
			}

			var slider = new Swiper($slider, options);
		});
	}

};
