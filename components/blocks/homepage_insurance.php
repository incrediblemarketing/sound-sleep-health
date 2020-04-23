<?php
/**
 * Display Homepage Insurance Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$content_1    = get_sub_field( 'content_1' );
$page_link    = get_sub_field( 'page_link' );
$logo_gallery = get_sub_field( 'logo_gallery' );

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xl-4 offset-xl-1 content--area">
			<?php echo $content_1; ?>
			<a href="<?php echo $page_link; ?>"	class="btn--circle btn--orange">Learn more</a>
		</div>
		<div class="col-xl-7 logo--area">
			<?php if ( $logo_gallery ) : ?>
				<?php $logo_counter = 1; ?>
				<div class="logo--grid">
					<?php foreach ( $logo_gallery as $image ) : ?>
						<div class="item item-<?php echo esc_attr( $logo_counter ); ?>">
							<img src="<?php echo esc_url( $image['sizes']['medium'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
						</div>
						<?php $logo_counter++; ?>
					<?php endforeach; ?>
					<?php
					for ( $x = 0; $x <= 15; $x++ ) {
						echo "<div class='square'></div>";
					}
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
