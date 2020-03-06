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
	$text = get_field( 'business_phone_display', 'options' );
	$tel  = get_field( 'business_phone_url', 'options' );

	if ( $text && $tel ) :
		return '<a href="tel:' . $tel . '">' . $text . '</a>';
	endif;
}
add_shortcode( 'call_number', 'shortcode_call_number' );
