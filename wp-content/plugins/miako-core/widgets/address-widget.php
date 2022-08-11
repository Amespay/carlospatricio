<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */









class RDTheme_Address_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'rdtheme_address', // Base ID
            __( 'Miako  : Address (for footer)', 'miako-core' ), // Name
            array( 'description' => __( 'Address Widget', 'miako-core' ) ) // Args
            );
	}

	public function widget( $args, $instance ){
		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
		}
		?>
		<ul class="corporate-address">
			<?php 
			if( !empty( $instance['weekday'] ) ){
				?><li><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo esc_html( $instance['weekday'] ); ?></li><?php
			}
			if( !empty( $instance['address'] ) ){
				?><li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo wp_kses_post( $instance['address'] ); ?></li><?php
			}  
			if( !empty( $instance['phone'] ) ){
				?><li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo esc_html( $instance['phone'] ); ?>"><?php echo esc_html( $instance['phone'] ); ?></a></li><?php
			}   
			if( !empty( $instance['email'] ) ){
				?><li class="modal-mail" data-toggle="modal" data-target="#myModal_widget"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo esc_html( $instance['email'] ); ?></li><?php
			}  
			if( !empty( $instance['fax'] ) ){
				?><li><i class="fa fa-fax" aria-hidden="true"></i> <?php echo esc_html( $instance['fax'] ); ?></li><?php
			}   
			?>
		</ul>		
		<?php
		/*any desire which is out side of your goal statement is lust*/
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['weekday']   = ( ! empty( $new_instance['weekday'] ) ) ? sanitize_text_field( $new_instance['weekday'] ) : '';
		$instance['address']   = ( ! empty( $new_instance['address'] ) ) ? wp_kses_post( $new_instance['address'] ) : '';
		$instance['phone']     = ( ! empty( $new_instance['phone'] ) ) ? sanitize_text_field( $new_instance['phone'] ) : '';
		$instance['email']     = ( ! empty( $new_instance['email'] ) ) ? sanitize_email( $new_instance['email'] ) : '';
		$instance['fax']       = ( ! empty( $new_instance['fax'] ) ) ? sanitize_text_field( $new_instance['fax'] ) : '';
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'   => __( 'Corporate Office' , 'miako-core' ),
			'weekday' => '',
			'address' => '',
			'phone'   => '',
			'email'   => '',
			'fax'     => ''  
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'     => array(
				'label' => esc_html__( 'Title', 'miako-core' ),
				'type'  => 'text',
				),
			'weekday'   => array(
				'label' => esc_html__( 'Working Time', 'miako-core' ),
				'type'  => 'text',
				),
			'address'   => array(
				'label' => esc_html__( 'Address', 'miako-core' ),
				'type'  => 'textarea',
				),      
			'phone'     => array(
				'label' => esc_html__( 'Phone Number', 'miako-core' ),
				'type'  => 'text',
				),      
			'email'     => array(
				'label' => esc_html__( 'Email', 'miako-core' ),
				'type'  => 'text',
				),      
			'fax'       => array(
				'label' => esc_html__( 'Fax', 'miako-core' ),
				'type'  => 'text',
				),
			);

		RT_Widget_Fields::display( $fields, $instance, $this );
	}
}