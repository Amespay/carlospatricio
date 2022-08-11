<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Law_Grid' ) ) {

	class RDTheme_VC_Law_Grid extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "Miako: Law Grid", 'miako-core' );
			$this->base = 'miako-vc-law-grid';
			$this->translate = array(
				'cols'   => array( 
					__( '1 col', 'miako-core' ) => '12',
					__( '2 col', 'miako-core' ) => '6',
					__( '3 col', 'miako-core' ) => '4',
					__( '4 col', 'miako-core' ) => '3',
					__( '6 col', 'miako-core' ) => '2',
				),
				'buttontext' 	=> __( 'View All', 'miako-core' ),
			);
			parent::__construct();
		}

		public function fields(){
			$terms = get_terms( array('taxonomy' => 'miako_law_category') );
			$category_dropdown = array( __( 'All Categories', 'miako-core' ) => '0' );
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
						__( "Style 1", 'miako-core' )  => 'grid1',
						__( "Style 2", 'miako-core' )  => 'grid2',
						__( "Style 3", 'miako-core' )  => 'grid3',
						__( "Style 4", 'miako-core' )  => 'grid4',
						__( "Style 5", 'miako-core' )  => 'grid5',
						__( "Style 6", 'miako-core' )  => 'grid6',
						__( "Style 7", 'miako-core' )  => 'grid7',
						),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Items Per Page", 'miako-core' ),
					"param_name" => "grid_item_number",
					"value" => '6',
					'description' => __( 'Write -1 to show all', 'miako-core' ),
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
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Background Color", 'miako-core' ),
					"param_name" => "bgcolor",
					'value' => "#f8f8f8",
					'dependency' => array(
						'element' => 'layout',
						'value' => array( 'grid6' ),
						),
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Background Hover Color", 'miako-core' ),
					"param_name" => "bghover",
					'dependency' => array(
						'element' => 'layout',
						'value' => array( 'grid6' ),
					),
					'value' => "#cf9455",
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Word count", 'miako-core' ),
					"param_name" => "count",
					"value" => 15,
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'grid4', 'grid7' ),
						),
					'description' => __( 'Maximum number of words', 'miako-core' ),
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
					"heading" => __( "Pagination Display", 'miako-core' ),
					"param_name" => "show_pagination",
					"value" => array(
						__( "Enabled", 'miako-core' )  => 'true',
						__( "Disabled", 'miako-core' ) => 'false',
						),					
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'grid1', 'grid7' ),
						),
					),
				array(
					"type" 		  => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Button Text", 'miako-core' ),
					"param_name"  => "buttontext",
					"value" 	  => $this->translate['buttontext'],
					'dependency' => array(
						'element' => 'show_pagination',
						'value'   => array( 'false' ),
						),
				),
				array(
					"type" 		 => "textfield",
					"holder" 	 => "div",
					"class" 	 => "",
					"heading" 	 => __( "Button URL", 'miako-core' ),
					"param_name" => "buttonurl",
					"value" 	  => '#',
					'dependency' => array(
						'element' => 'show_pagination',
						'value'   => array( 'false' ),
						),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 1199px )", 'miako-core' ),
					"param_name" => "col_lg",
					"value" => $this->translate['cols'],
					"std" => "4",
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'grid1' , 'grid3', 'grid4', 'grid7' ),
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
						'value'   => array( 'grid1' , 'grid3', 'grid4', 'grid7' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Tablets > 767px )", 'miako-core' ),
					"param_name" => "col_sm",
					"value" => $this->translate['cols'],
					"std" => "6",
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'grid1' , 'grid3', 'grid4', 'grid7' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Phones < 768px )", 'miako-core' ),
					"param_name" => "col_xs",
					"value" => $this->translate['cols'],
					"std" => "12",
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'grid1' , 'grid3', 'grid4', 'grid7' ),
						),
					),
				);

			return $fields;
		}

		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(
				'layout'		   => 'grid1',
				'grid_item_number' => '6',
				'cat'      		   => '',
				'bgcolor'  		   => '#f8f8f8',
				'bghover'  		   => '#cf9455',
				'count'            => 15,
				'order'			   => 'DESC',
				'orderby'		   => '',
				'show_pagination'  => 'true',
				'content_limit'    => 15,
				'buttonurl'  	   => '',
				'buttontext' 	   => $this->translate['buttontext'],
				'col_lg'           => '4',
				'col_md'           => '4',
				'col_sm'           => '6',
				'col_xs'           => '12',
				), $atts ) );

			// validation
			$grid_item_number      = intval( $grid_item_number );
			$col_lg                = esc_attr( $col_lg );
			$col_md                = esc_attr( $col_md );
			$col_sm                = esc_attr( $col_sm );
			$col_xs                = esc_attr( $col_xs );

			switch ( $layout ) {
				case 'grid7':
				$template = 'law-grid7';
				break;
				case 'grid6':
				$col_lg = $col_md = 3;
				$col_sm = 6;
				$col_xs = 12;
				$template = 'law-grid6';
				break;
				case 'grid5':
				$col_lg = $col_md = $col_sm = 6;
				$col_xs = 12;
				$template = 'law-grid5';
				break;
				case 'grid4':
				$template = 'law-grid4';
				break;
				case 'grid3':
				$template = 'law-grid3';
				break;
				case 'grid2':
				$template = 'law-grid2';
				break;
				default:
				$template = 'law-grid1';
				break;
			}

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Law_Grid;