<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.2.1
 */

add_action( 'tgmpa_register', 'miako_register_required_plugins' );








function miako_register_required_plugins() {
	$plugins = array(
		// Bundled
		array(
			'name'         => 'Miako Core',
			'slug'         => 'miako-core',
			'source'       => 'miako-core.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '1.3.2'
		),
		array(
			'name'         => 'RT Framework',
			'slug'         => 'rt-framework',
			'source'       => 'rt-framework.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '2.0'
		),
		array(
			'name'         => 'RT Demo Importer',
			'slug'         => 'rt-demo-importer',
			'source'       => 'rt-demo-importer.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '4.0'
		),
		array(
			'name'         => 'WPBakery Page Builder',
			'slug'         => 'js_composer',
			'source'       => 'js_composer.zip',
			'required'     => true,
			'external_url' => 'http://vc.wpbakery.com',
			'version'      => '6.2.0'
		),
		array(
			'name'         => 'LayerSlider WP',
			'slug'         => 'LayerSlider',
			'source'       => 'LayerSlider.zip',
			'required'     => false,
			'external_url' => 'https://layerslider.kreaturamedia.com',
			'version'      => '6.11.1' 
		),
		array(
			'name'         => 'WP Logo Showcase',
			'slug'         => 'wp-logo-showcase',
			'source'       => 'wp-logo-showcase.zip',
			'required'     => true,
			'external_url' => 'https://radiustheme.com/',
			'version'      => '2.4'
		),
		
		// Repository
		array(
			'name'     => 'Redux Framework',
			'slug'     => 'redux-framework',
			'required' => true,
		),
		array(
			'name'     => 'Breadcrumb NavXT',
			'slug'     => 'breadcrumb-navxt',
			'required' => true,
		),
		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false,
		),
		array(
			'name'     => 'MailChimp for WordPress',
			'slug'     => 'mailchimp-for-wp',
			'required' => false,
		),
		array(
			'name'     => 'WP Extended Search',
			'slug'     => 'wp-extended-search',
			'required' => false,
		),
		array(
			'name'     => 'WP Retina 2x',
			'slug'     => 'wp-retina-2x',
			'required' => false,
		),
		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		),
	);

	$config = array(
		'id'           => 'miako',             // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => RDTHEME_PLUGINS_DIR,   // Default absolute path to bundled plugins.
		'menu'         => 'miako-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}