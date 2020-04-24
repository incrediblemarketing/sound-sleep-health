<?php
/**
 * Shortcode to display call number
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

/**
 * Display call phone number shortcode [call_number]
 */
function shortcode_call_number() {
	$business_location = get_field( 'business_info', 'options' )[0];
	$text              = $business_location['business_phone_display'];
	$tel               = $business_location['business_phone_url'];

	if ( $text && $tel ) :
		return '<a href="tel:' . $tel . '">' . $text . '</a>';
	endif;
}
add_shortcode( 'call_number', 'shortcode_call_number' );
