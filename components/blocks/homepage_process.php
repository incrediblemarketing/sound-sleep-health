<?php
/**
 * Display Homepage Process Block
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
$image         = get_sub_field( 'image' );

?>

<?php if ( ! empty( $image ) ) : ?>
	<div class="image__holder">
		<img src="<?php echo esc_url( $image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
	</div>
<?php endif; ?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-xxl-10 content--area">
			<h4><?php echo esc_attr( $header ); ?></h4>
			<h2><?php echo esc_attr( $content_title ); ?></h2>
			<div class="grid--timeline">
				<div class="timeline--line"></div>
				<?php if ( have_rows( 'timeline_block' ) ) : ?>
					<?php while ( have_rows( 'timeline_block' ) ) : ?>
						<?php the_row(); ?>
						<?php if ( get_row_layout() === 'single_timeline' ) : ?>
							<?php
								$t_header  = get_sub_field( 'timeline_header' );
								$t_content = get_sub_field( 'content' );
								$t_icon    = get_sub_field( 'icon' );
								$t_image   = get_sub_field( 'Timeline_image' );
							?>
							<div class="timeline--single">
								<div class="timleine--line--small"></div>
								<div class="timeline--inner">
								<div class="timeline--header"><h5><?php echo $t_header; ?></h5></div>
									<?php if ( ! empty( $t_image ) ) : ?>
										<div class="timeline--image">
											<img src="<?php echo esc_url( $t_image['sizes']['timeline_thumb'] ); ?>" alt="<?php echo esc_attr( $t_image['alt'] ); ?>" />
										</div>
									<?php endif; ?>
									<?php if ( ! empty( $t_icon ) ) : ?>
										<div class="timeline--icon">
											<img src="<?php echo esc_url( $t_icon['sizes']['medium'] ); ?>" alt="<?php echo esc_attr( $t_icon['alt'] ); ?>" />
										</div>
									<?php endif; ?>
								<div class="timeline--bottom">
									<?php echo $t_content; ?>
								</div>
								</div>
							</div>
							<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
