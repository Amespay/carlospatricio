<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Open_Hour' ) ) {

	class RDTheme_VC_Open_Hour extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "Miako: Opening Hour", 'miako-core' );
			$this->base = 'miako-vc-opening-hour';
			$this->translate = array(
				'title' => __( "Working Hours", 'miako-core' ),
			);
			parent::__construct();
		}

		public function fields(){
			$fields = array(
				
				// params group
				array(
					'type' => 'param_group',
					'value' => '',
					'param_name' => 'tabs',
					// Note params is mapped inside param-group:
					'params' => array(
						array(
							'type' => 'textfield',
							'heading' => 'Weekdays',
							'param_name' => 'weekdays',							
							"value" => "Saturday",
							'description' => __( 'Weekdays like "Saturday , Sunday"', 'miako-core' ),
						),
						array(
							'type' => 'textfield',
							'heading' => 'Opening Hour',
							'param_name' => 'openhour',							
							"value" => "10.00AM - 8.00PM",
							'description' => __( 'Opening Hour like "10.00AM - 8.00PM"', 'miako-core' ),
						),
					)
				),				
				array(
					'type' => 'textfield',
					'heading' => 'Title',
					'param_name' => 'title',
					"value" => $this->translate['title'],
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Title color", "miako-core" ),
					"param_name" => "title_color",
					"value" => '#ffffff',
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
				'tabs'    	   => '',
				'weekdays'     => 'Saturday',
				'title_color'  => '#ffffff',
				'openhour'     => '10.00AM - 8.00PM',
				'title'        => $this->translate['title'],				
				'css'          => '',
				), $atts ) );
			

			$template = 'open-hour';

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Open_Hour;