<?php

if( have_rows('sections') ):
  while ( have_rows('sections') ) : the_row();
    $layout = get_row_layout();
    echo get_template_part('components/sections/' . $layout );
  endwhile;
endif;
