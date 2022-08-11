<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'widgets_init', 'rdtheme_widgets_init' );








function rdtheme_widgets_init() {

	// Register Custom Widgets
	register_widget( 'RDTheme_Address_Widget' );
	register_widget( 'RDTheme_Social_Widget' );
	register_widget( 'RDTheme_Recent_Posts_With_Image_Widget' );
	register_widget( 'RDTheme_Open_Hour_Widget' );
}