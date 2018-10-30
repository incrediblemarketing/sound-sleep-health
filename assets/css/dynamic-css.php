<?php
if ( ! defined( 'ABSPATH' ) ) {
	die();
}

header( "Content-type: text/css; charset: UTF-8" );

$css_selectors = array();

function option($field_name) {
	return get_field($field_name, 'option');
}

function set_css($selector, $property, $value, $prefix = '', $postfix = '') {
	global $css_selectors;
	if ($value) {   
		$css_selectors[$selector][$property] = $prefix.$value.$postfix;
	}
}

function output_css() {
	global $css_selectors;
	foreach ($css_selectors as $selector => $properties){
		echo $selector . '{';
		foreach ($properties as $property => $value) {
			echo $property . ':' . $value . ';';
		}
		echo "}\r\n";
	}
}

// usage example:
// set_css('.page-header', 'background-image', option('header_image'), "url('", "')");

/* OUTPUT
========================================================== */

output_css();
