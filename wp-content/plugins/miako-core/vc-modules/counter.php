<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Counter' ) ) {

	class RDTheme_VC_Counter extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "Miako: Counter", 'miako-core' );
			$this->base = 'miako-vc-counter';
			$this->translate = array(
				'title'   => __( "Happy Client", 'miako-core' ),
			);
			parent::__construct();
		}

		public function load_scripts(){
			wp_enqueue_script( 'rt-waypoints' );
			wp_enqueue_script( 'counterup' );
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
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Counter color", "miako-core" ),
					"param_name" => "counter_color",
					"value" => '#cf9455',
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Title color", "miako-core" ),
					"param_name" => "title_color",
					"value" => '#000000',
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Counter Font Size", 'miako-core' ),
					"param_name" => "icon_size",
					'description' => __( 'Icon size in px eg. 20', 'miako-core' ),
					'value' => '50',
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
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Counter Number", 'miako-core' ),
					"param_name" => "counter_number",
					"value" => '5780',
					'description' => __( 'Number to count eg. 5780', 'miako-core' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Maximun Width", 'miako-core' ),
					"param_name" => "counter_maxwidth",
					"value" => '',
					'description' => __( 'If you want to set a maximum number. eg. 5780', 'miako-core' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Counter Speed", 'miako-core' ),
					"param_name" => "counter_speed",
					"value" => '3000',
					'description' => __( 'The total duration of the count animation in milisecond eg. 5000', 'miako-core' ),
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Counter Steps", 'miako-core' ),
					"param_name" => "counter_steps",
					"value" => '10',
					'description' => __( 'Counter steps eg. 10', 'miako-core' ),
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
					"heading" => __( "Counter Text Size", 'miako-core' ),
					"param_name" => "title_size",
					'description' => __( 'Counter Text size in px eg. 20', 'miako-core' ),
					'value' => '16',
					),
				array(
					'type' => 'css_editor',
					'heading' => __( 'Css', 'miako-core' ),
					'param_name' => 'css',
					'group' => __( 'Design options', 'miako-core' ),
					),
				);
			return $fields;
		}
		
		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(
				'layout'               => 'style1',
				'counter_color'	       => '#cf9455',
				'title_color'	       => '#000000',
				'icon_size'            => '50',
				'title_align'          => 'center',
				'counter_number'       => '5780',
				'counter_maxwidth'     => '',
				'counter_speed'        => '3000',
				'counter_steps'        => '10',
				'title'			       => $this->translate['title'],
				'title_size'           => '16',
				'css'                  => '',
				), $atts ) );

			// validation
			$counter_speed   = intval( $counter_speed );
			$counter_steps   = intval( $counter_steps );

			$number          = intval( $counter_number );
			$text            = explode( $number, $counter_number );
			$counter_number  = $number;
		
			$this->load_scripts();

			switch ( $layout ) {
				case 'style2':
					$template = 'counter-2';
				break;
				default:
					$template = 'counter-1';
				break;
			}

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Counter;