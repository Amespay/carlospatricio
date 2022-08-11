<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Law_Slider' ) ) {
		
	class RDTheme_VC_Law_Slider extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "Miako: Law Sliders", 'miako-core' );
			$this->base = 'miako-vc-law';
			$this->translate = array(
				'title'    => __( "Featured Service", 'miako-core' ),
				'cols' => array( 
					__( '1 col', 'miako-core' ) => '12',
					__( '2 col', 'miako-core' ) => '6',
					__( '3 col', 'miako-core' ) => '4',
					__( '4 col', 'miako-core' ) => '3',
					__( '6 col', 'miako-core' ) => '2',
				),
			);
			parent::__construct();
		}
		
		public function load_scripts(){	
			wp_enqueue_style( 'owl-carousel' );
			wp_enqueue_style( 'owl-theme-default' );
			wp_enqueue_script( 'owl-carousel' );	
		}

		public function fields(){
			$terms = get_terms( array('taxonomy' => 'miako_law_category') );
			$category_dropdown = array( 'All Categories' => '0' );
			foreach ( $terms as $category ) {
				$category_dropdown[$category->name] = $category->term_id;
			}

			$fields = array(
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Layout", 'miako-core' ),
					"param_name" => "layout",
					'value' => array( 
						__( 'Layout 1', 'miako-core' ) => 'layout1',
						__( 'Layout 2', 'miako-core' ) => 'layout2',
						__( 'Layout 3', 'miako-core' ) => 'layout3',
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Categories", 'miako-core' ),
					"param_name" => "cat",
					'value' => $category_dropdown,
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Order By", 'miako-core' ),
					"param_name" => "orderby",
					'value' => array(
						__( "None", 'miako-core' )  => '',
						__( "Name", 'miako-core' )  => 'title',
						__( "ID", 'miako-core' )    => 'ID',
						__( "Date", 'miako-core' )  => 'date',
						__( "Menu Order", 'miako-core' )  => 'menu_order',
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Post Display Order", 'miako-core' ),
					"param_name" => "order",
					'value' => array(
						__( "Descending", 'miako-core' )  => 'DESC',
						__( "Ascending", 'miako-core' )  => 'ASC',
						),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Total number of items", 'miako-core' ),
					"param_name" => "slider_item_number",
					"value" => 6,
					'description' => __( 'Write -1 to show all', 'miako-core' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content Limit", 'miako-core' ),
					"param_name" => "limit",
					"value" => 15,
					'description' => __( 'Write number to show all content.', 'miako-core' ),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "", 'miako-core' ),
					"param_name" => "icon_choose",
					"value" => array(
						__( 'Fontawesome Icon', 'miako-core' ) => 'faicon',
						__( 'Image Icon', 'miako-core' )  => 'imgicon',
						__( 'Both Icon & Image', 'miako-core' )  => 'imgandicon',
						),
					"description" => __( "Choose Fontawesome Icon or Image Icon in the Slider. Default: Fontawesome Icon", 'miako-core' ),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 1199px )", 'miako-core' ),
					"param_name" => "col_lg",
					"value" => $this->translate['cols'],
					"std" => "4",
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 991px )", 'miako-core' ),
					"param_name" => "col_md",
					"value" => $this->translate['cols'],
					"std" => "4",
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Tablets > 767px )", 'miako-core' ),
					"param_name" => "col_sm",
					"value" => $this->translate['cols'],
					"std" => "6",
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Phones < 768px )", 'miako-core' ),
					"param_name" => "col_xs",
					"value" => $this->translate['cols'],
					"std" => "12",
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Small Phones < 480px )", 'miako-core' ),
					"param_name" => "col_mobile",
					"value" => $this->translate['cols'],
					"std" => "12",
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Navigation Dots", 'miako-core' ),
					"param_name" => "slider_dots",
					"value" => array(
						__( 'Disabled', 'miako-core' ) => 'false',
						__( 'Enabled', 'miako-core' )  => 'true',
						),
					"description" => __( "Enable or disable navigation dots. Default: Disable", 'miako-core' ),
					"group" => __( "Slider Options", 'miako-core' ),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay", 'miako-core' ),
					"param_name" => "slider_autoplay",
					"value" => array( 
						__( "Enable", "miako-core" )  => 'true',
						__( "Disable", "miako-core" ) => 'false',
						),
					"description" => __( "Enable or disable autoplay. Default: Enable", 'miako-core' ),
					"group" => __( "Slider Options", 'miako-core' ),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Stop on Hover", 'miako-core' ),
					"param_name" => "slider_stop_on_hover",
					"value" => array( 
						__( "Enable", "miako-core" )  => 'true',
						__( "Disable", "miako-core" ) => 'false',
						),
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Stop autoplay on mouse hover. Default: Enable", 'miako-core' ),
					"group" => __( "Slider Options", 'miako-core' ),
					),
				array(
					"type" 		  => "dropdown",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Interval", 'miako-core' ),
					"param_name"  => "slider_interval",
					"value" 	  => array( 
						__( "5 Seconds", "miako-core" )  => '5000',
						__( "4 Seconds", "miako-core" )  => '4000',
						__( "3 Seconds", "miako-core" )  => '3000',
						__( "2 Seconds", "miako-core" )  => '4000',
						__( "1 Seconds", "miako-core" )  => '1000',
						),
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds", 'miako-core' ),
					"group" 	  => __( "Slider Options", 'miako-core' ),
					),
				array(
					"type"		  => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Slide Speed", 'miako-core' ),
					"param_name"  => "slider_autoplay_speed",
					"value" 	  => 200,
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Slide speed in milliseconds. Default: 200", 'miako-core' ),
					"group" 	  => __( "Slider Options", 'miako-core' ),
					),	
				array(
					"type" 		 => "dropdown",
					"holder" 	 => "div",
					"class" 	 => "",
					"heading" 	 => __( "Loop", 'miako-core' ),
					"param_name" => "slider_loop",
					"value" 	 => array( 
						__( "Enable", "miako-core" )  => 'true',
						__( "Disable", "miako-core" ) => 'false',
						),
					"description"=> __( "Loop to first item. Default: Enable", 'miako-core' ),
					"group" 	 => __( "Slider Options", 'miako-core' ),
					),
			);

			return $fields;
		}

		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(
				'layout'                => 'layout1',
				'cat'                   => '',
				'order'					=> 'DESC',
				'orderby'				=> '',
				'slider_item_number'    => '6',
				'icon_choose'    		=> 'faicon',
				'limit'    				=> '15',
				'col_lg'                => '4',
				'col_md'                => '4',
				'col_sm'                => '6',
				'col_xs'                => '12',
				'col_mobile'            => '12',
				'slider_nav'            => 'true',
				'slider_dots'           => 'false',
				'slider_autoplay'       => 'true',
				'slider_stop_on_hover'  => 'true',
				'slider_interval'       => '5000',
				'slider_autoplay_speed' => '200',
				'slider_loop'           => 'true',
				), $atts ) );

			$slider_item_number = intval( $slider_item_number );
			$limit    			= intval( $limit );
			$cat                = empty( $cat ) ? '' : $cat;

			$owl_data = array( 
				'nav'                => ( $slider_nav === 'true' ) ? true : false,
				'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
				'dots'               => ( $slider_dots === 'false' ) ? false : true,
				'autoplay'           => ( $slider_autoplay === 'true' ) ? true : false,
				'autoplayTimeout'    => $slider_interval,
				'autoplaySpeed'      => $slider_autoplay_speed,
				'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true : false,
				'loop'               => ( $slider_loop === 'true' ) ? true : false,
				'margin'             => 0,
				'responsive'         => array(
					'0'    => array( 'items' => 12 / $col_mobile ),
					'480'  => array( 'items' => 12 / $col_xs ),
					'768'  => array( 'items' => 12 / $col_sm ),
					'992'  => array( 'items' => 12 / $col_md ),
					'1200' => array( 'items' => 12 / $col_lg ),
					)
				);
						
			switch ( $layout ) {
				case 'layout3':
					$template = 'law-slider-3';
				break;
				case 'layout2':
					$template = 'law-slider-2';
				break;
				default:
					$template = 'law-slider-1';
				break;
			}
			
			$owl_data = json_encode( $owl_data );
			$this->load_scripts();

			return $this->template( $template, get_defined_vars() );
			
		}
	}
}
	
new RDTheme_VC_Law_Slider;