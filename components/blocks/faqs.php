<?php

	$id = get_sub_field('id');

?>

<?php if (have_rows('faqs')) : ?>
	<section class="faqs" id="faqs-<?php echo $id; ?>">

		<?php while (have_rows('faqs')) : the_row(); ?>

			<div class="faq" id="faq-<?php the_sub_field('id'); ?>">

				<h2><?php the_sub_field('question'); ?></h2>
				<?php the_sub_field('answer'); ?>

			</div>

		<?php endwhile; ?>

	</section>
<?php endif; ?>
