<?php if( have_rows('social_icons', 'option') ):
  while ( have_rows('social_icons', 'option') ) : the_row(); ?>
    <li><a href="<?php echo get_sub_field('social_url'); ?>" target="_blank">
      <i class="fas fa-<?php echo get_sub_field('social_icon'); ?>" aria-hidden="true"></i>
    </a></li>
<?php endwhile; endif; ?>
