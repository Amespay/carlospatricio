<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RT_Postmeta' ) ) {
	return;
}

$Postmeta = RT_Postmeta::getInstance();

/*-------------------------------------
#. Page Settings
---------------------------------------*/
$nav_menus = wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$nav_menus = array( 'default' => __( 'Default', 'miako-core' ) ) + $nav_menus;

$Postmeta->add_meta_box( 'page_settings', __( 'Layout Settings', 'miako-core' ), array( 'page', 'post', 'miako_law' , 'miako_team', 'miako_testimonial' ), '', '', 'high', array(
	'fields' => array(
		'miako_layout' => array(
			'label'   => __( 'Layout', 'miako-core' ),
			'type'    => 'select',
			'options' => array(
				'default'       => __( 'Default', 'miako-core' ),
				'full-width'    => __( 'Full Width', 'miako-core' ),
				'left-sidebar'  => __( 'Left Sidebar', 'miako-core' ),
				'right-sidebar' => __( 'Right Sidebar', 'miako-core' ),
				),
			'default'  => 'default',
			),
		'miako_page_menu' => array(
			'label'    => __( 'Main Menu', 'miako-core' ),
			'type'     => 'select',
			'options'  => $nav_menus,
			'default'  => 'default',
			),
		'miako_tr_header' => array(
			'label'    	  => __( 'Transparent Header', 'miako-core' ),
			'type'     	  => 'select',
			'options'  	  => array(
				'default' => __( 'Default', 'miako-core' ),
				'on'      => __( 'Enabled', 'miako-core' ),
				'off'     => __( 'Disabled', 'miako-core' ),
				),
			'default'  => 'default',
			),
		'miako_top_bar' => array(
			'label' 	  => __( 'Top Bar', 'miako-core' ),
			'type'  	  => 'select',
			'options' => array(
				'default' => __( 'Default', 'miako-core' ),
				'on'      => __( 'Enabled', 'miako-core' ),
				'off'     => __( 'Disabled', 'miako-core' ),
				),
			'default'  	  => 'default',
			),
		'miako_top_bar_style' => array(
			'label' 	=> __( 'Top Bar Layout', 'miako-core' ),
			'type'  	=> 'select',
			'options'	=> array(
				'default' => __( 'Default', 'miako-core' ),
				'1'       => __( 'Layout 1', 'miako-core' ),
				'2'       => __( 'Layout 2', 'miako-core' ),
				'3'       => __( 'Layout 3', 'miako-core' ),
				),
			'default'   => 'default',
			),
		'miako_header' => array(
			'label'   => __( 'Header Layout', 'miako-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => __( 'Default', 'miako-core' ),
				'1'       => __( 'Layout 1', 'miako-core' ),
				'2'       => __( 'Layout 2', 'miako-core' ),
				'3'       => __( 'Layout 3', 'miako-core' ),
				'4'       => __( 'Layout 4', 'miako-core' ),
				'5'       => __( 'Layout 5', 'miako-core' ),
				'6'       => __( 'Layout 6', 'miako-core' ),
				),
			'default'  => 'default',
			),
		'miako_top_padding' => array(
			'label'   => __( 'Content Padding Top', 'miako-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => __( 'Default', 'miako-core' ),
				'0px'     => '0px',
				'10px'    => '10px',
				'20px'    => '20px',
				'30px'    => '30px',
				'40px'    => '40px',
				'50px'    => '50px',
				'60px'    => '60px',
				'70px'    => '70px',
				'80px'    => '80px',
				'90px'    => '90px',
				'100px'   => '100px',
				),
			'default'  => 'default',
			),
		'miako_bottom_padding' => array(
			'label'   => __( 'Content Padding Bottom', 'miako-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => __( 'Default', 'miako-core' ),
				'0px'     => '0px',
				'10px'    => '10px',
				'20px'    => '20px',
				'30px'    => '30px',
				'40px'    => '40px',
				'50px'    => '50px',
				'60px'    => '60px',
				'70px'    => '70px',
				'80px'    => '80px',
				'90px'    => '90px',
				'100px'   => '100px',
				),
			'default'  => 'default',
			),
		'miako_banner' => array(
			'label'   => __( 'Banner', 'miako-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => __( 'Default', 'miako-core' ),
				'on'	  => __( 'Enabled', 'miako-core' ),
				'off'	  => __( 'Disabled', 'miako-core' ),
				),
			'default'  => 'default',
			),
		'miako_breadcrumb' => array(
			'label'   => __( 'Breadcrumb', 'miako-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => __( 'Default', 'miako-core' ),
				'on'      => __( 'Enabled', 'miako-core' ),
				'off'	  => __( 'Disabled', 'miako-core' ),
				),
			'default'  => 'default',
			),
		'miako_banner_type' => array(
			'label' => __( 'Banner Background Type', 'miako-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'miako-core' ),
				'bgimg'    => __( 'Background Image', 'miako-core' ),
				'bgcolor'  => __( 'Background Color', 'miako-core' ),
				),
			'default' => 'default',
			),
		'miako_banner_bgimg' => array(
			'label' => __( 'Banner Background Image', 'miako-core' ),
			'type'  => 'image',
			'desc'  => __( 'If not selected, default will be used', 'miako-core' ),
			),
		'miako_banner_bgcolor' => array(
			'label' => __( 'Banner Background Color', 'miako-core' ),
			'type'  => 'color_picker',
			'desc'  => __( 'If not selected, default will be used', 'miako-core' ),
			),
		),
	) );

/*-------------------------------------
#. Team
---------------------------------------*/
$team_socials = array(
	'facebook' => array(
		'label' => __( 'Facebook', 'miako-core' ),
		'type'  => 'text',
		'icon'  => 'fa-facebook',
		'color' => '#3b5998',
		),
	'twitter' => array(
		'label' => __( 'Twitter', 'miako-core' ),
		'type'  => 'text',
		'icon'  => 'fa-twitter',
		'color' => '#1da1f2',
		),
	'linkedin' => array(
		'label' => __( 'Linkedin', 'miako-core' ),
		'type'  => 'text',
		'icon'  => 'fa-linkedin',
		'color' => '#006fa6',
		),
	'gplus' => array(
		'label' => __( 'Google Plus', 'miako-core' ),
		'type'  => 'text',
		'icon'  => 'fa-google-plus',
		'color' => '#dd4f43',
		),
	'skype' => array(
		'label' => __( 'Skype', 'miako-core' ),
		'type'  => 'text',
		'icon'  => 'fa-skype',
		'color' => '#02B4EB',
		),
	'youtube' => array(
		'label' => __( 'Youtube', 'miako-core' ),
		'type'  => 'text',
		'icon'  => 'fa-youtube-play',
		'color' => '#DD2C28',
		),
	'pinterest' => array(
		'label' => __( 'Pinterest', 'miako-core' ),
		'type'  => 'text',
		'icon'  => 'fa-pinterest-p',
		'color' => '#CB1F27',
		),
	'instagram' => array(
		'label' => __( 'Instagram', 'miako-core' ),
		'type'  => 'text',
		'icon'  => 'fa-instagram',
		'color' => '#AA3DB2',
		),
	'github' => array(
		'label' => __( 'Github', 'miako-core' ),
		'type'  => 'text',
		'icon'  => 'fa-github',
		'color' => '#111',
		),
	'stackoverflow' => array(
		'label' => __( 'Stackoverflow', 'miako-core' ),
		'type'  => 'text',
		'icon'  => 'fa-stack-overflow',
		'color' => '#F48024',
		),
	);

$team_socials = apply_filters( 'team_socials', $team_socials );

RDTheme::$team_social_fields = $team_socials;

$Postmeta->add_meta_box( 'team_settings', __( 'Team Member Settings', 'miako-core' ), array( 'miako_team' ), '', '', 'high', array(
	'fields' => array(
		'miako_team_designation' => array(
			'label' => __( 'Designation', 'miako-core' ),
			'type'  => 'text',
			),
		'miako_team_address' => array(
			'label' => __( 'Address', 'miako-core' ),
			'type'  => 'text',
			),
		'miako_team_fax' => array(
			'label' => __( 'Fax', 'miako-core' ),
			'type'  => 'text',
			),
		'miako_team_phone' => array(
			'label' => __( 'Phone Number', 'miako-core' ),
			'type'  => 'text',
			),
		'miako_team_email' => array(
			'label' => __( 'Email', 'miako-core' ),
			'type'  => 'text',
			),			
		/*'miako_team_other' => array(
			'label' => __( 'Show Other Team Members', 'redchili-core' ),
			'type'  => 'select',
			'options' => array(				
				'1'    => 'Yes',
				'0'     => 'No',
				),
			'default'  => '1',
			),*/
		'miako_team_socials_header' => array(
			'label' => __( 'Socials', 'miako-core' ),
			'type'  => 'header',
			'desc'  => __( 'Put your social links here', 'miako-core' ),
			),
		'miako_team_socials' => array(
			'type'  => 'group',
			'value'  => $team_socials
			),
		)
	)
);

$Postmeta->add_meta_box( 'team_skills', __( 'Team Skills', 'miako-core' ), array( 'miako_team' ), '', '', 'high', array(
	'fields' => array(
		'miako_team_skill' => array(
			'type'  => 'repeater',
			'button' => __( 'Add New Skill', 'miako-core' ),
			'value'  => array(
				'skill_name' => array(
					'label' => __( 'Skill Name', 'miako-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. Investment', 'miako-core' ),
					),
				'skill_value' => array(
					'label' => __( 'Skill Percentage (%)', 'miako-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. 75', 'miako-core' ),
					),
				)
			),
		)
	)
);

/*-------------------------------------
#. Testimonial
---------------------------------------*/
$Postmeta->add_meta_box( 'testimonial_info', __( 'Testimonial Info', 'miako-core' ), array( 'miako_testimonial' ), '', '', 'high', array(
	'fields' => array(
		'miako_tes_designation' => array(
			'label' => __( 'Designation', 'miako-core' ),
			'type'  => 'text',
			),
		)
	)
);

/*-------------------------------------
#. Law
---------------------------------------*/
$Postmeta->add_meta_box( 'law_info', __( 'Law Info', 'miako-core' ), array( 'miako_law' ), '', '', 'high', array(
	'fields' => array(
		'miako_law_icon' => array(
			'label' => __( 'Fontawesome Icon', 'miako-core' ),
			'type'  => 'text',
			'desc'  => __( 'Please write the Fontawesome Icon Class name here. Like : " fa-pencil-square-o "', 'miako-core' ),
			),
		'miako_law_img_slider' => array(
			'label' => __( 'Image Icon', 'miako-core' ),
			'type'  => 'image',
			'desc'  => __( 'This image will show in the slider', 'miako-core' ),
			),
		)
	)
);