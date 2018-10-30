<?php 
	$copyright = get_field('copyright', 'option');
	$address = get_field('business_street_address', 'option');
	$address2 = get_field('business_city_state_zip', 'option');
	$addressLink = get_field('business_address_link', 'option');
	$phone = get_field('business_phone_display', 'option');
	$phoneURL = get_field('business_phone_url', 'option');
?>

	<footer class="footer bg-light">

		<?php get_template_part('components/social-icons'); ?>

		<?php if ($phoneURL && $phone) : ?>
			<p><a href="tel:<?php echo $phoneURL; ?>"><?php echo $phone; ?></a></p>
		<?php endif; ?>

		<?php if ($addressLink && $address && $address2) : ?>
			<p><a href="<?php echo $addressLink; ?>" target="_blank">
				<?php echo $address; ?><br/>
				<?php echo $address2; ?></a></p>
		<?php endif; ?>

		<p>&copy; <?php echo date('Y'); ?> <?php echo $copyright ?: get_bloginfo(); ?></a></p>

		<p>Digital Marketing By <a href="http://www.incrediblemarketing.com/" target="_blank"><?php get_template_part('components/svg/incredible-marketing'); ?>Incredible Marketing</a></p>

	</footer>

</div><!-- end of .site-wrap -->

		<?php wp_footer(); ?>
	</body>
</html>