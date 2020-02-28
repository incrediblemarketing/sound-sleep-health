<?php
/**
 * Single.php
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

get_header(); ?>

<div class="row justify-content-center">
	<div class="col-12 col-lg-7">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'components/post' ); ?>
			<?php endwhile; ?> 
			<?php get_template_part( 'components/navigation-single' ); ?>
		<?php else : ?>
			<?php get_template_part( 'components/post-not-found' ); ?>
		<?php endif; ?>
	</div>
	<div class="col-lg-3">
		<?php get_sidebar( 'blog' ); ?>
	</div>
</div>

<?php get_footer(); ?>
