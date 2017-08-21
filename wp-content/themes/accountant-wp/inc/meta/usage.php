<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

/**
 * Get the bootstrap!
 */
if ( file_exists(  get_template_directory() . '/inc/meta/init.php' ) ) {
	//require_once  get_template_directory() . '/inc/meta/init.php';
	get_template_part( '/inc/meta/init' );
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function cmb2_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

add_filter( 'cmb2_meta_boxes', 'cmb2_page_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb2_page_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_wpc_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['page_metabox'] = array(
		'id'            => 'page_metabox',
		'title'         => esc_html__( 'Page Settings', 'accountant-wp'),
		'object_types'  => array( 'page', 'services_post'), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		'fields'        => array(
			array(
				'name'    => esc_html__( 'Page Layout', 'accountant-wp'),
				'desc'    => esc_html__( 'Set the page layout, inherit from Theme Option by default.', 'accountant-wp'),
				'id'      => $prefix . 'page_layout',
				'type'    => 'select',
				'default' => 'sidebar-default',
				'options' => array(
					'sidebar-default' => esc_html__( 'Default', 'accountant-wp'),
					'right-sidebar'   => esc_html__( 'Right Sidebar', 'accountant-wp'),
					'left-sidebar'    => esc_html__( 'Left Sidebar', 'accountant-wp'),
				),
			),
			array(
				'name'    => esc_html__( 'Hide page title?', 'accountant-wp'),
				'desc'    => esc_html__( 'Check this box to hide page title.', 'accountant-wp'),
				'id'      => $prefix . 'hide_page_title',
				'type'    => 'checkbox'
			),
			array(
				'name'    => esc_html__( 'Hide breadcrumb?', 'accountant-wp'),
				'desc'    => esc_html__( 'Check this box to hide breadcrumb for this page.', 'accountant-wp'),
				'id'      => $prefix . 'hide_breadcrumb',
				'type'    => 'checkbox'
			),
			array(
				'name'    => esc_html__( 'Enable Page Header?', 'accountant-wp'),
				'desc'    => esc_html__( 'Check this box to enable page header.', 'accountant-wp'),
				'id'      => $prefix . 'enable_page_header',
				'type'    => 'checkbox',
			),
			array(
				'name' => esc_html__( 'Page Header Title', 'accountant-wp'),
				'desc' => esc_html__( 'Enter in the page header title here, accept simple HTML code.', 'accountant-wp'),
				'id'   => $prefix . 'header_title',
				'type' => 'textarea_code',
				'default' => 'Page title'
			),
			array(
				'name'    => esc_html__( 'Text Alignment', 'accountant-wp'),
				'desc'    => esc_html__( 'Choose how you would like your header text to be aligned', 'accountant-wp'),
				'id'      => $prefix . 'header_alignment',
				'type'    => 'radio_inline',
				'default' => 'center',
				'options' => array(
					'left'   => esc_html__( 'Left', 'accountant-wp'),
					'center' => esc_html__( 'Center', 'accountant-wp'),
					'right'  => esc_html__( 'Right', 'accountant-wp'),
				),
			),
			array(
				'name' => esc_html__( 'Page Header Image', 'accountant-wp'),
				'desc' => __( 'The image should be between 1500px - 2000px wide and have a minimum height of 500px for best results.', 'accountant-wp'),
				'id'   => $prefix . 'header_bg',
				'type' => 'file',
			),
			array(
				'name' => esc_html__( 'Page Header Height', 'accountant-wp'),
				'desc' => esc_html__( 'Your header hight in px. <strong>ee.g. 500</strong>', 'accountant-wp'),
				'id'   => $prefix . 'header_height',
				'type' => 'text_small',
			),
			array(
				'name'    => esc_html__( 'Menu transparent background', 'accountant-wp'),
				'desc'    => esc_html__( 'Use transparent background for menu?', 'accountant-wp'),
				'id'      => $prefix . 'enable_menu_transparent_bg',
				'type'    => 'checkbox'
			),
			array(
				'name'    => esc_html__( 'Enable svg borders?', 'accountant-wp'),
				'desc'    => esc_html__( 'Check this box to enable svg borders.', 'accountant-wp'),
				'id'      => $prefix . 'enable_page_svg_borders',
				'type'    => 'checkbox'
			),
		),
	);

	return $meta_boxes;
}

add_action( 'cmb2_init', 'services_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function services_metabox() {

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_about_page = new_cmb2_box( array(
		'id'           => 'services_metabox',
		'title'         => esc_html__( 'Icon', 'accountant-wp'),
		'object_types' => array( 'services_post', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Icon', 'accountant-wp'),
		'id'   => 'services_icon',
		'type' => 'file',
	) );
	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Previous text', 'accountant-wp'),
		'id'   => 'services_previous',
		'type' => 'textarea',
	) );
	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Order data:', 'accountant-wp'),
		'id'   => 'services_order',
		'type' => 'text',
	) );

}

add_action( 'cmb2_init', 'post_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function post_metabox() {

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_about_page = new_cmb2_box( array(
		'id'           => 'post_metabox',
		'title'         => esc_html__( 'Hide thumbnail', 'accountant-wp'),
		'object_types' => array( 'post', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Hide thumbnail on single page?', 'accountant-wp'),
		'id'   => 'post_show_thubnail',
		'type' => 'checkbox',
	) );

}

add_action( 'cmb2_init', 'staff_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function staff_metabox() {

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_about_page = new_cmb2_box( array(
		'id'           => 'staff_metabox',
		'title'         => esc_html__( 'Profile data', 'accountant-wp'),
		'object_types' => array( 'create_staff', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Employee name', 'accountant-wp'),
		'id'   => 'staff_name',
		'type' => 'text',
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Single image', 'accountant-wp'),
		'id'   => 'staff_single_image',
		'type' => 'file',
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Facebook link:', 'accountant-wp'),
		'id'   => 'staff_facebook',
		'type' => 'text',
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Twitter link:', 'accountant-wp'),
		'id'   => 'staff_twitter',
		'type' => 'text',
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Linkedin link:', 'accountant-wp'),
		'id'   => 'staff_linkedin',
		'type' => 'text',
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Mail link:', 'accountant-wp'),
		'id'   => 'staff_mail',
		'type' => 'text',
	) );
	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Order data:', 'accountant-wp'),
		'id'   => 'staff_order',
		'type' => 'text',
	) );

}

add_action( 'cmb2_init', 'cases_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function cases_metabox() {

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_about_page = new_cmb2_box( array(
		'id'           => 'cases_metabox',
		'title'         => esc_html__( 'Options', 'accountant-wp'),
		'object_types' => array( 'cases_post', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Client name:', 'accountant-wp'),
		'id'   => 'cases_client_name',
		'type' => 'text',
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'File:', 'accountant-wp'),
		'id'   => 'cases_file',
		'type' => 'file',
	) );

}

add_action( 'cmb2_init', 'years_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function years_metabox() {

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_about_page = new_cmb2_box( array(
		'id'           => 'years_satistic',
		'title'         => esc_html__( 'Sort order', 'accountant-wp'),
		'object_types' => array( 'years_satistic', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Order data:', 'accountant-wp'),
		'id'   => 'years_order',
		'type' => 'text',
	) );

}