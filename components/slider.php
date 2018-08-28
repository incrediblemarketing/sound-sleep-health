<section
  class="slider <?php echo $slider_type; ?> <?php echo $slider_type == 'recent_posts' ? $post_type . 's' : ''; ?> <?php echo $slider_config['classes']['slider']; ?>"
  data-type="<?php echo $slider_type; ?>"
  <?php echo $slider_type == 'recent_posts' ? 'data-post-type="' . $post_type . '"' : ''; ?>
  id="slider-<?php echo $id; ?>"
  <?php echo $bg_color ? 'data-bg-color="' . $bg_color . '"' : ''; ?>
  <?php echo $bg_image ? 'data-bg-image="' . $bg_image['sizes']['large'] . '"' : ''; ?>
  >

  <div class="swiper-container <?php echo $slider_config['classes']['slider_container']; ?>">

    <?php

      // get first template
      if ($slider_config['templates']['slider_container_first']) {
        include ( locate_template( $slider_config['templates']['slider_container_first'] . '.php', false, false ) );
      }

      // get correct loop for slides
      if ($slider_type == 'recent_posts' || $slider_type == 'specific_posts') {
        include ( locate_template( 'components/sliders/slide-loops/posts.php', false, false ) );
      } elseif ($slider_type == 'static_content') {
        include ( locate_template( 'components/sliders/slide-loops/static_content.php', false, false ) );
      }

      // get last template
      if ($slider_config['templates']['slider_container_last']) {
        include ( locate_template( $slider_config['templates']['slider_container_last'] . '.php', false, false ) );
      }

    ?>

  </div>

  <?php echo get_background_video($bg); ?>

</section>
