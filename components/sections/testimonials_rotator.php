<?php

$testimonials = get_sub_field('testimonials');
$title = get_sub_field('title');
$rc = get_sub_field('row_class');
$c1c = get_sub_field('column_1_class');
$bc = get_sub_field('background_color');
$fc = get_sub_field('font_color');
$fs = get_sub_field('font_size');
$ta = get_sub_field('text_align');
$pad = get_sub_field('padding');
$bt = get_sub_field('button_text');
$bu = get_sub_field('button_url');
echo '<div class="row sh-row testimonials ' . $rc . '" data-color="'.$fc.'" data-size="'.$fs.'" data-bgc="'.$bc.'">';
  echo '<div class="' . $c1c .' ' .$ta  . ' sh-col">';
    if($pad){echo '<div class="'.$pad.'">';}
      if($title){
        echo '<h3>'.$title.'</h3>';
      } 

      if( $posts ): ?>
        <div class="owl-carousel owl-theme testimonials-rotator">
          <?php foreach( $testimonials as $post): ?>
            <?php setup_postdata($post); ?>
            <div class="item">
              <?php the_post_thumbnail('thumbnail'); ?>
              <?php the_content(); ?>
              <strong><?php the_title(); ?></strong>
            </div>
          <?php endforeach; ?>
        </div><?php 
        wp_reset_postdata();
      endif;
    if($pad){echo '</div>';}
  echo '</div>';
echo '</div>';
