<?php

  $id = get_sub_field('id');
  $slider_type = get_sub_field('type');
  $post_type = get_sub_field('im_dynamic_post_type');
  $max_posts = get_sub_field('max_posts');
  $slider_posts = get_sub_field('posts');
  $different_backgrounds_per_slide = get_sub_field('different_backgrounds_per_slide');
  $bg = get_sub_field('background');
  $bg_color = $bg['color'];
  $bg_image = $bg['image'];
  $slides = get_sub_field('slides');
  $include_images = get_sub_field('include_images');
  $image_size = get_sub_field('im_dynamic_image_size');

  // ==================================================
  // GET RECENT POSTS
  // --------------------------------------------------

  if ($slider_type == 'recent_posts' && !empty($post_type)) {
    $args = array(
      'post_type' => $post_type
    );

    if ($max_posts) {
      $args['posts_per_page'] = $max_posts;
    }
    $slider_posts = new WP_Query($args);
  }

  // ==================================================
  // GET SPECIFIC POSTS
  // --------------------------------------------------
  // doing it this way allows using the default loop
  // rather than `foreach`, so `recent_posts` and
  // `specific_posts` sliders can use the same markup

  if ($slider_type == 'specific_posts' && !empty($slider_posts)) {
    $args = array(
      'post__in' => $slider_posts,
      'post_type' => 'any',
      'orderby' => 'post__in'
    );
    $slider_posts = new WP_Query($args);
  }

  // ==================================================
  // DETERMINE IF SLIDER HAS ANY SLIDES
  // --------------------------------------------------
  // used to prevent output if no slides exists

  $has_slides == false;
  if ($slider_type == 'static_content' && have_rows('slides')) {
    $has_slides = true;
  } elseif ($slider_type == 'recent_posts' && $slider_posts->have_posts()) {
    $has_slides = true;
  } elseif ($slider_type == 'specific_posts' && $slider_posts->have_posts()) {
    $has_slides = true;
  }

  // ==================================================
  // DETERMINE TEMPLATE FOR SLIDER
  // --------------------------------------------------

  // first priority is template with slider id as name
  $templates = array('components/sliders/slider-' . $id . '.php');

  // if recent posts slider, next priority is template with post_type as name
  if ($slider_type == 'recent_posts' && !empty($post_type)) {
    $templates[] = 'components/sliders/post_type-' .  $post_type . '.php';
  }

  // last priority (default) is slider type
  $templates[] = 'components/sliders/' . $slider_type . '.php';

  if ($has_slides) {
    // `locate_template()` instead of `get_template_part()`
    // in order to pass variables to the template
    include ( locate_template( $templates, false, false ) );

    enqueue_slider_assets();

  }
