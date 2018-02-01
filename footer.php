</div><!-- end container-fluid -->
<?php 
  $fsi = get_field('footer_social_icons' , 'option');
  $copyright = get_field('copyright', 'option');
  $address = get_field('business_street_address', 'option');
  $address2 = get_field('business_city_state_zip', 'option');
  $addressLink = get_field('business_address_link', 'option');
  $phone = get_field('business_phone_display', 'option');
  $phoneURL = get_field('business_phone_url', 'option');
  $email = get_field('business_email_address', 'option');
  $lat = get_field('map_latitude', 'option');
  $long = get_field('map_longitude', 'option');

  function footer_menu() {
    $fm = get_field('footer_menu', 'option');
    return ($fm && in_array('Show Footer Menu', $fm));
  }
?>
<footer id="footer" class="clearfix container-fluid">
  <div id="map" data-lat="<?php echo $lat; ?>" data-long="<?php echo $long; ?>" data-co="<?php echo $mc; ?>"></div>
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
      <h3 class="text-center">Contact Us</h3>
      <div class="row contact text-center">
        <div class="col">
          <h4>Address</h4>
          <p><a href="<?php echo $addressLink; ?>" target="_blank"><?php echo $address; ?><br/><?php echo $address2; ?></a></p>
        </div>
        <div class="col">
          <h4>Phone</h4>
          <p><a href="tel:<?php echo $phoneURL; ?>"><?php echo $phone; ?></a></p>
        </div>
        <?php if ( $fsi == 1 ) : ?>
        <div class="col">
          <h4>Follow Us</h4>
          <ul class="social-icons">
            <?php get_template_part('components/social', 'icons'); ?>
          </ul>
        </div>
        <?php endif; ?>
      </div>
      <?php echo do_shortcode('[contact-form-7 id="15" title="Two-Column Form"]'); ?>
    </div>
  </div>      
</footer><!-- end #footer -->
<div id="footer-bottom" class="container-fluid">
  <div class="row">
    <div class="col copyright">     
      <?php if ( $fsi == 1 ) : ?>
        <ul class="social-icons">
          <?php get_template_part('components/social', 'icons'); ?>
        </ul>
      <?php endif; ?>
      <?php get_template_part('components/footer', 'copyright'); ?>
    </div>
  </div> <!-- end row --> 
</div>
<!--
  <?php if( footer_menu() ){
    echo '<nav role="navigation">';
    wp_nav_menu( array( 'theme_location' => 'footer-menu', 'depth' => '1', 'container_class' => 'footer-menu' ) );
    echo '</nav>';
  } ?>
-->
  <?php wp_footer(); ?>
    </body>
</html>