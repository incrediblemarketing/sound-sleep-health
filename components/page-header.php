<?php

	$post_id = get_the_id();

	if (is_home()) {
		$post_id = get_option('page_for_posts');
	}

	$page_title = get_the_title($post_id);
	if (is_single() && 'team_member' == get_post_type($post_id) ) {
		$page_title = 'Staff';
	}

	$background_image = get_field('page_header_background_image', $post_id) ?: get_field('header_image', 'options');

?>

<header
	class="page-header"
	<?php echo $background_image ? 'data-bg-image="' . $background_image . '"' : ''; ?>
	>
	<h1>
		<?php if ( is_home() ) : ?>
			Blog
		<?php elseif ( is_category() ) : ?>
			Category<br><small><?php single_cat_title(); ?></small>
		<?php elseif ( is_archive() ) : ?>
			Archive<br><small><?php the_archive_title(); ?></small>
		<?php elseif ( is_search() ) : ?>
			Search<br><small>
				<?php
					$allsearch = new WP_Query("s=$s&showposts=-1");
					$key = esc_html($s, 1);
					$count = $allsearch->post_count;
					echo $count . ' ';
					_e('results for ', 'responsive');
					_e('<span class="post-search-terms">', 'responsive');
					echo '&ldquo;';
					echo $key;
					echo '&rdquo;';
					_e('</span><!-- end of .post-search-terms -->', 'responsive');
					wp_reset_query();
				?>
			</small>
		<?php else : ?>
			<?php the_title(); ?>
		<?php endif; ?>
	</h1>
</header>
