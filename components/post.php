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
			<p class="post-meta"><?php echo get_the_date(); ?> by <?php echo get_the_author(); ?></p>
			<?php the_content(); ?>
	</div> 
</article>
