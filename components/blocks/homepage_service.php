<?php
/**
 * Display Homepage Service Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$content      = get_sub_field( 'content' );
$content_link = get_sub_field( 'content_link' );
$top_image    = get_sub_field( 'top_image' );
$bottom_image = get_sub_field( 'bottom_image' );

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xxl-6 column-1">
			<?php if ( ! empty( $top_image ) ) : ?>
				<div class="image__holder image--top">
					<img src="<?php echo esc_url( $top_image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $top_image['alt'] ); ?>" />
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $bottom_image ) ) : ?>
				<div class="image__holder image--bottom">
					<img src="<?php echo esc_url( $bottom_image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $bottom_image['alt'] ); ?>" />
				</div>
			<?php endif; ?>
		</div>
		<div class="col-xxl-5 column-2">
			<?php echo $content; ?>
			<a href="<?php echo esc_url( $content_link ); ?>" class="btn--circle"><strong class="line"></strong>Learn more</a>
		</div>
	</div>
</div>
