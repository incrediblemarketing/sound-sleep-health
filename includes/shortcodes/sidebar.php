<?php
/**
 * Shortcode to display sidebar
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
 * Get a specific sidebar location
 *
 * @param string $atts A sidebar location.
 */
function shortcode_sidebar( $atts ) {
	ob_start();
	$a = shortcode_atts(
		array(
			'location' => null,
		),
		$atts
	);

	get_sidebar( $a['location'] );

	return ob_get_clean();
}
add_shortcode( 'sidebar', 'shortcode_sidebar' );
