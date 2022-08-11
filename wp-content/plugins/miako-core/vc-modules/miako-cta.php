<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Call_To_Action' ) ) {

	class RDTheme_VC_Call_To_Action extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "MIAKO: Call to Action", 'miako-core' );
			$this->base = 'miako-vc-call-to-action';
			$this->translate = array(
				'title' => __( "If you have any  problem in your life ... We are available", 'miako-core' ),
				'subtitle' => __( "Buy the lawyer wordpress theme and grow with us", 'miako-core' ),
				'title_2nd' => __( "Toll Free. Call Us", 'miako-core' ),
				'buttontext' => __( "Get Free Consultation", 'miako-core' ),
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
						__( 'Style 2', 'miako-core' ) => 'style2',
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
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title color", 'miako-core' ),
					"param_name" => "title_color",
					"value" => "",
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Subtitle", 'miako-core' ),
					"param_name" => "subtitle",
					"value" => $this->translate['subtitle'],
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'style2' ),
					),
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Subtitle color", 'miako-core' ),
					"param_name" => "subtitle_color",
					"value" => "",
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "2nd Title Text ", 'miako-core' ),
					"param_name" => "title_2nd",
					"value" => 'Toll Free. Call Us',
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'style2' ),
					),
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Phone Number", 'miako-core' ),
					"param_name" => "phone_number",
					"value" => '+88 555 66630',
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'style2' ),
					),
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Button Text", 'miako-core' ),
					"param_name" => "buttontext",
					"value" => $this->translate['buttontext'],
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'style1' ),
					),
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Button URL", 'miako-core' ),
					"param_name" => "btnurl",
					"value" => '#',
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'style1' ),
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
				'layout'        	=> 'style1',
				'title'      		=> $this->translate['title'],
				'title_2nd'    		=> $this->translate['title_2nd'],
				'title_color'      	=> '',
				'buttontext' 		=> $this->translate['buttontext'],
				'subtitle'   		=> $this->translate['subtitle'],
				'subtitle_color'   	=> '',
				'btnurl'     		=> '#',
				'phone_number'  	=> '+88 555 66630',
				'css'        		=> '',
				), $atts ) );
				
			switch ( $layout ) {
				case 'style2':
					$template = 'miako-cta-2';
				break;	
				default:
					$template = 'miako-cta-1';
				break;
			}
			
			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Call_To_Action;