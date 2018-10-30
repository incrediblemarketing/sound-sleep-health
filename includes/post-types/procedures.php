<?php

function im_register_procedures() {

	$labels = array(
		"name" => __( 'Procedures', '' ),
		"singular_name" => __( 'Procedure', '' ),
	);

	$args = array(
		"label" => __( 'Procedures', '' ),
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
		"rewrite" => array( "slug" => "procedure", "with_front" => false ),
		"query_var" => true,
		"menu_icon" => "dashicons-index-card",
		"supports" => array( "title", "editor", "thumbnail", "page-attributes", "post-formats" ),
	);

	register_post_type( "procedure", $args );

}

add_action( 'init', 'im_register_procedures' );
