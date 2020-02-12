<section class="menu__mobile">
    <a class="site__logo" href="<?php echo esc_url(home_url('/')); ?>">
        <?php get_template_part('components/svg/logo'); ?>
    </a>
    <button data-toggle="menu">
      <span></span>
      <span></span>
    </button>

    <?php $args = array(
        'theme_location'  => 'header-menu',
        'container'       => false,
        'menu_class'      => 'menu'
    );
    wp_nav_menu($args); ?>
    <hr />
    <?php get_template_part('components/social-icons'); ?>
</section>