<?php
/**
 * Theme Customizer Options
 * location Appearance > HMS Options
 */

function hms_mav_customize_register( $wp_customize ) {

  $user = wp_get_current_user();
  $allowed_roles = array( 'administrator', );
  
  if( array_intersect($allowed_roles, $user->roles ) ) { 
    
    $wp_customize->add_section( 'fg_custom_section', array(
      'title' => __( 'HMS Options' ),
      'description' => __( '' ),
      'priority' => 20,
      'capability' => 'edit_theme_options',
    ) );

    $wp_customize->add_section( 'fg_gutenberg_section', array(
      'title' => __( 'Gutenberg Editor Pallette' ),
      'description' => __( 'These colors will be utilized in the Gutenberg Editor only. Sass files and css will need to be updated if you change color values.' ),
      'priority' => 30,
      'capability' => 'edit_theme_options',
    ) );


    $wp_customize->add_section( 'fg_footer_section', array(
      'title' => __( 'Footer Options' ),
      'description' => __( '' ),
      'priority' => 120,
      'capability' => 'edit_theme_options',
    ) );

    /**
     * Enqueue Font Awesome
     */
    $wp_customize->add_setting( 'fg_enqueue_fa', array(
      'default'           => '',
      'sanitize_callback' => '',
      'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'fg_enqueue_fa', array(
      'type' => 'checkbox',
      'section' => 'fg_custom_section', // Required, core or custom.
      'label' => __( 'Enqueue Font Awesome' ),
      'description' => __( 'Enabling this option will enqeue the Font Awesome icon library 4.7.' ),
      'input_attrs' => array(
        'class' => 'my-custom-class-for-js',
        'style' => 'border: 1px solid #900',
        'placeholder' => __( '' ),
      ),

    ) );

    /**
     * Remove Twenty Seventeen Font Library
     */
    $wp_customize->add_setting( 'fg_deregister_twentyseventeen_fonts', array(
      'default'           => '',
      'sanitize_callback' => '',
      'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'fg_deregister_twentyseventeen_fonts', array(
      'type' => 'checkbox',
      'section' => 'fg_custom_section', // Required, core or custom.
      'label' => __( 'Remove Twenty Seventeen Fonts' ),
      'description' => __( 'Enabling this option will deregister default fonts used in twentyseventeen. This is recommend if using a custom font library.' ),
      'input_attrs' => array(
        'class' => 'my-custom-class-for-js',
        'style' => 'border: 1px solid #900',
        'placeholder' => __( '' ),
      ),
    ) );

      /**
       * Enqueue Scroll Animation Jquery
       */
      $wp_customize->add_setting( 'fg_enqueue_scroll_animation', array(
        'default'           => '',
        'sanitize_callback' => '',
        'transport'         => 'postMessage',
      ) );
    
      $wp_customize->add_control( 'fg_enqueue_scroll_animation', array(
        'type' => 'checkbox',
        'section' => 'fg_custom_section', // Required, core or custom.
        'label' => __( 'Enqueue Scroll Animation' ),
        'description' => __( 'Enabling this option will enqueue jQuery 2.2.4 library for custom scrolling animations.' ),
        'input_attrs' => array(
          'class' => 'my-custom-class-for-js',
          'style' => 'border: 1px solid #900',
          'placeholder' => __( '' ),
        ),
      ) );

    /**
     * Remove Emoji Support
     */
    $wp_customize->add_setting( 'fg_emoji_disable', array(
      'default'           => true,
      'sanitize_callback' => '',
      'transport'         => 'postMessage',
    ) );


    $wp_customize->add_control( 'fg_emoji_disable', array(
      'type' => 'checkbox',
      'section' => 'fg_custom_section', // Required, core or custom.
      'label' => __( 'Disable WP Emojis' ),
      'description' => __( 'Enabling this remove emoji support and slightly provide a slight speed increase.' ),
      'input_attrs' => array(
        'class' => 'my-custom-class-for-js',
        'style' => 'border: 1px solid #900',
        'placeholder' => __( '' ),
      ),
    ) );


    /**
     * Gutenberg Color Options
     */

    // Color 1
    $wp_customize->add_setting( 'fg_gutenberg_color_1', array(
      'default'           => '#00274c',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control(
      new WP_Customize_Color_Control( 
        $wp_customize, 
        'g_color_1',  // Not sure what this value is?
        array(
          'label'      => __( 'Color 1', 'hms-maverick' ),
          'section'    => 'fg_gutenberg_section',
          'settings'   => 'fg_gutenberg_color_1',
        ) ) 
    );

        // Color 1
        $wp_customize->add_setting( 'fg_gutenberg_color_1', array(
          'default'           => '#0057a8',
          'sanitize_callback' => 'sanitize_hex_color',
          'transport'         => 'postMessage',
        ) );
    
        $wp_customize->add_control(
          new WP_Customize_Color_Control( 
            $wp_customize, 
            'g_color_1',  // Not sure what this value is?
            array(
              'label'      => __( 'Color 1', 'hms-maverick' ),
              'section'    => 'fg_gutenberg_section',
              'settings'   => 'fg_gutenberg_color_1',
            ) ) 
        );

        // Color 2
        $wp_customize->add_setting( 'fg_gutenberg_color_2', array(
          'default'           => '#004585',
          'sanitize_callback' => 'sanitize_hex_color',
          'transport'         => 'postMessage',
        ) );
    
        $wp_customize->add_control(
          new WP_Customize_Color_Control( 
            $wp_customize, 
            'g_color_2',  // Not sure what this value is?
            array(
              'label'      => __( 'Color 2', 'hms-maverick' ),
              'section'    => 'fg_gutenberg_section',
              'settings'   => 'fg_gutenberg_color_2',
            ) ) 
        );

        // Color 3
        $wp_customize->add_setting( 'fg_gutenberg_color_3', array(
          'default'           => '#59cbe8',
          'sanitize_callback' => 'sanitize_hex_color',
          'transport'         => 'postMessage',
        ) );
    
        $wp_customize->add_control(
          new WP_Customize_Color_Control( 
            $wp_customize, 
            'g_color_3',  // Not sure what this value is?
            array(
              'label'      => __( 'Color 3', 'hms-maverick' ),
              'section'    => 'fg_gutenberg_section',
              'settings'   => 'fg_gutenberg_color_3',
            ) ) 
        );

        // Color 3
        $wp_customize->add_setting( 'fg_gutenberg_color_4', array(
          'default'           => '#ff9900',
          'sanitize_callback' => 'sanitize_hex_color',
          'transport'         => 'postMessage',
        ) );
    
        $wp_customize->add_control(
          new WP_Customize_Color_Control( 
            $wp_customize, 
            'g_color_4',  // Not sure what this value is?
            array(
              'label'      => __( 'Color 4', 'hms-maverick' ),
              'section'    => 'fg_gutenberg_section',
              'settings'   => 'fg_gutenberg_color_4',
            ) ) 
        );

        // Color 5
        $wp_customize->add_setting( 'fg_gutenberg_color_5', array(
          'default'           => '#614c98',
          'sanitize_callback' => 'sanitize_hex_color',
          'transport'         => 'postMessage',
        ) );
    
        $wp_customize->add_control(
          new WP_Customize_Color_Control( 
            $wp_customize, 
            'g_color_5',  // Not sure what this value is?
            array(
              'label'      => __( 'Color 5', 'hms-maverick' ),
              'section'    => 'fg_gutenberg_section',
              'settings'   => 'fg_gutenberg_color_5',
            ) ) 
        );

        // Color 6
        $wp_customize->add_setting( 'fg_gutenberg_color_6', array(
          'default'           => '',
          'sanitize_callback' => 'sanitize_hex_color',
          'transport'         => 'postMessage',
        ) );
    
        $wp_customize->add_control(
          new WP_Customize_Color_Control( 
            $wp_customize, 
            'g_color_6',  // Not sure what this value is?
            array(
              'label'      => __( 'Color 6', 'hms-maverick' ),
              'section'    => 'fg_gutenberg_section',
              'settings'   => 'fg_gutenberg_color_6',
            ) ) 
        );

        // Color 7
        $wp_customize->add_setting( 'fg_gutenberg_color_7', array(
          'default'           => '',
          'sanitize_callback' => 'sanitize_hex_color',
          'transport'         => 'postMessage',
        ) );
    
        $wp_customize->add_control(
          new WP_Customize_Color_Control( 
            $wp_customize, 
            'g_color_7',  // Not sure what this value is?
            array(
              'label'      => __( 'Color 7', 'hms-maverick' ),
              'section'    => 'fg_gutenberg_section',
              'settings'   => 'fg_gutenberg_color_7',
            ) ) 
        );

        // Color 8
        $wp_customize->add_setting( 'fg_gutenberg_color_8', array(
          'default'           => '',
          'sanitize_callback' => 'sanitize_hex_color',
          'transport'         => 'postMessage',
        ) );
    
        $wp_customize->add_control(
          new WP_Customize_Color_Control( 
            $wp_customize, 
            'g_color_8',  // Not sure what this value is?
            array(
              'label'      => __( 'Color 8', 'hms-maverick' ),
              'section'    => 'fg_gutenberg_section',
              'settings'   => 'fg_gutenberg_color_8',
            ) ) 
        );

        // Color 9
        $wp_customize->add_setting( 'fg_gutenberg_color_9', array(
          'default'           => '',
          'sanitize_callback' => 'sanitize_hex_color',
          'transport'         => 'postMessage',
        ) );
    
        $wp_customize->add_control(
          new WP_Customize_Color_Control( 
            $wp_customize, 
            'g_color_9',  // Not sure what this value is?
            array(
              'label'      => __( 'Color 9', 'hms-maverick' ),
              'section'    => 'fg_gutenberg_section',
              'settings'   => 'fg_gutenberg_color_9',
            ) ) 
        );

        // Color 10
        $wp_customize->add_setting( 'fg_gutenberg_color_10', array(
          'default'           => '',
          'sanitize_callback' => 'sanitize_hex_color',
          'transport'         => 'postMessage',
        ) );
    
        $wp_customize->add_control(
          new WP_Customize_Color_Control( 
            $wp_customize, 
            'g_color_10',  // Not sure what this value is?
            array(
              'label'      => __( 'Color 10', 'hms-maverick' ),
              'section'    => 'fg_gutenberg_section',
              'settings'   => 'fg_gutenberg_color_10',
            ) ) 
        );


    /**
     * Enqueue Font Awesome
     */
    //$default_footer_credits = '&copy;' . date('Y') . ' ' . get_bloginfo('title');

    $wp_customize->add_setting( 'fg_footer_credits', array(
      'default'           => 'This is a default',
      'sanitize_callback' => '',
      'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'fg_footer_credits', array(
      'type' => 'textarea',
      'section' => 'fg_footer_section', // Required, core or custom.
      'label' => __( 'Site Footer Credits' ),
      'description' => __( 'Add a business information to the footer.' ),
      'input_attrs' => array(
        'class' => 'credits',
        'placeholder' => __( '' ),
      ),

    ) );

    /**
     * Auto Year Copyright
     */
    $wp_customize->add_setting( 'fg_auto_copyright', array(
      'default'           => true,
      'sanitize_callback' => '',
      'transport'         => 'postMessage',
    ) );


    $wp_customize->add_control( 'fg_auto_copyright', array(
      'type' => 'checkbox',
      'section' => 'fg_footer_section', // Required, core or custom.
      'label' => __( 'Site Title with Copyright' ),
      'description' => __( 'This option will prepend your footer credits with a copyright and site title.' ),
      'input_attrs' => array(
        'class' => 'my-custom-class-for-js',
        'placeholder' => __( '' ),
      ),
    ) );
  }
}

add_action( 'customize_register', 'hms_mav_customize_register' );




/**
 * Disable the emoji's - Functionality Provided by
 */
if( get_theme_mod('fg_emoji_disable') == true ) {

  add_action( 'init', 'disable_emojis' );

  function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
  }
}

/**
 * Replace Default Twenty Seventeen Fonts
 * NOTE: You must update font styles in Child SCSS
 * New font not enqueued since it's Arial.
 */
if( get_theme_mod('fg_deregister_twentyseventeen_fonts') == true ) {
  
  add_action( 'wp_enqueue_scripts', 'remove_twentyseventeen_fonts', 99 );

  function remove_twentyseventeen_fonts() {
    wp_dequeue_style( 'twentyseventeen-fonts' ); // Deregister Stock 2017 Fonts
  }
}

/**
 * Enqueue Font Awesome
 */
if( get_theme_mod('fg_enqueue_fa') == true ) {
  add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );

  function enqueue_load_fa() {
    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), false );
  }
}

/**
* Register Window Animation JS - Scrolling Animation Effect
* Upgrade Jquery to 2.2.4 which does not throw errors.
*/
if( get_theme_mod('fg_enqueue_scroll_animation') == true ) {

  add_action( 'wp_enqueue_scripts', 'enqueue_window_animation' );

  function enqueue_window_animation() {
    wp_register_script( 'window_animation_jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', array(), null );
		wp_enqueue_script( 'window_animation_jquery' );

    // enqueue file
		wp_register_script( 'window_animation', get_stylesheet_directory_uri() . '/inc/js/window-animation-min.js', array(), null );
		wp_enqueue_script( 'window_animation' );
  }

}




/**
 * Used by hook: 'customize_preview_init'
 * 
 * @see add_action('customize_preview_init',$func)
 */
function hms_mav_customizer_live_preview()
{
	wp_enqueue_script( 
		  'hms_mav_customizer',			    //Give the script an ID
		  get_stylesheet_directory_uri().'/inc/js/theme-customizer.js',//Point to file
		  array( 'jquery','customize-preview' ),	//Define dependencies
		  '',						//Define a version (optional) 
		  true						//Put script in footer?
	);
}
add_action( 'customize_preview_init', 'hms_mav_customizer_live_preview' );