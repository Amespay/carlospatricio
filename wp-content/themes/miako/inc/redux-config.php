<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( ! class_exists( 'Redux' ) ) {
    return;
}

$opt_name = 'miako';

$theme = wp_get_theme();
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'disable_tracking' => true,
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__( 'Miako Options', 'miako' ),
	
    'page_title'           => esc_html__( 'Miako Options', 'miako' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    //'google_api_key'       => 'AIzaSyC2GwbfJvi-WnYpScCPBGIUyFZF97LI0xs',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-menu',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    'forced_dev_mode_off'  => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'miako-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => true,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
);

Redux::setArgs( $opt_name, $args );

// Fields
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'General', 'miako' ),
    'id'               => 'general_section',
    'heading'          => '',
    'icon'             => 'el el-network',
    'fields' => array(
        array(
            'id'       => 'primary_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Primary Color', 'miako' ),
            'default'  => '#cf9455',
        ), 
        array(
            'id'       => 'secondery_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Secondery/Hover Color', 'miako' ),
            'default'  => '#797979',
        ),
        array(
            'id'       => 'preloader',
            'type'     => 'switch',
            'title'    => esc_html__( 'Preloader', 'miako' ),
            'on'       => esc_html__( 'Enabled', 'miako' ),
            'off'      => esc_html__( 'Disabled', 'miako' ),
            'default'  => true,
        ),
        array(
            'id'       => 'preloader_image',
            'type'     => 'media',
            'title'    => esc_html__( 'Preloader Image', 'miako' ),
            'subtitle' => esc_html__( 'Please upload your choice of preloader image. Transparent GIF format is recommended', 'miako' ),
            'default'  => array(
                'url'=> RDTHEME_IMG_URL . 'preloader.gif'
            ),
            'required' => array( 'preloader', 'equals', true )
        ),
        array(
            'id'       => 'back_to_top',
            'type'     => 'switch',
            'title'    => esc_html__( 'Back to Top Arrow', 'miako' ),
            'on'       => esc_html__( 'Enabled', 'miako' ),
            'off'      => esc_html__( 'Disabled', 'miako' ),
            'default'  => true,
        ),
        array(
            'id'       => 'no_preview_image',
            'type'     => 'media',
            'title'    => esc_html__( 'Alternative Preview Image', 'miako' ),
            'subtitle' => esc_html__( 'This image will be used as preview image in some archive pages if no featured image exists', 'miako' ),
            'default'  => array(
                'url'=> RDTHEME_IMG_URL . 'noimage.jpg'
            ),
        ),
		array(
			'id'       => 'team_slug',
			'type'     => 'text',
			'title'    => esc_html__( 'Team Single Slug', 'miako' ),
			'default'  => 'team',
		),
		array(
			'id'       => 'law_slug',
			'type'     => 'text',
			'title'    => esc_html__( 'Law Single Slug', 'miako' ),
			'default'  => 'law',
		),
    )
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Contact & Socials', 'miako' ),
    'id'               => 'socials_section',
    'heading'          => '',
    'desc'             => esc_html__( 'In case you want to hide any field, keep that field empty', 'miako' ),
    'icon'             => 'el el-twitter',
    'fields' => array(
        array(
            'id'       => 'phone',
            'type'     => 'text',
            'title'    => esc_html__( 'Phone', 'miako' ),
            'default'  => '',
        ),
        array(
            'id'       => 'email',
            'type'     => 'text',
            'title'    => esc_html__( 'Email', 'miako' ),
            'validate' => 'email',
            'default'  => '',
        ),
        array(
            'id'       => 'address',
            'type'     => 'textarea',
            'title'    => esc_html__( 'Address', 'miako' ),
            'default'  => '',
        ),
        array(
            'id'       => 'hour',
            'type'     => 'textarea',
            'title'    => esc_html__( 'Office Hour', 'miako' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_facebook',
            'type'     => 'text',
            'title'    => esc_html__( 'Facebook', 'miako' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_twitter',
            'type'     => 'text',
            'title'    => esc_html__( 'Twitter', 'miako' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_gplus',
            'type'     => 'text',
            'title'    => esc_html__( 'Google Plus', 'miako' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_linkedin',
            'type'     => 'text',
            'title'    => esc_html__( 'Linkedin', 'miako' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_youtube',
            'type'     => 'text',
            'title'    => esc_html__( 'Youtube', 'miako' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_pinterest',
            'type'     => 'text',
            'title'    => esc_html__( 'Pinterest', 'miako' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_instagram',
            'type'     => 'text',
            'title'    => esc_html__( 'Instagram', 'miako' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_skype',
            'type'     => 'text',
            'title'    => esc_html__( 'Skype', 'miako' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_rss',
            'type'     => 'text',
            'title'    => esc_html__( 'RSS', 'miako' ),
            'default'  => '',
        ),
    )            
    ) );

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Header', 'miako' ),
    'id'               => 'header_section',
    'heading'          => '',
    'icon'             => 'el el-caret-up',
    'fields' => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html__( 'Main Logo', 'miako' ),
            'default'  => array(
                'url'=> RDTHEME_IMG_URL . 'logo.png'
            ),
            'subtitle' => esc_html__( 'Logo height less than 90px is recommended', 'miako' ),
        ),
        array(
            'id'       => 'logo_light',
            'type'     => 'media',
            'title'    => esc_html__( 'Light Logo', 'miako' ),
            'default'  => array(
                'url'=> RDTHEME_IMG_URL . 'logo2.png'
            ),
            'subtitle' => esc_html__( 'Used when Transparent Header is enabled. Logo height less than 90px is recommended', 'miako' ),
        ),
        array(
            'id'       => 'logo_width',
            'type'     => 'select',
            'title'    => __( 'Logo Area Width', 'miako'), 
            'subtitle' => __( 'Width is defined by the number of bootstrap columns. Please note, navigation menu width will be decreased with the increase of logo width', 'miako' ),
            'options'  => array(
                '1' => __( '1 Column', 'miako' ),
                '2' => __( '2 Column', 'miako' ),
                '3' => __( '3 Column', 'miako' ),
                '4' => __( '4 Column', 'miako' ),
            ),
            'default'  => '2',
        ),
        array(
            'id'       => 'logo_width',
            'type'     => 'select',
            'title'    => __( 'Logo Area Width', 'miako'), 
            'subtitle' => __( 'Width is defined by the number of bootstrap columns. Please note, navigation menu width will be decreased with the increase of logo width', 'miako' ),
            'options'  => array(
                '1' => __( '1 Column', 'miako' ),
                '2' => __( '2 Column', 'miako' ),
                '3' => __( '3 Column', 'miako' ),
                '4' => __( '4 Column', 'miako' ),
            ),
            'default'  => '2',
        ),
        array(
            'id'       => 'sticky_menu',
            'type'     => 'switch',
            'title'    => esc_html__( 'Sticky Header', 'miako' ),
            'on'       => esc_html__( 'Enabled', 'miako' ),
            'off'      => esc_html__( 'Disabled', 'miako' ),
            'default'  => true,
            'subtitle' => esc_html__( 'Show header when scroll down', 'miako' ),
        ), 
        array(
            'id'       => 'tr_header',
            'type'     => 'switch',
            'title'    => esc_html__( 'Transparent Header', 'miako' ),
            'on'       => esc_html__( 'Enabled', 'miako' ),
            'off'      => esc_html__( 'Disabled', 'miako' ),
            'default'  => false,
            'subtitle' => esc_html__( 'You have to enable Banner or Slider in page to make it work properly. You can override this settings in individual pages', 'miako' ),
        ),
        array(
            'id'       => 'top_bar',
            'type'     => 'switch',
            'title'    => esc_html__( 'Top Bar', 'miako' ),
            'on'       => esc_html__( 'Enabled', 'miako' ),
            'off'      => esc_html__( 'Disabled', 'miako' ),
            'default'  => false,
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'miako' ),
        ),
        array(
            'id'       => 'top_bar_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Top Bar Text Color', 'miako' ),
            'default'  => '#a6b1b7',
        ),
        array(
            'id'       => 'top_bar_color_tr',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Transparent Top Bar Text Color', 'miako' ),
            'subtitle' => esc_html__( 'Applied when Transparent Header is enabled', 'miako' ),
            'default'  => '#efefef',
        ),
        array(
            'id'       => 'top_bar_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Top Bar Background Color', 'miako' ),
            'default'  => '#222222',
        ),
        array(
            'id'       => 'top_bar_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Top Bar Layout', 'miako' ),
            'default'  => '1',
            'options' => array(
                '1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'miako' ) . '</b>',
                    'img' => RDTHEME_IMG_URL . 'top1.png',
                ),
                '2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'miako' ) . '</b>',
                    'img' => RDTHEME_IMG_URL . 'top2.png',
                ),
                '3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'miako' ) . '</b>',
                    'img' => RDTHEME_IMG_URL . 'top3.jpg',
                ),
            ),
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'miako' ),
        ),
        array(
            'id'       => 'header_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Header Layout', 'miako' ),
            'default'  => '1',
            'options' => array(
                '1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'miako' ) . '</b>',
                    'img' => RDTHEME_IMG_URL . 'header-1.png',
                ),
                '2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'miako' ) . '</b>',
                    'img' => RDTHEME_IMG_URL . 'header-2.png',
                ),
                '3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'miako' ) . '</b>',
                    'img' => RDTHEME_IMG_URL . 'header-3.png',
                ),
                '4' => array(
                    'title' => '<b>'. esc_html__( 'Layout 4', 'miako' ) . '</b>',
                    'img' => RDTHEME_IMG_URL . 'header-4.png',
                ),
                '5' => array(
                    'title' => '<b>'. esc_html__( 'Layout 5', 'miako' ) . '</b>',
                    'img' => RDTHEME_IMG_URL . 'header-5.png',
                ),
                '6' => array(
                    'title' => '<b>'. esc_html__( 'Layout 6', 'miako' ) . '</b>',
                    'img' => RDTHEME_IMG_URL . 'header-6.png',
                ),
            ),
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'miako' ),
        ),
		/*for top quick link*/ 
        array(
            'id'       => 'header_hotline_txt',
            'type'     => 'text',
            'title'    => esc_html__( 'Header "Hotline" Text', 'miako' ),
            'subtitle' => esc_html__( 'Used for header style 6', 'miako' ),
            'default'  => esc_html__( 'Hotline', 'miako' ),
            'required' => array( 'header_style', 'equals', 6 )
        ),
        array(
            'id'       => 'header_location_txt',
            'type'     => 'text',
            'title'    => esc_html__( 'Header "Location" Text', 'miako' ),
            'subtitle' => esc_html__( 'Used for header style 6', 'miako' ),
            'default'  => esc_html__( 'Location', 'miako' ),
            'required' => array( 'header_style', 'equals', 6 )		
        ),
        array(
            'id'       => 'header_officehour_txt',
            'type'     => 'text',
            'title'    => esc_html__( 'Header "Office Hour" Text', 'miako' ),
            'subtitle' => esc_html__( 'Used for header style 6', 'miako' ),
            'default'  => esc_html__( 'Office Hour', 'miako' ),
            'required' => array( 'header_style', 'equals', 6 )
        ),
        array(
            'id'       => 'header_btn_txt',
            'type'     => 'text',
            'title'    => esc_html__( 'Header Button Text', 'miako' ),
            'subtitle' => esc_html__( 'Only used in Header Layout-4', 'miako' ),
            'default'  => esc_html__( 'FREE CONSULTING', 'miako' ),
        ),
        array(
            'id'       => 'header_btn_url',
            'type'     => 'text',
            'title'    => esc_html__( 'Header Button URL', 'miako' ),
            'subtitle' => esc_html__( 'Only used in Header Layout-4', 'miako' ),
            'default'  => '#',
        ),
        array(
            'id'       => 'search_icon',
            'type'     => 'switch',
            'title'    => esc_html__( 'Search Icon', 'miako' ),
            'on'       => esc_html__( 'Enabled', 'miako' ),
            'off'      => esc_html__( 'Disabled', 'miako' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'cart_icon',
            'type'     => 'switch',
            'title'    => esc_html__( 'Cart Icon', 'miako' ),
            'on'       => esc_html__( 'Enabled', 'miako' ),
            'off'      => esc_html__( 'Disabled', 'miako' ),
            'default'  => true,
        ),
    )            
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Main Menu', 'miako' ),
    'id'               => 'menu_section',
    'heading'          => '',
    'icon'             => 'el el-book',
    'fields' => array(
        array(
            'id'       => 'section-mainmenu',
            'type'     => 'section',
            'title'    => esc_html__( 'Main Menu Items', 'miako' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'menu_typo',
            'type'     => 'typography',
            'title'    => esc_html__( 'Menu Font', 'miako' ),
            'google'   => true,
            'subsets'   => false,
            'text-align' => false,
            'color'   => false,
            'text-transform' => true,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '15px',
                'font-weight' => '400',
                'line-height' => '15px',
                'text-transform' => 'uppercase',
            ),
        ),
        array(
            'id'       => 'menu_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Menu Color', 'miako' ),
            'default'  => '#646464',
        ),
        array(
            'id'       => 'menu_color_tr',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Transparent Menu Color', 'miako' ),
            'subtitle' => esc_html__( 'Applied when Transparent Header is enabled', 'miako' ),
            'default'  => '#fff',
        ),
        array(
            'id'       => 'menu_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Menu Hover Color', 'miako' ),
            'default'  => '#cf9455',
        ),
        array(
            'id'       => 'section-submenu',
            'type'     => 'section',
            'title'    => esc_html__( 'Sub Menu Items', 'miako' ),
            'indent'   => true,
        ), 
        array(
            'id'       => 'submenu_typo',
            'type'     => 'typography',
            'title'    => esc_html__( 'Submenu Font', 'miako' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'color'   => false,
            'text-transform' => true,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '15px',
                'font-weight' => '400',
                'line-height' => '21px',
                'text-transform' => 'inherit',
            ),
        ),
        array(
            'id'       => 'submenu_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Color', 'miako' ),
            'default'  => '#ffffff',
        ), 
        array(
            'id'       => 'submenu_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Background Color', 'miako' ),
            'default'  => '#cf9455',
        ),  
        array(
            'id'       => 'submenu_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Hover Color', 'miako' ),
            'default'  => '#ffffff',
        ), 
        array(
            'id'       => 'submenu_hover_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Hover Background Color', 'miako' ),
            'default'  => '#D98C3A',
        ),
        array(
            'id'       => 'section-resmenu',
            'type'     => 'section',
            'title'    => esc_html__( 'Mobile Menu', 'miako' ),
            'indent'   => true,
        ), 
        array(
            'id'       => 'resmenu_width',
            'type'     => 'slider',
            'title'    => esc_html__( 'Screen width in which mobile menu activated', 'miako' ),
            'subtitle' => esc_html__( 'Recommended value is: 992', 'miako' ),
            'default'  => 992,
            'min'      => 0,
            'step'     => 1,
            'max'      => 2000,
        ),
        array(
            'id'       => 'resmenu_typo',
            'type'     => 'typography',
            'title'    => esc_html__( 'Mobile Menu Font', 'miako' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'color'   => false,
            'text-transform' => true,
            'default'     => array(
                'font-family' => 'Droid Sans',
                'google'      => true,
                'font-size'   => '14px',
                'font-weight' => '400',
                'line-height' => '21px',
                'text-transform' => 'uppercase',
            ),
        ),
    )
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Banner', 'miako' ),
    'id'               => 'banner_section',
    'heading'          => '',
    'icon'             => 'el el-flag',
    'fields' => array(
        array(
            'id'       => 'banner_heading_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Banner Heading Color', 'miako' ),
            'default'  => '#ffffff',
        ), 
        array(
            'id'       => 'breadcrumb_link_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Breadcrumb Link Color', 'miako' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'breadcrumb_link_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Breadcrumb Link Hover Color', 'miako' ),
            'default'  => '#666666',
        ),
        array(
            'id'       => 'breadcrumb_active_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Active Breadcrumb Color', 'miako' ),
            'default'  => '#cf9455',
        ),
        array(
            'id'       => 'breadcrumb_seperator_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Breadcrumb Seperator Color', 'miako' ),
            'default'  => '#ffffff',
        ),
    )            
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Footer', 'miako' ),
    'id'               => 'footer_section',
    'heading'          => '',
    'icon'             => 'el el-caret-down',
    'fields' => array(
        array(
            'id'       => 'section-footer-area',
            'type'     => 'section',
            'title'    => esc_html__( 'Footer Area', 'miako' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'footer_area',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display Footer Area', 'miako' ),
            'on'       => esc_html__( 'Enabled', 'miako' ),
            'off'      => esc_html__( 'Disabled', 'miako' ),
            'default'  => true,
        ),
        array(
            'id'       => 'footer_column',
            'type'     => 'select',
            'title'    => esc_html__( 'Number of Columns', 'miako' ),
            'options'  => array(
                '1' => '1 Column',
                '2' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns',
            ),
            'default'  => '4',
            'required' => array( 'footer_area', 'equals', true )
        ),
        array(
            'id'       => 'footer_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Background Color', 'miako' ),
            'default'  => '#000000',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_title_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Title Text Color', 'miako' ),
            'default'  => '#ffffff',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Body Text Color', 'miako' ),
            'default'  => '#c4c4c4',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_link_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Body Link Color', 'miako' ),
            'default'  => '#c4c4c4',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_link_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Body Link Hover Color', 'miako' ),
            'default'  => '#cf9455',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'section-copyright-area',
            'type'     => 'section',
            'title'    => esc_html__( 'Copyright Area', 'miako' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'copyright_area',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display Copyright Area', 'miako' ),
            'on'       => esc_html__( 'Enabled', 'miako' ),
            'off'      => esc_html__( 'Disabled', 'miako' ),
            'default'  => true,
        ),
        array(
            'id'       => 'copyright_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Copyright Background Color', 'miako' ),
            'default'  => '#000000',
            'required' => array( 'copyright_area', 'equals', true )
        ),
        array(
            'id'       => 'copyright_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Copyright Text Color', 'miako' ),
            'default'  => '#dddddd',
            'required' => array( 'copyright_area', 'equals', true )
        ),
        array(
            'id'       => 'copyright_text',
            'type'     => 'textarea',
            'title'    => esc_html__( 'Copyright Text', 'miako' ),
            'default'  => '&copy; Copyright Miako  2017. All Right Reserved. Designed and Developed by <a target="_blank" href="' . RDTHEME_AUTHOR_URI . '">RadiusTheme</a>',
            'required' => array( 'copyright_area', 'equals', true )
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Typography', 'miako' ),
    'id'               => 'typo_section',
    'icon'             => 'el el-text-width',
    'fields' => array(
        array(
            'id'       => 'typo_body',
            'type'     => 'typography',
            'title'    => esc_html__( 'Body', 'miako' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '15px',
                'font-weight' => '400',
                'line-height' => '24px',
            ),
        ),
        array(
            'id'       => 'typo_h1',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h1', 'miako' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Raleway',
                'google'      => true,
                'font-size'   => '40px',
                'font-weight' => '500',
                'line-height'   => '44px',
            ),
        ),
        array(
            'id'       => 'typo_h2',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h2', 'miako' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Raleway',
                'google'      => true,
                'font-size'   => '36px',
                'font-weight' => '500',
                'line-height' => '48px',
            ),
        ),
        array(
            'id'       => 'typo_h3',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h3', 'miako' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Raleway',
                'google'      => true,
                'font-size'   => '24px',
                'font-weight' => '500',
                'line-height' => '36px',
            ),
        ),
        array(
            'id'       => 'typo_h4',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h4', 'miako' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Raleway',
                'google'      => true,
                'font-size'   => '16px',
                'font-weight' => '500',
                'line-height' => '18px',
            ),
        ),
        array(
            'id'       => 'typo_h5',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h5', 'miako' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Raleway',
                'google'      => true,
                'font-size'   => '14px',
                'font-weight' => '500',
                'line-height' => '16px',
            ),
        ),
        array(
            'id'       => 'typo_h6',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h6', 'miako' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Raleway',
                'google'      => true,
                'font-size'   => '12px',
                'font-weight' => '500',
                'line-height' => '14px',
            ),
        ),
    )            
) );

// Generate Common post type fields
function rdtheme_redux_post_type_fields( $prefix ){
    return array(
        array(
            'id'       => $prefix. '_layout',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Layout', 'miako' ),
            'options'  => array(
                'left-sidebar'  => esc_html__( 'Left Sidebar', 'miako' ),
                'full-width'    => esc_html__( 'Full Width', 'miako' ),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'miako' ),
            ),
            'default' => 'right-sidebar'
        ),
        array(
            'id'       => $prefix. '_padding_top',
            'type'     => 'text',
            'title'    => esc_html__( 'Content Padding Top', 'miako' ),
            'validate'  => 'numeric',
            'default' => '100',
        ),
        array(
            'id'       => $prefix. '_padding_bottom',
            'type'     => 'text',
            'title'    => esc_html__( 'Content Padding Bottom', 'miako' ),
            'validate'  => 'numeric',
            'default' => '100'
        ),
        array(
            'id'       => $prefix. '_banner',
            'type'     => 'switch',
            'title'    => esc_html__( 'Banner', 'miako' ),
            'on'       => esc_html__( 'Enabled', 'miako' ),
            'off'      => esc_html__( 'Disabled', 'miako' ),
            'default'  => true,
        ),
        array(
            'id'       => $prefix. '_breadcrumb',
            'type'     => 'switch',
            'title'    => esc_html__( 'Breadcrumb', 'miako' ),
            'on'       => esc_html__( 'Enabled', 'miako' ),
            'off'      => esc_html__( 'Disabled', 'miako' ),
            'default'  => true,
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgtype',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Banner Background Type', 'miako' ),
            'options'  => array(
                'bgcolor'  => esc_html__( 'Background Color', 'miako' ),
                'bgimg'    => esc_html__( 'Background Image', 'miako' ),
            ),
            'default' => 'bgcolor',
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgimg',
            'type'     => 'media',
            'title'    => esc_html__( 'Banner Background Image', 'miako' ),
            'default'  => array(
                'url'=> RDTHEME_IMG_URL . 'banner.jpg'
            ),
            'required' => array( $prefix. '_bgtype', 'equals', 'bgimg' )
        ), 
        array(
            'id'       => $prefix. '_bgcolor',
            'type'     => 'color',
            'title'    => __('Banner Background Color', 'miako'), 
            'validate' => 'color',
            'transparent' => false,
            'default' => '#606060',
            'required' => array( $prefix. '_bgtype', 'equals', 'bgcolor' )
        ),
    );
}

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Layout Defaults', 'miako' ),
    'id'               => 'layout_defaults',
    'icon'             => 'el el-th',
    ) );

// Page
$rdtheme_page_fields = rdtheme_redux_post_type_fields( 'page' );
$rdtheme_page_fields[0]['default'] = 'full-width';
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Page', 'miako' ),
    'id'               => 'pages_section',
    'subsection' => true,
    'fields' => $rdtheme_page_fields
    ) );

//Post Archive
$rdtheme_post_archive_fields = rdtheme_redux_post_type_fields( 'blog' );
Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Blog / Archive', 'miako' ),
    'id'         => 'blog_section',
    'subsection' => true,
    'fields' 	 => $rdtheme_post_archive_fields
    ) );

// Single Post
$rdtheme_single_post_fields = rdtheme_redux_post_type_fields( 'single_post' );
Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Post Single', 'miako' ),
    'id'         => 'single_post_section',
    'subsection' => true,
    'fields' 	 => $rdtheme_single_post_fields           
    ) );

// Law Single

$law_fields = rdtheme_redux_post_type_fields( 'law' );

Redux::setSection( $opt_name, array(
		'title'      => esc_html__( 'Law Single', 'miako' ),
		'id'         => 'law_section',
		'subsection' => true,
		'fields' 	 => $law_fields
	)
);

// Team Single
$team_fields = rdtheme_redux_post_type_fields( 'team' );
unset($team_fields[0]);
Redux::setSection( $opt_name, array(
		'title'      => esc_html__( 'Team Single', 'miako' ),
		'id'         => 'team_section',
		'subsection' => true,
		'fields' 	 => $team_fields
	)
);

// Search
$rdtheme_search_fields = rdtheme_redux_post_type_fields( 'search' );
Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Search Layout', 'miako' ),
    'id'         => 'search_section',
    'heading'    => '',
    'subsection' => true,
    'fields' 	 => $rdtheme_search_fields            
) 
);

// Error 404 Layout
$rdtheme_error_fields = rdtheme_redux_post_type_fields( 'error' );
unset($rdtheme_error_fields[0]);
$rdtheme_error_fields[2]['default'] = 'full-width';
$rdtheme_error_fields[2]['default'] = '120';
$rdtheme_error_fields[3]['default'] = '120';
Redux::setSection( $opt_name, array(
    'title'   	 => esc_html__( 'Error 404 Layout', 'miako' ),
    'id'      	 => 'error_section',
    'heading' 	 => '',
    'subsection' => true,
    'fields'  	 => $rdtheme_error_fields           
) 
);

if ( class_exists( 'WooCommerce' ) ) {
    // Woocommerce Shop Archive
    $rdtheme_shop_archive_fields = rdtheme_redux_post_type_fields( 'shop' );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Shop Archive', 'miako' ),
        'id'         => 'shop_section',
        'subsection' => true,
        'fields' 	 => $rdtheme_shop_archive_fields
        ) );

    // Woocommerce Product
    $rdtheme_product_fields = rdtheme_redux_post_type_fields( 'product' );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Product Single', 'miako' ),
        'id'         => 'product_section',
        'subsection' => true,
        'fields' 	 => $rdtheme_product_fields
        ) );
}

// Blog Settings
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Blog Settings', 'miako' ),
    'id'               => 'blog_settings_section',
    'icon'             => 'el el-tags',
    'heading'          => '',
    'fields' => array(
        array(
            'id'       =>'blog_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Blog/Archive Layout', 'miako' ),
            'default'  => 'style1',
            'options' => array(
                'style1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'miako' ) . '</b>',
                    'img' => RDTHEME_IMG_URL . 'blog1.png',
                ),
                'style2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'miako' ) . '</b>',
                    'img' => RDTHEME_IMG_URL . 'blog2.png',
                ),
            ),
        ),
        array(
            'id'       => 'blog_date',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Date', 'miako' ),
            'on'       => esc_html__( 'On', 'miako' ),
            'off'      => esc_html__( 'Off', 'miako' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'blog_author_name',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Author Name', 'miako' ),
            'on'       => esc_html__( 'On', 'miako' ),
            'off'      => esc_html__( 'Off', 'miako' ),
            'default'  => true,
        ),
        array(
            'id'       => 'blog_comment_num',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Comment Number', 'miako' ),
            'on'       => esc_html__( 'On', 'miako' ),
            'off'      => esc_html__( 'Off', 'miako' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'blog_cats',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Categories', 'miako' ),
            'on'       => esc_html__( 'On', 'miako' ),
            'off'      => esc_html__( 'Off', 'miako' ),
            'default'  => true,
            'required' => array( 'blog_style', 'equals', 'style1' )
        ), 
    )            
) 
);

// Post Settings
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Post Settings', 'miako' ),
    'id'               => 'post_settings_section',
    'icon'             => 'el el-file-edit',
    'heading'          => '',
    'fields' => array(
        array(
            'id'       => 'post_author_name',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Author Name', 'miako' ),
            'on'       => esc_html__( 'On', 'miako' ),
            'off'      => esc_html__( 'Off', 'miako' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_date',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Post Date', 'miako' ),
            'on'       => esc_html__( 'On', 'miako' ),
            'off'      => esc_html__( 'Off', 'miako' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'post_comment_num',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Comment Number', 'miako' ),
            'on'       => esc_html__( 'On', 'miako' ),
            'off'      => esc_html__( 'Off', 'miako' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'post_cats',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Categories', 'miako' ),
            'on'       => esc_html__( 'On', 'miako' ),
            'off'      => esc_html__( 'Off', 'miako' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_tags',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Tags', 'miako' ),
            'on'       => esc_html__( 'On', 'miako' ),
            'off'      => esc_html__( 'Off', 'miako' ),
            'default'  => true,
        ),
    )            
) 
);

// Error
$rdtheme_fields2 = array( 
    array(
        'id'       => 'error_title',
        'type'     => 'text',
        'title'    => esc_html__( 'Page Title', 'miako' ),
        'default'  => esc_html__( 'Error 404', 'miako' ),
    ), 
    array(
        'id'       => 'error_bodybg',
        'type'     => 'color',
        'transparent' => false,
        'title'    => esc_html__( 'Body Background Color', 'miako' ),
        'default'  => '#f8f8f8',
    ), 
    array(
        'id'       => 'error_bodybanner',
        'type'     => 'media',
        'title'    => esc_html__( 'Body Banner', 'miako' ),
        'default'  => array(
            'url'=> RDTHEME_IMG_URL . '404.png'
        ),
    ), 
    array(
        'id'       => 'error_text1',
        'type'     => 'text',
        'title'    => esc_html__( 'Body Text 1', 'miako' ),
        'default'  => esc_html__( 'Sorry,Page Not Found', 'miako' ),
    ),
    array(
        'id'       => 'error_text12_color',
        'type'     => 'color',
        'transparent' => false,
        'title'    => esc_html__( 'Body Text 1,2 Color', 'miako' ),
        'default'  => '#ffffff',
    ),
    array(
        'id'       => 'error_text2',
        'type'     => 'text',
        'title'    => esc_html__( 'Body Text 2', 'miako' ),
        'default'  => esc_html__( 'The page your are looking for is not available or has been removed. Try going to Home Page by using the buton below', 'miako' ),
    ),
    array(
        'id'       => 'error_buttontext',
        'type'     => 'text',
        'title'    => esc_html__( 'Button Text', 'miako' ),
        'default'  => esc_html__( 'Go Home', 'miako' ),
    )
);
Redux::setSection( $opt_name, array(
    'title'   => esc_html__( 'Error Page Settings', 'miako' ),
    'id'      => 'error_srttings_section',
    'heading' => '',
    'icon'    => 'el el-error-alt',
    'fields'  => $rdtheme_fields2           
) 
);

if ( class_exists( 'WooCommerce' ) ) {
    // Woocommerce Settings
    Redux::setSection( $opt_name, array(
        'title'   => esc_html__( 'WooCommerce', 'miako' ),
        'id'      => 'woo_Settings_section',
        'heading' => '',
        'icon'    => 'el el-shopping-cart',
        'fields'  => array(
            array(
                'id'       => 'wc_sec_general',
                'type'     => 'section',
                'title'    => esc_html__( 'General', 'miako' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_num_product',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of Products Per Page', 'miako' ),
                'default'  => '9',
            ),
            array(
                'id'       => 'wc_product_hover',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product Hover Effect', 'miako' ),
                'on'       => esc_html__( 'Enabled', 'miako' ),
                'off'      => esc_html__( 'Disabled', 'miako' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_wishlist_icon',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product Add to Wishlist Icon', 'miako' ),
                'on'       => esc_html__( 'Enabled', 'miako' ),
                'off'      => esc_html__( 'Disabled', 'miako' ),
                'default'  => true,
                'required' => array( 'wc_product_hover', 'equals', true )
            ),
            array(
                'id'       => 'wc_quickview_icon',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product Quickview Icon', 'miako' ),
                'on'       => esc_html__( 'Enabled', 'miako' ),
                'off'      => esc_html__( 'Disabled', 'miako' ),
                'default'  => true,
                'required' => array( 'wc_product_hover', 'equals', true )
            ),
            array(
                'id'       => 'wc_sec_product',
                'type'     => 'section',
                'title'    => esc_html__( 'Product Single Page', 'miako' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_show_excerpt',
                'type'     => 'switch',
                'title'    => esc_html__( "Show excerpt when short description doesn't exist", 'miako' ),
                'on'       => esc_html__( 'Enabled', 'miako' ),
                'off'      => esc_html__( 'Disabled', 'miako' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_cats',
                'type'     => 'switch',
                'title'    => esc_html__( 'Categories', 'miako' ),
                'on'       => esc_html__( 'Show', 'miako' ),
                'off'      => esc_html__( 'Hide', 'miako' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'miako' ),
                'on'       => esc_html__( 'Show', 'miako' ),
                'off'      => esc_html__( 'Hide', 'miako' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_related',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related Products', 'miako' ),
                'on'       => esc_html__( 'Show', 'miako' ),
                'off'      => esc_html__( 'Hide', 'miako' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_description',
                'type'     => 'switch',
                'title'    => esc_html__( 'Description Tab', 'miako' ),
                'on'       => esc_html__( 'Show', 'miako' ),
                'off'      => esc_html__( 'Hide', 'miako' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_reviews',
                'type'     => 'switch',
                'title'    => esc_html__( 'Reviews Tab', 'miako' ),
                'on'       => esc_html__( 'Show', 'miako' ),
                'off'      => esc_html__( 'Hide', 'miako' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_additional_info',
                'type'     => 'switch',
                'title'    => esc_html__( 'Additional Information Tab', 'miako' ),
                'on'       => esc_html__( 'Show', 'miako' ),
                'off'      => esc_html__( 'Hide', 'miako' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_sec_cart',
                'type'     => 'section',
                'title'    => esc_html__( 'Cart Page', 'miako' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_cross_sell',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cross Sell Products', 'miako' ),
                'on'       => esc_html__( 'Show', 'miako' ),
                'off'      => esc_html__( 'Hide', 'miako' ),
                'default'  => true,
            ),
        )
	) 
);
}

// -> END Fields