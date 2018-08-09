<?php

if (have_rows('blocks')) :
  while (have_rows('blocks')) : the_row();
    $layout = get_row_layout();
    $wrap_as_block = get_sub_field('wrap_as_block');
    $defaults = get_sub_field('defaults');
    $block = get_sub_field('block');
    $block_content = get_sub_field('block_content');

    if ($wrap_as_block) {

      $block_class = get_block_class($block, $defaults);
      $block_content_class = get_block_content_class($block, $defaults);

      echo '<div class="block block-' . $layout . ' ' . $block_class . '">';
        echo '<div class="block-content ' . $block_content_class . '">';
    }

    echo get_template_part('components/blocks/' . $layout );

    if ($wrap_as_block) {
          echo get_block_content_video($block_content, $defaults);
        echo '</div>';
        echo get_block_video($block, $defaults);
      echo '</div>';
    }
  endwhile;
endif;
