<?php
/**
 * Widget API: Accountant_Widget_Text class
 */

/**
 * Core class used to implement a Text widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Accountant_Widget_Text_Footer extends WP_Widget {

	/**
	 * Sets up a new Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array('classname' => 'text-footer', 'description' => esc_html__('Arbitrary text or HTML. Accountant.', 'accountant-wp'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('accountant_text_footer', esc_html__('Accountant text footer', 'accountant-wp'), $widget_ops, $control_ops);
	}

	/**
	 * Outputs the content for the current Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Settings for the current Text widget instance.
	 */
	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$mobile_title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		
		$title = ! empty( $instance['accountant_title_footer'] ) ? $instance['accountant_title_footer'] : '';

		$accountant_widget_text = ! empty( $instance['accountant_text_footer'] ) ? $instance['accountant_text_footer'] : '';

		/**
		 * Filter the content of the Text widget.
		 *
		 * @since 2.3.0
		 * @since 4.4.0 Added the `$this` parameter.
		 *
		 * @param string         $accountant_widget_text The widget content.
		 * @param array          $instance    Array of settings for the current widget.
		 * @param WP_Widget_Text $this        Current Text widget instance.
		 */
		$text = apply_filters( 'accountant_widget_text', $accountant_widget_text, $instance, $this );
		$site_logo_footer = accountant_option('site_logo_footer');
		$site_logo_footer_url = $site_logo_footer['url'];
		$img_alt = (isset($site_logo["id"])) ? get_post_meta( $site_logo["id"], '_wp_attachment_image_alt', true) : '';
		$title = isset( $instance['accountant_title_footer'] ) ? $instance['accountant_title_footer'] : 0;
		print '<li><div class="widget text-footer">'; ?>

		<?php
		if ( ! empty( $site_logo_footer ) && $title == 0) {
			print '<div class="title"><a href="'. esc_url(get_home_url('/')) .'" class="logo"><img src="'. esc_url($site_logo_footer_url).'" alt=" ' . esc_attr($img_alt) . ' "  /></a></div>';
		} ?>
		<?php print !empty( $instance['accountant_filter_footer'] ) ? wp_kses_post(wpautop( $text )) : wp_kses_post($text); ?>
		<?php
		print '<p><a href="'.esc_url(get_home_url('/')).'" class="more">'.esc_html__('Read More', 'accountant-wp').'&#8594;</a></p>';
		print '</div></li>';
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
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['accountant_title_footer'] = ! empty( $new_instance['accountant_title_footer'] );
		if ( current_user_can('unfiltered_html') )
			$instance['accountant_text_footer'] =  $new_instance['accountant_text_footer'];
		else
			$instance['accountant_text_footer'] = wp_kses_post( stripslashes( $new_instance['accountant_text_footer'] ) );
		$instance['accountant_filter_footer'] = ! empty( $new_instance['accountant_filter_footer'] );
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


		$instance = wp_parse_args( (array) $instance, array( 'accountant_title_footer' => '' , 'title' => '' , 'accountant_text_footer' => '' ) );
		$filter = isset( $instance['accountant_filter_footer'] ) ? $instance['accountant_filter_footer'] : 0;
		$title = isset( $instance['accountant_title_footer'] ) ? $instance['accountant_title_footer'] : 0;
		$mobile_title = sanitize_text_field( $instance['title'] );
		?>
		<p><input id="<?php print esc_attr($this->get_field_id('accountant_title_footer')); ?>"
		          name="<?php print esc_attr($this->get_field_name('accountant_title_footer')); ?>"
		          type="checkbox"<?php checked( $title ); ?> />&nbsp;<label
				for="<?php print esc_attr($this->get_field_id('accountant_title_footer')); ?>"><?php esc_html_e('Hide Title', 'accountant-wp'); ?></label></p>

		<p><label for="<?php print esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title (For mobile only):', 'accountant-wp'); ?></label>
			<input class="widefat" id="<?php print esc_attr($this->get_field_id('title')); ?>"
			       name="<?php print esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php print esc_attr($mobile_title); ?>" /></p>

		<p><label for="<?php print esc_attr($this->get_field_id( 'accountant_text_footer' )); ?>">
				<?php esc_html_e( 'Content:' , 'accountant-wp'); ?></label>
			<textarea class="widefat" rows="16" cols="20" id="<?php print esc_attr($this->get_field_id('accountant_text_footer')); ?>"
			          name="<?php print esc_attr($this->get_field_name('accountant_text_footer')); ?>">
			<?php print esc_textarea( $instance['accountant_text_footer'] ); ?></textarea></p>

		<p><input id="<?php print esc_attr($this->get_field_id('accountant_filter_footer')); ?>"
		          name="<?php print esc_attr($this->get_field_name('accountant_filter_footer')); ?>"
		          type="checkbox"<?php checked( $filter ); ?> />&nbsp;<label
				for="<?php print esc_attr($this->get_field_id('accountant_filter_footer')); ?>"><?php esc_html_e('Automatically add paragraphs', 'accountant-wp'); ?></label></p>
		<?php
	}
}
function accountant_widget_text_footer() {
	register_widget( 'Accountant_Widget_Text_Footer' );
}
add_action( 'widgets_init', 'accountant_widget_text_footer' );

/**
 * Widget API: Accountant_Widget_Recent_Posts class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Accountant_Widget_Recent_Posts extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array('classname' => 'widget_recent_entries', 'description' => esc_html__( "Your site&#8217;s most recent Posts. Accountant.", 'accountant-wp') );
		parent::__construct('accountant_recent-posts', esc_html__('Accountant Recent Posts', 'accountant-wp'), $widget_ops);
		$this->alt_option_name = 'accountant_widget_recent_entries';
	}

	/**
	 * Outputs the content for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Accountant Recent Posts' , 'accountant-wp');

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 * Filter the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
			?>
		<li class="list-none">
			<ul class="widget post-footer post-footer2">
			<li>
				<?php if ( $title ) {
					print '<h4>'. esc_html($title) . '</h4>';
				} ?>

				<ul class='widget-ul'>

					<?php while ( $r->have_posts() ) : $r->the_post(); ?>
						<li >

							<?php
							$footer_thumbnail = "";

							if (!get_the_post_thumbnail()) {
								$footer_thumbnail = "accountant_footer-thumb";
							}
							?>


							<div class="post-photo">
								<a href="<?php the_permalink(); ?>">
									<span><i class="fa fa-search"></i></span>
								</a>
								<?php the_post_thumbnail('accountant_footer-thumb'); ?>
							</div>
							<?php $content = strip_tags(accountant_content(9));
							if (empty($content)):
								$content = strip_tags(accountant_content(18));
							endif;
							?>
							<div class="post-text <?php print esc_html($footer_thumbnail); ?>">
								<h5><?php wp_kses_post(get_the_title()) ? the_title() : the_ID(); ?></h5>
								<p><a href="<?php the_permalink(); ?>"><?php print wp_kses_post($content); ?></a></p>
								<?php if ( $show_date ) : ?>
									<span class="date"><?php print get_the_date(); ?></span>
								<?php endif; ?>
							</div>
						</li>
					<?php endwhile; ?>
					
				</ul>
				</li>
			</ul>
			</li>
			<?php
			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();
		endif;
	}

	/**
	 * Handles updating the settings for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Posts widget.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		?>
		<p><label for="<?php print esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:' , 'accountant-wp' ); ?></label>
			<input class="widefat" id="<?php print esc_attr($this->get_field_id( 'title' )); ?>"
			       name="<?php print esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php print esc_attr($title); ?>" /></p>

		<p><label for="<?php print esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts to show:', 'accountant-wp' ); ?></label>
			<input class="tiny-text" id="<?php print esc_attr($this->get_field_id( 'number' , 'accountant-wp' )); ?>"
			       name="<?php print esc_attr($this->get_field_name( 'number' )); ?>"
			       type="number" step="<?php print esc_attr(1) ?>" min="<?php print esc_attr(1) ?>" value="<?php print esc_attr($number); ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php print esc_attr($this->get_field_id( 'show_date' )); ?>"
		          name="<?php print esc_attr($this->get_field_name( 'show_date' )); ?>" />
			<label for="<?php print esc_attr($this->get_field_id( 'show_date' )); ?>"><?php esc_html_e( 'Display post date?' , 'accountant-wp' ); ?></label></p>
		<?php
	}
}
function accountant_widget_post() {
	register_widget( 'Accountant_Widget_Recent_Posts' );
}
add_action( 'widgets_init', 'accountant_widget_post' );


/**
 * Widget API: Accountant_Widget_Tag_Cloud class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Tag cloud widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Accountant_Widget_Tag_Cloud extends WP_Widget {

	/**
	 * Sets up a new Tag Cloud widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array( 'description' => esc_html__( "A cloud of your most used tags. Accountant.", 'accountant-wp') );
		parent::__construct('accountant_tag_cloud', esc_html__('Accountant Tag Cloud', 'accountant-wp'), $widget_ops);
	}

	/**
	 * Outputs the content for the current Tag Cloud widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Settings for the current Tag Cloud widget instance.
	 */
	public function widget( $args, $instance ) {
		$current_taxonomy = $this->_get_current_taxonomy($instance);
		if ( !empty($instance['title']) ) {
			$title = $instance['title'];
		} else {
			if ( 'post_tag' == $current_taxonomy ) {
				$title = esc_html__('Tags', 'accountant-wp');
			} else {
				$tax = get_taxonomy($current_taxonomy);
				$title = $tax->labels->name;
			}
		}

		/**
		 * Filter the taxonomy used in the Tag Cloud widget.
		 *
		 * @since 2.8.0
		 * @since 3.0.0 Added taxonomy drop-down.
		 *
		 * @see wp_tag_cloud()
		 *
		 * @param array $current_taxonomy The taxonomy to use in the tag cloud. Default 'tags'.
		 */
		$tag_cloud = wp_tag_cloud( apply_filters( 'widget_tag_cloud_args', array(
			'taxonomy' => $current_taxonomy,
			'echo' => false,
			'smallest'                  => 14,
			'largest'                   => 14,
			'unit'                      => 'px',
			'number'                    => 15,
		) ) );

		if ( empty( $tag_cloud ) ) {
			return;
		}

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		print '<li><div class="widget post-tags">';
		if ( $title ) {
			print '<h4>' . esc_html($title) . '</h4>';
		}

		print '<div class="tags">';

		print  wp_kses_post($tag_cloud);

		print "</div>\n";
		print "</div></li>\n";
	}

	/**
	 * Handles updating settings for the current Tag Cloud widget instance.
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
		$instance = array();
		$instance['title'] = sanitize_text_field( stripslashes( $new_instance['title'] ) );
		$instance['taxonomy'] = stripslashes($new_instance['taxonomy']);
		return $instance;
	}

	/**
	 * Outputs the Tag Cloud widget settings form.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$current_taxonomy = $this->_get_current_taxonomy($instance);
		$title_id = $this->get_field_id( 'title' );
		$instance['title'] = ! empty( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';

		echo '<p><label for="' . esc_attr($title_id) .'">' . esc_html__( 'Title:', 'accountant-wp' ) . '</label>
			<input type="text" class="widefat" id="' . esc_attr($title_id) .'" name="' . esc_attr($this->get_field_name( 'title' )) .'" value="' . esc_attr($instance['title']) .'" />
		</p>';

		$taxonomies = get_taxonomies( array( 'show_tagcloud' => true ), 'object' );
		$id = $this->get_field_id( 'taxonomy' );
		$name = $this->get_field_name( 'taxonomy' );
		$input = '<input type="hidden" id="' . $id . '" name="' . $name . '" value="%s" />';

		switch ( count( $taxonomies ) ) {

			// No tag cloud supporting taxonomies found, display error message
			case 0:
				echo '<p>' . esc_html__( 'The tag cloud will not be displayed since there are no taxonomies that support the tag cloud widget.', 'accountant-wp' ) . '</p>';
				printf( $input, '' );
				break;

			// Just a single tag cloud supporting taxonomy found, no need to display options
			case 1:
				$keys = array_keys( $taxonomies );
				$taxonomy = reset( $keys );
				printf( $input, esc_attr( $taxonomy ) );
				break;

			// More than one tag cloud supporting taxonomy found, display options
			default:
				printf(
					'<p><label for="%1$s">%2$s</label>' .
					'<select class="widefat" id="%1$s" name="%3$s">',
					$id,
					esc_html__( 'Taxonomy:', 'accountant-wp' ),
					$name
				);

				foreach ( $taxonomies as $taxonomy => $tax ) {
					printf(
						'<option value="%s"%s>%s</option>',
						esc_attr( $taxonomy ),
						selected( $taxonomy, $current_taxonomy, false ),
						$tax->labels->name
					);
				}

				echo '</select></p>';
		}
	}

	/**
	 * Retrieves the taxonomy for the current Tag cloud widget instance.
	 *
	 * @since 4.4.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 * @return string Name of the current taxonomy if set, otherwise 'post_tag'.
	 */
	public function _get_current_taxonomy($instance) {
		if ( !empty($instance['taxonomy']) && taxonomy_exists($instance['taxonomy']) )
			return $instance['taxonomy'];

		return 'post_tag';
	}
}
function accountant_widget_tag() {
	register_widget( 'Accountant_Widget_Tag_Cloud' );
}
add_action( 'widgets_init', 'accountant_widget_tag' );





/**
 * Core class used to implement a Contact widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Accountant_Widget_Contact extends WP_Widget {

	/**
	 * Sets up a new Contact widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array('classname' => 'widget_text', 'description' => esc_html__('Your contact.', 'accountant-wp'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('accountant_contacts', esc_html__('Accountant Contacts', 'accountant-wp'), $widget_ops, $control_ops);
	}

	/**
	 * Outputs the content for the current Contact widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Settings for the current Text widget instance.
	 */
	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$widget_text = ! empty( $instance['text'] ) ? $instance['text'] : '';
		$widget_title_office_1 = ! empty( $instance['title_office_1'] ) ? $instance['title_office_1'] : '';
		$widget_address_office_1 = ! empty( $instance['address_office_1'] ) ? $instance['address_office_1'] : '';
		$widget_title_office_2 = ! empty( $instance['title_office_2'] ) ? $instance['title_office_2'] : '';
		$widget_address_office_2 = ! empty( $instance['address_office_2'] ) ? $instance['address_office_2'] : '';
		$widget_phone_1 = ! empty( $instance['phone_1'] ) ? $instance['phone_1'] : '';
		$widget_phone_2 = ! empty( $instance['phone_2'] ) ? $instance['phone_2'] : '';
		$widget_email_1 = ! empty( $instance['email_1'] ) ? $instance['email_1'] : '';
		$widget_email_2 = ! empty( $instance['email_2'] ) ? $instance['email_2'] : '';
		/**
		 * Filter the content of the Contact widget.
		 *
		 * @since 2.3.0
		 * @since 4.4.0 Added the `$this` parameter.
		 *
		 * @param string         $widget_text The widget content.
		 * @param array          $instance    Array of settings for the current widget.
		 * @param WP_Widget_Text $this        Current Text widget instance.
		 */
		$text = apply_filters( 'widget_text', $widget_text, $instance, $this );
		$title_office_1 = apply_filters( 'widget_title_office_1', $widget_title_office_1, $instance, $this );
		$address_office_1 = apply_filters( 'widget_address_office_1', $widget_address_office_1, $instance, $this );
		$title_office_2 = apply_filters( 'widget_title_office_2', $widget_title_office_2, $instance, $this );
		$address_office_2 = apply_filters( 'widget_address_office_2', $widget_address_office_2, $instance, $this );
		$phone_1 = apply_filters( 'widget_phone_1', $widget_phone_1, $instance, $this );
		$phone_2 = apply_filters( 'widget_phone_2', $widget_phone_2, $instance, $this );
		$email_1 = apply_filters( 'widget_email_1', $widget_email_1, $instance, $this );
		$email_2 = apply_filters( 'widget_email_2', $widget_email_2, $instance, $this );

		print '<li><div class="widget contact-info">';
		if ( ! empty( $title ) ) {
			print '<h4>' . wp_kses_post($title) . '</h4>';
		}
		print '<ul class="list-adress">';
		if ( ! empty( $title_office_1 ) && ! empty( $address_office_1 ) ) {
			print '<li>';
			print '<span class="col-1">'.esc_html($title_office_1).'</span>';
			print '<span class="col-2">'.esc_html($address_office_1).'</span>';
			print '</li>';
		}
		if ( ! empty( $title_office_2 ) && ! empty( $address_office_2 ) ) {
			print '<li>';
			print '<span class="col-1">'.esc_html($title_office_2).'</span>';
			print '<span class="col-2">'.esc_html($address_office_2).'</span>';
			print '</li>';
		}
		if ( ! empty( $phone_1 ) || ! empty( $phone_2 ) ) {
			print '<li>';
			print '<span class="col-1">'.esc_html__('Phone:', 'accountant-wp').'</span>';
			print '<span class="col-2"><a href="tel:'.esc_attr($phone_1).'">'.esc_html($phone_1).'</a> <a href="tel:'.esc_attr($phone_2).'">'.esc_html($phone_2).'</a></span>';
			print '</li>';
		}
		if ( ! empty( $email_1 ) || ! empty( $email_2 ) ) {
			print '<li>';
			print '<span class="col-1">'.esc_html__('Email:', 'accountant-wp').'</span>';
			print '<span class="col-2"><a href="mailto:'.esc_attr($email_1).'">'.esc_html($email_1).'</a> <a href="mailto:'.esc_attr($email_2).'">'.esc_html($email_2).'</a></span>';
			print '</li>';
		}
		?>
		</ul>
		<?php
		print '</div></li>';
	}

	/**
	 * Handles updating settings for the current Contact widget instance.
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
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['title_office_1'] = sanitize_text_field( $new_instance['title_office_1'] );
		$instance['address_office_1'] = sanitize_text_field( $new_instance['address_office_1'] );
		$instance['title_office_2'] = sanitize_text_field( $new_instance['title_office_2'] );
		$instance['address_office_2'] = sanitize_text_field( $new_instance['address_office_2'] );
		$instance['phone_1'] = sanitize_text_field( $new_instance['phone_1'] );
		$instance['phone_2'] = sanitize_text_field( $new_instance['phone_2'] );
		$instance['email_1'] = sanitize_text_field( $new_instance['email_1'] );
		$instance['email_2'] = sanitize_text_field( $new_instance['email_2'] );
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
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'title_office_1' => '', 'address_office_1' => '', 'title_office_2' => '', 'address_office_2' => '', 'phone_1' => '', 'phone_2' => '', 'email_1' => '', 'email_2' => '' ) );
		$title = sanitize_text_field( $instance['title'] );
		$title_office_1 = sanitize_text_field( $instance['title_office_1'] );
		$address_office_1 = sanitize_text_field( $instance['address_office_1'] );
		$title_office_2 = sanitize_text_field( $instance['title_office_2'] );
		$address_office_2 = sanitize_text_field( $instance['address_office_2'] );
		$phone_1 = sanitize_text_field( $instance['phone_1'] );
		$phone_2 = sanitize_text_field( $instance['phone_2'] );
		$email_1 = sanitize_text_field( $instance['email_1'] );
		$email_2 = sanitize_text_field( $instance['email_2'] );
		?>
		<p><label for="<?php print esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'accountant-wp'); ?></label>
			<input class="widefat" id="<?php print esc_attr($this->get_field_id('title')); ?>"
			       name="<?php print esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php print esc_attr($title); ?>" /></p>

		<p><label for="<?php print esc_attr($this->get_field_id('title_office_1')); ?>"><?php esc_html_e('Title office 1:', 'accountant-wp'); ?></label>
			<input class="widefat" id="<?php print esc_attr($this->get_field_id('title_office_1')); ?>"
			       name="<?php print esc_attr($this->get_field_name('title_office_1')); ?>" type="text" value="<?php print esc_attr($title_office_1); ?>" /></p>

		<p><label for="<?php print esc_attr($this->get_field_id( 'address_office_1' )); ?>"><?php esc_html_e( 'Address office 1:', 'accountant-wp' ); ?></label>
			<textarea class="widefat" rows="6" cols="20" id="<?php print esc_attr($this->get_field_id('address_office_1')); ?>" name="<?php print esc_attr($this->get_field_name('address_office_1')); ?>"><?php print esc_textarea( $instance['address_office_1'] ); ?></textarea></p>

		<p><label for="<?php print esc_attr($this->get_field_id('title_office_2')); ?>"><?php esc_html_e('Title office 2:', 'accountant-wp'); ?></label>
			<input class="widefat" id="<?php print esc_attr($this->get_field_id('title_office_2')); ?>" name="<?php print esc_attr($this->get_field_name('title_office_2')); ?>" type="text" value="<?php print esc_attr($title_office_2); ?>" /></p>

		<p><label for="<?php print esc_attr($this->get_field_id( 'address_office_2' )); ?>"><?php esc_html_e( 'Address office 2:', 'accountant-wp' ); ?></label>
			<textarea class="widefat" rows="6" cols="20" id="<?php print esc_attr($this->get_field_id('address_office_2')); ?>" name="<?php print esc_attr($this->get_field_name('address_office_2')); ?>"><?php print esc_textarea( $instance['address_office_2'] ); ?></textarea></p>

		<p><label for="<?php print esc_attr($this->get_field_id('phone_1')); ?>"><?php esc_html_e('Phone 1:', 'accountant-wp'); ?></label>
			<input class="widefat" id="<?php print esc_attr($this->get_field_id('phone_1')); ?>" name="<?php print esc_attr($this->get_field_name('phone_1')); ?>" type="text" value="<?php print esc_attr($phone_1); ?>" /></p>

		<p><label for="<?php print esc_attr($this->get_field_id('phone_2')); ?>"><?php esc_html_e('Phone 2:', 'accountant-wp'); ?></label>
			<input class="widefat" id="<?php print esc_attr($this->get_field_id('phone_2')); ?>" name="<?php print esc_attr($this->get_field_name('phone_2')); ?>" type="text" value="<?php print esc_attr($phone_2); ?>" /></p>

		<p><label for="<?php print esc_attr($this->get_field_id('email_1')); ?>"><?php esc_html_e('Email 1:', 'accountant-wp'); ?></label>
			<input class="widefat" id="<?php print esc_attr($this->get_field_id('email_1')); ?>" name="<?php print esc_attr($this->get_field_name('email_1')); ?>" type="text" value="<?php print esc_attr($email_1); ?>" /></p>

		<p><label for="<?php print esc_attr($this->get_field_id('email_2')); ?>"><?php esc_html_e('Email 2:', 'accountant-wp'); ?></label>
			<input class="widefat" id="<?php print esc_attr($this->get_field_id('email_2')); ?>" name="<?php print esc_attr($this->get_field_name('email_2')); ?>" type="text" value="<?php print esc_attr($email_2); ?>" /></p>
		<?php
	}
}
function accountant_widget_contact() {
	register_widget( 'Accountant_Widget_Contact' );
}
add_action( 'widgets_init', 'accountant_widget_contact' );