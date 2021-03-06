/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	// Update the site footer in real time...
	wp.customize( 'hms_footer_credits', function( value ) {
		value.bind( function( newval ) {
			$( '.site-info .credits' ).html( newval );
		} );
    } );
    
} )( jQuery );
