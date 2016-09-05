<?php
/**
 *              ~Child theme~
 *
 * Hemingway Rewritten functions and definitions
 *
 * @package Hemingway Rewritten
 */


function titleToUrl($title_str)
{
	$stringURL = strtolower($title_str);
	$stringURL = str_replace(' ', '-', $stringURL); // Converts spaces to dashes
	$stringURL = urlencode($stringURL);

	return $stringURL;
}

add_action( 'wp_enqueue_scripts', 'include_waypoints' );
function include_waypoints() {

	// if ( !is_front_page() )
	// 	return;

	wp_enqueue_script( 'waypoints',
		get_stylesheet_directory_uri() . '/js/waypoints.min.js',
		array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'waypoints-init',
	 	get_stylesheet_directory_uri() .'/js/waypoints-init.js',
	 	array( 'jquery', 'waypoints'), '1.0.0' );

}