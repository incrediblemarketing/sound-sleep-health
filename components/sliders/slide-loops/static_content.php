<?php if (have_rows('slides')) : ?>
	<div class="slides swiper-wrapper <?php echo $slider_config['classes']['slider_wrapper']; ?>">
		<?php while (have_rows('slides')) : the_row(); ?>
			<?php
				$slide_id = get_sub_field('id');
				$slide_content = get_sub_field('content');
				$slide_bg = get_sub_field('background');
				$slide_bg_color = $slide_bg['color'];
				$slide_bg_image = $slide_bg['image'];
			?>
			<div
				class="slide swiper-slide <?php echo $slider_config['classes']['slide']; ?>"
				id="slide-<?php echo $slide_id; ?>"
				<?php echo $slide_bg_color ? 'data-bg-color="' . $slide_bg_color . '"' : ''; ?>
				<?php echo $slide_bg_image ? 'data-bg-image="' . $slide_bg_image['sizes']['large'] . '"' : ''; ?>
				>

				<div class="slide-content <?php echo $slider_config['classes']['slide_content']; ?>">

					<?php

						$slide_template = $slider_config['templates']['slide_content'] ?: 'components/sliders/slide-templates/static_content';
						$slide_template .= '.php';

						include ( locate_template( $slide_template, false, false ) );

					?>

				</div>

				<?php echo get_background_video($slide_bg); ?>
				
			</div>
		<?php endwhile; ?>
	</div>
<?php endif; ?>
