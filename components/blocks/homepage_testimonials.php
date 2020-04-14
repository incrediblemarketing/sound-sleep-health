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

$content_title = get_sub_field( 'content_title' );
$header        = get_sub_field( 'content_header' );
$testimonial   = get_sub_field( 'testimonial' );
$image         = get_sub_field( 'image' );

?>

<?php if ( ! empty( $image ) ) : ?>
	<div class="image__holder">
		<img src="<?php echo esc_url( $image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
	</div>
<?php endif; ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xxl-6">
			<h4><?php echo esc_attr( $header ); ?></h4>
			<h2><?php echo esc_attr( $content_title ); ?></h2>
			<div class="content--box">
				<div class="testimonial--area">
					<?php echo $testimonial; ?>
				</div>
				<div class="review--box">
					<div class="social--box">
						<h3>Facebook</h3>
						
					</div>
					<div class="social--box"></div>
					<div class="social--box"></div>
					<div class="social--box"></div>
				</div>
			</div>
		</div>
	</div>
</div>
