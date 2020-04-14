<?php
/**
 * Display Text Number
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

	$business_location      = get_field( 'business_location', 'options' )[0];
	$business_phone_display = $business_location['business_phone_display'];
	$business_phone_url     = $business_location['business_phone_url'];

?>

<?php if ( $business_phone_display && $business_phone_url ) : ?>
	<a class="text" href="sms:<?php echo esc_attr( $business_phone_url ); ?>">
		<i class="fal fa-mobile-alt"></i>
	</a>
<?php endif; ?>
