<?php

function im_register_galleries() {

	$labels = array(
		"name" => __( 'Galleries', '' ),
		"singular_name" => __( 'Gallery', '' ),
	);

	$args = array(
		"label" => __( 'Galleries', '' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "page",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "gallery", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-format-gallery",
		"supports" => array( "title", "thumbnail", "page-attributes", "post-formats" ),
	);

	register_post_type( "gallery", $args );

}

add_action( 'init', 'im_register_galleries' );
