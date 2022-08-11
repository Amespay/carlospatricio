<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Title' ) ) {

	class RDTheme_VC_Title extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "MIAKO: Section Title", 'miako-core' );
			$this->base = 'miako-vc-title';
			$this->translate = array(
				'title' => __( "Welcome To Miako ", 'miako-core' ),
			);
			parent::__construct();
		}

		public function fields(){
			$fields = array(
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Style", 'miako-core' ),
					"param_name" => "layout",
					"value" => array( 
						__( 'Style 1', 'miako-core' ) => 'style1',
						__( 'Style 2(Title with Bar)', 'miako-core' ) => 'style2',
						),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title", 'miako-core' ),
					"param_name" => "title",
					"value" => $this->translate['title'],
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title Font Size( Desktop )", 'miako-core' ),
					"param_name" => "title_font_size",
					"value" => '36',
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title Font Size( Tab )", 'miako-core' ),
					"param_name" => "title_font_size_tab",
					"value" => array(
						__( 'Font Size 32', 'miako-core' ) => 'title32',
						__( 'Font Size 30', 'miako-core' ) => 'title30',
						__( 'Font Size 28', 'miako-core' ) => 'title28',
						__( 'Font Size 24', 'miako-core' ) => 'title24',
						__( 'Font Size 20', 'miako-core' ) => 'title20',
						__( 'Font Size 18', 'miako-core' ) => 'title18',
						__( 'Font Size 16', 'miako-core' ) => 'title16',
						__( 'Font Size 14', 'miako-core' ) => 'title14',
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title Font Size( Mobile )", 'miako-core' ),
					"param_name" => "title_font_size_mob",
					"value" => array(
						__( 'Font Size 28', 'miako-core' ) => 'mitle28',
						__( 'Font Size 32', 'miako-core' ) => 'mitle32',
						__( 'Font Size 30', 'miako-core' ) => 'mitle30',
						__( 'Font Size 24', 'miako-core' ) => 'mitle24',
						__( 'Font Size 20', 'miako-core' ) => 'mitle20',
						__( 'Font Size 18', 'miako-core' ) => 'mitle18',
						__( 'Font Size 16', 'miako-core' ) => 'mitle16',
						__( 'Font Size 14', 'miako-core' ) => 'mitle14',
						),
					),
				array(
					"type" => "textarea",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Subtitle", 'miako-core' ),
					"param_name" => "subtitle",
					"value" => "Tmply dummy text of the printing and typesetting industry. Lorem Ipsum has been theindustry's standard dummy text ever since the 1500s, when an unknown printer took.",
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Title color", "miako-core" ),
					"param_name" => "title_color",
					"value" => '#222222',
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Subtitle color", "miako-core" ),
					"param_name" => "subtitle_color",
					"value" => '#444444',
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Alignment", 'miako-core' ),
					"param_name" => "title_align",
					'value' => array(
						__( "Center", 'miako-core' ) => 'center',
						__( "Left", 'miako-core' )   => 'left',
						__( "Right", 'miako-core' )  => 'right',
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Section Width", 'miako-core' ),
					"param_name" => "section_width",
					'value' => array(
						__( "100%", 'miako-core' )  => '100',
						__( "90%", 'miako-core' )   => '90',
						__( "80%", 'miako-core' )   => '80',
						__( "70%", 'miako-core' )   => '70',
						__( "65%", 'miako-core' )   => '65',
						__( "60%", 'miako-core' )   => '60',
						__( "50%", 'miako-core' )   => '50',
						__( "40%", 'miako-core' )   => '40',
						__( "30%", 'miako-core' )   => '30',
						__( "20%", 'miako-core' )   => '20',
						__( "10%", 'miako-core' )   => '10',
						),
					),
				array(
					'type' => 'css_editor',
					'heading' => __( 'Css', 'miako-core' ),
					'param_name' => 'css',
					'group' => __( 'Design options', 'miako-core' )
				),
			);
			return $fields;
		}

		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(
				'layout'          	  => 'style1',
				'title'           	  => $this->translate['title'],
				'subtitle'        	  => "Tmply dummy text of the printing and typesetting industry. Lorem Ipsum has been theindustry's standard dummy text ever since the 1500s, when an unknown printer took.",		
				'title_color'     	  => '#222222',
				'title_font_size' 	  => '36',
				'title_font_size_tab' => 'title32',
				'title_font_size_mob' => 'mitle28',
				'title_align'     	  => 'center',				
				'subtitle_color'  	  => '#444444',
				'section_width'   	  => '100',
				'css'             	  => '',
				), $atts ) );
				
			$title_font_size = intval( $title_font_size );
			$section_width   = intval( $section_width );
						
			switch ( $layout ) {
				case 'style2':
					$template = 'title-bar';
				break;
				default:
					$template = 'title-1';
				break;
			}

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Title;