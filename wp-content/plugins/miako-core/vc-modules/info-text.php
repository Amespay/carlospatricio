<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Info_Text' ) ) {

	class RDTheme_VC_Info_Text extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "Miako: Info Text", 'miako-core' );
			$this->base = 'miako-vc-infotext';
			$this->translate = array(
				'title' => __( "I am title", 'miako-core' ),
				'button_text' => __( "Read More", 'miako-core' ),
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
						__( 'Layout 1', 'miako-core' ) => 'layout10',
						__( 'Layout 2', 'miako-core' ) => 'layout1',
						__( 'Layout 3', 'miako-core' ) => 'layout2',
						__( 'Layout 4', 'miako-core' ) => 'layout3',
						__( 'Layout 5', 'miako-core' ) => 'layout4',
						__( 'Layout 6', 'miako-core' ) => 'layout5',
						__( 'Layout 7', 'miako-core' ) => 'layout6',
						__( 'Layout 8', 'miako-core' ) => 'layout7',
						__( 'Layout 9', 'miako-core' ) => 'layout8',
						__( 'Layout 10 - Dark Background', 'miako-core' ) => 'layout9',
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon Type", 'miako-core' ),
					"param_name" => "icontype",
					'value' => array( 
						__( 'FlatIcon', 'miako-core' )     => 'flaticon',
						__( 'FontAwesome', 'miako-core' )  => 'fontawesome',
						__( 'Custom Image', 'miako-core' ) => 'image',
						),
					),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Flaticon', 'miako-core' ),
					'param_name' => 'icon_flat',
					"value" => 'flaticon-custom-target',
					'settings' => array(
						'emptyIcon' => false,
						'type' => 'flaticon',
						'iconsPerPage' => 160,
						),
					'dependency' => array(
						'element' => 'icontype',
						'value'   => array( 'flaticon' ),
						),
					),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'FontAwesome Icon', 'miako-core' ),
					'param_name' => 'icon_fa',
					"value" => 'fa fa-bar-chart',
					'settings' => array(
						'emptyIcon' => false,
						'iconsPerPage' => 160,
						),
					'dependency' => array(
						'element' => 'icontype',
						'value'   => array( 'fontawesome' ),
						),
					),
				array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Upload icon image", 'miako-core' ),
					"param_name" => "image",
					'dependency' => array(
						'element' => 'icontype',
						'value'   => array( 'image' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon style", 'miako-core' ),
					"param_name" => "icon_style",
					'value' => array( 
						__( 'Rounded', 'miako-core' )    => 'rounded',
						__( 'Squire', 'miako-core' )     => 'squire',
					),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout3' ),
					),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon border", 'miako-core' ),
					"param_name" => "icon_border",
					"value" => array( 
						__( "Disabled", 'miako-core' ) => 'false',
						__( "Enabled", 'miako-core' )  => 'true',
					),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout3' ),
					),
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon color", 'miako-core' ),
					"param_name" => "color",
					"value" => "#222222",
					'dependency' => array(
						'element' => 'icontype',
						'value'   => array( 'flaticon', 'fontawesome' ),
						),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout1', 'layout2', 'layout3', 'layout4', 'layout8', 'layout9', 'layout10' ),
						),
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon Background color", 'miako-core' ),
					"param_name" => "icon_bgcolor",
					"value" => "",
					'dependency' => array(
						'element' => 'icontype',
						'value'   => array( 'flaticon', 'fontawesome' ),
						),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout3', 'layout4' ),
						),
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon Background color", 'miako-core' ),
					"param_name" => "icon_bgcolor_6",
					"value" => "",
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout6' ),
						),
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon Background color", 'miako-core' ),
					"param_name" => "icon_bgcolor_10",
					"value" => "",
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout10' ),
						),
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Bar color", 'miako-core' ),
					"param_name" => "bar_color",
					"value" => "",
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout10' ),
						),
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Mouseover color", 'miako-core' ),
					"param_name" => "hovercolor",
					"value" => "#000000",
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout5', 'layout10' ),
						),
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Background color", 'miako-core' ),
					"param_name" => "bgcolor",
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout1', 'layout3', 'layout4', 'layout7' ),
						),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon size", 'miako-core' ),
					"param_name" => "size",
					'description' => __( 'Icon size in px eg. 30', 'miako-core' ),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout1', 'layout2', 'layout3', 'layout4', 'layout7' ),
						),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon padding", 'miako-core' ),
					"param_name" => "icon_padding",
					'description' => __( "Icon padding in px eg. 15. Doesn't work on custom image" , 'miako-core' ),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout1', 'layout3', 'layout4' ),
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
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout1', 'layout3', 'layout4', 'layout9', 'layout10' ),
						),
					"value" => "#222222",
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title Hover Color", 'miako-core' ),
					"param_name" => "title_hover_color",
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout1', 'layout3', 'layout4', 'layout10' ),
						),
					"value" => "#cf9455",
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title URL", 'miako-core' ),
					"param_name" => "url",
					'description' => __( "keep this field empty if you don't want the title linkable", 'miako-core' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title Font Size", 'miako-core' ),
					"param_name" => "title_size",
					'description' => __( 'Title font size in px. eg 20. If not defined, default h3 font size will be used', 'miako-core' ),
					),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content", 'miako-core' ),
					"param_name" => "content",
					"value" => __( 'I am Info Text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content Font Size", 'miako-core' ),
					"param_name" => "content_size",
					'description' => __( 'Content font size in px eg. 15. If not defined, default body font size will be used', 'miako-core' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content Width", 'miako-core' ),
					"param_name" => "width",
					'description' => __( "Content maximum width in px eg 360. Keep this field empty if you want full width", 'miako-core' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Spacing Before Title", 'miako-core' ),
					"param_name" => "spacing_top",
					"description" => __( "Spacing between icon and title in px eg. 25", 'miako-core' ),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout2', 'layout3', 'layout4', 'layout6', 'layout7' ),
						),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Spacing After Title", 'miako-core' ),
					"param_name" => "spacing_bottom",
					"description" => __( "Spacing between title and content in px eg. 12", 'miako-core' ),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout1', 'layout2', 'layout3', 'layout4', 'layout5', 'layout6', 'layout7', 'layout8','layout9' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Display Button", 'miako-core' ),
					"param_name" => "display_button",
					"value" => array( 
						__( "Enabled", 'miako-core' )  => 'true',
						__( "Disabled", 'miako-core' ) => 'false',
					),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout7' ),
					),
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Button Text", 'miako-core' ),
					"param_name" => "button_text",
					"value" => $this->translate['button_text'],
					'dependency' => array(
						'element' => 'display_button',
						'value'   => array( 'true' ),
					),
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Button URL", 'miako-core' ),
					"param_name" => "button_url",
					'dependency' => array(
						'element' => 'display_button',
						'value'   => array( 'true' ),
					),
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
				'layout'         	=> 'layout10',
				'icontype'       	=> 'flaticon',
				'icon_flat'      	=> 'flaticon-custom-target',
				'icon_fa'        	=> 'fa fa-bar-chart',
				'color'          	=> '#222222',
				'icon_bgcolor'   	=> '',
				'icon_bgcolor_6'    => '#f4f4f4',
				'icon_bgcolor_10'   => '',
				'bar_color'   		=> '',
				'hovercolor'     	=> '#000000',
				'bgcolor'        	=> '',
				'image'          	=> '',
				'icon_style'     	=> 'rounded',
				'icon_border'    	=> 'false',
				'size'           	=> '',
				'icon_padding'   	=> '',
				'title'          	=> $this->translate['title'],
				'title_color'    	=> '#222222',
				'title_hover_color' => '#cf9455',
				'url'            	=> '',
				'title_size'     	=> '',
				'content_size'   	=> '',
				'width'          	=> '',
				'spacing_top'    	=> '',
				'spacing_bottom' 	=> '',
				'display_button' 	=> 'true',
				'button_text' 		=> $this->translate['button_text'],
				'button_url' 		=> '',
				'css'            	=> '',
				), $atts ) );

			// validation
			$icon  = ( $icontype == 'flaticon' ) ? $icon_flat : $icon_fa;

			if ( $icontype == 'flaticon' ) {
				vc_icon_element_fonts_enqueue( $icon );
			}			
						
			switch ( $layout ) {
				case 'layout9':
					$template = 'info-text-9';
				break;
				case 'layout8':
					$template = 'info-text-8';
				break;
				case 'layout7':
					$template = 'info-text-7';
				break;
				case 'layout6':
					$template = 'info-text-6';
				break;
				case 'layout5':
					$template = 'info-text-5';
				break;
				case 'layout3':
					$template = 'info-text-3';
				break;
				case 'layout2':
					$template = 'info-text-2';
				break;
				case 'layout1':
					$template = 'info-text';
				break;	
				default:
					$template = 'info-text-10';
				break;
			}

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Info_Text;