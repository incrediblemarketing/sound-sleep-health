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
<section class="header--image">
	<?php the_post_thumbnail( 'post_large' ); ?>
</section>
<section class="blog--single">
	<div class="row justify-content-center">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
					<div class="col-xl-10 col-12">
						<p class="breadcrumb">News & Updates / <strong><?php echo get_the_title(); ?></strong></p>
					</div>
					<div class="col-xl-8 col-12">
						<?php get_template_part( 'components/post' ); ?>
					</div>
			<?php endwhile; ?> 
		<?php endif; ?>
	</div>
</section>
<section class="block block--recent_blogs">
	<?php get_template_part( 'components/blocks/recent_blogs' ); ?>
</section>
<?php get_footer(); ?>
