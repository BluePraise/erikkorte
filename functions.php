<?php
// include style css
function load_stylesheets(){
    wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all');
    wp_enqueue_style('stylesheet');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');


// Register navigation menu
register_nav_menu('main-menu', 'Main Menu');
register_nav_menu('footer-menu', 'Footer Menu');


function theme_support() {
    // Add theme support for various features
    add_theme_support('menus', 'post-thumbnails', 'widgets', 'custom-header');
    $defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => false,
    );
	add_theme_support( 'custom-logo', $defaults );
}
add_action('after_setup_theme', 'theme_support');

// acf json save
add_filter('acf/settings/save_json', 'acf_json_save_point');
function acf_json_save_point( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    // return
    return $path;
}