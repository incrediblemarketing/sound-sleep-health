<?php
/**
 * Display Small Page Header Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$image = get_sub_field( 'background_image' );

?>

<?php if ( ! empty( $image ) ) : ?>
	<div class="image__holder">
		<img src="<?php echo esc_url( $image['sizes']['post_large'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
	</div>
	<?php else : ?>
		<div class="image__holder">
			<?php echo im_the_placeholder_image( 'post_large' ); ?>
		</div>
<?php endif; ?>
