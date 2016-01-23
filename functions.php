<?php 
// Includes bootstrap & customizer settings
require get_template_directory() . '/bootstrap/bootstrap.php';
require get_template_directory() . '/customizer/settings.php';

/**
 * Load site scripts.
 */
function load_theme_scripts() {
	// jQuery
	wp_enqueue_script( 'jquery' );
	
	// Bootstrap
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js' );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
	
	//Main style.css file
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'load_theme_scripts', 1 );

function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );
?>