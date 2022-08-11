<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Pricing_Box' ) ) {

	class RDTheme_VC_Pricing_Box extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "Miako : Pricing Box", 'miako-core' );
			$this->base = 'miako-vc-pricing';
			$this->translate = array(
				'title'   => __( "STANDARD", 'miako-core' ),
				'btntext' => __( "Details", 'miako-core' ),
			);
			parent::__construct();
		}

		public function fields(){
			$fields = array(
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Layout", 'miako-core' ),
					"param_name" => "layout",
					'value' => array(
						__( "Style 1", 'miako-core' )  => 'grid1',
						__( "Style 2", 'miako-core' )  => 'grid2',
						),
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Background Color", 'miako-core' ),
					"param_name" => "bgcolor",
					'value' => "#f8f8f8",
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Background Hover Color", 'academics-core' ),
					"param_name" => "bghover",
					'dependency' => array(
						'element' => 'layout',
						'value' => array( 'grid2' ),
					),
					'value' => "",
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
					"heading" => __( "Price", 'miako-core' ),
					"param_name" => "price",
					"value" => '$56',
					"description" => __( "Including currency sign eg. $59", 'miako-core' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Unit Name", 'miako-core' ),
					"param_name" => "unit",
					"value" => 'mo',
					"description" => __( "eg. month or year. Keep empty if you don't want to show unit", 'miako-core' ),
					),
				array(
					"type" => "textarea",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Features", 'miako-core' ),
					"param_name" => "features",
					"value" => "",
					"description" => __( "One line per feature. Put BLANK keyword if you want blank line. eg.<br/>Investment Plan</br>Education Loan</br>Tax Planning</br>BLANK", 'miako-core' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Button Text", 'miako-core' ),
					"param_name" => "btntext",
					"value" => $this->translate['btntext'],
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Button URL", 'miako-core' ),
					"param_name" => "btnurl",
					"value" => "",
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Maximum width", 'miako-core' ),
					"param_name" => "maxwidth",
					"value" => "",
					"description" => __( "Maximum width in px. Keep empty if you want full width. eg. 300", 'miako-core' ),
					),
				array(
					'type' => 'css_editor',
					'heading' => __( 'Css', 'miako-core' ),
					'param_name' => 'css',
					'group' => __( 'Design options', 'miako-core' ),
					'edit_field_class' => 'vc-no-bg vc-no-border',
					),
				);
			return $fields;
		}

		private function validate( $str ){
			$str = trim( $str );
			// replace BLANK keyword
			if ( strtolower( $str ) == 'blank'  ) {
				return '&nbsp;';
			}
			return $str;
		}

		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(	
				'layout'    => 'grid1',
				'bgcolor'  	=> '#f8f8f8',
				'bghover'  	=> '',
				'title'    	=> $this->translate['title'],
				'price'    	=> '$56',
				'unit'     	=> 'mo',
				'features' 	=> '',
				'btntext'  	=> $this->translate['btntext'],
				'btnurl'   	=> '',
				'maxwidth' 	=> '',
				'css'      	=> '',
				), $atts ) );

			$maxwidth = (int) $maxwidth;

			$features = strip_tags( $features ); // remove tags
			$features = preg_split( "/\R/", $features ); // string to array
			$features = array_map( array( $this, 'validate' ), $features ); // validate
						
			switch ( $layout ) {
				case 'grid2':
				$template = 'pricing-box1';
				break;
				default:
				$template = 'pricing-box';
				break;
			}

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Pricing_Box;