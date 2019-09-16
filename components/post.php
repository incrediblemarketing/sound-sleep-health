<article class="post" id="post-<?php the_ID(); ?>">

	<?php if (has_post_thumbnail()) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			<?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
		</a>
	<?php endif; ?>

	<h1><?php the_title(); ?></h1>

	<?php get_template_part('components/post-meta'); ?>
	
	<?php the_content(); ?>

	<?php if (current_user_can('editor')) : ?>
		<footer>
			<div class="post-edit"><?php edit_post_link('Edit'); ?></div> 
		</footer>
	<?php endif; ?>
		
</article>
