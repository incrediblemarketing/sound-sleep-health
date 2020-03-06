<?php
/**
 * Mobile Menu Display
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
<section class="menu__mobile">
	<a class="site__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php get_template_part( 'components/svg/logo' ); ?>
	</a>
	<button data-toggle="menu">
		<span></span>
		<span></span>
	</button>
	<?php
		$args = array(
			'theme_location' => 'header-menu',
			'container'      => false,
			'menu_class'     => 'menu',
		);
		wp_nav_menu( $args );
		?>
	<hr />
	<?php get_template_part( 'components/social-icons' ); ?>
</section>
