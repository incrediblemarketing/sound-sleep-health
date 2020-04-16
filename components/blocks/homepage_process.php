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
$content_1     = get_sub_field( 'content_1' );
$content_2     = get_sub_field( 'content_2' );
$content_3     = get_sub_field( 'content_3' );
$content_4     = get_sub_field( 'content_4' );
$image         = get_sub_field( 'image' );

?>

<?php if ( ! empty( $image ) ) : ?>
	<div class="image__holder">
		<img src="<?php echo esc_url( $image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
	</div>
<?php endif; ?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-xl-10 content--area">
			<h4><?php echo esc_attr( $header ); ?></h4>
			<h2><?php echo esc_attr( $content_title ); ?></h2>
			<div class="grid--content">
				<div class="content--single">
					<?php get_template_part( 'components/svg/analysis' ); ?>
					<h3>Analysis</h3>
					<?php echo $content_1; ?>
				</div>
				<div class="content--single">
					<?php get_template_part( 'components/svg/testing' ); ?>
					<h3>Testing</h3>
					<?php echo $content_2; ?>
				</div>
				<div class="content--single">
					<?php get_template_part( 'components/svg/diagnosis' ); ?>
					<h3>Diagnosis</h3>
					<?php echo $content_3; ?>
				</div>
				<div class="content--single">
					<?php get_template_part( 'components/svg/results' ); ?>
					<h3>Results</h3>
					<?php echo $content_4; ?>
				</div>
			</div>
		</div>
	</div>
</div>
