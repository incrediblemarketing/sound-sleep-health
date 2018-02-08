<?php

$queryId = get_sub_field('id');

if (have_rows('reusable_page_sections', 'options')) :
  while ( have_rows('reusable_page_sections', 'options') ) : the_row();
    $id = get_sub_field('id');
    if ($queryId == $id) {
      echo get_template_part('components/sections');
    }
  endwhile;
endif;
