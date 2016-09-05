<?php
/**
 *              ~Child theme~
 *
 * Hemingway Rewritten functions and definitions
 *
 * @package Hemingway Rewritten
 */

function include_menu_updater() {

    if ( is_home() || is_admin() )
        return;

    wp_enqueue_script('menu-updater',
        get_stylesheet_directory_uri() . '/js/menu-updater.js', array('jquery'), '1.0.0' );

}
add_action('wp_enqueue_scripts', 'include_menu_updater');

function include_waypoints() {

    // if ( !is_front_page() )
    //  return;



    wp_enqueue_script( 'waypoints',
        get_stylesheet_directory_uri() . '/js/waypoints.min.js',
        array( 'jquery' ), '1.0.0' );
    wp_enqueue_script( 'waypoints-init',
        get_stylesheet_directory_uri() .'/js/waypoints-init.js',
        array( 'jquery', 'waypoints'), '1.0.0' );

}
add_action( 'wp_enqueue_scripts', 'include_waypoints' );

function include_app() {

    wp_enqueue_script( 'app',
        get_stylesheet_directory_uri() .'/js/app.js',
        array( 'jquery' ), '1.0.0' );

}
add_action( 'wp_enqueue_scripts', 'include_app' );

function include_colorbox() {

    wp_enqueue_style( 'colorbox-style', get_stylesheet_directory_uri() . '/colorbox-style.css');
    wp_enqueue_script( 'colorbox',
        get_stylesheet_directory_uri() .'/js/jquery.colorbox-min.js',
        array( 'jquery' ), '1.0.0' );

    wp_enqueue_script( 'colorbox-init',
            get_stylesheet_directory_uri() .'/js/colorbox-init.js',
            array( 'jquery', 'colorbox' ), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'include_colorbox' );

function titleToUrl($title_str)
{
    $stringURL = strtolower($title_str);
    $stringURL = str_replace(' ', '-', $stringURL); // Converts spaces to dashes
    $stringURL = urlencode($stringURL);

    return $stringURL;
}

function codeToMessage($code) {
    switch ($code) {
        case UPLOAD_ERR_INI_SIZE:
            $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
            break;
        case UPLOAD_ERR_PARTIAL:
            $message = "The uploaded file was only partially uploaded";
            break;
        case UPLOAD_ERR_NO_FILE:
            $message = "No file was uploaded";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $message = "Missing a temporary folder";
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $message = "Failed to write file to disk";
            break;
        case UPLOAD_ERR_EXTENSION:
            $message = "File upload stopped by extension";
            break;

        default:
            $message = "Unknown upload error";
            break;
    }
    return $message;
}

require_once('contact-form.php');