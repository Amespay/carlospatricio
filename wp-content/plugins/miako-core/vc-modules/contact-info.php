<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Contact_info' ) ) {

	class RDTheme_VC_Contact_info extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "Miako: Contact Info", 'miako-core' );
			$this->base = 'miako-vc-contact-info';
			$this->translate = array(
				'title' => __( "OFFICE ADDRESS", 'miako-core' ),
			);
			parent::__construct();
		}

		public function fields(){
			$fields = array(
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title", 'miako-core' ),
					"param_name" => "title",
					"value" => $this->translate['title'],
				),
				array(
					"type" => "textarea",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Description", 'miako-core' ),
					"param_name" => "company_description",
					"value" => "Rimply dummy text of the printing and typesetting industry.Ipsum has been the industry's standard dummy text ever since thwhen an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leaplectronicRimply dummy text of the printing.",
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Title color", "miako-core" ),
					"param_name" => "title_color",
					"value" => '#000000',
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Description color", "miako-core" ),
					"param_name" => "description_color",
					"value" => '#666666',
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Address", 'miako-core' ),
					"param_name" => "address",
					"value" => "1PO Box Collins Street West, Australia",					
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Phone", 'miako-core' ),
					"param_name" => "phone",
					"value" => "+0123456789",
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Email", 'miako-core' ),
					"param_name" => "email",
					"value" => "info@example.com",
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Fax", 'miako-core' ),
					"param_name" => "fax",
					"value" => "+0123456789",
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
				'title'           	   => $this->translate['title'],
				'company_description'  => "Rimply dummy text of the printing and typesetting industry.Ipsum has been the industry's standard dummy text ever since thwhen an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leaplectronicRimply dummy text of the printing.",
				'title_color'     	   => '#000000',
				'description_color'    => '#666666',
				'address' 		  	   => '1PO Box Collins Street West, Australia',
				'phone'   		  	   => '+0123456789',
				'email'   		  	   => 'info@example.com',
				'fax'     		  	   => '+0123456789',
				'css'             	   => '',
				), $atts ) );

			$template = 'contact-info';

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Contact_info;