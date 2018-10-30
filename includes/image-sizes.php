<?php

add_image_size('procedure_thumb', 320, 320, true);
add_image_size('featured_thumb', 480, 350, true);
add_image_size('parent_thumb', 650, 650, true);
add_image_size('gallery_thumb', 365, 365, true);
add_image_size('postslider_thumb', 480, 650, true);

function im_image_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'procedure_thumb' => __( 'Procedure Thumbnail' ),
		'featured_thumb' => __( 'Featured Thumbnail' ),
		'parent_thumb' => __( 'Parent Thumbnail' ),
		'gallery_thumb' => __( 'Gallery Thumbnail' ),
		'postslider_thumb' => __( 'Post Slider Thumbnail' )
	));
}
add_filter( 'image_size_names_choose', 'im_image_sizes' );
