<?php
/**
 * Widget API: Accountant_Widget_Category_Sidebar class
 */
/**
 * Core class used to implement a Category Sidebar widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Accountant_Widget_Category_Sidebar extends WP_Widget {
	/**
	 * Sets up a new Category Sidebar widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array('classname' => 'category_sidebar', 'description' => esc_html__('Category sidebar widget.', 'accountant-wp'));
		$control_ops = array('width' => 200, 'height' => 350);
		parent::__construct('accountant_category_sidebar', esc_html__('Accountant Category Sidebar', 'accountant-wp'), $widget_ops, $control_ops);
	}
	/**
	 * Outputs the content for the current Category Sidebar widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Settings for the current Category Sidebar widget instance.
	 */
	public function widget( $args, $instance ) { 
		$accountant_category_title = ! empty( $instance['accountant_category_title'] ) ? $instance['accountant_category_title'] : '';
		?>
				<li>
					<div class="text-l blog-list b-partners">
						<h3><?php print wp_kses_post($accountant_category_title); ?></h3>
						<ul class="list-post">
							<?php wp_list_categories('title_li='); ?>
						</ul>
					</div>
				</li>
		<?php
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
		$instance['accountant_category_title'] =  $new_instance['accountant_category_title'];
		return $instance;
	}
	/**
	 * Outputs the Category Sidebar widget settings form.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function form($instance) { 
		$instance = wp_parse_args( (array) $instance, array( 'accountant_category_title' => '' ) );
		print'<div>Category Sidebar widget</div>';
?>
		<p><label for="<?php print esc_attr($this->get_field_id( 'accountant_category_title' )); ?>"><?php esc_html_e( 'Title:' , 'accountant-wp'); ?></label>
		<input type="text" id="<?php print esc_attr($this->get_field_id('accountant_category_title')); ?>" name="<?php print esc_attr($this->get_field_name('accountant_category_title')); ?>" value="<?php print esc_textarea( $instance['accountant_category_title'] ); ?>"></p>
<?php
	}
}
function accountant_widget_category_sidebar() {
	register_widget( 'Accountant_Widget_Category_Sidebar' );
}
add_action( 'widgets_init', 'accountant_widget_category_sidebar' );
/**
 * Widget API: Accountant_Widget_Services_Category_Sidebar class
 */
/**
 * Core class used to implement a Category Sidebar widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Accountant_Widget_Services_Category_Sidebar extends WP_Widget {
	/**
	 * Sets up a new Category Sidebar widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array('classname' => 'category_services_sidebar', 'description' => esc_html__('Category Services sidebar widget.', 'accountant-wp'));
		$control_ops = array('width' => 200, 'height' => 350);
		parent::__construct('accountant_services_category_sidebar', esc_html__('Accountant Services Category Sidebar', 'accountant-wp'), $widget_ops, $control_ops);
	}
	/**
	 * Outputs the content for the current Category Sidebar widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Settings for the current Category Sidebar widget instance.
	 */
	public function widget( $args, $instance ) { 
		$accountant_service_category_title = ! empty( $instance['accountant_service_category_title'] ) ? $instance['accountant_service_category_title'] : '';
		?>
				
			<li><div class="widget-cat">
				<h3><?php print  esc_html($accountant_service_category_title); ?></h3>
				<ul>
				<?php 
					$services_post = new WP_Query(array(
						'post_type'=> 'services_post',
						'order' => 'ASC',
						'orderby' => 'title',
					));
					while($services_post->have_posts()): $services_post->the_post();
						print '<li><a href="'.esc_url(get_the_permalink()).'">'.wp_kses_post(get_the_title()).'</a></li>';
					endwhile;
				?>
				</ul>
			</div>
			</li>
		<?php
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
		$instance['accountant_service_category_title'] =  $new_instance['accountant_service_category_title'];
		return $instance;
	}
	/**
	 * Outputs the Category Sidebar widget settings form.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function form($instance) { 
		$instance = wp_parse_args( (array) $instance, array( 'accountant_service_category_title' => '' ) );
		print'<div>Services Category Sidebar widget</div>'; ?>
		<p><label for="<?php print esc_attr($this->get_field_id( 'accountant_service_category_title' )); ?>"><?php esc_html_e( 'Title:' , 'accountant-wp'); ?></label>
		<input type="text" id="<?php print esc_attr($this->get_field_id('accountant_service_category_title')); ?>" name="<?php print esc_attr($this->get_field_name('accountant_service_category_title')); ?>"
		       value="<?php print esc_textarea( $instance['accountant_service_category_title'] ); ?>"></p>
	<?php
	}
}
function accountant_widget_services_category_sidebar() {
	register_widget( 'Accountant_Widget_Services_Category_Sidebar' );
}
add_action( 'widgets_init', 'accountant_widget_services_category_sidebar' );
/**
 * Widget API: WP_Widget_Text class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Text widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Accountant_Widget_Text extends WP_Widget {
	/**
	 * Sets up a new Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array('classname' => 'widget_text_class', 'description' => esc_html__('Arbitrary text or HTML.', 'accountant-wp'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('accountant_text', esc_html__('Accountant Text', 'accountant-wp'), $widget_ops, $control_ops);
	}
	/**
	 * Outputs the content for the current Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Text widget instance.
	 */
	public function widget( $args, $instance ) {
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$acountant_title = apply_filters( 'widget_title', empty( $instance['acountant_title'] ) ? '' : $instance['acountant_title'], $instance, $this->id_base );
		$widget_text = ! empty( $instance['accountant_text'] ) ? $instance['accountant_text'] : '';
		$widget_text_class = ! empty( $instance['widget_text_class'] ) ? $instance['widget_text_class'] : '';
		/**
		 * Filter the content of the Text widget.
		 *
		 * @since 2.3.0
		 * @since 4.4.0 Added the `$this` parameter.
		 *
		 * @param string         $widget_text The widget content.
		 * @param array          $instance    Array of settings for the current widget.
		 * @param WP_Widget_Text $this        Current Text widget instance.
		 */
		$text = apply_filters( 'widget_text', $widget_text, $instance, $this );
		$widget_text_class = apply_filters( 'widget_text_class', $widget_text_class, $instance, $this );
		$rand_class = rand(0, 1000);
		print $args['before_widget'];
		if ( ! empty( $acountant_title ) ) {
			print $args['before_title'] . wp_kses_post($acountant_title) . $args['after_title'];
		} ?>
			<div class="textwidget rand_class_<?php print esc_attr($rand_class); ?>"><?php print !empty( $instance['accountant_filter'] ) ? wpautop( $text ) : $text; ?></div>
		<?php
		print $args['after_widget'];
		print '<script type="text/javascript">jQuery(".rand_class_'.esc_attr($rand_class).'").parent(".widget_text_class").addClass("'.esc_attr($widget_text_class).'");</script>';
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
		$instance['acountant_title'] = sanitize_text_field( $new_instance['acountant_title'] );
		$instance['widget_text_class'] = sanitize_text_field( $new_instance['widget_text_class'] );
		if ( current_user_can('unfiltered_html') )
			$instance['accountant_text'] =  $new_instance['accountant_text'];
		else
			$instance['accountant_text'] =  stripslashes( $new_instance['accountant_text'] ) ;
		$instance['accountant_filter'] = ! empty( $new_instance['accountant_filter'] );
		return $instance;
	}
	/**
	 * Outputs the Text widget settings form.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'acountant_title' => '', 'accountant_text' => '',  'widget_text_class' => '') );
		$accountant_filter = isset( $instance['accountant_filter'] ) ? $instance['accountant_filter'] : 0;
		$acountant_title = sanitize_text_field( $instance['acountant_title'] );
		$widget_text_class = sanitize_text_field( $instance['widget_text_class'] );
		?>
		<p><label for="<?php print esc_attr($this->get_field_id('acountant_title')); ?>"><?php esc_html_e('Title:', 'accountant-wp'); ?></label>
		<input class="widefat" id="<?php print esc_attr($this->get_field_id('acountant_title')); ?>" name="<?php print esc_attr($this->get_field_name('acountant_title')); ?>" type="text"
		       value="<?php print esc_attr($acountant_title); ?>" /></p>
		<p><label for="<?php print esc_attr($this->get_field_id( 'accountant_text' )); ?>"><?php esc_html_e( 'Content:', 'accountant-wp' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php print esc_attr($this->get_field_id('accountant_text')); ?>"
		          name="<?php print esc_attr($this->get_field_name('accountant_text')); ?>"><?php print esc_textarea( $instance['accountant_text'] ); ?></textarea></p>
		<p><input id="<?php print esc_attr( $this->get_field_id('accountant_filter')); ?>"
		          name="<?php print esc_attr($this->get_field_name('accountant_filter')); ?>"
		          type="checkbox"<?php checked( $accountant_filter ); ?> />&nbsp;<label
				for="<?php print esc_attr($this->get_field_id('accountant_filter')); ?>"><?php esc_html_e('Automatically add paragraphs', 'accountant-wp'); ?></label></p>
		<p><label for="<?php print esc_attr($this->get_field_id('widget_text_class')); ?>"><?php esc_html_e('Extra class:', 'accountant-wp'); ?></label>
		<input class="widefat" id="<?php print esc_attr($this->get_field_id('widget_text_class')); ?>"
		       name="<?php print esc_attr($this->get_field_name('widget_text_class')); ?>"
		       type="text" value="<?php print esc_attr(esc_attr($widget_text_class)); ?>" /></p>
		<?php
	}
}
function accountant_widget_text() {
	register_widget( 'Accountant_Widget_Text' );
}
add_action( 'widgets_init', 'accountant_widget_text' );
