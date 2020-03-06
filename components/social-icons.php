<?php
/**
 * Display social icons
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$social_icon_class_map = array(
	'facebook'   => 'fab fa-facebook-f',
	'instagram'  => 'fab fa-instagram',
	'pinterest'  => 'fab fa-pinterest-p',
	'twitter'    => 'fab fa-twitter',
	'linkedin'   => 'fab fa-linkedin-in',
	'youtube'    => 'fab fa-youtube',
	'vimeo'      => 'fab fa-vimeo-v',
	'googleplus' => 'fab fa-google-plus-g',
	'yelp'       => 'fab fa-yelp',
	'call'       => 'fas fa-phone',
	'email'      => 'fas fa-envelope',
	'location'   => 'fas fa-map-marker-alt',
);
?>

<?php if ( have_rows( 'social_icons', 'option' ) ) : ?>
	<ul class="social-icons d-flex">
		<?php
		while ( have_rows( 'social_icons', 'option' ) ) :
			the_row();
			?>
			<li><a href="<?php echo esc_attr( get_sub_field( 'social_url' ) ); ?>" target="_blank">
				<i class="<?php echo esc_attr( $social_icon_class_map[ get_sub_field( 'social_icon' ) ] ); ?>" aria-hidden="true"></i>
			</a></li>
		<?php endwhile; ?>
	</ul>
<?php endif; ?>
