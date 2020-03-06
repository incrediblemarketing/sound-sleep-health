<?php
/**
 * Display 404 posts not found error
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
<article class="post-not-found">
	<h1>404 &#8212; Fancy meeting you here!</h1>
	<p>Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.</p>
	<h6>You can return <a href="<?php echo esc_url( home_url() ); ?>/" title="Home">Home</a> or search for the page you were looking for</h6>
	<?php get_search_form(); ?>
</article>
