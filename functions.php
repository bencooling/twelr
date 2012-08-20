<?php

/*
 * overriding twentyeleven action and filter hooks
 */
add_action( 'after_setup_theme', 'twelr_child_theme_setup', 11 );
function twelr_child_theme_setup() {
  remove_theme_support('custom-header');
  remove_theme_support('custom-background');
  remove_action('admin_menu', 'twentyeleven_theme_options_add_page');
  remove_action('customize_register', 'twentyeleven_customize_register');
  
  // remove sidebar & ephemera widget
  remove_action( 'widgets_init', 'twentyeleven_widgets_init' );
}

// register two nav_menus: primary and footer
register_nav_menus(array('primary' => 'Primary','footer' => 'Footer'));

// register single sidebar: sidebar
register_sidebar(array(
  'name' => __( 'Sidebar' ),
  'id' => 'side',
  'description' => __( 'Widgets in this area will be shown on the side.' ),
  'before_title' => '<h6>',
  'after_title' => '</h6>',
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
));

/*
 * twelr scripts and styles
 */
add_action('wp_enqueue_scripts', 'twelr_enqueue_scripts');
function twelr_enqueue_scripts() {  

  // jQuery
  wp_enqueue_script('jquery');

  // bootstrap
  wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/resources/bootstrap/js/bootstrap.js', array('jquery'));
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/resources/bootstrap/css/bootstrap.css');

  // reveal
  wp_enqueue_script('reveal', get_stylesheet_directory_uri() . '/js/reveal/jquery.reveal.js', array('jquery'));
  wp_enqueue_style('reveal', get_stylesheet_directory_uri() . '/js/reveal/reveal.css');

  // thickbox
  wp_enqueue_style('thickbox');
  wp_enqueue_script('thickbox');
  
  // slimbox
  wp_enqueue_script('slimbox2', get_stylesheet_directory_uri() . '/js/slimbox2/script.js', array('jquery'));
  wp_enqueue_style('slimbox2', get_stylesheet_directory_uri() . '/js/slimbox2/style.css');
  
  // orbit
  if (is_page_template('home.php') || is_page_template('gallery.php')){  // page template specific
    wp_enqueue_style( 'orbit-css', get_stylesheet_directory_uri() . '/orbit/orbit-1.2.3.css' );
    wp_enqueue_script( 'orbit-js', get_stylesheet_directory_uri() . '/orbit/jquery.orbit-1.2.3.min.js', 'jquery');
  }

}


