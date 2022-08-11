<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RT_Posts' ) ) {
	return;
}
$post_types = array(
	'miako_team'     	   => array(
		'title'        => __( 'Team Member', 'miako-core' ),
		'plural_title' => __( 'Team Members', 'miako-core' ),
		'menu_icon'    => 'dashicons-businessman',
		'labels_override'     => array(
			'menu_name'  => __( 'Team', 'miako-core' ),
			),
		'rewrite'      => RDTheme::$options['team_slug'],
		),
	'miako_law'    => array(
		'title'        => __( 'Law', 'miako-core' ),
		'plural_title' => __( 'Law Service', 'miako-core' ),
		'menu_icon'    => 'dashicons-book-alt',
		'rewrite'      => RDTheme::$options['law_slug'],
		),
	'miako_testimonial'  => array(
		'title'        => __( 'Testimonial', 'miako-core' ),
		'plural_title' => __( 'Testimonials', 'miako-core' ),
		'menu_icon'    => 'dashicons-awards',
		'rewrite'      => false,
		),	
	);

$taxonomies = array(
	'miako_law_category' => array(
		'title'        => __( 'Law Category', 'miako-core' ),
		'plural_title' => __( 'Law Categories', 'miako-core' ),
		'post_types'   => 'miako_law',
		),
	'miako_team_category'     => array(
		'title'        => __( 'Team Category', 'miako-core' ),
		'plural_title' => __( 'Team Categories', 'miako-core' ),
		'post_types'   => 'miako_team',
		),
	'miako_testimonial_category'     => array(
		'title'        => __( 'Testimonial Category', 'miako-core' ),
		'plural_title' => __( 'Testimonial Categories', 'miako-core' ),
		'post_types'   => 'miako_testimonial',
		),
	);

$Posts = RT_Posts::getInstance();
$Posts->add_post_types( $post_types );
$Posts->add_taxonomies( $taxonomies );