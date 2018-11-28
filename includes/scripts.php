<?php

function im_register_scripts() {
	wp_register_script('jquery', get_template_directory_uri() . '/assets/vendor/jquery/jquery-2.2.3.min.js');
	wp_register_script('tether', get_template_directory_uri() . '/assets/vendor/tether-1.3.3/dist/js/tether.min.js');
	wp_register_script('bootstrap', get_template_directory_uri() . '/assets/vendor/Bootstrap/js/bootstrap.min.js');
	wp_register_script('swiper', get_template_directory_uri() . '/assets/vendor/swiper-4.3.3/dist/js/swiper.min.js','','',true);
	wp_register_script('tweenmax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.14.2/TweenMax.min.js','','',true);
	wp_register_script('scrollmagic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js','','',true);
	wp_register_script('scrollanimation','https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js','','',true);
	wp_register_script('scrollindicator', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js','','',true);
	wp_register_script('im_sliders', get_template_directory_uri() . '/assets/js/im_sliders.js');
	wp_register_script('incredible', get_template_directory_uri() . '/assets/js/incredible.js');
    wp_register_script('modernizr', get_template_directory_uri() . '/assets/dist/js/vendor/modernizr-3.0.0.min.js' );
    wp_register_script('plugins', get_template_directory_uri() . '/assets/dist/js/plugins.min.js', array('jquery'), false );
    wp_register_script('main', get_template_directory_uri() . '/assets/dist/js/main.min.js', array('plugins'), false );

}
add_action('wp_enqueue_scripts', 'im_register_scripts');

function im_enqueue_scripts() {  
	wp_enqueue_script('jquery');
	wp_enqueue_script('tether');
	wp_enqueue_script('bootstrap');
	// wp_enqueue_script('swiper');
	wp_enqueue_script('tweenmax');
	wp_enqueue_script('scrollmagic');
	wp_enqueue_script('scrollanimation');
	// wp_enqueue_script('scrollindicator');
	// wp_enqueue_script('im_sliders');
	wp_enqueue_script('incredible');
    wp_enqueue_script('modernizr');
    wp_enqueue_script('plugins');
    wp_enqueue_script('main');
}
add_action('wp_enqueue_scripts', 'im_enqueue_scripts');
