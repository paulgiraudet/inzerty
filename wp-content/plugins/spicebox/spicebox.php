<?php
/*
Plugin Name: SpiceBox
Plugin URI:
Description: Enhances SpiceThemes with extra functionality.
Version: 0.3.3
Author: Spicethemes
Author URI: https://github.com
Text Domain: spicebox
*/
define( 'SPICEB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SPICEB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

function spiceb_activate() {
	$theme = wp_get_theme(); // gets the current theme
	if ( 'SpicePress' == $theme->name || 'Rockers' == $theme->name || 'Content' == $theme->name  || 'Certify' == $theme->name || 'Stacy' == $theme->name || 'SpicePress Child Theme' == $theme->name){
		require_once('inc/spicepress/features/feature-slider-section.php');
		require_once('inc/spicepress/features/feature-service-section.php');
		require_once('inc/spicepress/features/feature-portfolio-section.php');
		require_once('inc/spicepress/features/feature-testimonial-section.php');
		require_once('inc/spicepress/sections/spicepress-slider-section.php');
		require_once('inc/spicepress/sections/spicepress-features-section.php');
		require_once('inc/spicepress/sections/spicepress-portfolio-section.php');
		require_once('inc/spicepress/sections/spicepress-testimonail-section.php');
		require_once('inc/spicepress/customizer.php');
		
	}
	
	if ( 'Chilly' == $theme->name || 'SpiceBlue' == $theme->name){
		require_once('inc/spicepress/features/feature-service-section.php');
		require_once('inc/spicepress/features/feature-portfolio-section.php');
		require_once('inc/spicepress/features/feature-testimonial-section.php');
		require_once('inc/spicepress/sections/spicepress-features-section.php');
		require_once('inc/spicepress/sections/spicepress-portfolio-section.php');
		require_once('inc/spicepress/sections/spicepress-testimonail-section.php');
		require_once('inc/spicepress/customizer.php');
	}
	
	if ( 'Innofit' == $theme->name){
		require_once('inc/innofit/features/feature-slider-section.php');
		require_once('inc/innofit/features/feature-service-section.php');
		require_once('inc/innofit/features/feature-about-section.php');
		require_once('inc/innofit/features/feature-testimonial-section.php');
		require_once('inc/innofit/features/feature-team-section.php');
		require_once('inc/innofit/features/feature-callout-section.php');
		require_once('inc/innofit/features/feature-contact-section.php');
		require_once('inc/innofit/features/feature-subscribe-section.php');
		require_once('inc/innofit/features/feature-wooshop-section.php');
		require_once('inc/innofit/sections/innofit-slider-section.php');
		require_once('inc/innofit/sections/innofit-service-section.php');
		require_once('inc/innofit/sections/innofit-about-section.php');
		require_once('inc/innofit/sections/innofit-testimonail-section.php');
		require_once('inc/innofit/sections/innofit-team-section.php');
		require_once('inc/innofit/sections/innofit-callout-section.php');
		require_once('inc/innofit/sections/innofit-contact-section.php');
		require_once('inc/innofit/sections/innofit-subscriber-section.php');
		require_once('inc/innofit/sections/innofit-wooproduct-section.php');
		
		require_once('inc/innofit/customizer.php');
	}
	

}
add_action( 'init', 'spiceb_activate' );


$theme = wp_get_theme();
if ( 'SpicePress' == $theme->name || 'Rockers' == $theme->name || 'Content' == $theme->name || 'Certify' == $theme->name || 'Stacy' == $theme->name || 'SpicePress Child Theme' == $theme->name || 'Chilly' == $theme->name || 'SpiceBlue' == $theme->name){
		
	
register_activation_hook( __FILE__, 'spiceb_install_function');
function spiceb_install_function()
{	
$item_details_page = get_option('item_details_page'); 
    if(!$item_details_page){
	require_once('inc/spicepress/default-pages/upload-media.php');
	require_once('inc/spicepress/default-pages/about-page.php');
	require_once('inc/spicepress/default-pages/home-page.php');
	require_once('inc/spicepress/default-pages/blog-page.php');
	require_once('inc/spicepress/default-pages/contact-page.php');
	require_once('inc/spicepress/default-pages/portfolio-page.php');
	require_once('inc/spicepress/default-widgets/default-widget.php');
	update_option( 'item_details_page', 'Done' );
    }
}

}


//Innofit
if ( 'Innofit' == $theme->name ){
		
register_activation_hook( __FILE__, 'spiceb_install_function');
function spiceb_install_function()
{	
$item_details_page = get_option('item_details_page'); 
    if(!$item_details_page){
	require_once('inc/innofit/default-pages/upload-media.php');
	require_once('inc/innofit/default-pages/home-page.php');
	require_once('inc/innofit/default-widgets/default-widget.php');
	require_once('inc/innofit/default-pages/home-custom-menu.php');
	update_option( 'item_details_page', 'Done' );
    }
}

}


//Sanatize text
function spiceb_spicepress_home_page_sanitize_text( $input ) {

		return wp_kses_post( force_balance_tags( $input ) );

}

function spiceb_innofit_home_page_sanitize_text( $input ) {

		return wp_kses_post( force_balance_tags( $input ) );

}
?>