<?php
/**
 * Display Large Image Background Section with Breadcrumbs
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

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<p class="breadcrumb">Services / <strong><?php echo get_the_title(); ?></strong></p>
		</div>
	</div>
</div>
<div class="container-fluid image--section">
	<?php if ( ! empty( $image ) ) : ?>
		<div class="image__holder">
			<img src="<?php echo esc_url( $image['sizes']['hero_thumb'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
		</div>
		<?php else : ?>
		<div class="image__holder">
			<?php echo im_the_placeholder_image( 'hero_thumb' ); ?>
		</div>
	<?php endif; ?>
	<div class="row">
		<div class="col-xl-5 offset-xl-1 column-1">
			<?php echo $content; ?>
		</div>
	</div>
</div>
