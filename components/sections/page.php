<?php

$content = get_sub_field('column_1_content');
$rc = get_sub_field('row_class');
$c1c = get_sub_field('column_1_class');
$bc = get_sub_field('background_color');
$bg = get_sub_field('background_image');
$fc = get_sub_field('font_color');
$fs = get_sub_field('font_size');
$ta = get_sub_field('text_align');
$pad = get_sub_field('padding');
$showSidebar = get_sub_field('show_sidebar');
if($showSidebar == 1){
  $sideC = get_sub_field('sidebar_content');
  $sideCSS = get_sub_field('sidebar_css');
  $show_gallery = get_sub_field('show_gallery');
  if($show_gallery == 1){
    $gallery_link = get_sub_field('gallery_link');
  }
}

/* GET DEFAULTS IF NOTHING WAS SELECTED
================================================ */
if(!$rc){$rc = get_field('row_class','options');}
if(!$c1c){$c1c = get_field('column_1_class','options');}
if(!$bc){$bc = get_field('background_color','options');}
if(!$bg){$bg = get_field('background_image','options');}
if(!$fc){$fc = get_field('font_color','options');}
if(!$fs){$fs = get_field('font_size','options');}
if(!$ta){$ta = get_field('text_align','options');}
if(!$pad){$pad = get_field('padding','options');}

echo '<div class="row  ' . $rc . ' sh-row" data-color="'.$fc.'" data-size="'.$fs.'" data-bgc="'.$bc.'" data-bg="'.$bg.'">';

  if($showSidebar == 1){
    echo '<div class="col-sm-7 offset-sm-2 col-xs-12 content ' . $c1c . ' ' . $ta . ' sh-col">';
  }else{
    echo '<div class="col-md-8 offset-md-2 col-sm-8 col-xs-12 content ' . $c1c . ' ' . $ta . ' sh-col">';
  }
      if($pad){echo '<div class="'.$pad.'">';}
        echo '<div class="img alignleft">';
          the_post_thumbnail('postslider_thumb', array( 'class' => 'img-responsive' ));
        echo '</div>';
        echo $content;
        echo '<div class="clearfix"></div>';
      if($pad){echo '</div>';}

    echo '</div>'; // end content

    if($showSidebar == 1){
      echo '<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar ' . $sideCSS . ' sh-col">';
        echo '<div class="pad-v-md">';

          // Sidebar Page Menu
          $showpages = get_sub_field('show_page_menu');
          if($showpages == 1){
            $parent = get_sub_field('select_parent_page');
            if($parent){
              echo '<h3>'.get_the_title($parent).' Menu</h3>';
              echo '<ul>';
                  wp_list_pages( array( 'post_type' => 'page', 'title_li' => '', 'child_of' => $parent, 'depth' => 1 ) );
              echo '</ul>';
            }
          }

          $showprocedures = get_sub_field('show_procedures_menu');
          if($showprocedures == 1){
            echo '<h3>Procedures</h3>';
            echo '<ul class="procedure-menu">';
              if(wp_get_post_parent_id( $post_ID ) == 0){ 
                wp_list_pages( array( 'post_type' => 'procedure', 'title_li' => '', 'depth' => 1 ) );
              }else{
                wp_list_pages( array( 'post_type' => 'procedure', 'title_li' => '', 'child_of' => wp_get_post_parent_id( $post_ID ), 'depth' => 1 ) );
              }
            echo '</ul>';
          }

          $showtestimonials = get_sub_field('show_testimonials_rotator');
          if($showtestimonials == 1){
            $testimonials = get_sub_field('sidebar_testimonials');
            echo '<h3>Testimonials</h3>';
            if( $testimonials ){ ?>
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
            }
          }

          if($gallery_link && $show_gallery == 1){
            echo '<div class="sidebar-gallery">';
              echo '<h3>Gallery</h3>';
              $images = get_field('gallery_images', $gallery_link);

              if( $images ){ ?>
                <ul class="owl-carousel owl-theme mini-gallery">
                  <?php foreach( $images as $image ): ?>
                    <li class="item"><img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" /></li>
                  <?php endforeach; ?>
                </ul>
              <?php } ?>
              <p><small>To view before and after photos from other patients, click the link below.</small></p>
              <a href="<?php the_permalink($gallery_link); ?>" class="btn btn-green">View Patient Gallery</a><?php 
            echo '</div>';
          }

          echo '<div class="sidebar-content">';
            echo $sideC;
          echo '</div>';

        echo '</div>';
      echo '</div>';
    }
echo '</div>';