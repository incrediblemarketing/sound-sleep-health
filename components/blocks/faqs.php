<?php
/**
 * Display FAQs
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

	$pageid = get_sub_field( 'id' );

?>

<?php if ( have_rows( 'faqs' ) ) : ?>
	<section class="faqs" id="faqs-<?php echo esc_attr( $pageid ); ?>">
		<?php while ( have_rows( 'faqs' ) ) : ?>
			<?php the_row(); ?>
			<div class="faq" id="faq-<?php the_sub_field( 'id' ); ?>">
				<h2><?php the_sub_field( 'question' ); ?></h2>
				<?php the_sub_field( 'answer' ); ?>
			</div>
		<?php endwhile; ?>
	</section>
<?php endif; ?>
