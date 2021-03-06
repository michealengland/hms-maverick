<?php
/**
 * Enqueue Parent Theme Styles
 * Note: a value of null is used in the version number to remove from stylesheet url link. 
 * The minified CSS file is the twentyseventeen CSS File compressed. The parent theme is not minified by default.
 */
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 1 );

function my_theme_enqueue_styles() {
  // serve normal parent-style
  wp_enqueue_style( 'twentyseventeen', get_template_directory_uri() . '/style.css', array(), null, 'all' );
  wp_enqueue_style( 'hms-maverick', get_stylesheet_directory_uri() . '/style.css', array(), null, 'all' );
}

/**
 * Child Theme Text Domain
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function my_child_theme_setup() {
  load_child_theme_textdomain( 'hms-maverick', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_child_theme_setup' );

/**
 * Enqueue Theme Customizer
 * Note: The theme customizer is for re-usable functionality.
 */
$located = locate_template( '/inc/theme-customizer.php' );
if( ! empty( $located ) ) {
  get_template_part( '/inc/theme', 'customizer' );
}

/**
 * Enqueue Theme Settings
 * Note: Theme settings add support for various features including Gutenberg supports.
 */
$located = locate_template( '/inc/theme-settings.php' );
if( ! empty( $located ) ) {
  get_template_part( '/inc/theme', 'settings' );
}
/**
 * Modules Specific to this Site
 * Note: Code added here should be for unique cases for this site.
 */
$located = locate_template( '/inc/site-modules.php' );
if( ! empty( $located ) ) {
  get_template_part( '/inc/site', 'modules' );
}

/**
 * Functions Specific to this Site
 * Note: Code added here should be for unique cases for this site.
 */
$located = locate_template( '/inc/site-functions.php' );
if( ! empty( $located ) ) {
  get_template_part( '/inc/site', 'functions' );
}


/**
 * Enqueue maverick-editor-styles.css for Gutenberg Editor.
 * Note: Plugin specific styles may also be added here for HMS Blocks.
 */
add_action( 'enqueue_block_editor_assets', 'maverick_editor_styles' );

function maverick_editor_styles() {
	wp_enqueue_style(
		'maverick-block-editor-styles',
		get_stylesheet_directory_uri() . '/editor.css',
		array(),
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
	);
}


/**
 * Replace Default Twenty Seventeen Fonts
 * NOTE: You must update font variables in Child SCSS
 */
/*
function hms_replace_fonts() {
  // De-register 2017 Font
  wp_dequeue_style( 'twentyseventeen-fonts' ); // Deregister Stock 2017 Fonts

  // Enque New Font
  wp_enqueue_style( 'hms-twentyseventeen-fonts', 'https://fonts.googleapis.com/css?family=Laila:400,500,600|Source+Sans+Pro:400,400i,700,700i', array(), null );
}

add_action( 'wp_enqueue_scripts', 'hms_replace_fonts', 99 );
*/