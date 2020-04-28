<?php
/**
 * Display Site Nav
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

?>

<nav class="site-nav">
	<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php get_template_part( 'components/svg/logo' ); ?>
	</a>

	<?php
	$args = array(
		'theme_location' => 'header-menu',
		'container'      => false,
		'menu_class'     => 'menu',
	);
	wp_nav_menu( $args );
	?>

	<div class="header--right">
		<?php get_template_part( 'components/text' ); ?>
		<div class="line"></div>
		<?php get_template_part( 'components/call' ); ?>
		<div class="line"></div>
		<a href="/request-an-appointment/" class="btn--appointment"><i class="fas fa-envelope"></i><strong>Request an</strong> <span>Appointment</span></a>
		<div class="line"></div>
		<a href="/contact-us/" class="btn-contact"><strong>Leave us</strong> a message</a>
	</div>

	<button data-toggle="menu">
		<span></span>
		<span></span>
		<span></span>
	</button>
</nav>
