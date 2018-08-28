<?php

function im_register_sidebar_blog() {
  register_sidebar( array(
    'name'          => 'Sidebar Blog',
    'id'            => 'sidebar_blog',
    'before_widget' => '<div class="widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'im_register_sidebar_blog' );
