<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Team' ) ) {

	class RDTheme_VC_Team extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "Miako: Team Slider", 'miako-core' );
			$this->base = 'miako-vc-team';
			$this->translate = array(
				'title'    => __( "Our Expert Attorney", 'miako-core' ),
				'cols'   => array( 
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
			$terms = get_terms( array( 'taxonomy' => 'miako_team_category' ) );
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
						__( 'Layout 1', 'miako-core' ) => 'layout5',
						__( 'Layout 2', 'miako-core' ) => 'layout1',
						__( 'Layout 3', 'miako-core' ) => 'layout2',
						__( 'Layout 4', 'miako-core' ) => 'layout3',
						__( 'Layout 5', 'miako-core' ) => 'layout4',
						__( 'Layout 6', 'miako-core' ) => 'layout6',
						__( 'Layout 7', 'miako-core' ) => 'layout7',
						),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Box Background Color", "miako-core" ),
					"param_name" => "box_bgcolor",
					"value" => '#f5f5f5',
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout4' ),
						),
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Box Background Hover Color", "miako-core" ),
					"param_name" => "box_bghovercolor",
					"value" => '',
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout4' ,'layout5' ),
						),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Section Title Display", 'miako-core' ),
					"param_name" => "showtitle",
					"value" => array( 
						__( "Enabled", "miako-core" )  => 'true',
						__( "Disabled", "miako-core" ) => 'false',
						),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1', 'layout3', 'layout4', 'layout5' ),
						),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Section Title", 'miako-core' ),
					"param_name" => "title",
					"value" => $this->translate['title'],
					'dependency' => array(
						'element' => 'showtitle',
						'value'   => array( 'true' ),
						),
					),				
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Section Title Color", "miako-core" ),
					"param_name" => "section_title_color",
					"value" => '#222222',
					'dependency' => array(
						'element' => 'showtitle',
						'value'   => array( 'true' ),
						),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Designation display", 'miako-core' ),
					"param_name" => "designation_display",
					"value" => array( 
						'Enabled'  => 'true',
						'Disabled' => 'false',
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
					"type" 		  => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __( "Word count", 'miako-core' ),
					"param_name"  => "content_limit",
					"value" 	  => '18',
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout2' ),
						),
					'description' => __( 'Maximum number of words', 'miako-core' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Total number of items", 'miako-core' ),
					"param_name" => "slider_item_number",
					"value" => 5,
					'description' => __( 'Write -1 to show all', 'miako-core' ),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 1199px )", 'miako-core' ),
					"param_name" => "col_lg",
					"value" => $this->translate['cols'],
					"std" => "3",
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout3' , 'layout4' , 'layout5', 'layout6', 'layout7' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 991px )", 'miako-core' ),
					"param_name" => "col_md",
					"value" => $this->translate['cols'],
					"std" => "4",
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout3' , 'layout4' , 'layout5', 'layout6', 'layout7' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Tablets > 767px )", 'miako-core' ),
					"param_name" => "col_sm",
					"value" => $this->translate['cols'],
					"std" => "4",
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout3' , 'layout4', 'layout5', 'layout6', 'layout7' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Phones < 768px )", 'miako-core' ),
					"param_name" => "col_xs",
					"value" => $this->translate['cols'],
					"std" => "6",
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout3' , 'layout4' , 'layout5', 'layout6', 'layout7' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Small Phones < 480px )", 'miako-core' ),
					"param_name" => "col_mobile",
					"value" => $this->translate['cols'],
					"std" => "12",
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout3' , 'layout4' , 'layout5', 'layout6', 'layout7' ),
						),
					),
				// Slider options
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Navigation Arrow", 'miako-core' ),
					"param_name" => "slider_nav",
					"value" => array(
						__( "Enable", "redchili-core" )  => 'true',
						__( "Disable", "redchili-core" ) => 'false',
						),					
					"group" => __( "Slider Options", 'miako-core' ),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout5' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Navigation Dots", 'miako-core' ),
					"param_name" => "slider_dots",
					"value" => array(
						__( 'Enabled', 'miako-core' )  => 'true',
						__( 'Disabled', 'miako-core' ) => 'false',
						),
					"group" => __( "Slider Options", 'miako-core' ),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout5' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay", 'miako-core' ),
					"param_name" => "slider_autoplay",
					"value" => array( 
						__( 'Enabled', 'miako-core' )  => 'true',
						__( 'Disabled', 'miako-core' ) => 'false',
						),
					"description" => __( "Enable or disable autoplay. Default: Enable", 'miako-core' ),
					"group" => __( "Slider Options", 'miako-core' ),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout2' , 'layout3' , 'layout4' , 'layout5' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Stop on Hover", 'miako-core' ),
					"param_name" => "slider_stop_on_hover",
					"value" => array( 
						__( 'Enabled', 'miako-core' )  => 'true',
						__( 'Disabled', 'miako-core' ) => 'false',
						),
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Stop autoplay on mouse hover. Default: Enable", 'miako-core' ),
					"group" => __( "Slider Options", 'miako-core' ),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout2' , 'layout3' , 'layout4' , 'layout5' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay Interval", 'miako-core' ),
					"param_name" => "slider_interval",
					"value" => array( 
						__( '5 Seconds', 'miako-core' ) => '5000',
						__( '4 Seconds', 'miako-core' ) => '4000',
						__( '3 Seconds', 'miako-core' ) => '3000',
						__( '2 Seconds', 'miako-core' ) => '4000',
						__( '1 Second', 'miako-core' )  => '1000',
						),
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds", 'miako-core' ),
					"group" => __( "Slider Options", 'miako-core' ),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout2' , 'layout3' , 'layout4' , 'layout5' ),
						),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay Slide Speed", 'miako-core' ),
					"param_name" => "slider_autoplay_speed",
					"value" => 200,
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Slide speed in milliseconds. Default: 200", 'miako-core' ),
					"group" => __( "Slider Options", 'miako-core' ),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout2' , 'layout3' , 'layout4' , 'layout5'  ),
						),
					),	
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Loop", 'miako-core' ),
					"param_name" => "slider_loop",
					"value" => array( 
						__( 'Enabled', 'miako-core' )  => 'true',
						__( 'Disabled', 'miako-core' ) => 'false',
						),
					"description" => __( "Loop to first item. Default: Enable", 'miako-core' ),
					"group" => __( "Slider Options", 'miako-core' ),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout2' , 'layout3' , 'layout4' , 'layout5' ),
						),
					)
			);

			return $fields;
		}

		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(
				'layout'                => 'layout5',
				'title'     			=> $this->translate['title'],
				'showtitle'             => 'true',
				'section_title_color'   => '#222222',
				'box_bgcolor'   		=> '#f5f5f5',
				'box_bghovercolor'   	=> '',
				'content_limit'         => '18',
				'slider_item_number'    => '5',
				'cat'                   => '',
				'order'					=> 'DESC',
				'orderby'				=> '',
				'designation_display'   => 'true',
				'col_lg'                => '3',
				'col_md'                => '4',
				'col_sm'                => '4',
				'col_xs'                => '6',
				'col_mobile'            => '12',
				// slider
				'slider_nav'            => 'true',
				'slider_dots'           => 'false',
				'slider_autoplay'       => 'true',
				'slider_stop_on_hover'  => 'true',
				'slider_interval'       => '5000',
				'slider_autoplay_speed' => '200',
				'slider_loop'           => 'true',
				), $atts ) );
			
			// validation
			$content_limit         = intval( $content_limit );
			$slider_item_number    = intval( $slider_item_number );
			$cat                   = empty( $cat ) ? '' : $cat;
			$designation_display   = $designation_display == 'true' ? true : false;

			$owl_data = array( 
				'nav'                => ( $slider_nav === 'true' ) ? true : false,
				'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
				'dots'               => ( $slider_dots === 'true' ) ? true : false,
				'autoplay'           => ( $slider_autoplay === 'true' ) ? true : false,
				'autoplayTimeout'    => $slider_interval,
				'autoplaySpeed'      => $slider_autoplay_speed,
				'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true : false,
				'loop'               => ( $slider_loop === 'true' ) ? true : false,
				'margin'             => 20,
				'responsive'         => array(
					'0'    => array( 'items' => 12 / $col_mobile ),
					'480'  => array( 'items' => 12 / $col_xs ),
					'768'  => array( 'items' => 12 / $col_sm ),
					'992'  => array( 'items' => 12 / $col_md ),
					'1200' => array( 'items' => 12 / $col_lg ),
					)
				);
						
			switch ( $layout ) {
				case 'layout4':
					$owl_data['dots'] = true;
					$template = 'team-4';
				break;
				case 'layout3':
					$owl_data['dots'] = true;
					$template = 'team-3';
				break;
				case 'layout2':
					$owl_data['nav'] = true;
					$owl_data['dots'] = true;
					$owl_data['responsive'] = array( '0' => array( 'items' => 1 ) );
					$template = 'team-2';
				break;
				case 'layout1':
					$template = 'team-1';
				break;
				case 'layout7':
					$template = 'team-7';
				break;
				case 'layout6':
					$template = 'team-6';
				break;
				default:
					$owl_data['margin'] = 0;
					$template = 'team-5';
				break;
			}
				$owl_data = json_encode( $owl_data );
				$this->load_scripts();
			
			
			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Team;