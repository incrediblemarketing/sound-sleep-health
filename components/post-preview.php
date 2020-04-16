<?php
/**
 * Display Blog Post Preview
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
	<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( 'Permanent Link to %s', the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
	<p class="post-meta"><?php echo get_the_date(); ?> by <?php echo get_the_author(); ?></p>
	<?php the_excerpt(); ?>
	<a class="btn--line" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( 'Permanent Link to %s', the_title_attribute( 'echo=0' ) ); ?>">Learn more</a>
</article>

