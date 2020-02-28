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

	$copyright    = get_field( 'copyright', 'option' );
	$address      = get_field( 'business_street_address', 'option' );
	$address2     = get_field( 'business_city_state_zip', 'option' );
	$address_link = get_field( 'business_address_link', 'option' );
	$phone        = get_field( 'business_phone_display', 'option' );
	$phone_url    = get_field( 'business_phone_url', 'option' );
?>

<footer class="footer bg-light">
	<?php get_template_part( 'components/social-icons' ); ?>
	<?php if ( $phone_url && $phone ) : ?>
	<p><a href="tel:<?php echo esc_attr( $phone_url ); ?>"><?php echo esc_attr( $phone ); ?></a></p>
	<?php endif; ?>

	<?php if ( $address_link && $address && $address2 ) : ?>
	<p><a href="<?php echo esc_attr( $address_link ); ?>" target="_blank">
			<?php echo esc_attr( $address ); ?><br />
			<?php echo esc_attr( $address2 ); ?></a></p>
	<?php endif; ?>

	<p>&copy; <?php echo esc_attr( gmdate( 'Y' ) ); ?> <?php echo esc_attr( $copyright ) ?: esc_attr( get_bloginfo() ); ?></p>

	<p>Digital Marketing By <a href="https://www.incrediblemarketing.com/" target="_blank"><?php get_template_part( 'components/svg/incredible-marketing' ); ?>Incredible Marketing</a></p>
</footer>

</div><!-- end of .site-wrap -->

<?php wp_footer(); ?>
</body>

</html>
