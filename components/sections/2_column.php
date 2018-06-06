<?php

// Row
$rc = get_sub_field('row_class');
$rbc = get_sub_field('row_background_color');
$rbi = get_sub_field('row_background_image');

// Col 1
$content1 = get_sub_field('column_1_content');
$c1c = get_sub_field('column_1_class');
$c1a = get_sub_field('column_1_alignment');
$c1bc = get_sub_field('col1_background_color');
$c1bi = get_sub_field('col1_background_image');
$c1fc = get_sub_field('col1_font_color');
$c1fs = get_sub_field('col1_font_size');
$c1ta = get_sub_field('col1_text_align');
$c1pad = get_sub_field('col1_padding');

// Col 2
$content2 = get_sub_field('column_2_content');
$c2c = get_sub_field('column_2_class');
$c2a = get_sub_field('column_2_alignment');
$c2bc = get_sub_field('col2_background_color');
$c2bi = get_sub_field('col2_background_image');
$c2fc = get_sub_field('col2_font_color');
$c2fs = get_sub_field('col2_font_size');
$c2ta = get_sub_field('col2_text_align');
$c2pad = get_sub_field('col2_padding');

// Row
echo '<div class="row '.$rc.'" data-bg="'.$rbi.'" data-bgc="'.$rbc.'">';
  // Col 1
  if( $c1a && in_array('Vertical Align', $c1a) ){
    echo '<div class="' . $c1c . ' ' . $c1ta . ' tbl" data-bg="'.$c1bi.'" data-color="'.$c1fc.'" data-size="'.$c1fs.'" data-bgc="'.$c1bc.'">';
      echo '<div class="inner ' . $c1ta . ' ' . $c1pad . ' ">';
        echo $content1;
      echo '</div>';
    echo '</div>';
  }else{
    echo '<div class="' .$c1c . ' ' . $c1ta . '" data-bg="'.$c1bi.'" data-color="'.$c1fc.'" data-size="'.$c1fs.'" data-bgc="'.$c1bc.'">';
      if($c1pad){echo '<div class="'.$c1pad.'">';}
        echo $content1;
      if($c1pad){echo '</div>';}
    echo '</div>';
  }

  // Col 2
  if( $c2a && in_array('Vertical Align', $c2a) ){
    echo '<div class="' . $c2c . ' ' . $c2ta . ' tbl" data-bg="'.$c2bi.'" data-color="'.$c2fc.'" data-size="'.$c2fs.'" data-bgc="'.$c2bc.'">';
      echo '<div class="inner ' . $c2ta . ' ' . $c2pad . ' ">';
        echo $content2;
      echo '</div>';
    echo '</div>';
  }else{
    echo '<div class="' . $c2c . ' ' . $c2ta . ' " data-bg="'.$c2bi.'" data-color="'.$c2fc.'" data-size="'.$c2fs.'" data-bgc="'.$c2bc.'">';
      if($c2pad){echo '<div class="'.$c2pad.'">';}
        echo $content2;
      if($c2pad){echo '</div>';}
    echo '</div>';
  }

echo '</div>';
