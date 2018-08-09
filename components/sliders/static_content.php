<?php

  $slider_config = array(
    'classes' => array(
      'slider' => '',
      'slider_container' => '',
      'slider_wrapper' => '',
      'slide' => '',
      'slide_content' => '',
    ),
    'templates' => array(
      'slider_container_first' => '',
      'slider_container_last' => 'components/sliders/navigation-templates/default',
      'slide_content' => '',
    )
  );

  include ( locate_template( '/components/slider.php', false, false ) );
