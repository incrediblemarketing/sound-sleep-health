<?php

// excerpt_more
add_filter('excerpt_more', 'im_excerpt_more');
function im_excerpt_more($more) {
  return '&hellip;';
}

// add class to previous_posts_link
add_filter('previous_posts_link_attributes', 'im_previous_posts_link_attributes');
function im_previous_posts_link_attributes($attr) {
  return 'class="ml-auto"';
}

// add class to previous_post_link
add_filter('previous_post_link', 'im_previous_post_link_attributes');
function im_previous_post_link_attributes($output) {
  $attr = 'class="ml-auto"';
  return str_replace('<a href=', '<a ' . $attr . ' href=', $output);
}

// disable Gutenberg by post type
add_filter('use_block_editor_for_post_type', 'im_disable_gutenberg', 10, 2);
function im_disable_gutenberg($use_block_editor, $post_type) {
  $disabled = array(
    // 'page',
    // 'testimonial',
    // 'team_member',
    // 'patient',
  );
  if (in_array($post_type, $disabled)) {
    return false;
  }
  return $use_block_editor;
}

// use <button> for gravity forms submit buttons
add_filter( 'gform_submit_button', function ( $button, $form ) {
  return "<button class='btn btn-primary gform_button' id='gform_submit_button_{$form['id']}'>" . $form['button']['text'] . "</button>";
}, 10, 2 );
