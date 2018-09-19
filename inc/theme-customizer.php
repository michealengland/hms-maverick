<?php
/**
 * Theme Customizer Options
 * location Appearance > HMS Options
 */

function hms_mav_customize_register( $wp_customize ) {

  $user = wp_get_current_user();
  $allowed_roles = array( 'administrator', );
  
  if( array_intersect($allowed_roles, $user->roles ) ) { 
    
    $wp_customize->add_section( 'hms_custom_section', array(
      'title' => __( 'HMS Options' ),
      'description' => __( '' ),
      'priority' => 20,
      'capability' => 'edit_theme_options',
    ) );

    $wp_customize->add_section( 'hms_gutenberg_section', array(
      'title' => __( 'Gutenberg Editor Pallette' ),
      'description' => __( 'These colors will be utilized in the Gutenberg Editor only. Sass files and css will need to be updated if you change color values.' ),
      'priority' => 30,
      'capability' => 'edit_theme_options',
    ) );

    $wp_customize->add_section( 'hms_footer_section', array(
      'title' => __( 'Footer Options' ),
      'description' => __( '' ),
      'priority' => 120,
      'capability' => 'edit_theme_options',
    ) );

    /**
     * Enqueue Font Awesome
     */
    $wp_customize->add_setting( 'hms_enqueue_fa', array(
      'default'           => false,
      'sanitize_callback' => '',
      'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hms_enqueue_fa', array(
      'type' => 'checkbox',
      'section' => 'hms_custom_section', // Required, core or custom.
      'label' => __( 'Enqueue Font Awesome' ),
      'description' => __( 'Enabling this option will enqeue the Font Awesome icon library 4.7.' ),
      'input_attrs' => array(
        'placeholder' => __( '' ),
      ),

    ) );

    /**
     * Remove Twenty Seventeen Font Library
     */
    $wp_customize->add_setting( 'hms_deregister_twentyseventeen_fonts', array(
      'default'           => false,
      'sanitize_callback' => '',
      'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hms_deregister_twentyseventeen_fonts', array(
      'type' => 'checkbox',
      'section' => 'hms_custom_section', // Required, core or custom.
      'label' => __( 'Remove Twenty Seventeen Fonts' ),
      'description' => __( 'Enabling this option will deregister default fonts used in twentyseventeen. This is recommend if using a custom font library.' ),
      'input_attrs' => array(
        'placeholder' => __( '' ),
      ),
    ) );

      /**
       * Enqueue Scroll Animation Jquery
       */
      $wp_customize->add_setting( 'hms_enqueue_scroll_animation', array(
        'default'           => false,
        'sanitize_callback' => '',
        'transport'         => 'postMessage',
      ) );
    
      $wp_customize->add_control( 'hms_enqueue_scroll_animation', array(
        'type' => 'checkbox',
        'section' => 'hms_custom_section', // Required, core or custom.
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
    $wp_customize->add_setting( 'hms_emoji_disable', array(
      'default'           => true,
      'sanitize_callback' => '',
      'transport'         => 'postMessage',
    ) );


    $wp_customize->add_control( 'hms_emoji_disable', array(
      'type' => 'checkbox',
      'section' => 'hms_custom_section', // Required, core or custom.
      'label' => __( 'Disable WP Emojis' ),
      'description' => __( 'Enabling this remove emoji support and slightly provide a slight speed increase.' ),
      'input_attrs' => array(
        'class' => 'my-custom-class-for-js',
        'style' => 'border: 1px solid #900',
        'placeholder' => __( '' ),
      ),
    ) );

    /**
    * Enqueue a Google Font
    */
    $wp_customize->add_setting( 'hms_gfont_enqueue', array(
      'default'           => '',
      'sanitize_callback' => '',
      'transport'         => 'postMessage',
    ) );


    $wp_customize->add_control( 'hms_gfont_enqueue', array(
      'type' => 'text',
      'section' => 'hms_custom_section', // Required, core or custom.
      'label' => __( 'Google Fonts URL' ),
      'description' => __( 'Override the default font family by enqueueing your own. <italic>You will need to update styling once you add your font.</italic>' ),
      'input_attrs' => array(
        'class' => 'my-custom-class-for-js',
        'placeholder' => __( '' ),
      ),
    ) );

    /**
    * Add Experimental Speed Features
    */
    $wp_customize->add_setting( 'hms_twentyseventeen_minifier', array(
      'default'           => false,
      'sanitize_callback' => '',
      'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hms_twentyseventeen_minifier', array(
      'type' => 'checkbox',
      'section' => 'hms_custom_section', // Required, core or custom.
      'label' => __( 'Use Minfied Parent Theme Files (EXPERIMENTAL)' ),
      'description' => __( 'This functionality replaces uniminified files the twentyseventeen theme with minified versions stored in the child theme. <italic>NOTE: Test before using!</italic>' ),
      'input_attrs' => array(
        'placeholder' => __( '' ),
      ),
    ) );

    /**
    * Add Experimental Speed Features
    */
    $wp_customize->add_setting( 'hms_replace_wp_jquery', array(
      'default'           => false,
      'sanitize_callback' => '',
      'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hms_replace_wp_jquery', array(
      'type' => 'checkbox',
      'section' => 'hms_custom_section', // Required, core or custom.
      'label' => __( 'Replace default jQuery with Google Library.' ),
      'description' => __( 'This feature could break functionality on your site. Test before using!' ),
      'input_attrs' => array(
        'placeholder' => __( '' ),
      ),
    ) );

    /**
     * Gutenberg Color Options
     */

    // Color 1
    $wp_customize->add_setting( 'hms_gutenberg_color_1', array(
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
          'section'    => 'hms_gutenberg_section',
          'settings'   => 'hms_gutenberg_color_1',
        ) ) 
    );

        // Color 1
        $wp_customize->add_setting( 'hms_gutenberg_color_1', array(
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
              'section'    => 'hms_gutenberg_section',
              'settings'   => 'hms_gutenberg_color_1',
            ) ) 
        );

        // Color 2
        $wp_customize->add_setting( 'hms_gutenberg_color_2', array(
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
              'section'    => 'hms_gutenberg_section',
              'settings'   => 'hms_gutenberg_color_2',
            ) ) 
        );

        // Color 3
        $wp_customize->add_setting( 'hms_gutenberg_color_3', array(
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
              'section'    => 'hms_gutenberg_section',
              'settings'   => 'hms_gutenberg_color_3',
            ) ) 
        );

        // Color 3
        $wp_customize->add_setting( 'hms_gutenberg_color_4', array(
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
              'section'    => 'hms_gutenberg_section',
              'settings'   => 'hms_gutenberg_color_4',
            ) ) 
        );

        // Color 5
        $wp_customize->add_setting( 'hms_gutenberg_color_5', array(
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
              'section'    => 'hms_gutenberg_section',
              'settings'   => 'hms_gutenberg_color_5',
            ) ) 
        );

        // Color 6
        $wp_customize->add_setting( 'hms_gutenberg_color_6', array(
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
              'section'    => 'hms_gutenberg_section',
              'settings'   => 'hms_gutenberg_color_6',
            ) ) 
        );

        // Color 7
        $wp_customize->add_setting( 'hms_gutenberg_color_7', array(
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
              'section'    => 'hms_gutenberg_section',
              'settings'   => 'hms_gutenberg_color_7',
            ) ) 
        );

        // Color 8
        $wp_customize->add_setting( 'hms_gutenberg_color_8', array(
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
              'section'    => 'hms_gutenberg_section',
              'settings'   => 'hms_gutenberg_color_8',
            ) ) 
        );

        // Color 9
        $wp_customize->add_setting( 'hms_gutenberg_color_9', array(
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
              'section'    => 'hms_gutenberg_section',
              'settings'   => 'hms_gutenberg_color_9',
            ) ) 
        );

        // Color 10
        $wp_customize->add_setting( 'hms_gutenberg_color_10', array(
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
              'section'    => 'hms_gutenberg_section',
              'settings'   => 'hms_gutenberg_color_10',
            ) ) 
        );


    /**
     * Enqueue Font Awesome
     */
    //$default_footer_credits = '&copy;' . date('Y') . ' ' . get_bloginfo('title');

    $wp_customize->add_setting( 'hms_footer_credits', array(
      'default'           => 'This is a default',
      'sanitize_callback' => '',
      'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hms_footer_credits', array(
      'type' => 'textarea',
      'section' => 'hms_footer_section', // Required, core or custom.
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
    $wp_customize->add_setting( 'hms_auto_copyright', array(
      'default'           => true,
      'sanitize_callback' => '',
      'transport'         => 'postMessage',
    ) );


    $wp_customize->add_control( 'hms_auto_copyright', array(
      'type' => 'checkbox',
      'section' => 'hms_footer_section', // Required, core or custom.
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
if( get_theme_mod('hms_emoji_disable') == true ) {

  add_action( 'init', 'disable_emojis' );

  function disable_emojis() {
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  }
}

/**
 * Replace Default Twenty Seventeen Fonts
 * NOTE: You must update font styles in Child SCSS
 */
if( get_theme_mod('hms_deregister_twentyseventeen_fonts') == true ) {
  
  add_action( 'wp_enqueue_scripts', 'remove_twentyseventeen_fonts', 99 );

  function remove_twentyseventeen_fonts() {
    wp_dequeue_style( 'twentyseventeen-fonts' ); // Deregister Stock 2017 Fonts
  }
}


/**
 * Enqueue Google Font
 * NOTE: You must update font styles in Child SCSS
 * New font not enqueued since it's Arial.
 */
if( get_theme_mod('hms_gfont_enqueue') == true ) {
  
  add_action( 'wp_enqueue_scripts', 'enqueue_google_fonts', 99 );

  function enqueue_google_fonts() {
    wp_enqueue_style( 'hms_google_fonts', '<link href="' . get_theme_mod('hms_gfont_enqueue') . '" rel="stylesheet"', array(), null );   // Enque New Font
  }
}


/**
 * Enqueue Font Awesome
 */
if( get_theme_mod('hms_enqueue_fa') == true ) {
  add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );

  function enqueue_load_fa() {
    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), false );
  }
}

/**
* Register Window Animation JS - Scrolling Animation Effect
* Upgrade Jquery to 2.2.4 which does not throw errors.
*/
if( get_theme_mod('hms_enqueue_scroll_animation') == true ) {

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

/**
 * Used by hook: 'customize_preview_init'
 * 
 * @see add_action('customize_preview_init',$func)
 */
add_action( 'customize_preview_init', 'hms_mav_customizer_live_preview' );

function hms_mav_customizer_live_preview()
{
	wp_enqueue_script( 
		  'hms_mav_customizer', //Give the script an ID
		  get_stylesheet_directory_uri().'/inc/js/theme-customizer.js',//Point to file
		  array( 'jquery','customize-preview' ), //Define dependencies
		  '', //Define a version (optional) 
		  true //Put script in footer?
	);
}






/**
 * De-register twentyseventeen and re-enqueue JS with minified files.
 * @package /parent-min
 */

if( get_theme_mod('hms_twentyseventeen_minifier') == true ) {

  add_action( 'wp_enqueue_scripts', 'remove_twenty_seventeen_js', 100 );

  function  remove_twenty_seventeen_js() {
  
    wp_dequeue_script('twentyseventeen-skip-link-focus-fix');
    wp_enqueue_script( 'maverick-skip-link-focus-fix', get_stylesheet_directory_uri() . '/parent-min/skip-link-focus-fix.min.js', array(), '1.0', true );
  
    $twentyseventeen_l10n = array(
      'quote' => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
    );
  
    if ( has_nav_menu( 'top' ) ) {
      wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
      $twentyseventeen_l10n['expand']   = __( 'Expand child menu', 'twentyseventeen' );
      $twentyseventeen_l10n['collapse'] = __( 'Collapse child menu', 'twentyseventeen' );
      $twentyseventeen_l10n['icon']     = twentyseventeen_get_svg(
        array(
          'icon'     => 'angle-down',
          'fallback' => true,
        )
      );
    }
  
    wp_dequeue_script('twentyseventeen-navigation');
    wp_enqueue_script('maverick-navigation', get_stylesheet_directory_uri() . '/parent-min/navigation.min.js', array( 'jquery' ), '1.0', true);
  
    wp_dequeue_script('twentyseventeen-global');
    wp_enqueue_script('maverick-global', get_stylesheet_directory_uri() . '/parent-min/global.min.js', array( 'jquery' ), '1.0', true);
  
    wp_dequeue_script('jquery-scrollto');
    wp_enqueue_script( 'maverick-jquery-scrollto', get_stylesheet_directory_uri() . '/parent-min/jquery.scrollTo.min.js', array( 'jquery' ), '2.1.2', true );
    // Needed maverick-skip-link-focus-fix
    wp_localize_script( 'maverick-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );
  
  }

}

/**
 * Replace default WP Core jQuery with Google APIS jQuery
 * Note: This feature is experimental
 */
if( get_theme_mod('hms_replace_wp_jquery') == true ) {
  
  add_action('init', 'replace_jquery');

  function replace_jquery() {
    if ( !is_admin() ) {
      // remove current jQuery scripts.
      wp_deregister_script('jquery');
      // enqueue Google Library
      wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, '3.3.1', true);
      //wp_enqueue_script('jquery');
    }
  }
}