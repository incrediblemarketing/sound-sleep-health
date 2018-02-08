<?php

$content = get_sub_field('column_1_content');
$rc = get_sub_field('row_class');
$c1c = get_sub_field('column_1_class');
$bc = get_sub_field('background_color');
$fc = get_sub_field('font_color');
$fs = get_sub_field('font_size');
$ta = get_sub_field('text_align');
$pad = get_sub_field('padding');
$bt = get_sub_field('button_text');
$bu = get_sub_field('button_url');
echo '<div class="row cta ' . $rc . '" data-color="'.$fc.'" data-size="'.$fs.'" data-bgc="'.$bc.'">';
  echo '<div class="' . $c1c .' ' .$ta  . '">';
    if($pad){echo '<div class="'.$pad.'">';}
      echo $content;
      if($bt && $bu){
        echo '<a href="'.$bu.'" class="btn btn-border" data-color="'.$fc.'">'.$bt.'</a>';
      }
    if($pad){echo '</div>';}
  echo '</div>';
echo '</div>';
