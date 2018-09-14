<?php
// Enque Parent Theme Style Sheet
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

/**
 * Enqueue Files
 */
// Functions specific to this site.
$located = locate_template( '/inc/theme-customizer.php' );
if( ! empty( $located ) ) {
  get_template_part( '/inc/theme', 'customizer' );
}

// Theme Settings
$located = locate_template( '/inc/theme-settings.php' );
if( ! empty( $located ) ) {
  get_template_part( '/inc/theme', 'settings' );
}

// Site Classes
$located = locate_template( '/inc/site-classes.php' );
if( ! empty( $located ) ) {
  get_template_part( '/inc/site', 'classes' );
}

// Modules specific to this site.
$located = locate_template( '/inc/site-modules.php' );
if( ! empty( $located ) ) {
  get_template_part( '/inc/site', 'modules' );
}

// Functions specific to this site.
$located = locate_template( '/inc/site-functions.php' );
if( ! empty( $located ) ) {
  get_template_part( '/inc/site', 'functions' );
}




/**
 * Filter Defualt Excerpt Length
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function wpdocs_custom_excerpt_length( $length ) {
  return 26;
}

 /**
 * Yoast SEO Breadcrumbs
 */
 function hms_breadcrumbs() {
   if ( function_exists('yoast_breadcrumb') ) {
     yoast_breadcrumb('
     <div id="breadcrumbs">','</div>
     ');
   }
 }


/**
* Remove "Category:" from category titles.
*/
function prefix_category_title( $title ) {
  if ( is_category() OR is_tax() ) {
    $title = single_cat_title( '', false );
  }
  return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );





include_once( get_stylesheet_directory_uri() . '/inc/updater.php' );

$updater = new HMS_Blocks_Updater( __FILE__ );
$updater->set_username( 'michealengland' );
$updater->set_repository( 'hms-blocks' );
// $updater->authorize( 'abcdefghijk1234567890' ); // Your auth code goes here for private repos

$updater->initialize();

require dirname( __FILE__ ) . '/options.php';
