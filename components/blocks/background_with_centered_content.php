<?php
/**
 * Display Large Image Background with lifted content
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
$image   = get_sub_field( 'image' );

?>

<?php if ( ! empty( $image ) ) : ?>
	<div class="image__holder">
		<img src="<?php echo esc_url( $image['sizes']['hero_thumb'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
	</div>
<?php else: ?>
		<div class="image__holder">
			<?php echo im_the_placeholder_image('hero_thumb'); ?>
		</div>
<?php endif; ?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-xl-10 column-1">
			<div class="content--area">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
</div>
