<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

add_action( 'wp_enqueue_scripts', 'pax_styles' );
function pax_styles() {
    wp_enqueue_style('main', get_stylesheet_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('page', get_stylesheet_directory_uri() . '/assets/css/page.css');
    wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/assets/css/slick.css');
}

add_action( 'wp_enqueue_scripts', 'jquery_script_method' );
function jquery_script_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), null, false );
    wp_enqueue_script( 'jquery' );
}

add_action('wp_enqueue_scripts', 'pax_script_method');
function pax_script_method(){
    wp_enqueue_script('fullpage', get_template_directory_uri() . '/assets/js/fullpage.min.js', array(), null, true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.js', array(), null, true);
    wp_enqueue_script('main' , get_template_directory_uri() . '/assets/js/main.js', array(), null, true);
    wp_enqueue_script('pagejs' , get_template_directory_uri() . '/assets/js/page.js', array(), null, true);
}