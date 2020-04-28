<?php
/**
 * Display Text Number
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

	$text = get_field( 'text_number', 'options' );

?>

<?php if ( $text ) : ?>
	<a class="text" href="sms:<?php echo esc_attr( $text ); ?>">
		<i class="fal fa-mobile-alt"></i>
		<p>Text</p>
	</a>
<?php endif; ?>
