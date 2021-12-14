<?php
/**
 * Дочерняя тема для темы awaken  
 * 
 */

defined( 'ABSPATH' ) || exit;

/**
 * Helper
 */
function show($param){
	echo "<pre>";
	print_r($param);
	echo "</per>";
}

function ds4_scripts_style() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'ds16-style', get_stylesheet_directory_uri() .'/assets/css/ds4.css' );
	wp_enqueue_script( 'ds16-script', get_stylesheet_directory_uri() . '/assets/js/ds4.js', array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'ds4_scripts_style' );


?>