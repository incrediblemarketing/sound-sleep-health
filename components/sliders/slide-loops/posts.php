<?php if ($slider_posts->have_posts()) : ?>
  <div class="slides swiper-wrapper <?php echo $slider_config['classes']['slider_wrapper']; ?>">
    <?php while ($slider_posts->have_posts()) : $slider_posts->the_post(); ?>
      <div class="slide swiper-slide <?php echo $slider_config['classes']['slide']; ?>" id="slide-<?php the_sub_field('id'); ?>-<?php the_ID(); ?>">
        <div class="slide-content <?php echo $slider_config['classes']['slide_content']; ?>">

          <?php

            $slide_template = $slider_config['templates']['slide_content'] ?: 'components/sliders/slide-templates/post';
            $slide_template .= '.php';

            include ( locate_template( $slide_template, false, false ) );

          ?>

        </div>
      </div>
    <?php endwhile; wp_reset_postdata(); ?>
  </div>
<?php endif; ?>
