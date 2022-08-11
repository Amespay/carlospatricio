<?php
add_action( 'wp_enqueue_scripts', 'miako_child_styles', 18 );








function miako_child_styles() {
	wp_enqueue_style( 'miako-child-style', get_stylesheet_uri() );
}