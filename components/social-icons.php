<?php
  $social_icon_class_map = array(
    'facebook'   => 'fab fa-facebook-f',
    'instagram'  => 'fas fa-instagram',
    'pinterest'  => 'fas fa-pinterest-p',
    'twitter'    => 'fas fa-twitter',
    'linkedin'   => 'fab fa-linkedin',
    'youtube'    => 'fas fa-youtube',
    'vimeo'      => 'fas fa-vimeo',
    'googleplus' => 'fas fa-google-plus-g',
    'yelp'       => 'fas fa-yelp',
    'call'       => 'fas fa-phone',
    'email'      => 'fas fa-envelope-o',
    'location'   => 'fas fa-map-marker',
  );
?>

<?php if (have_rows('social_icons', 'option')) : ?>
  <ul class="social-icons d-flex">
    <?php while (have_rows('social_icons', 'option')) : the_row(); ?>
      <li><a href="<?php echo get_sub_field('social_url'); ?>" target="_blank">
        <i class="<?php echo $social_icon_class_map[get_sub_field('social_icon')]; ?>" aria-hidden="true"></i>
      </a></li>
    <?php endwhile; ?>
  </ul>
<?php endif; ?>
