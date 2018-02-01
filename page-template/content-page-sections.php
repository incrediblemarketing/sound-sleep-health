<?php

/* REUSABLE SECTION
================================================*/
if( get_row_layout() == 'reusable_section' ){
  $queryId = get_sub_field('id');

  if (have_rows('reusable_page_sections', 'options')) :
    while ( have_rows('reusable_page_sections', 'options') ) : the_row();
      $id = get_sub_field('id');
      if ($queryId == $id) {
        echo get_template_part('page-template/content', 'page');
      }
    endwhile;
  endif;

/* HERO SECTION
================================================*/
}elseif( get_row_layout() == 'home_slider' ){
	$type = get_sub_field('slider_type');
	$rev = get_sub_field('rev_slider_shortcode');?>
	<div class="row">
		<div class="col-12" id="hero">
			<?php if($type == 'Image'){ ?>
				<img src="<?php echo get_sub_field('slider_bg'); ?>" />
			<?php }elseif($type == 'Rev Slider'){ ?>
				<?php echo do_shortcode($rev); ?>
			<?php }elseif($type == 'Video'){ ?>
				<video poster="<?php echo get_sub_field('slider_bg'); ?>" id="bgvid" playsinline autoplay muted loop>
					<source src="<?php echo get_sub_field('webm_file')['url']; ?>" type="video/webm">
					<source src="<?php echo get_sub_field('mp4_file')['url']; ?>" type="video/mp4">
				</video>
			<?php } ?>

			<div class="inner">			
				<div class="info">
					<?php echo get_sub_field('slide_content'); ?>
				</div>
				<div id="procedures">
					<ul class="owl-carousel owl-theme"><?php
						$featured_procedures = get_sub_field('featured_procedures');
						foreach( $featured_procedures as $procedure ) {
							$title = get_the_title($procedure->ID);?>
							<li class="item">
								<h3><?php echo $title; ?></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer tristique porttitor lacus consectetur tristique. Vivamus malesuada nibh mi, ac faucibus magna condimentum ultrices.</p>
								<a href="<?php the_permalink($procedure->ID); ?>" class="btn btn-green">Read More</a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div><?php 
	
/* PAGE
================================================*/
}elseif( get_row_layout() == 'page' ){ 
	$content = get_sub_field('column_1_content');
	$rc = get_sub_field('row_class');
	$c1c = get_sub_field('column_1_class');
	$bc = get_sub_field('background_color');
	$bg = get_sub_field('background_image');
	$fc = get_sub_field('font_color');
	$fs = get_sub_field('font_size');
	$ta = get_sub_field('text_align');
	$pad = get_sub_field('padding');
	$showSidebar = get_sub_field('show_sidebar');
	if($showSidebar == 1){
		$sideC = get_sub_field('sidebar_content');
		$sideCSS = get_sub_field('sidebar_css');
		$show_gallery = get_sub_field('show_gallery');
		if($show_gallery == 1){
			$gallery_link = get_sub_field('gallery_link');
		}
	}
	
	/* GET DEFAULTS IF NOTHING WAS SELECTED
	================================================*/
	if(!$rc){$rc = get_field('row_class','options');}
	if(!$c1c){$c1c = get_field('column_1_class','options');}
	if(!$bc){$bc = get_field('background_color','options');}
	if(!$bg){$bg = get_field('background_image','options');}
	if(!$fc){$fc = get_field('font_color','options');}
	if(!$fs){$fs = get_field('font_size','options');}
	if(!$ta){$ta = get_field('text_align','options');}
	if(!$pad){$pad = get_field('padding','options');}
	
	echo '<div class="row  ' . $rc . ' sh-row" data-color="'.$fc.'" data-size="'.$fs.'" data-bgc="'.$bc.'" data-bg="'.$bg.'">';
	
		if($showSidebar == 1){
			echo '<div class="col-sm-7 offset-sm-2 col-xs-12 content ' . $c1c . ' ' . $ta . ' sh-col">';
		}else{
			echo '<div class="col-md-8 offset-md-2 col-sm-8 col-xs-12 content ' . $c1c . ' ' . $ta . ' sh-col">';
		}
				if($pad){echo '<div class="'.$pad.'">';}
					echo '<div class="img alignleft">';
						the_post_thumbnail('postslider_thumb', array( 'class' => 'img-responsive' ));
					echo '</div>';
					echo $content;
					echo '<div class="clearfix"></div>';
				if($pad){echo '</div>';}
	
			echo '</div>'; /*end content*/

			if($showSidebar == 1){
				echo '<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar ' . $sideCSS . ' sh-col">';
					echo '<div class="pad-v-md">';

						/*Sidebar Page Menu*/
						$showpages = get_sub_field('show_page_menu');
						if($showpages == 1){
							$parent = get_sub_field('select_parent_page');
							if($parent){
								echo '<h3>'.get_the_title($parent).' Menu</h3>';
								echo '<ul>';
										wp_list_pages( array( 'post_type' => 'page', 'title_li' => '', 'child_of' => $parent, 'depth' => 1 ) );
								echo '</ul>';
							}
						}

						$showprocedures = get_sub_field('show_procedures_menu');
						if($showprocedures == 1){
							echo '<h3>Procedures</h3>';
							echo '<ul class="procedure-menu">';
								if(wp_get_post_parent_id( $post_ID ) == 0){ 
									wp_list_pages( array( 'post_type' => 'procedure', 'title_li' => '', 'depth' => 1 ) );
								}else{
									wp_list_pages( array( 'post_type' => 'procedure', 'title_li' => '', 'child_of' => wp_get_post_parent_id( $post_ID ), 'depth' => 1 ) );
								}
							echo '</ul>';
						}

						$showtestimonials = get_sub_field('show_testimonials_rotator');
						if($showtestimonials == 1){
							$testimonials = get_sub_field('sidebar_testimonials');
							echo '<h3>Testimonials</h3>';
							if( $testimonials ){ ?>
								<div class="owl-carousel owl-theme testimonials-rotator">
									<?php foreach( $testimonials as $post): ?>
										<?php setup_postdata($post); ?>
										<div class="item">
											<?php the_post_thumbnail('thumbnail'); ?>
											<?php the_content(); ?>
											<strong><?php the_title(); ?></strong>
										</div>
									<?php endforeach; ?>
								</div><?php 
								wp_reset_postdata();
							}
						}

						if($gallery_link && $show_gallery == 1){
							echo '<div class="sidebar-gallery">';
								echo '<h3>Gallery</h3>';
								$images = get_field('gallery_images', $gallery_link);

								if( $images ){ ?>
									<ul class="owl-carousel owl-theme mini-gallery">
										<?php foreach( $images as $image ): ?>
											<li class="item"><img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" /></li>
										<?php endforeach; ?>
									</ul>
								<?php } ?>
								<p><small>To view before and after photos from other patients, click the link below.</small></p>
								<a href="<?php the_permalink($gallery_link); ?>" class="btn btn-green">View Patient Gallery</a><?php 
							echo '</div>';
						}

						echo '<div class="sidebar-content">';
							echo $sideC;
						echo '</div>';

					echo '</div>';
				echo '</div>';
			}
	echo '</div>';
	
/* RELATED POSTS
================================================*/
}elseif( get_row_layout() == 'related_posts' ){
	$posts_category = get_sub_field('posts_category');
	$bc = get_sub_field('background_color');
	$fc = get_sub_field('font_color');
	$fs = get_sub_field('font_size');
	$pad = get_sub_field('padding');
	if($posts_category){
		echo '<div class="row graybg">';
			echo '<div class="col-lg-10 col-lg-offset-lg-1 col-md-12 col-sm-12 col-xs-12 related-posts">';
				if($pad){echo '<div class="'.$pad.'">';}
				echo '<h3>' . get_the_title() . ' Articles</h3>';
				echo '<ul class="owl-carousel owl-theme postsslider">';
					global $post;
					$args = array( 'posts_per_page' => -1, 'category' => $posts_category, 'post_status' => 'publish', );
					$myposts = get_posts( $args );
					foreach ( $myposts as $post ) : 
						setup_postdata( $post );
						echo '<li class="item">';
							if(has_post_thumbnail()){ ?>
								<div class="col-lg-4 col-md-3 col-sm-3 col-xs-3 post-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('postslider_thumb'); ?></a></div>
								<div class="col-lg-8 col-md-9 col-sm-9 col-xs-9 post-excerpt">
							<?php }else{ ?>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 excerpt">
							<?php } ?>
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4><?php 
									the_excerpt();
								echo '</div>';
						echo '</li>';
					endforeach;
					wp_reset_postdata();
				echo '</ul>';
				if($pad){echo '</div>';}
			echo '</div>';
		echo '</div>';
	}
	
/* 1 COLUMN SECTION
================================================*/
}elseif( get_row_layout() == '1_column' ){
	$content = get_sub_field('column_1_content');
	$rc = get_sub_field('row_class');
	$c1c = get_sub_field('column_1_class');
	$bc = get_sub_field('background_color');
	$bi = get_sub_field('background_image');
	$fc = get_sub_field('font_color');
	$fs = get_sub_field('font_size');
	$ta = get_sub_field('text_align');
	$pad = get_sub_field('padding');

	echo '<div class="row  ' . $rc . ' " data-bg="'.$bi.'" data-color="'.$fc.'" data-size="'.$fs.'" data-bgc="'.$bc.'">';
		echo '<div class="' . $c1c . ' ' . $ta . '">';
			if($pad){echo '<div class="'.$pad.'">';}
				echo $content;
			if($pad){echo '</div>';}
		echo '</div>';
	echo '</div>';
	
/* 2 COLUMN SECTION
================================================*/
}elseif( get_row_layout() == '2_column' ){
	
	/* Row*/
	$rc = get_sub_field('row_class');
	$rbc = get_sub_field('row_background_color');
	$rbi = get_sub_field('row_background_image');
	
	/*Col 1*/
	$content1 = get_sub_field('column_1_content');
	$c1c = get_sub_field('column_1_class');
	$c1a = get_sub_field('column_1_alignment');
	$c1bc = get_sub_field('col1_background_color');
	$c1bi = get_sub_field('col1_background_image');
	$c1fc = get_sub_field('col1_font_color');
	$c1fs = get_sub_field('col1_font_size');
	$c1ta = get_sub_field('col1_text_align');
	$c1pad = get_sub_field('col1_padding');
	
	/*Col 2*/
	$content2 = get_sub_field('column_2_content');
	$c2c = get_sub_field('column_2_class');
	$c2a = get_sub_field('column_2_alignment');
	$c2bc = get_sub_field('col2_background_color');
	$c2bi = get_sub_field('col2_background_image');
	$c2fc = get_sub_field('col2_font_color');
	$c2fs = get_sub_field('col2_font_size');
	$c2ta = get_sub_field('col2_text_align');
	$c2pad = get_sub_field('col2_padding');
	
	/* Row */
	echo '<div class="row sh-row '.$rc.'" data-bg="'.$rbi.'" data-bgc="'.$rbc.'">';
			/* Col 1 */
			if( $c1a && in_array('Vertical Align', $c1a) ){
				echo '<div class="' . $c1c . ' ' . $c1ta . ' sh-col tbl" data-bg="'.$c1bi.'" data-color="'.$c1fc.'" data-size="'.$c1fs.'" data-bgc="'.$c1bc.'">';
					echo '<div class="inner ' . $c1ta . ' ' . $c1pad . ' ">';
							echo $content1;
					echo '</div>';
				echo '</div>';
			}else{
				echo '<div class="' .$c1c . ' ' . $c1ta . ' sh-col" data-bg="'.$c1bi.'" data-color="'.$c1fc.'" data-size="'.$c1fs.'" data-bgc="'.$c1bc.'">';
					if($c1pad){echo '<div class="'.$c1pad.'">';}
						echo $content1;
					if($c1pad){echo '</div>';}
				echo '</div>';
			}

			/* Col 2 */
			if( $c2a && in_array('Vertical Align', $c2a) ){
				echo '<div class="' . $c2c . ' ' . $c2ta . ' sh-col tbl" data-bg="'.$c2bi.'" data-color="'.$c2fc.'" data-size="'.$c2fs.'" data-bgc="'.$c2bc.'">';
					echo '<div class="inner ' . $c2ta . ' ' . $c2pad . ' ">';
							echo $content2;
					echo '</div>';
				echo '</div>';
			}else{
				echo '<div class="' . $c2c . ' ' . $c2ta . ' sh-col " data-bg="'.$c2bi.'" data-color="'.$c2fc.'" data-size="'.$c2fs.'" data-bgc="'.$c2bc.'">';
					if($c2pad){echo '<div class="'.$c2pad.'">';}
						echo $content2;
					if($c2pad){echo '</div>';}
				echo '</div>';
			}
	
	echo '</div>';
	
/* 3 COLUMN SECTION
================================================*/
}elseif( get_row_layout() == '3_column' ){
	
	/* Row*/
	$rc = get_sub_field('row_class');
	$rbc = get_sub_field('row_background_color');
	$rbi = get_sub_field('row_background_image');
	
	/*Col 1*/
	$content1 = get_sub_field('column_1_content');
	$c1c = get_sub_field('column_1_class');
	$c1a = get_sub_field('column_1_alignment');
	$c1bc = get_sub_field('col1_background_color');
	$c1fc = get_sub_field('col1_font_color');
	$c1fs = get_sub_field('col1_font_size');
	$c1ta = get_sub_field('col1_text_align');
	$c1pad = get_sub_field('col1_padding');
	
	/*Col 2*/
	$content2 = get_sub_field('column_2_content');
	$c2c = get_sub_field('column_2_class');
	$c2a = get_sub_field('column_2_alignment');
	$c2bc = get_sub_field('col2_background_color');
	$c2fc = get_sub_field('col2_font_color');
	$c2fs = get_sub_field('col2_font_size');
	$c2ta = get_sub_field('col2_text_align');
	$c2pad = get_sub_field('col2_padding');
	
	/*Col 3*/
	$content3 = get_sub_field('column_3_content');
	$c3c = get_sub_field('column_3_class');
	$c3a = get_sub_field('column_3_alignment');
	$c3bc = get_sub_field('col3_background_color');
	$c3fc = get_sub_field('col3_font_color');
	$c3fs = get_sub_field('col3_font_size');
	$c3ta = get_sub_field('col3_text_align');
	$c3pad = get_sub_field('col3_padding');
	
	/* Row */
	echo '<div class="row sh-row '.$rc.'" data-bg="'.$rbi.'" data-bgc="'.$rbc.'">';
			/* Col 1 */
			if( $c1a && in_array('Vertical Align', $c1a) ){
				echo '<div class="' . $c1c . ' ' . $c1ta . ' sh-col tbl" data-color="'.$c1fc.'" data-size="'.$c1fs.'" data-bgc="'.$c1bc.'">';
					echo '<div class="inner ' . $c1ta . ' ' . $c1pad . ' ">';
							echo $content1;
					echo '</div>';
				echo '</div>';
			}else{
				echo '<div class="' .$c1c . ' ' . $c1ta . ' sh-col" data-color="'.$c1fc.'" data-size="'.$c1fs.'" data-bgc="'.$c1bc.'">';
					if($c1pad){echo '<div class="'.$c1pad.'">';}
						echo $content1;
					if($c1pad){echo '</div>';}
				echo '</div>';
			}

			/* Col 2 */
			if( $c2a && in_array('Vertical Align', $c2a) ){
				echo '<div class="' . $c2c . ' ' . $c2ta . ' sh-col tbl"  data-color="'.$c2fc.'" data-size="'.$c2fs.'" data-bgc="'.$c2bc.'">';
					echo '<div class="inner ' . $c2ta . ' ' . $c2pad . ' ">';
							echo $content2;
					echo '</div>';
				echo '</div>';
			}else{
				echo '<div class="' . $c2c . ' ' . $c2ta . ' sh-col "  data-color="'.$c2fc.'" data-size="'.$c2fs.'" data-bgc="'.$c2bc.'">';
					if($c2pad){echo '<div class="'.$c2pad.'">';}
						echo $content2;
					if($c2pad){echo '</div>';}
				echo '</div>';
			}
	
			/* Col 3 */
			if( $c3a && in_array('Vertical Align', $c3a) ){
				echo '<div class="' . $c3c . ' ' . $c3ta . ' sh-col tbl"  data-color="'.$c3fc.'" data-size="'.$c3fs.'" data-bgc="'.$c3bc.'">';
					echo '<div class="inner ' . $c3ta . ' ' . $c3pad . ' ">';
							echo $content3;
					echo '</div>';
				echo '</div>';
			}else{
				echo '<div class="' . $c3c . ' ' . $c3ta . ' sh-col " data-color="'.$c3fc.'" data-size="'.$c3fs.'" data-bgc="'.$c3bc.'">';
					if($c3pad){echo '<div class="'.$c3pad.'">';}
						echo $content3;
					if($c3pad){echo '</div>';}
				echo '</div>';
			}
	
	echo '</div>';

/* 4 COLUMN SECTION
================================================*/
}elseif( get_row_layout() == '4_column' ){
	
	/* Row*/
	$rc = get_sub_field('row_class');
	$rbc = get_sub_field('row_background_color');
	$rbi = get_sub_field('row_background_image');
	
	/*Col 1*/
	$content1 = get_sub_field('column_1_content');
	$c1c = get_sub_field('column_1_class');
	$c1a = get_sub_field('column_1_alignment');
	$c1bc = get_sub_field('col1_background_color');
	$c1fc = get_sub_field('col1_font_color');
	$c1fs = get_sub_field('col1_font_size');
	$c1ta = get_sub_field('col1_text_align');
	$c1pad = get_sub_field('col1_padding');
	
	/*Col 2*/
	$content2 = get_sub_field('column_2_content');
	$c2c = get_sub_field('column_2_class');
	$c2a = get_sub_field('column_2_alignment');
	$c2bc = get_sub_field('col2_background_color');
	$c2fc = get_sub_field('col2_font_color');
	$c2fs = get_sub_field('col2_font_size');
	$c2ta = get_sub_field('col2_text_align');
	$c2pad = get_sub_field('col2_padding');
	
	/*Col 3*/
	$content3 = get_sub_field('column_3_content');
	$c3c = get_sub_field('column_3_class');
	$c3a = get_sub_field('column_3_alignment');
	$c3bc = get_sub_field('col3_background_color');
	$c3fc = get_sub_field('col3_font_color');
	$c3fs = get_sub_field('col3_font_size');
	$c3ta = get_sub_field('col3_text_align');
	$c3pad = get_sub_field('col3_padding');
	
	/*Col 4*/
	$content4 = get_sub_field('column_4_content');
	$c4c = get_sub_field('column_4_class');
	$c4a = get_sub_field('column_4_alignment');
	$c4bc = get_sub_field('col4_background_color');
	$c4fc = get_sub_field('col4_font_color');
	$c4fs = get_sub_field('col4_font_size');
	$c4ta = get_sub_field('col4_text_align');
	$c4pad = get_sub_field('col4_padding');
	
	/* Row */
	echo '<div class="row sh-row '.$rc.'" data-bg="'.$rbi.'" data-bgc="'.$rbc.'">';
			/* Col 1 */
			if( $c1a && in_array('Vertical Align', $c1a) ){
				echo '<div class="' . $c1c . ' ' . $c1ta . ' sh-col tbl" data-color="'.$c1fc.'" data-size="'.$c1fs.'" data-bgc="'.$c1bc.'">';
					echo '<div class="inner ' . $c1ta . ' ' . $c1pad . ' ">';
							echo $content1;
					echo '</div>';
				echo '</div>';
			}else{
				echo '<div class="' .$c1c . ' ' . $c1ta . ' sh-col" data-color="'.$c1fc.'" data-size="'.$c1fs.'" data-bgc="'.$c1bc.'">';
					if($c1pad){echo '<div class="'.$c1pad.'">';}
						echo $content1;
					if($c1pad){echo '</div>';}
				echo '</div>';
			}

			/* Col 2 */
			if( $c2a && in_array('Vertical Align', $c2a) ){
				echo '<div class="' . $c2c . ' ' . $c2ta . ' sh-col tbl"  data-color="'.$c2fc.'" data-size="'.$c2fs.'" data-bgc="'.$c2bc.'">';
					echo '<div class="inner ' . $c2ta . ' ' . $c2pad . ' ">';
							echo $content2;
					echo '</div>';
				echo '</div>';
			}else{
				echo '<div class="' . $c2c . ' ' . $c2ta . ' sh-col "  data-color="'.$c2fc.'" data-size="'.$c2fs.'" data-bgc="'.$c2bc.'">';
					if($c2pad){echo '<div class="'.$c2pad.'">';}
						echo $content2;
					if($c2pad){echo '</div>';}
				echo '</div>';
			}
	
			/* Col 3 */
			if( $c3a && in_array('Vertical Align', $c3a) ){
				echo '<div class="' . $c3c . ' ' . $c3ta . ' sh-col tbl"  data-color="'.$c3fc.'" data-size="'.$c3fs.'" data-bgc="'.$c3bc.'">';
					echo '<div class="inner ' . $c3ta . ' ' . $c3pad . ' ">';
							echo $content3;
					echo '</div>';
				echo '</div>';
			}else{
				echo '<div class="' . $c3c . ' ' . $c3ta . ' sh-col " data-color="'.$c3fc.'" data-size="'.$c3fs.'" data-bgc="'.$c3bc.'">';
					if($c3pad){echo '<div class="'.$c3pad.'">';}
						echo $content3;
					if($c3pad){echo '</div>';}
				echo '</div>';
			}
	
			/* Col 4 */
			if( $c4a && in_array('Vertical Align', $c4a) ){
				echo '<div class="' . $c4c . ' ' . $c4ta . ' sh-col tbl"  data-color="'.$c4fc.'" data-size="'.$c4fs.'" data-bgc="'.$c4bc.'">';
					echo '<div class="inner ' . $c4ta . ' ' . $c4pad . ' ">';
							echo $content4;
					echo '</div>';
				echo '</div>';
			}else{
				echo '<div class="' . $c4c . ' ' . $c4ta . ' sh-col " data-color="'.$c4fc.'" data-size="'.$c4fs.'" data-bgc="'.$c3bc.'">';
					if($c4pad){echo '<div class="'.$c4pad.'">';}
						echo $content4;
					if($c4pad){echo '</div>';}
				echo '</div>';
			}
	echo '</div>';

	
/* CALL TO ACTION
================================================*/
}elseif( get_row_layout() == 'call_to_action' ){
	$content = get_sub_field('column_1_content');
	$rc = get_sub_field('row_class');
	$c1c = get_sub_field('column_1_class');
	$bc = get_sub_field('background_color');
	$fc = get_sub_field('font_color');
	$fs = get_sub_field('font_size');
	$ta = get_sub_field('text_align');
	$pad = get_sub_field('padding');
	$bt = get_sub_field('button_text');
	$bu = get_sub_field('button_url');
	echo '<div class="row cta ' . $rc . '" data-color="'.$fc.'" data-size="'.$fs.'" data-bgc="'.$bc.'">';
		echo '<div class="' . $c1c .' ' .$ta  . '">';
			if($pad){echo '<div class="'.$pad.'">';}
				echo $content;
				if($bt && $bu){
					echo '<a href="'.$bu.'" class="btn btn-border" data-color="'.$fc.'">'.$bt.'</a>';
				}
			if($pad){echo '</div>';}
		echo '</div>';
	echo '</div>';
	
/* PROCEDURES ROTATOR
================================================*/
}elseif( get_row_layout() == 'procedures_rotator' ){
	$procedures = get_sub_field('procedures');
	$title = get_sub_field('title');
	$content = get_sub_field('content');
	$rc = get_sub_field('row_class');
	$c1c = get_sub_field('column_1_class');
	$bc = get_sub_field('background_color');
	$fc = get_sub_field('font_color');
	$fs = get_sub_field('font_size');
	$ta = get_sub_field('text_align');
	$pad = get_sub_field('padding');
	$bt = get_sub_field('button_text');
	$bu = get_sub_field('button_url');
	echo '<div class="row procedures ' . $rc . '" data-color="'.$fc.'" data-size="'.$fs.'" data-bgc="'.$bc.'">';
		echo '<div class="' . $c1c .' ' .$ta  . ' sh-col">';
			if($pad){echo '<div class="'.$pad.'">';}
				
				if($title || $content){
					echo '<div class="cover"></div>';
					echo '<div class="info">';
						if($title){
							echo '<h3 class="border">'.$title.'</h3>';
						}	

						if($content){
							echo $content;
						}	
					echo '</div>';
				}
	
				if( $posts ): ?>
					<div class="owl-carousel owl-theme procedures-rotator">
						<?php foreach( $procedures as $post):
							setup_postdata($post); 
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'postslider_thumb', true);
							$thumb_url = $thumb_url_array[0]; ?>
							<div class="item" data-bg="<?php echo $thumb_url; ?>">
								<h3><?php the_title(); ?></h3>
								<a href="<?php the_permalink(); ?>" class="btn btn-border">Read More</a>
							</div>
						<?php endforeach; ?>
					</div><?php 
					wp_reset_postdata();
				endif;
			if($pad){echo '</div>';}
		echo '</div>';
	echo '</div>';
	
/* TESTIMONIALS ROTATOR
================================================*/
}elseif( get_row_layout() == 'testimonials_rotator' ){
	$testimonials = get_sub_field('testimonials');
	$title = get_sub_field('title');
	$rc = get_sub_field('row_class');
	$c1c = get_sub_field('column_1_class');
	$bc = get_sub_field('background_color');
	$fc = get_sub_field('font_color');
	$fs = get_sub_field('font_size');
	$ta = get_sub_field('text_align');
	$pad = get_sub_field('padding');
	$bt = get_sub_field('button_text');
	$bu = get_sub_field('button_url');
	echo '<div class="row sh-row testimonials ' . $rc . '" data-color="'.$fc.'" data-size="'.$fs.'" data-bgc="'.$bc.'">';
		echo '<div class="' . $c1c .' ' .$ta  . ' sh-col">';
			if($pad){echo '<div class="'.$pad.'">';}
				if($title){
					echo '<h3>'.$title.'</h3>';
				}	

				if( $posts ): ?>
					<div class="owl-carousel owl-theme testimonials-rotator">
						<?php foreach( $testimonials as $post): ?>
							<?php setup_postdata($post); ?>
							<div class="item">
								<?php the_post_thumbnail('thumbnail'); ?>
								<?php the_content(); ?>
								<strong><?php the_title(); ?></strong>
							</div>
						<?php endforeach; ?>
					</div><?php 
					wp_reset_postdata();
				endif;
			if($pad){echo '</div>';}
		echo '</div>';
	echo '</div>';	
	
/* FAQS
================================================*/
}elseif( get_row_layout() == 'faqs' ){
	$title = get_sub_field('title');
	$rc = get_sub_field('row_class');
	$c1c = get_sub_field('column_1_class');
	$bc = get_sub_field('background_color');
	$fc = get_sub_field('font_color');
	$fs = get_sub_field('font_size');
	$ta = get_sub_field('text_align');
	$pad = get_sub_field('padding');
	$bt = get_sub_field('button_text');
	$bu = get_sub_field('button_url');
	echo '<div class="row sh-row faqs ' . $rc . '" data-color="'.$fc.'" data-size="'.$fs.'" data-bgc="'.$bc.'">';
		echo '<div class="' . $c1c .' ' .$ta  . ' sh-col">';
			if($pad){echo '<div class="'.$pad.'">';}
				echo '<h3>'.$title.'</h3>';
				if( have_rows('q_a') ):
					echo '<div id="accordion" class="panel-group">';
						$f = 0;
						while ( have_rows('q_a') ) : the_row();
							$q = get_sub_field('question');
							$a = get_sub_field('answer');
							echo '<div class="panel panel-default">';
								echo '<div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$f.'">'.$q.'</a></h4></div>';
								echo '<div id="collapse'.$f.'" class="panel-collapse collapse"><div class="panel-body"><p>'.$a.'</p></div></div>';
							echo '</div>';
						$f++;
						endwhile;
					echo '</div>';
				endif;
			if($pad){echo '</div>';}
		echo '</div>';
	echo '</div>';
} ?>
