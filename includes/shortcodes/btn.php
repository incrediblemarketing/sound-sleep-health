<?php
/**
 * Shortcode for a button
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
 * Shortcode to display a button
 *
 * @param array $atts Can contain post_id, url, target, class, text strings to display a button.
 */
function shortcode_btn( $atts ) {

	$a = shortcode_atts(
		array(
			'post_id' => null,
			'url'     => null,
			'target'  => null,
			'class'   => 'btn-primary',
			'text'    => 'Read More',
		),
		$atts
	);

	$link_atts = array(
		'href'  => '#',
		'class' => 'btn ' . $a['class'],
	);

	if ( $a['post_id'] ) {
		$link_atts['href'] = get_permalink( $a['post_id'] );
	} elseif ( $a['url'] ) {
		$link_atts['href'] = $a['url'];
	}

	if ( $a['target'] ) {
		$link_atts['target'] = $a['target'];
	}

	$output = '<a';
	foreach ( $link_atts as $att => $val ) {
		$output .= ' ' . $att . '="' . $val . '"';
	}
	$output .= '>' . $a['text'];

	if ( strpos( $a['class'], 'btn-lg-link' ) !== false ) {
		ob_start();
		get_template_part( 'components/svg/icon-long-arrow-right-solid' );
		$output .= ob_get_clean();
	}

	$output .= '</a>';

	return $output;
}
add_shortcode( 'btn', 'shortcode_btn' );
