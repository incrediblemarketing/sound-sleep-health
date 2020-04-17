<?php
/**
 * Display Single Column Orange Background
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$content = get_sub_field( 'content' );

?>
<div class="lines--area">
	<div class="lines"></div>
	<div class="lines"></div>
	<div class="lines"></div>
	<div class="lines"></div>
	<div class="lines"></div>
</div>
<div class="container-fluid image--section">
	<div class="row justify-content-center">
		<div class="col-xl-8">
			<?php echo $content; ?>
			<div class="line"></div>
		</div>
	</div>
</div>
