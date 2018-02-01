<?php

$text = get_field('business_phone_display', 'options');
$tel = get_field('business_phone_url', 'options');

?>

<?php if ($text && $tel) : ?>
<a class="btn" href="tel:<?php echo $tel; ?>"><i class="fa fa-phone"></i> <span><?php echo $text; ?></span></a>
<?php endif; ?>