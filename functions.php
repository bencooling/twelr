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
  'before_widget' => '<aside id="%1$s" class="well widget %2$s">',
  'after_widget' => '</aside>',
));

/*
 * twelr scripts and styles
 */
add_action('wp_enqueue_scripts', 'twelr_enqueue_scripts');
function twelr_enqueue_scripts() {  

  // jQuery
  wp_enqueue_script('jquery');
  wp_enqueue_script('twelr', get_stylesheet_directory_uri() . '/js/twelr.js', array('jquery'));

  // bootstrap
  wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/resources/bootstrap-2.1.1/js/bootstrap.js', array('jquery'));
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/resources/bootstrap-2.1.1/css/bootstrap.css');

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
    wp_enqueue_style( 'orbit-css', get_stylesheet_directory_uri() . '/js/orbit/orbit-1.2.3.css' );
    wp_enqueue_script( 'orbit-js', get_stylesheet_directory_uri() . '/js/orbit/jquery.orbit-1.2.3.min.js', 'jquery');
  }

}

/**
 * Add submenu class for menu items with sub menus
 */
add_filter('wp_nav_menu_objects', 'twelr_nav_menu_objects');
function twelr_nav_menu_objects($items){
  function hasSubMenu($menu_item_id, $items) {
    foreach ($items as $item) {
      if ($item->menu_item_parent && $item->menu_item_parent==$menu_item_id) return true;
    }
    return false;
  }
  foreach ($items as $item) {
    if (hasSubMenu($item->ID, $items)) {
      array_push($item->classes, 'dropdown');
      $item->target = 'dropdown'; // hack to identify dropdowns when filtering anchors later
      // $item->classes[] = 'dropdown';
    }
  }
  return $items;
}

/**
 * Modify the ul submenu class 
 */
class Twelr_Walker extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
}

/**
 * Modify the anchor element
 */
add_filter('walker_nav_menu_start_el', 'twelr_walker_nav_menu_start_el');
function twelr_walker_nav_menu_start_el($output){
  $output= preg_replace('/<a title="dropdown"/', '<a class="dropdown-toggle" data-toggle="dropdown"', $output, 1);
  return $output;
}

/**
 * Add Home to Pages in Administration > Appearance > Menus
 */
add_filter( 'wp_page_menu_args', 'twelr_page_menu_args' );
function twelr_page_menu_args( $args ) {
  $args['show_home'] = true;
  return $args;
}