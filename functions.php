<?php

/**
 * Load translation files from your child theme instead of the parent theme
 */
function my_child_theme_locale() {
    load_theme_textdomain( 'paddle', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_child_theme_locale', 90 );

/**
 * Register and enqueue childl theme styles
 *
 * @return void
 */
function enqueue_styles() {
    wp_enqueue_style('paddle-child-style', get_stylesheet_uri(), array('paddle-theme-style'), wp_get_theme()->get('Version'));
}

add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

function rss_post_thumbnail($content) {
global $post;
if (has_post_thumbnail($post->ID)) {
	$content = "\n" . '<p>' . get_the_post_thumbnail($post->ID) . '</p>' . "\n" . get_the_content();
}
return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');

function west_header() {

echo '
 <script type="application/ld+json">
  {
      "@context" : "https://schema.org",
      "@type" : "WebSite",
      "name" : "Dresdens Grüner Westen",
      "alternateName" : "Dresdens Grüner Westen",
      "url" : "https://www.dresden-west.de/"
    }
  </script>
';
};
add_action( 'wp_head', 'west_header' );
