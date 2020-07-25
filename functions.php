<?php
/**
 * Functions and Definitions
 *
 * This document contains the custom functions and definitions for various WordPress
 * theme functionality.
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */

/**
 * Register Styles & Scripts
 *
 * The code below registers custom WordPress styles using wp_register_style()
 * function.
 *
 * @since Gucci 1.0
 */

function gucci_styles() {
	// load fonts
	wp_enqueue_style('gucci-font', 'https://fonts.googleapis.com/css?family=Crimson+Pro:400,400i,700|Montserrat:500,600,700,800&display=swap');
	// syntax highlighter
	wp_enqueue_style('gucci-syntax-style', get_template_directory_uri() . '/library/libs/prism.css');
	wp_enqueue_script('gucci-syntax', get_template_directory_uri() . '/library/libs/prism.js', array(), '1.0', true);

	// Load main stylesheet
	wp_enqueue_style('gucci-style', get_template_directory_uri() . '/style.css');
	// Load main javascript
	wp_enqueue_script('gucci-script', get_template_directory_uri() . '/library/js/functions.min.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'gucci_styles');

/**
 * Enqueue block editor style
 */
function gucci_block_editor_styles() {
    wp_enqueue_style( 'gucci-editor-styles', get_theme_file_uri( 'editor-styles.css' ), false, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'gucci_block_editor_styles' );

/**
 * Register Features
 *
 * The code below registers custom WordPress theme features using
 * add_theme_support() function.
 *
 * @since Gucci 1.0
 */

function gucci_features() {
	// Support title tag
	add_theme_support('title-tag');
	// Support featured images
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'gucci_features');

/**
 * Register Menus
 *
 * The code below registers custom WordPress menus using register_my_menus()
 * function.
 *
 * @since Gucci 1.0
 */

function gucci_register_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'gucci_register_menus' );

/**
 * Register support for Gutenberg wide alignment
 */
function gucci_setup() {
  add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'gucci_setup' );


/**
 * Advanced Custom Fields Settings
 *
 * The code below adds and adjusts various functionality for the Advanced Custom
 * Fields PRO plugin.
 *
 * @since Gucci 1.0
 */

if( function_exists('acf_add_options_page') ) {
	// Theme settings
	acf_add_options_page( array(
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'parent_slug' => 'themes.php'
	));
}


/**
 * Custom Post Types
 *
 * @since Gucci 1.0
 */

function custom_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Projects', 'Post Type General Name', 'annacantrell' ),
        'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'annacantrell' ),
        'menu_name'           => __( 'Projects', 'annacantrell' ),
        'parent_item_colon'   => __( 'Parent Project', 'annacantrell' ),
        'all_items'           => __( 'All Projects', 'annacantrell' ),
        'view_item'           => __( 'View Project', 'annacantrell' ),
        'add_new_item'        => __( 'Add New Project', 'annacantrell' ),
        'add_new'             => __( 'Add New', 'annacantrell' ),
        'edit_item'           => __( 'Edit Project', 'annacantrell' ),
        'update_item'         => __( 'Update Project', 'annacantrell' ),
        'search_items'        => __( 'Search Project', 'annacantrell' ),
        'not_found'           => __( 'Not Found', 'annacantrell' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'annacantrell' ),
    );

// Set other options for Custom Post Type
    $args = array(
        'label'               => __( 'projects', 'annacantrell' ),
        'description'         => __( 'Development Projects', 'annacantrell' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'tech' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'show_in_rest'        => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
		'menu_icon'           => 'dashicons-edit',
        'capability_type'     => 'page',
    );

    // Registering your Custom Post Type
    register_post_type( 'projects', $args );

}
add_action( 'init', 'custom_post_type', 0 );

/**
 * Returns the SVG code of an asset
 * @param string $key - A key that represents a specific SVG file/asset
 * @return string - The code of the SVG file/asset
*/
function get_svg($key) {
	$content = 'none';
	$file = get_stylesheet_directory().'/library/media/svg/'.$key.'.svg';
	if(file_exists($file)) {
		$content = file_get_contents($file);
	}
	return $content;
}


// call back function to retrieve meta
function slug_get_post_meta_cb( $object, $field_name, $request ) {
  return get_post_meta( $object[ 'id' ], $field_name );
}
// process the estimated time to read in minutes
function get_read_estimate($post_id) {
 	$content_post = get_post($post_id);
 	$content = $content_post->post_content;
 	$content = apply_filters('the_content', $content);
 	$content = str_replace(']]>', ']]&gt;', $content);
 	$word_count = str_word_count( strip_tags( $content ) );
 	$raw_estimate = $word_count / 200;
 	$estimate = round($raw_estimate) > 0 ? round($raw_estimate) : 1;
 	return $estimate;
}
// Update estimate meta value on post save
function add_read_estimate_meta( $post_id ) {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	$estimate = get_read_estimate($post_id);
	update_post_meta( $post_id, "read_estimate", $estimate);
}
add_action( 'save_post', 'add_read_estimate_meta' );


// Include blocks
require_once('library/theme-functions/acf-blocks.php');
