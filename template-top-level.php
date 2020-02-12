<?php
/*
 * Template Name: Top Level Procedure Page
 * Template Post Type: procedure
 */
$id = get_the_ID();
 get_header();  ?>

<div class="container page__top-level">
  <div class="row justify-content-center section__padding">
    <div class="col-12">
    <?php 
      $args = array(
        'post_type'   => 'procedure',
        'order'       =>  'ASC',
        'orderby'     => 'menu_order',
        'post_parent' => $id
      );
      $query = new WP_Query($args); ?>
      <?php if ($query->have_posts()) : ?>
        <div class="grid__procedures">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="procedure--preview">
                <?php if(has_post_thumbnail()) : ?>
                    <?php echo get_the_post_thumbnail('featured_thumb'); ?>
                <?php else : ?>
                    <?php im_the_placeholder_image('featured_thumb'); ?>
                <?php endif; ?>
                <div class="card--bottom">
                  <h2><?php echo get_the_title(); ?></h2>
                  <a href="<?php echo get_the_permalink(); ?>" class="btn btn-primary">Learn More</a>
                </div>
            </div>
            <?php endwhile; ?> 
        </div>
      <?php endif; ?>  
    </div>
  </div>
</div>
<?php get_footer(); ?>