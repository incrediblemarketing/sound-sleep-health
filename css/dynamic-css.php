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

/* HEADER
========================================================== */

if ( option('logo_type') == 'Image' ) {
    set_css('#header .logo, #stickyHeader .logo', 'max-height', option('logo_height'), '', 'px');
    set_css('#header .logo, #stickyHeader .logo', 'max-width', option('logo_width'), '', 'px');
}
                  
if ( option('header_overlay') ) {
    set_css('#header', 'position', 'absolute');
    set_css('#header', 'top', '0');
    set_css('#header', 'left', '0');
    set_css('#header', 'width', '100%');
    set_css('#header', 'z-index', '9999999');
}

if ( have_rows('header_padding', 'option') ) :
    while( have_rows('header_padding', 'option') ) : the_row();
		$padding = (get_sub_field('padding_top', 'option') ?: 0) . 'px ';
		$padding .= (get_sub_field('padding_right', 'option') ?: 0) . 'px ';
		$padding .= (get_sub_field('padding_bottom', 'option') ?: 0) . 'px ';
		$padding .= (get_sub_field('padding_left', 'option') ?: 0) . 'px';
        set_css('.header1 .header-top, .header2', 'padding', $padding);
    endwhile;
endif;

set_css('#header::before', 'background-color', option('header_bg_color'));
set_css('#header::before', 'opacity', option('header_bg_opacity'));

    /* Header Menu
    ------------------------------------------------------ */
    set_css('.incredible-menu', 'background-color', option('menu_background_color'));
    set_css('.incredible-menu .sub-menu', 'background-color', option('submenu_background_color'));
    set_css('.incredible-menu a', 'color', option('menu_item_color'));
    set_css('.incredible-menu a:hover', 'color', option('menu_item_hover_color'));


/* OUTPUT
========================================================== */

output_css();
