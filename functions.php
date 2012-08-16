<?php

/*
 * overriding twentyeleven action and filter hooks
 */
add_action( 'after_setup_theme', 'twelc_child_theme_setup', 11 );
function twelc_child_theme_setup() {
  remove_action( 'admin_menu', 'twentyeleven_theme_options_add_page' );
  remove_custom_image_header();
  remove_custom_background();
  remove_action( 'customize_register', 'twentyeleven_customize_register' );
}


/*
 * twelc scripts and styles
 */
add_action('wp_enqueue_scripts', 'twelc_enqueue_scripts');
function twelc_enqueue_scripts() {  wp_enqueue_script('jquery');

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


