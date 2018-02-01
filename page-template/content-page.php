<?php
	if( have_rows('sections') ):
		while ( have_rows('sections') ) : the_row();
			echo get_template_part('page-template/content', 'page-sections');
		endwhile;
	endif;
?>
