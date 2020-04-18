<?php
/**
 * Index.php
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
<?php
$args       = array(
	'post_type'      => 'post',
	'posts_per_page' => 1,
);
$mostrecent = new WP_Query( $args );
?>
<?php if ( $mostrecent->have_posts() ) : ?>
	<?php while ( $mostrecent->have_posts() ) : ?>
		<?php $mostrecent->the_post(); ?>
		<section class="block block--page_header blog--header">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="image__holder">
					<?php the_post_thumbnail( 'hero_thumb' ); ?>
				</div>
			<?php else : ?>
				<div class="image__holder">
					<?php im_the_placeholder_image( 'hero_thumb' ); ?>
				</div>
			<?php endif; ?>
			<div class="shadow--box"></div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-5 offset-xl-1 column-1">
						<h5>Featured Article</h5>
						<h1><?php echo get_the_title(); ?></h1>
						<p class="post-meta"><?php echo get_the_date(); ?> by <?php echo get_the_author(); ?></p>
						<?php echo the_excerpt(); ?>
						<a href="<?php echo get_the_permalink(); ?>" class="btn--line btn--line-orange">Read more</a>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>
<div class="container-fluid blog--roll">
	<div class="row justify-content-center">
		<div class="col-12 col-xl-10">
			<p class="breadcrumb">News & Updates</p>
			<?php wp_reset_query(); ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
						<?php get_template_part( 'components/post-preview' ); ?>
				<?php endwhile; ?>
					<?php im_numeric_posts_nav(); ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
