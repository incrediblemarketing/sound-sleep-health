<?php

$type = get_sub_field('slider_type');
$rev = get_sub_field('rev_slider_shortcode');?>
<div class="row">
  <div class="col-12" id="hero">
    <?php if($type == 'Image'){ ?>
      <img src="<?php echo get_sub_field('slider_bg'); ?>" />
    <?php }elseif($type == 'Rev Slider'){ ?>
      <?php echo do_shortcode($rev); ?>
    <?php }elseif($type == 'Video'){ ?>
      <video poster="<?php echo get_sub_field('slider_bg'); ?>" id="bgvid" playsinline autoplay muted loop>
        <source src="<?php echo get_sub_field('webm_file')['url']; ?>" type="video/webm">
        <source src="<?php echo get_sub_field('mp4_file')['url']; ?>" type="video/mp4">
      </video>
    <?php } ?>

    <div class="inner">     
      <div class="info">
        <?php echo get_sub_field('slide_content'); ?>
      </div>
      <div id="procedures">
        <ul class="owl-carousel owl-theme"><?php
          $featured_procedures = get_sub_field('featured_procedures');
          foreach( $featured_procedures as $procedure ) {
            $title = get_the_title($procedure->ID);?>
            <li class="item">
              <h3><?php echo $title; ?></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer tristique porttitor lacus consectetur tristique. Vivamus malesuada nibh mi, ac faucibus magna condimentum ultrices.</p>
              <a href="<?php the_permalink($procedure->ID); ?>" class="btn btn-green">Read More</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>
