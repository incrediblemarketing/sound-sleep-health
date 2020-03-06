<?php
/**
 * Display Post Meta
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

?>
<div class="post-meta">
	<?php echo get_the_date(); ?> by <?php echo get_the_author(); ?> in 
	<?php
		$categories = get_the_category();
		$output     = array();
	foreach ( $categories as $category ) {
		$category_link = get_category_link( $category->ID );
		$output[]      = '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
	}
		echo implode( ', ', $output );
	?>
</div>
