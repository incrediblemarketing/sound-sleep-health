<?php

  $queryId = get_sub_field('id');

  if (have_rows('reusable_blocks', 'options')) :
    while (have_rows('reusable_blocks', 'options')) : the_row();
      $id = get_sub_field('id');
      if ($queryId == $id) {
        echo get_template_part('components/blocks');
      }
    endwhile;
  endif;
