<?php

/**
 * -----------------------------------------------------------------------------
 * Configure theme
 * -----------------------------------------------------------------------------
 *
 */

// After setup theme
add_action( 'after_setup_theme', 'bdpn_configure_theme', 9 );

// Configure theme
function bdpn_configure_theme() {

	// Theme support
	add_action( 'after_setup_theme', 'bdpn_theme_support' );

	// Head cleanup
	add_action( 'init', 'bdpn_head_cleanup' );

	// Enqueue assets
	add_action( 'wp_enqueue_scripts', 'bdpn_enqueue_assets' );

	// Image sizes
	add_action( 'init', 'bdpn_image_sizes' );

}

// Theme support
function bdpn_theme_support() {

	// Add menus support
	add_theme_support( 'menus' );

	// Add automatic feed links
	add_theme_support( 'automatic-feed-links' );

	// Add post thumbnails support
	add_theme_support( 'post-thumbnails' );

	// HTML5 support
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

}

// Head cleanup
function bdpn_head_cleanup() {

	// Rsd link
	remove_action( 'wp_head', 'rsd_link' );

	// Windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// Index link
	remove_action( 'wp_head', 'index_rel_link' );

	// Previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

	// Start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

	// Links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

	// WP version
	remove_action( 'wp_head', 'wp_generator' );

}

// Enqueue assets
function bdpn_enqueue_assets() {

	if ( ! is_admin () ) {

		// Asset path format
		$asset_path = get_stylesheet_directory_uri() . '/built/%2$s/%1$s.%2$s';

		// Register webfonts
		wp_register_style( 'bdpn_webfonts', 'http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic|Lancelot' );
		// Register main styles
		wp_register_style( 'bdpn_styles', sprintf( $asset_path, 'styles', 'css' ) );

		// Enqueue webfonts
		wp_enqueue_style( 'bdpn_webfonts' );
		// Enqueue main styles
		wp_enqueue_style( 'bdpn_styles' );

		// Register scripts
		wp_register_script( 'bdpn_scripts', sprintf( $asset_path, 'bdpn.min', 'js' ), array( 'jquery' ) );

		// Enqueue scripts
		wp_enqueue_script( 'bdpn_scripts' );

	}

}

// Images sizes
function bdpn_image_sizes() {

	// Add thumb-medium size
	add_image_size( 'thumb-medium', 780, 400, true );

	// Add thumb-large size
	add_image_size( 'thumb-large', 1024, 525, true );

}

?>
