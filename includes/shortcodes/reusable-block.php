<?php
/**
 * Shortcode to display a reusable block
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
 * Shortcode for a specific block to reuse.
 *
 * @param string $atts An id of a reusable block.
 */
function shortcode_reusable_block( $atts ) {
	ob_start();
	$a = shortcode_atts(
		array(
			'id' => null,
		),
		$atts
	);

	if ( have_rows( 'reusable_blocks', 'options' ) ) :
		while ( have_rows( 'reusable_blocks', 'options' ) ) :
			the_row();
			$id = get_sub_field( 'id' );
			if ( $a['id'] == $id ) {
				echo get_template_part( 'components/blocks' );
			}
		endwhile;
	endif;
	return ob_get_clean();
}
add_shortcode( 'reusable_block', 'shortcode_reusable_block' );
