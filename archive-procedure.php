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
<section class="block block--small_page_header">
	<?php get_template_part('components/blocks/small_page_header'); ?>
</section>

<div class="container-fluid procedure--archive">
	<div class="row justify-content-center">
		<div class="col-12 col-xl-10">
			<h1>Sleep Disorders</h1>
			<?php if ( have_posts() ) : ?>
				<div class="article--grid">
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
						<article class="post-preview" id="post-<?php the_ID(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
									<?php the_post_thumbnail( 'blog_preview_thumb' ); ?>
								</a>
							<?php else : ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
									<?php im_the_placeholder_image( 'blog_preview_thumb' ); ?>
								</a>
							<?php endif; ?>
							<div class="content--area">
								<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( 'Permanent Link to %s', the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
								<a class="btn--line" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( 'Permanent Link to %s', the_title_attribute( 'echo=0' ) ); ?>">Read more</a>
							</div>
						</article>
				<?php endwhile; ?>
				</div>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
