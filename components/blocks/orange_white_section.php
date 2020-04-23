<?php
/**
 * Display Orange / White Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$content   = get_sub_field( 'content' );
$content_2 = get_sub_field( 'content_2' );
$image     = get_sub_field( 'image' );

if ( ! empty( $content ) && ! empty( $content_2 ) ) {
	$padding = 'large--padding';
}
?>

<div class="container-fluid orange--bg <?php echo esc_attr( $padding ); ?>">
	<div class="row">
		<div class="col-xl-5 offset-xl-1 col-lg-6 column-1">
			<?php echo $content; ?>
		</div>
		<div class="col-xl-5 col-lg-6 column-2">
			<?php echo $content_2; ?>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 column-3">
			<?php if ( ! empty( $image ) ) : ?>
				<div class="image__holder image--bottom">
					<img src="<?php echo esc_url( $image['sizes']['circle_thumb'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
				</div>
				<?php else : ?>
					<div class="image__holder image--bottom">
						<?php echo im_the_placeholder_image( 'circle_thumb' ); ?>
					</div>
			<?php endif; ?>
		</div>
	</div>
</div>
