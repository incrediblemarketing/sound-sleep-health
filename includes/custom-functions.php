<?php
/**
 * Custom Functions
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
 * Check if blog page
 */
function im_is_blog() {
	return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag() ) && 'post' === get_post_type();
}

/**
 * Get top level page id.
 */
function get_top_level_id() {
	$ancestors = get_ancestors( get_the_ID(), 'page' );

	$top_level_id = end( $ancestors );
	if ( ! $top_level_id ) :
		$top_level_id = get_the_ID();
	endif;

	return $top_level_id;
}

/**
 * Get child page menu.
 *
 * @param int $top_level_id Top Level ID.
 * @param int $current_page_id Current page ID.
 */
function get_child_page_menu( $top_level_id = null, $current_page_id = null ) {

	if ( ! $top_level_id ) {
		$top_level_id = get_top_level_id();
	}
	if ( ! $current_page_id ) {
		$current_page_id = get_the_ID();
	}

	$args = array(
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'post_parent'    => $top_level_id,
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
	);

	$parent = new WP_Query( $args );

	$html = '';

	if ( $parent->have_posts() ) {

		$html .= '<ul>';

		while ( $parent->have_posts() ) {
			$parent->the_post();
			$html .= get_the_ID() === $current_page_id ? '<li class="current-menu-item">' : '<li>';
			$html .= '<a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a>';
			$html .= get_child_page_menu( get_the_ID(), $current_page_id );
			$html .= '</li>';
		}

		$html .= '</ul>';
	}
	wp_reset_postdata();

	return $html;
}

/**
 * Get background video
 *
 * @param array $bg_object Array of the object that will be used as a background video.
 */
function get_background_video( $bg_object ) {
	ob_start();
	$bg_image             = isset( $bg_object['image']['sizes']['large'] ) ? $bg_object['image']['sizes']['large'] : '';
	$has_video_background = isset( $bg_object['video_background'] ) ? $bg_object['video_background'] : '';
	$video_object         = isset( $bg_object['video'] ) ? $bg_object['video'] : null;
	?>
	<?php if ( $has_video_background ) : ?>
		<?php if ( $video_object['mp4'] || $video_object['ogv'] || $video_object['webm'] ) : ?>
				<div class="bg-video">
					<video
			<?php echo $bg_image ? 'poster="' . esc_url( $bg_image['sizes']['large'] ) . '"' : ''; ?>
						playsinline autoplay muted loop>
			<?php foreach ( $video_object as $file_type => $file ) : ?>
				<?php if ( ! empty( $file ) ) : ?>
								<source src="<?php echo esc_url( $file['url'] ); ?>" type="video/<?php echo esc_attr( $file_type ); ?>">
				<?php endif; ?>
			<?php endforeach; ?>
					</video>
				</div>
		<?php endif; ?>
	<?php endif; ?>
	<?php
	return ob_get_clean();
}

/**
 * Get Block Class
 *
 * @param array  $block Block that you are adding classes to.
 * @param array  $defaults Default array of classes.
 * @param string $element Element block.
 */
function get_block_class( $block, $defaults, $element = 'block' ) {

	$result_class   = array();
	$default_class  = array();
	$this_class     = explode( ' ', $block['class'] );
	$default_method = isset( $defaults['method'] ) ? $defaults['method'] : 0;
	$default_source = isset( $defaults['im_dynamic_element_default_source'] ) ? $defaults['im_dynamic_element_default_source'] : 0;

	if ( 'global' === $default_source ) {
		$default_class = explode( ' ', get_field( 'global_block_defaults', 'options' )[ $element ]['class'] );
	} else {
		if ( have_rows( 'custom_block_defaults', 'options' ) ) {
			while ( have_rows( 'custom_block_defaults', 'options' ) ) {
				the_row();
				if ( get_sub_field( 'id' ) === $default_source ) {
					$default_class = explode( ' ', get_sub_field( $element )['class'] );
				}
			}
		}
	}

	// merge or replace default_class with this_class depending on method.
	switch ( $default_method ) {
		case 'use':
			$result_class = $default_class;
			break;
		case 'merge':
			$result_class = array_unique( array_merge( $default_class, $this_class ) );
			break;
		default:
			$result_class = $this_class;
	}

	return implode( ' ', $result_class );

}

/**
 * Get Block Content Class
 *
 * @param array $block Block that you are adding classes to.
 * @param array $defaults Default array of classes.
 */
function get_block_content_class( $block, $defaults ) {
	return get_block_class( $block, $defaults, 'block_content' );
}

/**
 * Get Block Video
 *
 * @param array  $block Block that you are adding classes to.
 * @param array  $defaults Default array of classes.
 * @param string $element Element block.
 */
function get_block_video( $block, $defaults, $element = 'block' ) {
	$default_method    = isset( $defaults['method'] ) ? $defaults['method'] : 0;
	$default_source    = isset( $defaults['im_dynamic_element_default_source'] ) ? $defaults['im_dynamic_element_default_source'] : 0;
	$this_bg_object    = isset( $block['background'] ) ? $block['background'] : null;
	$default_bg_object = array();
	$result_bg_object  = array();

	if ( 'global' === $default_source ) {
		$default_bg_object = get_field( 'global_block_defaults', 'options' )[ $element ]['background'];
	} else {
		if ( have_rows( 'custom_block_defaults', 'options' ) ) {
			while ( have_rows( 'custom_block_defaults', 'options' ) ) {
				the_row();
				if ( get_sub_field( 'id' ) === $default_source ) {
					$default_bg_object = get_sub_field( $element )['background'];
				}
			}
		}
	}

	switch ( $default_method ) {
		case 'use':
			$result_bg_object = $default_bg_object;
			break;
		default:
			$result_bg_object = $this_bg_object;
	}

	return get_background_video( $result_bg_object );
}

/**
 * Get Block Content Video
 *
 * @param array $block Block that you are adding classes to.
 * @param array $defaults Default array of classes.
 */
function get_block_content_video( $block, $defaults ) {
	return get_block_video( $block, $defaults, 'block_content' );
}

/**
 * Get Block Background Color
 *
 * @param array  $block Block that you are adding classes to.
 * @param array  $defaults Default array of classes.
 * @param string $element Element block.
 */
function get_block_bg_color( $block, $defaults, $element = 'block' ) {
	$default_method   = isset( $defaults['method'] ) ? $defaults['method'] : 0;
	$default_source   = isset( $defaults['im_dynamic_element_default_source'] ) ? $defaults['im_dynamic_element_default_source'] : 0;
	$this_bg_color    = isset( $block['background']['color'] ) ? $block['background']['color'] : null;
	$default_bg_color = '';
	$result_bg_color  = '';

	if ( 'global' === $default_source ) {
		$default_bg_color = get_field( 'global_block_defaults', 'options' )[ $element ]['background']['color'];
	} else {
		if ( have_rows( 'custom_block_defaults', 'options' ) ) {
			while ( have_rows( 'custom_block_defaults', 'options' ) ) {
				the_row();
				if ( get_sub_field( 'id' ) === $default_source ) {
					$default_bg_color = get_sub_field( $element )['background']['color'];
				}
			}
		}
	}

	switch ( $default_method ) {
		case 'use':
			$result_bg_color = $default_bg_color;
			break;
		default:
			$result_bg_color = $this_bg_color;
	}

	return $result_bg_color;
}

/**
 * Get Block Content Background Color
 *
 * @param array $block Block that you are adding classes to.
 * @param array $defaults Default array of classes.
 */
function get_block_content_bg_color( $block, $defaults ) {
	return get_block_bg_color( $block, $defaults, 'block_content' );
}

/**
 * Get Block Image
 *
 * @param array  $block Block that you are adding classes to.
 * @param array  $defaults Default array of classes.
 * @param string $element Element block.
 */
function get_block_bg_image( $block, $defaults, $element = 'block' ) {
	$default_method   = isset( $defaults['method'] ) ? $defaults['method'] : 0;
	$default_source   = isset( $defaults['im_dynamic_element_default_source'] ) ? $defaults['im_dynamic_element_default_source'] : 0;
	$this_bg_image    = isset( $block['background']['image'] ) ? $block['background']['image'] : null;
	$default_bg_image = '';
	$result_bg_image  = '';

	if ( 'global' === $default_source ) {
		$default_bg_image = get_field( 'global_block_defaults', 'options' )[ $element ]['background']['image'];
	} else {
		if ( have_rows( 'custom_block_defaults', 'options' ) ) {
			while ( have_rows( 'custom_block_defaults', 'options' ) ) {
				the_row();
				if ( get_sub_field( 'id' ) === $default_source ) {
					$default_bg_image = get_sub_field( $element )['background']['image'];
				}
			}
		}
	}

	switch ( $default_method ) {
		case 'use':
			$result_bg_image = $default_bg_image;
			break;
		default:
			$result_bg_image = $this_bg_image;
	}

	return $result_bg_image;
}

/**
 * Get Block Content Image
 *
 * @param array $block Block that you are adding classes to.
 * @param array $defaults Default array of classes.
 */
function get_block_content_bg_image( $block, $defaults ) {
	return get_block_bg_image( $block, $defaults, 'block_content' );
}

/**
 * Enqueue Slide Assets
 */
function enqueue_slider_assets() {
	wp_enqueue_style( 'swiper' );
	wp_enqueue_script( 'swiper' );
}

/**
 * Move Page Admin Menu Item
 */
function move_page_admin_menu_item() {
	global $menu;

	foreach ( $menu as $key => $value ) {
		if ( 'edit.php?post_type=page' === $value[2] ) {
			$oldkey = $key;
		}
	}

	$newkey = 4; // use whatever index gets you the position you want.
	// if this key is in use you will write over a menu item!
	$menu[ $newkey ] = $menu[ $oldkey ];
	$menu[ $oldkey ] = array();

}
add_action( 'admin_menu', 'move_page_admin_menu_item' );

/**
 * Change sort order (checking for gallery)
 *
 * @param array $query Query $args that will be changing.
 */
function my_change_sort_order( $query ) {
	if ( is_archive( 'gallery' ) ) :
		$query->set( 'order', 'ASC' );
		$query->set( 'orderby', 'menu_order' );
		$query->set( 'posts_per_page', '-1' );

	endif;
};
add_action( 'pre_get_posts', 'my_change_sort_order' );

/**
 * Call to get gallery info (AJAX)
 */
function get_gallery_info() {
	global $wpdb;

	if ( wp_verify_nonce( sanitize_key( $_GET['taxid'] ) ) ) {
		$taxid = $_GET['taxid'];
	}
	if ( 0 === $taxid ) {
		$terms = get_terms( 'gallery_procedures' );
		$taxid = wp_list_pluck( $terms, 'term_id' );
	}
	$args = array(
		'post_type'      => 'gallery',
		'tax_query'      => array(
			array(
				'taxonomy' => 'gallery_procedures',
				'field'    => 'term_id',
				'terms'    => $taxid,
			),
		),
		'order'          => 'ASC',
		'orderby'        => 'menu_title',
		'posts_per_page' => -1,
	);

	$patients = new WP_Query( $args );

	ob_start();
	while ( $patients->have_posts() ) :
		$patients->the_post();
		get_template_part( 'components/gallery-preview' );
	endwhile;

	echo esc_html( ob_get_clean() );

	wp_die();
}

add_action( 'wp_ajax_get_gallery_info', 'get_gallery_info' );
add_action( 'wp_ajax_nopriv_get_gallery_info', 'get_gallery_info' );


/* Custom number pagination */

function im_numeric_posts_nav() {
	if ( is_singular() ) {
		return;
	}

	global $wp_query;

	/**
 * Stop execution if there's only 1 page
*/
	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**
 * Add current page to the array
*/
	if ( $paged >= 1 ) {
		$links[] = $paged;
	}

	/**
 * Add the pages around the current page to the array
*/
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="blog-pagination">';

	/**
 * Link to first page, plus ellipses if necessary
*/
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="pagination-bullet pagination-bullet-active"' : '';

		printf( '<span%s class="pagination-bullet"><a href="%s"><span>%s</span></a></span>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
	}

	/**
 * Link to current page, plus 2 pages in either direction if necessary
*/
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="pagination-bullet pagination-bullet-active"' : '';
		printf( '<span%s class="pagination-bullet"><a href="%s"><span>%s</span></a></span>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**
 * Link to last page, plus ellipses if necessary
*/
	if ( ! in_array( $max, $links ) ) {
		$class = $paged == $max ? ' class="pagination-bullet pagination-bullet-active"' : '';
		printf( '<span%s class="pagination-bullet"><a href="%s"><span>%s</span></a></span>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	echo '</div>';

}


function pagination_bar( $custom_query ) {

	$total_pages = $custom_query->max_num_pages;
	$big = 999999999;

	if ($total_pages > 1){
			$current_page = max(1, get_query_var('paged'));

			echo paginate_links(array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => $current_page,
					'total' => $total_pages,
					'prev_text' => '<i class="fal fa-long-arrow-left"></i>',
  				'next_text' => '<i class="fal fa-long-arrow-right"></i>'
			));
	}
}