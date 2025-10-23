<?php
/**
 * Theme Functions and Definitions
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function skate_spots_setup() {
    
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(800, 600, true);
    
    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'skate-spots'),
        'footer'  => __('Footer Menu', 'skate-spots'),
    ));
    
    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'skate_spots_setup');

/**
 * Enqueue scripts and styles
 */
function skate_spots_scripts() {
    
    // Enqueue main stylesheet
    wp_enqueue_style('skate-spots-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue custom scripts (if needed)
    // wp_enqueue_script('skate-spots-script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'skate_spots_scripts');

/**
 * Register widget areas
 */
function skate_spots_widgets_init() {
    
    register_sidebar(array(
        'name'          => __('Sidebar', 'skate-spots'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'skate-spots'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer', 'skate-spots'),
        'id'            => 'footer-1',
        'description'   => __('Add footer widgets here.', 'skate-spots'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'skate_spots_widgets_init');

/**
 * Custom excerpt length
 */
function skate_spots_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'skate_spots_excerpt_length');

/**
 * Custom excerpt more text
 */
function skate_spots_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'skate_spots_excerpt_more');