<?php

function im_register_testimonials() {

  $labels = array(
    "name" => __( 'Testimonials', '' ),
    "singular_name" => __( 'Testimonial', '' ),
  );

  $args = array(
    "label" => __( 'Testimonials', '' ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => false,
    "rest_base" => "",
    "has_archive" => true,
    "show_in_menu" => true,
    "exclude_from_search" => false,
    "capability_type" => "page",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "rewrite" => array( "slug" => "testimonial", "with_front" => true ),
    "query_var" => true,
    "menu_icon" => "dashicons-testimonial",
    "supports" => array( "title", "editor" ),
  );

  register_post_type( "testimonial", $args );

}

add_action( 'init', 'im_register_testimonials' );
