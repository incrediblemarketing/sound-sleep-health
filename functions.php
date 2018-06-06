<?php
/*

TABLE OF CONTENTS
-------------------------------------------
1. REGISTER MENUS
2. ENQUEUE / REGISTER JAVASCRIPT/CSS FILES
3. INCREDIBLE THEME OPTIONS ADMIN
4. CUSTOM IMAGE SIZES
5. CUSTOM FUNCTIONS
6. DYNAMIC CSS
7. RECOMMENDED/REQUIRED PLUGINS

*/

//Initialize the update checker.
require 'assets/theme-updates/theme-update-checker.php';
$example_update_checker = new ThemeUpdateChecker(
    'incredibletheme',
    'https://imcustomtheme.wpengine.com/incredible.json'
);

function cptui_register_my_cpts() {

  /**
   * Post Type: Testimonials.
   */

  $labels = array(
    "name" => __( 'Testimonials', '' ),
    "singular_name" => __( 'Testimonial', '' ),
  );

  $args = array(
    "label" => __( 'Testimonials', '' ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => false,
    "rest_base" => "",
    "has_archive" => true,
    "show_in_menu" => true,
    "exclude_from_search" => false,
    "capability_type" => "page",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "rewrite" => array( "slug" => "testimonial", "with_front" => true ),
    "query_var" => true,
    "menu_icon" => "dashicons-testimonial",
    "supports" => array( "title", "editor" ),
  );

  register_post_type( "testimonial", $args );

  /**
   * Post Type: Procedures.
   */

  $labels = array(
    "name" => __( 'Procedures', '' ),
    "singular_name" => __( 'Procedure', '' ),
  );

  $args = array(
    "label" => __( 'Procedures', '' ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => false,
    "rest_base" => "",
    "has_archive" => false,
    "show_in_menu" => true,
    "exclude_from_search" => false,
    "capability_type" => "page",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "rewrite" => array( "slug" => "procedure", "with_front" => false ),
    "query_var" => true,
    "menu_icon" => "dashicons-index-card",
    "supports" => array( "title", "editor", "thumbnail", "page-attributes", "post-formats" ),
  );

  register_post_type( "procedure", $args );

  /**
   * Post Type: Galleries.
   */

  $labels = array(
    "name" => __( 'Galleries', '' ),
    "singular_name" => __( 'Gallery', '' ),
  );

  $args = array(
    "label" => __( 'Galleries', '' ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => false,
    "rest_base" => "",
    "has_archive" => false,
    "show_in_menu" => true,
    "exclude_from_search" => false,
    "capability_type" => "page",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "rewrite" => array( "slug" => "gallery", "with_front" => true ),
    "query_var" => true,
    "supports" => array( "title", "thumbnail", "page-attributes", "post-formats" ),
  );

  register_post_type( "gallery", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );



/* 1. REGISTER MENUS
===========================================================================*/
  function register_my_menus() {
    register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
    );
  }
  add_action( 'init', 'register_my_menus' );

/* 2. ENQUEUE / REGISTER SCRIPT & CSS FILES
===========================================================================*/
  function add_theme_scripts() {
    wp_register_style( 'style', get_template_directory_uri() . '/style.css' );
    wp_register_style( 'tetherstyle', get_template_directory_uri() . '/assets/tether-1.3.3/dist/css/tether.min.css');
    wp_register_style( 'bootstrapstyle', get_template_directory_uri() . '/assets/Bootstrap/css/bootstrap.min.css');
    wp_register_style( 'owlstyle', get_stylesheet_directory_uri() . '/assets/OwlCarousel/assets/owl.carousel.min.css');
    wp_register_style( 'owltheme', get_stylesheet_directory_uri() . '/assets/OwlCarousel/assets/owl.theme.default.min.css');
    wp_register_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css');

    wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.2.3.min.js');
    wp_register_script( 'tether', get_template_directory_uri() . '/assets/tether-1.3.3/dist/js/tether.min.js');
    wp_register_script( 'owlcarousel', get_stylesheet_directory_uri() . '/assets/OwlCarousel/owl.carousel.min.js', array('jquery'), '4.8', true);
    
    wp_register_script( 'map','https://maps.googleapis.com/maps/api/js?key=&v=3.exp');
    wp_register_script( 'gmaps', get_stylesheet_directory_uri() . '/assets/GMaps/gmaps.min.js');
    wp_register_script( 'bootstrap', get_template_directory_uri() . '/assets/Bootstrap/js/bootstrap.min.js');
    wp_register_script( 'incredible', get_template_directory_uri() . '/js/incredible.js');
    
    wp_enqueue_style('tetherstyle');
    wp_enqueue_style('bootstrapstyle');
    wp_enqueue_style('owlstyle');
    wp_enqueue_style('owltheme');
    wp_enqueue_style('fontawesome');
    wp_enqueue_style('style');
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('tether');
    wp_enqueue_script('owlcarousel');
    wp_enqueue_script('map');
    wp_enqueue_script('gmaps');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('incredible');
  }
  add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/* 3. INCREDIBLE THEME OPTIONS ADMIN
===========================================================================*/
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title'  => 'Incredible Options',
      'menu_title'  => 'Incredible Options',
      'menu_slug'   => 'theme-general-settings',
      'capability'  => 'edit_posts',
      'redirect'    => false,
      //'icon_url' => 'dashicons-images-alt2',
    ));
  }

  function custom_menu_order( $menu_ord ) {     
    if (!$menu_ord) return true;  
    $menu = 'theme-general-settings';
    $menu_ord = array_diff($menu_ord, array( $menu ));
    array_splice( $menu_ord, 1, 0, array( $menu ) );
    return $menu_ord;
  }  
  add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order  
  add_filter('menu_order', 'custom_menu_order');

/* 4. CUSTOM IMAGE SIZES
===========================================================================*/
  add_image_size('procedure_thumb', 320, 320, true);
  add_image_size('featured_thumb', 480, 350, true);
  add_image_size('parent_thumb', 650, 650, true);
  add_image_size('gallery_thumb', 365, 365, true);
  add_image_size('postslider_thumb', 480, 650, true);

  function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
      'procedure_thumb' => __( 'Procedure Thumbnail' ),
      'featured_thumb' => __( 'Featured Thumbnail' ),
      'parent_thumb' => __( 'Parent Thumbnail' ),
      'gallery_thumb' => __( 'Gallery Thumbnail' ),
      'postslider_thumb' => __( 'Post Slider Thumbnail' )
    ));
  }
  add_filter( 'image_size_names_choose', 'my_custom_sizes' );

/* 5. CUSTOM FUNCTIONS
===========================================================================*/
function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

// ADD READ MORE BUTTON ON EXCERPT
function new_excerpt_more($more) {
       global $post;
  return '<a class="read-more" href="'. get_permalink($post->ID) . '">Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// ADD WIDGET 
function incredible_widgets_init() {

  register_sidebar( array(
    'name'          => 'Blog Sidebar',
    'id'            => 'blog_sidebar',
    'before_widget' => '<div class="widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'incredible_widgets_init' );

function incredible_custom_excerpts($limit) {
    return wp_trim_words(get_the_excerpt(), $limit, '...');
}

add_theme_support( 'post-thumbnails' ); //Add Featured Images

function phone_number(){
  $text = get_field('business_phone_display', 'options');
  $tel = get_field('business_phone_url', 'options');
  
  if ($text && $tel) : 
    return '<a href="tel:'.$tel.'">'.$text.'</a>';
  endif;
}
add_shortcode('call_number', 'phone_number');

function reusable_page_section($atts) {
  ob_start();
  $a = shortcode_atts( array(
    'id' => null
  ), $atts );

  if (have_rows('reusable_page_sections', 'options')) :
    while ( have_rows('reusable_page_sections', 'options') ) : the_row();
      $id = get_sub_field('id');
      if ($a['id'] == $id) {
        echo get_template_part('components/sections');
      }
    endwhile;
  endif;
  return ob_get_clean();
}
add_shortcode('reusable_page_section', 'reusable_page_section');

function hook_cf7tyGoal() {
  ?>
  <script>
    document.addEventListener( 'wpcf7mailsent', function ( event ) {
      ga( 'send', 'event', 'Contact Form', 'submit' );
                                                 location = '/thank-you/';
    }, false );

  </script>
  <?php
}
add_action( 'wp_head', 'hook_cf7tyGoal' );

/* 6. DYNAMIC CSS
===========================================================================*/
function dynamic_enqueue_scripts() {
    wp_enqueue_style(
        'dynamic-css',
        admin_url( 'admin-ajax.php' ) . '?action=dynamic_css_action',
        array( 'style' ),
        null
    );
}
function dynamic_css_loader() {
    require_once dirname( __FILE__ ) . '/css/dynamic-css.php';
    exit;
}
add_action( 'wp_enqueue_scripts', 'dynamic_enqueue_scripts' );
add_action( 'wp_ajax_dynamic_css_action', 'dynamic_css_loader' );
add_action( 'wp_ajax_nopriv_dynamic_css_action', 'dynamic_css_loader' );

/* 7. RECOMMENDED/REQUIRED PLUGINS
===========================================================================*/

require_once get_template_directory() . '/plugins/TGM-Plugin-Activation-2.6.1/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'incredible__register_required_plugins' );

function incredible__register_required_plugins() {

  $plugins = array(

    array(
      'name'               => 'Advanced Custom Fields Pro',
      'slug'               => 'advanced-custom-fields-pro',
      'source'             => get_template_directory() . '/plugins/advanced-custom-fields-pro.zip',
      'external_url'       => 'https://www.advancedcustomfields.com/pro/',
      'required'           => true,
    ),

    array(
      'name'               => 'Gravity Forms',
      'slug'               => 'gravityforms',
      'source'             => get_template_directory() . '/plugins/gravityforms_2.2.6.1.zip',
      'external_url'       => 'https://www.gravityforms.com/',
      'required'           => true,
    ),

    array(
      'name'      => 'All in One SEO Pack',
      'slug'      => 'all-in-one-seo-pack',
      'required'  => true,
    ),

    array(
      'name'               => 'WPMU DEV Dashboard',
      'slug'               => 'wpmudev-updates',
      'source'             => get_template_directory() . '/plugins/wpmudev-updates.zip',
      'external_url'       => 'https://premium.wpmudev.org/project/wpmu-dev-dashboard/',
      'required'           => false,
    ),

    array(
      'name'      => 'Custom Post Type UI',
      'slug'      => 'custom-post-type-ui',
      'required'  => false,
    ),

    array(
      'name'      => 'GatherContent Plugin',
      'slug'      => 'gathercontent-import',
      'required'  => false,
    ),

  );

  $config = array(
    'id'           => 'incredibletheme',       // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'themes.php',            // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                   // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => true,                    // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.
  );

  tgmpa( $plugins, $config );
}
