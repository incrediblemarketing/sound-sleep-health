<?php

	$newerLink = get_previous_posts_link('<i class="far fa-angle-left"></i> Newer');
	$olderLink = get_next_posts_link('Older <i class="far fa-angle-right"></i>');

?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>

	<?php if ( $olderLink || $newerLink ) : ?>

		<nav class="d-flex align-items-center navigation navigation-loop">

			<?php echo $newerLink; ?>
      <?php echo $olderLink; ?>

		</nav>

	<?php endif; ?>

<?php endif; ?>
