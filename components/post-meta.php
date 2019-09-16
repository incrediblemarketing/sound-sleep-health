<div class="post-meta">
	<?php echo get_the_date(); ?> by <?php echo get_the_author(); ?> in 
	<?php
		$categories = get_the_category();
		$output = array();
		foreach ($categories as $category) { 
			$category_link = get_category_link($category->ID);
			$output[] = '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
		}
		echo implode(', ', $output);
	?>
</div>
