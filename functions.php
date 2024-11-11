<?php
// include style css
function load_stylesheets(){
    wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all');
    wp_enqueue_style('stylesheet');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

// theme init
function theme_init(){
    add_theme_support('menus');
    register_nav_menu('main-menu', 'Main Menu');
}
add_action('init', 'theme_init');
