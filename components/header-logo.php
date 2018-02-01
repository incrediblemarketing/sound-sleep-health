<?php
	$image = get_field('logo_image', 'option');
	$type = get_field('logo_type', 'option');
	$text = get_field('logo_text', 'option');
	$link = get_field('logo_url', 'option');
	$site_name = get_bloginfo('name');
?>
<div id="logo"><?php 
	if ($image && $type == 'Image'):
		if($link): ?>
			<a href="<?php echo $link; ?>"><img src="<?php echo $image; ?>" class="logo" /></a><?php 
		endif;
	else: ?>
		<h1 class="mb-0"><?php 
			if ($link) : ?>
				<a href="<?php echo $link; ?>"><?php echo $text ? $text : $site_name; ?></a><?php 
			else : 
				echo $text ? $text : $site_name;
			endif; ?>
		</h1><?php 
	endif; ?>
</div>