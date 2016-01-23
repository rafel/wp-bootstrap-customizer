<?php
/**
 * Include menu builder.
 */
require get_template_directory() . '/bootstrap/php/bootstrapnavmenuwalker.php';
add_action( 'init', 'register_menu' );
function register_menu(){
	register_nav_menu('top-bar', __('Primary Menu'));
}
?>