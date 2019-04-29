(function($, window, document, undefined) {
	'use strict';

	$(document).ready(function() {
		var $cache = {
			window: $(window),
			document: $(document),
			html: $('html').eq(0),
			body: $('body').eq(0),
			jsToTop: $('.js-to-top'),
			jsScrollTo: $('.js-scroll-to'),
			siteWrap: $('.site-wrap')
		};

		var IM = {
			init: function() {
				this.utils.init();
			},
			utils: {
				init: function() {
					this.scrollTo();
					this.dataCss();
					this.scrollMagic();
				},
				scrollTo: function() {
					// Animate the scroll to top
					$cache.jsToTop.on('click', function(e) {
						e.preventDefault();
						$('html, body').animate({scrollTop: 0}, 300);
					});

					// Animate scroll to id
					$cache.jsScrollTo.on('click', function(e) {
						e.preventDefault();
						var href = $(this).attr('href'),
							scrollPoint = $(href).offset();
						$('html, body').animate({scrollTop: scrollPoint.top}, 300);
					});
				},
				dataCss: function() {
					// background images
					$('[data-bg-image]').each(function() {
						var $this = $(this);
						$this.css({'background-image': 'url("' + $this.data('bgImage') + '")'});
					});

					// background colors
					$('[data-bg-color]').each(function() {
						var $this = $(this);
						$this.css({'background-color': $this.data('bgColor')});
					});
				},
				scrollMagic: function() {
					var $blocks = $cache.siteWrap.children('.block'),
						controller = new ScrollMagic.Controller();

					$blocks.each(function(i, item) {
						new ScrollMagic.Scene({
							triggerElement: item,
							duration: item.outerHeight,
							triggerHook: 0.9,
							reverse: false
						})
							.on('enter', function() {
								var $current = $blocks.eq(i);
								// Example usage
								// if ($current.hasClass('hero')) {
								//     var tl = new TimelineMax({ paused: true, force3D: true, ease: Circ.easeInOut }),
								//         bg = $current.children('.bg-image'),
								//         parallaxer = $current.find('.parallax').children(),
								//         opts = { delay: 0.6 },
								//         duration = 1.5,
								//         fromOpts = { drawSVG: '0' },
								//         toOpts = { drawSVG: '100% 0', visibility: 'visible', ease: Circ.easeInOut },
								//         path = document.querySelectorAll('.hero svg path');

								//     if (winWidth >= mobile) {
								//         var scene = document.getElementById('scene'),
								//             parallax = new Parallax(scene);
								//     }

								//     tl.to(bg, 0.6, { autoAlpha: 1 });
								//     tl.to(parallaxer, 0.6, { opacity: 1 }, '-=0.3');
								//     tl.set(path, { fill: '#343130', attr: { 'fill-opacity': 0 } });
								//     tl.fromTo(path, duration, fromOpts, toOpts);
								//     tl.to(path, 0.6, { attr: { 'fill-opacity': 1 } });
								//     tl.play();
								// }
							})
							// Comment "addIndicators()" in/out to use
							// .addIndicators()
							.addTo(controller);
					});
				}
			}
		};

		IM.init();
	});
})(jQuery, window, document);
