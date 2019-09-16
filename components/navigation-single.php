<?php

	$olderLink = get_next_post_link('%link', '%title <i class="far fa-angle-right"></i>');
	$newerLink = get_previous_post_link('%link', '<i class="far fa-angle-left"></i> %title ');

?>

<?php if ( $olderLink || $newerLink ) : ?>

	<nav class="d-flex align-items-center navigation navigation-single">

		<?php echo $newerLink; ?>
    <?php echo $olderLink; ?>

	</nav>

<?php endif; ?>
