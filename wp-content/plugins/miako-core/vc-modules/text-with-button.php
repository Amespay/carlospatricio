<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Text_With_Button' ) ) {
		
	class RDTheme_VC_Text_With_Button extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "Miako: Text with Button", 'miako-core' );
			$this->base = 'miako-vc-text-with-button';
			$this->translate = array(
				'title'   	    => __( 'Need  Help?', 'miako-core' ),
				'button_text'   => __( 'Make An Appointment', 'miako-core' ),
			);
			parent::__construct();
		}

		public function fields(){
			$fields = array(
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Alignment", 'miako-core' ),
					"param_name" => "section_align",
					"value" => array( 
						__('Center', 'miako-core') => 'center',
						__('Left', 'miako-core')   => 'left',
						__('Right', 'miako-core')  => 'right',
						),
					),
				array(
					"type"        => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Title", 'miako-core' ),
					"param_name"  => "title",
					"value" 	  => $this->translate['title'],
					"rows" 		  => "1",
				),
				array(
					"type" 		  => "colorpicker",
					"class" 	  => "",
					"heading" 	  => __( "Title color", "miako-core" ),
					"param_name"  => "title_color",
					"value" 	  => '#222222',
					),
				array(
					"type"        => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Title Font Size", 'miako-core' ),
					"param_name"  => "title_font_size",
					"value" 	  => '36',
				),
				array(
					"type" 		  => "dropdown",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Title Font Weight", 'miako-core' ),
					"param_name"  => "title_font_weight",
					"value" => array( 
						__('Light', 'miako-core') => 'light',
						__('Bold', 'miako-core')  => 'bold',
						),
				),
				array(
					"type" 		  => "textarea_html",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Content", 'miako-core' ),
					"param_name"  => "content",
					"value" 	  =>  __( "Mimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five cent into electronining essentially unchanged." , 'miako-core' ),
					"rows"		  => "1",
					),					
				array(
					"type" 		  => "colorpicker",
					"class" 	  => "",
					"heading" 	  => __( "Content color", "miako-core" ),
					"param_name"  => "content_color",
					"value" 	  => '#222222',
					),
				array(
					"type" 		  => "dropdown",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Overlay Action", 'miako-core' ),
					"param_name"  => "overlay_action",
					"value" 	  => array( 
						__('Enabled', 'miako-core')  => 'true',
						__('Disabled', 'miako-core') => 'false',
						),
					),
				array(
					"type" 		  => "dropdown",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Button Style", 'miako-core' ),
					"param_name"  => "button_style",
					"value" 	  => array( 
						__('Light Background', 'miako-core') => 'style1',
						__('Dark Background', 'miako-core')  => 'style2',
						),
					),
				array(
					"type"        => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Button Text", 'miako-core' ),
					"param_name"  => "button_text",
					"value" 	  => $this->translate['button_text'],
				),
				array(
					"type"        => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Button URL", 'miako-core' ),
					"param_name"  => "button_url",
					"value" 	  => '#',
				),
				array(
					'type' 		 => 'css_editor',
					'heading' 	 => __( 'Css', 'miako-core' ),
					'param_name' => 'css',
					'group' 	 => __( 'Design options', 'miako-core' )
					),
			);
			return $fields;
		}

		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(
				'title'      		=> $this->translate['title'] ,
				'title_color' 		=> '#222222',
				'title_font_size' 	=> '36',
				'title_font_weight' => 'light',
				'content_color' 	=> '#222222',
				'overlay_action' 	=> 'true',
				'button_text' 	    => $this->translate['button_text'],
				'button_url' 	    => '#',
				'button_style' 	    => 'style1',
				'section_align' 	=> 'center',
				'css'             	=> '',
				), $atts ) );			
			//validation			
			$title_font_size      = intval( $title_font_size );
			
			$template = 'text-with-button';

			return $this->template( $template, get_defined_vars() );
			
		}
	}
}

new RDTheme_VC_Text_With_Button;