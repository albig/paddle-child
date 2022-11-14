<?php

/**
 * Load translation files from your child theme instead of the parent theme
 */
function my_child_theme_locale() {
    load_child_theme_textdomain( 'paddle', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_child_theme_locale' );

/**
 * Register and enqueue childl theme styles
 *
 * @return void
 */
function enqueue_styles() {
    wp_enqueue_style('paddle-child-style', get_stylesheet_uri(), array('paddle-theme-style'), wp_get_theme()->get('Version'));
}

add_action( 'wp_enqueue_scripts', 'enqueue_styles' );


