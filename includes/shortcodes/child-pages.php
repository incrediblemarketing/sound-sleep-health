<?php
/**
 * Shortcode to display child pages
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
 * Child page shortcode [child_pages]
 */
function shortcode_child_pages() {
	ob_start();
	get_template_part( 'components/navigation-child-pages' );
	return ob_get_clean();
}
add_shortcode( 'child_pages', 'shortcode_child_pages' );
