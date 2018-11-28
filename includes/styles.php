<?php

function im_register_styles() {
    wp_register_style('main', get_template_directory_uri() . '/assets/dist/css/main.css');
	wp_register_style('tetherstyle', get_template_directory_uri() . '/assets/vendor/tether-1.3.3/dist/css/tether.min.css');
	wp_register_style('bootstrapstyle', get_template_directory_uri() . '/assets/vendor/Bootstrap/css/bootstrap.min.css');
	wp_register_style('bootstrapextensions', get_template_directory_uri() . '/assets/css/bootstrap-extensions.css');
	wp_register_style('fontawesome', get_stylesheet_directory_uri() . '/assets/vendor/fontawesome-pro-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css');
	wp_register_style('swiper', get_template_directory_uri() . '/assets/vendor/swiper-4.3.3/dist/css/swiper.min.css');
	wp_register_style('style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'im_register_styles');

function im_enqueue_styles() {
    wp_enqueue_style( 'main');
	wp_enqueue_style('tetherstyle');
	wp_enqueue_style('bootstrapstyle');
	wp_enqueue_style('bootstrapextensions');
	wp_enqueue_style('fontawesome');
	// wp_enqueue_style('swiper');
	wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'im_enqueue_styles');

// DYNAMIC CSS
// ==================================================
function dynamic_enqueue_scripts() {
	wp_enqueue_style(
		'dynamic-css',
		admin_url( 'admin-ajax.php' ) . '?action=dynamic_css_action',
		array( 'style' ),
		null
	);
}
function dynamic_css_loader() {
	require_once realpath(__DIR__ . '/..') . '/assets/css/dynamic-css.php';
	exit;
}
add_action( 'wp_enqueue_scripts', 'dynamic_enqueue_scripts' );
add_action( 'wp_ajax_dynamic_css_action', 'dynamic_css_loader' );
add_action( 'wp_ajax_nopriv_dynamic_css_action', 'dynamic_css_loader' );
