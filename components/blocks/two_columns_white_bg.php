<?php
/**
 * Display Two Columns with White Background
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$content       = get_sub_field( 'content' );
$content_2     = get_sub_field( 'content_2' );
$content_title = get_sub_field( 'title' );

?>

<div class="container-fluid">
	<div class="row justify-content-center">
		<?php if ( $content_title ) : ?>
			<div class="col-xl-10">
				<h2 class="large"><?php echo $content_title; ?></h2>
			</div>
		<?php endif; ?>
		<div class="col-xl-5 col-lg-6 column-1">
			<?php echo $content; ?>
		</div>
		<div class="col-xl-5 col-lg-6 column-2">
			<?php echo $content_2; ?>
		</div>
	</div>
</div>
