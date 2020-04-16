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
		<img src="<?php echo esc_url( $image['sizes']['hero_thumb'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
	</div>
<?php endif; ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xxl-7 content--area">
			<h4><?php echo esc_attr( $header ); ?></h4>
			<h2><?php echo esc_attr( $content_title ); ?></h2>
			<div class="content--box">
				<div class="testimonial--area">
				<?php
				if ( $testimonial ) :
							$post = $testimonial;
							setup_postdata( $post );
					?>
					<div class="quote--area">
						<?php echo the_content(); ?> <strong><?php the_title(); ?></strong>
					</div>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
				</div>
				<div class="review--box">
					<div class="social--box">
						<a href="" target="_blank">
							<h3>Facebook</h3>
							<?php get_template_part( 'components/svg/stars' ); ?>
							<p>18+ reviews</p>
						</a>
					</div>
					<div class="social--box">
						<a href="" target="_blank">
							<h3>Google</h3>
							<?php get_template_part( 'components/svg/stars' ); ?>
							<p>10+ reviews</p>
						</a>
					</div>
					<div class="social--box">
						<a href="" target="_blank">
							<h3>Real Patient Ratings</h3>
							<?php get_template_part( 'components/svg/stars' ); ?>
							<p>24+ reviews</p>
						</a>
					</div>
					<div class="social--box">
						<a href="" target="_blank">
							<h3>Yelp</h3>
							<?php get_template_part( 'components/svg/stars' ); ?>
							<p>16+ reviews</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
