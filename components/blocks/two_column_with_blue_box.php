<?php
/**
 * Display Two Columns with Blue Background
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$content   = get_sub_field( 'content' );
$content_2 = get_sub_field( 'content_2' );
?>
<div class="box--blue"></div>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-xl-5 col-lg-6 ">
			<?php echo $content; ?>
		</div>
		<div class="col-xl-5 col-lg-6 content-2">
			<?php echo $content_2; ?>
		</div>
	</div>
</div>
