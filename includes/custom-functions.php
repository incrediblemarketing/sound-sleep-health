<?php

function im_is_blog () {
  return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

function get_top_level_id(){
  $ancestors = get_ancestors( get_the_ID(), 'page' );

  $top_level_id = end($ancestors);
  if (!$top_level_id) :
    $top_level_id = get_the_ID();
  endif;

  return $top_level_id;
}

function get_child_page_menu($top_level_id = null, $current_page_id = null) {

  if (!$top_level_id) {
    $top_level_id = get_top_level_id();
  }
  if (!$current_page_id) {
    $current_page_id = get_the_ID();
  }

  $args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $top_level_id,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
  );

  $parent = new WP_Query( $args );

  $html = '';

  if ( $parent->have_posts() ) {

    $html .= '<ul>';

    while ( $parent->have_posts() ) {
      $parent->the_post();
      $html .= get_the_ID() == $current_page_id ? '<li class="current-menu-item">' : '<li>';
      $html .= '<a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a>';
      $html .= get_child_page_menu(get_the_ID(), $current_page_id);
      $html .= '</li>';
    }

    $html .= '</ul>';
  }
  wp_reset_query();

  return $html;
}

function get_background_video($bg_object) {
  ob_start();
  $bg_image = $bg_object['image']['sizes']['large'];
  $has_video_background = $bg_object['video_background'];
  $video_object = $bg_object['video'];
  ?>
    <?php if ($has_video_background) : ?>
      <?php if ($video_object['mp4'] || $video_object['ogv'] || $video_object['webm'] ) : ?>
        <div class="bg-video">
          <video
            <?php echo $bg_image ? 'poster="' . $bg_image['sizes']['large'] . '"' : ''; ?>
            playsinline autoplay muted loop>
            <?php foreach ($video_object as $file_type => $file) : ?>
              <?php if (!empty($file)) : ?>
                <source src="<?php echo $file['url']; ?>" type="video/<?php echo $file_type; ?>">
              <?php endif; ?>
            <?php endforeach; ?>
          </video>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  <?php
  return ob_get_clean();
}

function get_block_class($block, $defaults, $element = 'block') {

  $result_class = array();
  $default_class = array();
  $this_class = explode(' ', $block['class']);
  $default_method = isset($defaults['method']) ? $defaults['method'] : 0;
  $default_source = isset($defaults['im_dynamic_element_default_source']) ? $defaults['im_dynamic_element_default_source'] : 0;

  if ('global' == $default_source) {
    $default_class = explode(' ', get_field('global_block_defaults', 'options')[$element]['class']);
  } else {
    if (have_rows('custom_block_defaults', 'options')) {
      while (have_rows('custom_block_defaults', 'options')) {
        the_row();
        if ($default_source == get_sub_field('id')) {
          $default_class = explode(' ', get_sub_field($element)['class']);
        }
      }
    }
  }

  // merge or replace default_class with this_class depending on method
  switch ($default_method) {
    case 'use' :
      $result_class = $default_class;
      break;
    case 'merge' :
      $result_class = array_unique(array_merge($default_class, $this_class));
      break;
    default:
      $result_class = $this_class;
  }

  return implode(' ', $result_class);

}

function get_block_content_class($block, $defaults) {
  return get_block_class($block, $defaults, 'block_content');
}

function get_block_video($block, $defaults, $element = 'block') {
  $default_method = isset($defaults['method']) ? $defaults['method'] : 0;
  $default_source = isset($defaults['im_dynamic_element_default_source']) ? $defaults['im_dynamic_element_default_source'] : 0;

  $bg_object = $block['background'];
  switch($default_method) {
    case 'use':
      break;
    case 'merge':
      break;
    default:
  }

  if (!$default_method) {
    return get_background_video($bg_object);
  }
}

function get_block_content_video($block, $defaults) {
  return get_block_video($block, $defaults, 'block_content');
}

function enqueue_slider_assets() {
  wp_enqueue_style('swiper');
  wp_enqueue_script('swiper');
  wp_enqueue_script('im_sliders');
}
