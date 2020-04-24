<?php
/**
 * Display Page Header Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$content = get_sub_field( 'content' );
$image   = get_sub_field( 'background_image' );

?>

<?php if ( ! empty( $image ) ) : ?>
	<div class="image__holder">
		<img src="<?php echo esc_url( $image['sizes']['hero_thumb'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
	</div>
	<?php else : ?>
		<div class="image__holder">
			<?php echo im_the_placeholder_image( 'hero_thumb' ); ?>
		</div>
<?php endif; ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xxl-5 offset-xl-1 col-xl-6 col-lg-8 col-md-10 column-1">
			<div class="shadow--box"></div>
			<?php echo $content; ?>
			<a href="/request-an-appointment/" class="btn--line">Call or book your appointment online</a>
		</div>
	</div>
</div>
