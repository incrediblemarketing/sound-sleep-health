<?php
/**
 * Display Blocks
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

if ( have_rows( 'blocks' ) ) :
	while ( have_rows( 'blocks' ) ) :
		the_row();
		$layout        = get_row_layout();
		$wrap_as_block = get_sub_field( 'wrap_as_block' );
		$defaults      = get_sub_field( 'defaults' );
		$block         = get_sub_field( 'block' );
		$block_id      = get_sub_field( 'block_id' );
		$block_content = get_sub_field( 'block_content' );

		if ( $wrap_as_block ) {

			$block_class            = get_block_class( $block, $defaults );
			$block_content_class    = get_block_content_class( $block_content, $defaults );
			$block_bg_color         = get_block_bg_color( $block, $defaults );
			$block_content_bg_color = get_block_content_bg_color( $block_content, $defaults );
			$block_bg_image         = get_block_bg_image( $block, $defaults )['sizes']['large'];
			$block_content_bg_image = get_block_content_bg_image( $block_content, $defaults )['sizes']['large'];

			echo '<section id="block-' . esc_attr( $block_id ) . '" class="block block--' . esc_attr( $layout ) . ' ' . esc_attr( $block_class ) . '"';
			echo $block_bg_color ? ' data-bg-color="' . esc_attr( $block_bg_color ) . '"' : '';
			echo $block_bg_image ? ' data-bg-image="' . esc_attr( $block_bg_image ) . '"' : '';
			echo '>';
		}

		echo get_template_part( 'components/blocks/' . $layout );

		if ( $wrap_as_block ) {
				echo get_block_video( $block, $defaults );
			echo '</section>';
		}
	endwhile;
endif;
