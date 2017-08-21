<?php
/**
 * Widget API: Accountant_Widget_Header_Email class
 */

/**
 * Core class used to implement a Team widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Accountant_Widget_Header_Email extends WP_Widget {

	/**
	 * Sets up a new Email widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array('classname' => 'header_email', 'description' => esc_html__('Header email widget.', 'accountant-wp'));
		$control_ops = array('width' => 200, 'height' => 350);
		parent::__construct('accountant_header_email', esc_html__('Accountant Header Email', 'accountant-wp'), $widget_ops, $control_ops);
	}

	/**
	 * Outputs the content for the current Email widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Settings for the current Email widget instance.
	 */
	public function widget( $args, $instance ) {
		$accontant_header_email = ! empty( $instance['accontant_header_email'] ) ? $instance['accontant_header_email'] : '';
		print '<a href="mailto:'.esc_attr($accontant_header_email) .'" class="mail hidden-xs hidden-sm">'.esc_html($accontant_header_email) .'</a><div class="dropdown icon-col visible-xs visible-sm">
						<a data-toggle="dropdown" href="#" class="mail">&nbsp;</a>
						<div class="dropdown-menu" role="menu" >
						 <a class="link" href="mailto:'.esc_attr($accontant_header_email) .'">'.esc_html($accontant_header_email) .'</a>
						</div>
					</div>';
	}
	/**
	 * Handles updating settings for the current Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Settings to save or bool false to cancel saving.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['accontant_header_email'] =  $new_instance['accontant_header_email'];
		return $instance;
	}
	/**
	 * Outputs the Email widget settings form.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'accontant_header_email' => '' ) );
		?>
		<p><label for="<?php  esc_attr($this->get_field_id( 'accontant_header_email' )); ?>"><?php esc_html_e( 'Email:' , 'accountant-wp'); ?></label>
			<input type="text" id="<?php print esc_attr($this->get_field_id('accontant_header_email')); ?>"
			       name="<?php  print esc_attr($this->get_field_name('accontant_header_email')); ?>" value="<?php print esc_textarea( $instance['accontant_header_email'] ); ?>"></p>
		<?php
	}
}
function accountant_widget_header_email() {
	register_widget( 'Accountant_Widget_Header_Email' );
}
add_action( 'widgets_init', 'accountant_widget_header_email' );


/**
 * Widget API: Accountant_Widget_Header_Phone class
 */

/**
 * Core class used to implement a Phone widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Accountant_Widget_Header_Phone extends WP_Widget {

	/**
	 * Sets up a new Phone widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array('classname' => 'header_phone', 'description' => esc_html__('Header phone widget.', 'accountant-wp'));
		$control_ops = array('width' => 200, 'height' => 350);
		parent::__construct('accountant_header_phone', esc_html__('Accountant Header Phone', 'accountant-wp'), $widget_ops, $control_ops);
	}

	/**
	 * Outputs the content for the current Phone widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Settings for the current Phone widget instance.
	 */
	public function widget( $args, $instance ) {
		$accontant_header_phone = ! empty( $instance['accontant_header_phone'] ) ? $instance['accontant_header_phone'] : '';
		print '<a class="skype hidden-xs hidden-sm">'.esc_html($accontant_header_phone) .'</a><div class="dropdown icon-col visible-xs visible-sm">
						<a data-toggle="dropdown" href="#" class="skype">&nbsp;</a>
						<div class="dropdown-menu" role="menu" >
						 <a class="link">'.esc_html($accontant_header_phone) .'</a>
						</div>
					</div>';
	}
	/**
	 * Handles updating settings for the current Phone widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Settings to save or bool false to cancel saving.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['accontant_header_phone'] =  $new_instance['accontant_header_phone'];
		return $instance;
	}
	/**
	 * Outputs the Phone widget settings form.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'accontant_header_phone' => '' ) );
		?>
		<p><label for="<?php print esc_attr($this->get_field_id( 'accontant_header_phone' )); ?>"><?php esc_html_e( 'Phone:' , 'accountant-wp'); ?></label>
			<input type="text" id="<?php print esc_attr($this->get_field_id('accontant_header_phone')); ?>"
			       name="<?php print esc_attr($this->get_field_name('accontant_header_phone')); ?>"
			       value="<?php print esc_textarea( $instance['accontant_header_phone'] ); ?>"></p>
		<?php
	}
}
function accountant_widget_header_phone() {
	register_widget( 'Accountant_Widget_Header_Phone' );
}
add_action( 'widgets_init', 'accountant_widget_header_phone' );

/**
 * Widget API: Accountant_Widget_Header_Sign_On class
 */

/**
 * Core class used to implement a Sign On widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Accountant_Widget_Header_Sign_On extends WP_Widget {

	/**
	 * Sets up a new Sign On widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array('classname' => 'header_sign_on', 'description' => esc_html__('Header Sign On widget.', 'accountant-wp'));
		$control_ops = array('width' => 200, 'height' => 350);
		parent::__construct('accountant_header_sign_on', esc_html__('Accountant Header Sign On', 'accountant-wp'), $widget_ops, $control_ops);
	}

	/**
	 * Outputs the content for the current Sign On widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Settings for the current Sign On widget instance.
	 */
	public function widget( $args, $instance ) {
		print '<li class="sing_in">';
		wp_loginout();
		print '</li>';
	}
	/**
	 * Outputs the Sign On widget settings form.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function form($instance) {
		print '<div>Sign On Widget</div>';
	}
}
function accountant_widget_header_sign_on() {
	register_widget( 'Accountant_Widget_Header_Sign_On' );
}
add_action( 'widgets_init', 'accountant_widget_header_sign_on' );