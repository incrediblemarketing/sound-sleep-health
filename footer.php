<?php
/**
 * Footer
 *
 * Main footer file for the theme.
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

	$copyright             = get_field( 'copyright', 'option' );
	$homepage_footer_image = get_field( 'homepage_footer_image', 'option' );
	$inner_footer_image    = get_field( 'footer_image', 'option' );
?>

<footer class="footer">
	<?php if ( ! is_page( array( 530, 165 ) ) ) : ?>
		<?php if ( is_front_page() ) : ?>
			<?php if ( ! empty( $homepage_footer_image ) ) : ?>
				<div class="image__holder">
					<img src="<?php echo esc_url( $homepage_footer_image['sizes']['hero_thumb'] ); ?>" alt="<?php echo esc_attr( $homepage_footer_image['alt'] ); ?>" />
				</div>
			<?php endif; ?>
		<?php else : ?>
			<?php if ( ! empty( $inner_footer_image ) ) : ?>
				<div class="image__holder">
					<img src="<?php echo esc_url( $inner_footer_image['sizes']['hero_thumb'] ); ?>" alt="<?php echo esc_attr( $inner_footer_image['alt'] ); ?>" />
				</div>
			<?php endif; ?>
		<?php endif; ?>
	<div class="footer--box">
		<?php get_template_part( 'components/social-icons' ); ?>
		<div class="business--info">
			<?php
			if ( have_rows( 'business_info', 'options' ) ) :
				while ( have_rows( 'business_info', 'options' ) ) :
					the_row();
					echo '<div class="single--business">';
					echo '<p class="address"><i class="fas fa-map-marker-alt"></i> ' . get_sub_field( 'business_street_address' ) . '<br/>' . get_sub_field( 'business_city_state_zip' ) . '</p>';
					echo '<p class="directions"><a href="' . get_sub_field( 'business_address_link' ) . '" target="_blank">Directions</a>';
					echo '<p class="phone"><i class="fas fa-phone"></i> <a href="tel:' . get_sub_field( 'business_phone_url' ) . '">' . get_sub_field( 'business_phone_display' ) . '</a></p>';
					echo '<p class="fax"><i class="fas fa-fax"></i> ' . get_sub_field( 'business_fax' ) . '</p>';
					echo '<p><a href="' . get_sub_field( 'page_link' ) . '" class="btn--primary">Request an appointment</a></p>';
					echo '</div>';
				endwhile;
			endif;
			?>
		</div>
		<div class="form--area">
				<?php echo do_shortcode( '[gravityforms id="1" title="false" description="false" ajax="true"]' ); ?>
		</div>
	</div>
	<?php else : ?>
		<div class="orange--area">
			<?php get_template_part( 'components/social-icons' ); ?>
			<div class="business--info">
				<?php
				if ( have_rows( 'business_info', 'options' ) ) :
					while ( have_rows( 'business_info', 'options' ) ) :
						the_row();
						echo '<div class="single--business">';
						echo get_sub_field( 'iframe' );
						echo '<p class="address"><i class="fas fa-map-marker-alt"></i> ' . get_sub_field( 'business_street_address' ) . '<br/>' . get_sub_field( 'business_city_state_zip' ) . '</p>';
						echo '<p class="directions"><a href="' . get_sub_field( 'business_address_link' ) . '" target="_blank">Directions</a>';
						echo '<p class="phone"><i class="fas fa-phone"></i> ' . get_sub_field( 'business_phone_display' ) . '</p>';
						echo '<p class="fax"><i class="fas fa-fax"></i> ' . get_sub_field( 'business_fax' ) . '</p>';
						echo '<p><a href="' . get_sub_field( 'page_link' ) . '" class="btn--primary btn--white">Request an appointment</a></p>';
						echo '</div>';
					endwhile;
				endif;
				?>
			</div>
		</div>
	<?php endif; ?>
	<p class="copyright">&copy; <?php echo esc_attr( gmdate( 'Y' ) ); ?> <?php echo esc_attr( $copyright ) ?: esc_attr( get_bloginfo() ); ?> | <a href="/privacy-policy/">Privacy Policy</a> & <a href="/terms-of-use/">Terms of Use</a> | Digital Marketing By <a href="https://www.incrediblemarketing.com/" target="_blank"><?php get_template_part( 'components/svg/incredible-marketing' ); ?>Incredible Marketing</a></p>
</footer>

</div><!-- end of .site-wrap -->

<?php wp_footer(); ?>
</body>

</html>
