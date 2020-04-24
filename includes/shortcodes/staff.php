<?php
/**
 * Shortcode to display staff members
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
 * Staff member shortcode [staff]
 */
function shortcode_staff() {
	global $post;

	$args = array(
		'post_type'      => 'team_member',
		'posts_per_page' => -1,
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
	);

	$staff   = new WP_Query( $args );
	$content = '';
	if ( $staff->have_posts() ) :
		while ( $staff->have_posts() ) :
			$staff->the_post();
			$content .= '<div class="block__team-member">';
			$content .= get_the_post_thumbnail( $post->ID, 'featured_thumb' );
			$content .= '<h2>' . get_the_title() . '</h2>';
			$content .= '<h5>' . get_field( 'position' ) . '</h5>';
			$content .= get_the_content();
			$content .= '</div>';
			endwhile;
		wp_reset_postdata();
		endif;

	return $content;
}
add_shortcode( 'staff', 'shortcode_staff' );
