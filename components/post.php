<?php
/**
 * Display Blog Post
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
<article class="post row justify-content-center" id="post-<?php the_ID(); ?>">
	<div class="col-12">
			<h1><?php the_title(); ?></h1>
			<h5>By <?php echo esc_attr( get_the_author_meta( 'nickname' ) ); ?></h5>
			<h6>Published on <?php echo get_the_date( 'F j, Y' ); ?></h6>
			<div class="background__full">
				<div class="image__holder">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'post_large', array( 'class' => 'img-fluid' ) ); ?>
					<?php else : ?>
						<?php im_the_placeholder_image( 'post_large', '' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<div class="col-md-10 col-12">
		<?php the_content(); ?>
	</div> 
</article>
