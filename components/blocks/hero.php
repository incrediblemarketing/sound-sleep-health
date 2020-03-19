<?php
/**
 * Display Hero Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */


$content                = get_sub_field( 'content' );
$image                  = get_sub_field( 'background_image' );
$business_phone_display = get_field( 'business_phone_display', 'options' );
$business_phone_url     = get_field( 'business_phone_url', 'options' );
?>
<?php if ( ! empty( $image ) ) : ?>
	<div class="image--holder">
		<img src="<?php echo esc_url( $image['sizes']['hero_thumb'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
	</div>
<?php endif; ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xxl-6 offset-xl-1 col-xl-7 col-lg-8">
			<?php echo $content; ?>
			<?php if ( $business_phone_display && $business_phone_url ) : ?>
				<a class="btn btn-primary" href="tel:<?php echo esc_attr( $business_phone_url ); ?>">Call <?php echo esc_attr( $business_phone_display ); ?></a>
			<?php endif; ?>
			<br/>
			<a href="#" class="js-scroll-to">
				<div class="more">
					<div class="line"></div>
					<p>Begin Exploring</p>
				</div>
			</a>
		</div>
	</div>
</div>
