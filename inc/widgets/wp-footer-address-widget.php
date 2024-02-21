<?php
// Adds widget: Footer Address
class Footeraddress_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'footeraddress_widget',
			esc_html__( 'Footer Address', 'stoica-toolkit' )
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Phone Number',
			'id' => 'phonenumber_text',
			'default' => '642 640 834',
			'type' => 'text',
		),
		array(
			'label' => 'Email One',
			'id' => 'emailone_text',
			'default' => 'info@stoicaabogados.es',
			'type' => 'text',
		),
		array(
			'label' => 'Email Two',
			'id' => 'emailtwo_text',
			'type' => 'text',
		),
		array(
			'label' => 'Address Line One',
			'id' => 'addresslineone_textarea',
			'type' => 'textarea',
		),
		array(
			'label' => 'Address Line Two',
			'id' => 'addresslinetwo_textarea',
			'type' => 'textarea',
		),
		array(
			'label' => 'Office Time',
			'id' => 'officetime_textarea',
			'type' => 'textarea',
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
        ?>
        <div class="footer-widget-contact">
                <?php
                    if ( ! empty( $instance['title'] ) ) {
                        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
                    }
                ?>
            <div class="__content font-heading fz-6-ss">
                <div class="__phone"><i class="icon icon-phone-1"></i><span><?php echo $instance['phonenumber_text']; ?></span></div>
                <div class="__email"><i class="icon icon-paper-plane" ></i><span> <?php echo $instance['emailone_text']; ?> </span></div>
                <div class="__email"><i class="icon icon-paper-plane"></i><span> <?php echo $instance['emailtwo_text']; ?> </span></div>
                <div class="__address"><i class="icon icon-location"></i> <span style="line-height:1px"> <?php echo $instance['addresslineone_textarea']; ?> </span></div>
                <div class="__address"><i class="icon icon-location"></i> <span style="line-height:1px"> <?php echo $instance['addresslinetwo_textarea']; ?></span></div>
                <div class="__time"><i class="icon icon-clock-1"></i> <span style="line-height:1px"> <?php echo $instance['officetime_textarea']; ?></span></div>
            </div>
        </div>
		<?php
		echo $args['after_widget'];
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'stoica-toolkit' );
			switch ( $widget_field['type'] ) {
				case 'textarea':
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'stoica-toolkit' ).':</label> ';
					$output .= '<textarea class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" rows="6" cols="6" value="'.esc_attr( $widget_value ).'">'.$widget_value.'</textarea>';
					$output .= '</p>';
					break;
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'stoica-toolkit' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'stoica-toolkit' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'stoica-toolkit' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function register_footeraddress_widget() {
	register_widget( 'Footeraddress_Widget' );
}
add_action( 'widgets_init', 'register_footeraddress_widget' );