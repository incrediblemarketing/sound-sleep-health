<?php 

  $appletouch = get_field('apple_touch_180x180', 'options');
  $favicon32 = get_field('favicon_32x32', 'options');
  $favicon16 = get_field('favicon_16x16', 'options');

  if ($appletouch) {
    echo '<link rel="apple-touch-icon" sizes="180x180" href="' . $appletouch . '">';
  }
  if ($favicon32) {
    echo '<link rel="icon" type="image/png" sizes="32x32" href="' . $favicon32 . '">';
  }
  if ($favicon16) {
    echo '<link rel="icon" type="image/png" sizes="16x16" href="' . $favicon16 . '">';
  }
