<?php
/**
 * Shortcode to display all services
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
 * Services shortcode [all-services]
 */
function shortcode_services() {
	global $post;

	$args = array(
		'post_type'      => 'procedure',
		'posts_per_page' => -1,
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
	);

	$services = new WP_Query( $args );
	$content  = '<ul class="list--services">';
	if ( $services->have_posts() ) :
		while ( $services->have_posts() ) :
			$services->the_post();
			$content .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
		endwhile;
		wp_reset_postdata();
	endif;
	$content .= '</ul>';

	return $content;
}
add_shortcode( 'all-services', 'shortcode_services' );
