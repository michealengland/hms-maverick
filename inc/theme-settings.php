<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;


 function hms_mav_setup_theme_support() {


  add_theme_support( 'editor-color-palette', array(
    array(
      'name' => __( 'Color 1', 'hms-maverick' ),
      'slug' => 'color-1',
      'color' => '#00263e',
    ),
    array(
      'name' => __( 'Color 2', 'hms-maverick' ),
      'slug' => 'color-2',
      'color' => '#d15e14',
    ),
    array(
      'name' => __( 'Color 3', 'hms-maverick' ),
      'slug' => 'color-3',
      'color' => '#73c3d5',
    ),
    array(
      'name' => __( 'Color 4', 'hms-maverick' ),
      'slug' => 'color-4',
      'color' => '#decc62',
    ),
    array(
      'name' => __( 'Color 5', 'hms-maverick' ),
      'slug' => 'color-5',
      'color' => '#8c837b',
    ),
    array(
      'name' => __( 'Color 6', 'hms-maverick' ),
      'slug' => 'color-6',
      'color' => '#b4aca4',
    ),
    array(
      'name' => __( 'Color 7', 'hms-maverick' ),
      'slug' => 'color-7',
      'color' => '#222222',
    ),

    array(
      'name' => __( 'White', 'hms-maverick' ),
      'slug' => 'white',
      'color' => '#ffffff',
    ),
  ) );


    // Optin to Block Styles
    add_theme_support( 'wp-block-styles' );

    // Add Align Full, Wide Settings
    add_theme_support( 'align-wide' );
    
    // Disable Custom Colors in Blocks
    //add_theme_support( 'disable-custom-colors' );

}

/**
 * Conditionally Add Gutenberg Color Swatches to the Editor
 */
add_action( 'after_setup_theme', 'hms_mav_setup_theme_support' );


function get_active_swatches() {

  $hms_gutenberg_pallete = array();

  $swatch_1 = get_theme_mod('hms_gutenberg_color_1');
  
  if( ! empty($swatch_1)  ) {
    $hms_gutenberg_pallete[] = array( 
      'name' => __( 'Color 1', 'hms-maverick' ),
      'slug' => 'color-1',
      'color' => get_theme_mod('hms_gutenberg_color_1'),
    );
  }
  
  
  $swatch_2 = get_theme_mod('hms_gutenberg_color_2');
  
  if( ! empty($swatch_2) ) {
    $hms_gutenberg_pallete[] = array( 
      'name' => __( 'Color 2', 'hms-maverick' ),
      'slug' => 'color-2',
      'color' => get_theme_mod('hms_gutenberg_color_2'),
    );
  }

  
  $swatch_3 = get_theme_mod('hms_gutenberg_color_3');
  
  if( ! empty($swatch_3) ) {
    $hms_gutenberg_pallete[] = array( 
      'name' => __( 'Color 3', 'hms-maverick' ),
      'slug' => 'color-3',
      'color' => get_theme_mod('hms_gutenberg_color_3'),
    );
  }

  $swatch_4 = get_theme_mod('hms_gutenberg_color_4');
  
  if( ! empty($swatch_4) ) {
    $hms_gutenberg_pallete[] = array( 
      'name' => __( 'Color 4', 'hms-maverick' ),
      'slug' => 'color-4',
      'color' => get_theme_mod('hms_gutenberg_color_4'),
    );
  }

  $swatch_5 = get_theme_mod('hms_gutenberg_color_5');
  
  if( ! empty($swatch_5) ) {
    $hms_gutenberg_pallete[] = array( 
      'name' => __( 'Color 5', 'hms-maverick' ),
      'slug' => 'color-5',
      'color' => get_theme_mod('hms_gutenberg_color_5'),
    );
  }


  $swatch_6 = get_theme_mod('hms_gutenberg_color_6');
  
  if( ! empty($swatch_6) ) {
    $hms_gutenberg_pallete[] = array( 
      'name' => __( 'Color 6', 'hms-maverick' ),
      'slug' => 'color-6',
      'color' => get_theme_mod('hms_gutenberg_color_6'),
    );
  }


  $swatch_7 = get_theme_mod('hms_gutenberg_color_7');
  
  if( ! empty($swatch_7) ) {
    $hms_gutenberg_pallete[] = array( 
      'name' => __( 'Color 7', 'hms-maverick' ),
      'slug' => 'color-7',
      'color' => get_theme_mod('hms_gutenberg_color_7'),
    );
  }
  

  $swatch_8 = get_theme_mod('hms_gutenberg_color_8');

  if( ! empty( $swatch_8 ) ) {
    $hms_gutenberg_pallete[] = array( 
      'name' => __( 'Color 8', 'hms-maverick' ),
      'slug' => 'color-8',
      'color' => get_theme_mod('hms_gutenberg_color_8'),
    );
  }


  $swatch_9 = get_theme_mod('hms_gutenberg_color_9');

  if( ! empty($swatch_9) ) {
    $hms_gutenberg_pallete[] = array( 
      'name' => __( 'Color 9', 'hms-maverick' ),
      'slug' => 'color-9',
      'color' => get_theme_mod('hms_gutenberg_color_9'),
    );
  }

  
  $swatch_10 = get_theme_mod('hms_gutenberg_color_10');

  if( ! empty( $swatch_10 ) ) {
    $hms_gutenberg_pallete[] = array( 
      'name' => __( 'Color 10', 'hms-maverick' ),
      'slug' => 'color-10',
      'color' => get_theme_mod('hms_gutenberg_color_10'),
    );
  }

  // White
  $hms_gutenberg_pallete[] = array(
    array(
      'name' => __( 'White', 'hms-maverick' ),
      'slug' => 'white',
      'color' => '#ffffff',
    ),
  );

  return $hms_gutenberg_pallete;
}


