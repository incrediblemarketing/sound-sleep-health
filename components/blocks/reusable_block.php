<?php
/**
 * Display Reusable Blocks
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$query_id = get_sub_field( 'id' );

if ( have_rows( 'reusable_blocks', 'options' ) ) :
	while ( have_rows( 'reusable_blocks', 'options' ) ) :
		the_row();
		$block_id = get_sub_field( 'id' );
		if ( $query_id == $block_id ) {
			echo get_template_part( 'components/blocks' );
		}
	endwhile;
endif;
