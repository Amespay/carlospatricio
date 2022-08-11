<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( ! defined( 'WPB_VC_VERSION' ) ) {
	return;
}

// Setup VC as part of a theme
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme();
}

// Disable layerslider_vc from search result page to fix js mess up
add_filter( 'vc_shortcode_output', 'rdtheme_layerslider_vc_output', 10 , 3 );
function rdtheme_layerslider_vc_output( $output, $class, $atts ){
	$shortcode = $class->getShortcode();

	if ( $shortcode == 'layerslider_vc' && is_search() ) {
		return '';
	}

	return $output;
}
