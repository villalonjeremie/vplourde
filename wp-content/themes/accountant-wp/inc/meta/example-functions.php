<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function yourprefix_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function yourprefix_register_demo_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_yourprefix_demo_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Test Metabox', 'accountant-wp' ),
		'object_types'  => array( 'page', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Test Text', 'accountant-wp' ),
		'desc'       => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'         => $prefix . 'text',
		'type'       => 'text',
		'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Text Small', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'textsmall',
		'type' => 'text_small',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Text Medium', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'textmedium',
		'type' => 'text_medium',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Website URL', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'url',
		'type' => 'text_url',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Text Email', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'email',
		'type' => 'text_email',
		// 'repeatable' => true,
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Time', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'time',
		'type' => 'text_time',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Time zone', 'accountant-wp' ),
		'desc' => esc_html__( 'Time zone', 'accountant-wp' ),
		'id'   => $prefix . 'timezone',
		'type' => 'select_timezone',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Date Picker', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'textdate',
		'type' => 'text_date',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Date Picker (UNIX timestamp)', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'textdate_timestamp',
		'type' => 'text_date_timestamp',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Date/Time Picker Combo (UNIX timestamp)', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'datetime_timestamp',
		'type' => 'text_datetime_timestamp',
	) );


	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Money', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'textmoney',
		'type' => 'text_money',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Test Color Picker', 'accountant-wp' ),
		'desc'    => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'      => $prefix . 'colorpicker',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Text Area', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'textarea',
		'type' => 'textarea',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Text Area Small', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'textareasmall',
		'type' => 'textarea_small',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Text Area for Code', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'textarea_code',
		'type' => 'textarea_code',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Title Weeeee', 'accountant-wp' ),
		'desc' => esc_html__( 'This is a title description', 'accountant-wp' ),
		'id'   => $prefix . 'title',
		'type' => 'title',
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Test Select', 'accountant-wp' ),
		'desc'             => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'               => $prefix . 'select',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'standard' => esc_html__( 'Option One', 'accountant-wp' ),
			'custom'   => esc_html__( 'Option Two', 'accountant-wp' ),
			'none'     => esc_html__( 'Option Three', 'accountant-wp' ),
		),
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Test Radio inline', 'accountant-wp' ),
		'desc'             => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'               => $prefix . 'radio_inline',
		'type'             => 'radio_inline',
		'show_option_none' => 'No Selection',
		'options'          => array(
			'standard' => esc_html__( 'Option One', 'accountant-wp' ),
			'custom'   => esc_html__( 'Option Two', 'accountant-wp' ),
			'none'     => esc_html__( 'Option Three', 'accountant-wp' ),
		),
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Test Radio', 'accountant-wp' ),
		'desc'    => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'      => $prefix . 'radio',
		'type'    => 'radio',
		'options' => array(
			'option1' => esc_html__( 'Option One', 'accountant-wp' ),
			'option2' => esc_html__( 'Option Two', 'accountant-wp' ),
			'option3' => esc_html__( 'Option Three', 'accountant-wp' ),
		),
	) );

	$cmb_demo->add_field( array(
		'name'     => esc_html__( 'Test Taxonomy Radio', 'accountant-wp' ),
		'desc'     => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'       => $prefix . 'text_taxonomy_radio',
		'type'     => 'taxonomy_radio',
		'taxonomy' => 'category', // Taxonomy Slug
	) );

	$cmb_demo->add_field( array(
		'name'     => esc_html__( 'Test Taxonomy Select', 'accountant-wp' ),
		'desc'     => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'       => $prefix . 'taxonomy_select',
		'type'     => 'taxonomy_select',
		'taxonomy' => 'category', // Taxonomy Slug
	) );

	$cmb_demo->add_field( array(
		'name'     => esc_html__( 'Test Taxonomy Multi Checkbox', 'accountant-wp' ),
		'desc'     => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'       => $prefix . 'multitaxonomy',
		'type'     => 'taxonomy_multicheck',
		'taxonomy' => 'post_tag', // Taxonomy Slug
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Checkbox', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'checkbox',
		'type' => 'checkbox',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Test Multi Checkbox', 'accountant-wp' ),
		'desc'    => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'      => $prefix . 'multicheckbox',
		'type'    => 'multicheck',
		'options' => array(
			'check1' => esc_html__( 'Check One', 'accountant-wp' ),
			'check2' => esc_html__( 'Check Two', 'accountant-wp' ),
			'check3' => esc_html__( 'Check Three', 'accountant-wp' ),
		),
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Test wysiwyg', 'accountant-wp' ),
		'desc'    => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'      => $prefix . 'wysiwyg',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 5, ),
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Image', 'accountant-wp' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'accountant-wp' ),
		'id'   => $prefix . 'image',
		'type' => 'file',
	) );

	$cmb_demo->add_field( array(
		'name'         => esc_html__( 'Multiple Files', 'accountant-wp' ),
		'desc'         => esc_html__( 'Upload or add multiple images/attachments.', 'accountant-wp' ),
		'id'           => $prefix . 'file_list',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'oEmbed', 'accountant-wp' ),
		'desc' => esc_html__( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'accountant-wp' ),
		'id'   => $prefix . 'embed',
		'type' => 'oembed',
	) );

	$cmb_demo->add_field( array(
		'name'         => 'Testing Field Parameters',
		'id'           => $prefix . 'parameters',
		'type'         => 'text',
		'before_row'   => 'yourprefix_before_row_if_2', // callback
		'before'       => '<p>Testing <b>"before"</b> parameter</p>',
		'before_field' => '<p>Testing <b>"before_field"</b> parameter</p>',
		'after_field'  => '<p>Testing <b>"after_field"</b> parameter</p>',
		'after'        => '<p>Testing <b>"after"</b> parameter</p>',
		'after_row'    => '<p>Testing <b>"after_row"</b> parameter</p>',
	) );

}

add_action( 'cmb2_init', 'yourprefix_register_about_page_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function yourprefix_register_about_page_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_yourprefix_about_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_about_page = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'About Page Metabox', 'accountant-wp' ),
		'object_types' => array( 'page', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Test Text', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'text',
		'type' => 'text',
	) );

}

add_action( 'cmb2_init', 'yourprefix_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function yourprefix_register_repeatable_group_field_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_yourprefix_group_';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Repeating Field Group', 'accountant-wp' ),
		'object_types' => array( 'page', ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'demo',
		'type'        => 'group',
		'description' => esc_html__( 'Generates reusable form entries', 'accountant-wp' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Entry {#}', 'accountant-wp' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Entry', 'accountant-wp' ),
			'remove_button' => esc_html__( 'Remove Entry', 'accountant-wp' ),
			'sortable'      => true, // beta
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Entry Title', 'accountant-wp' ),
		'id'         => 'title',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => esc_html__( 'Description', 'accountant-wp' ),
		'description' => esc_html__( 'Write a short description for this entry', 'accountant-wp' ),
		'id'          => 'description',
		'type'        => 'textarea_small',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Entry Image', 'accountant-wp' ),
		'id'   => 'image',
		'type' => 'file',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Image Caption', 'accountant-wp' ),
		'id'   => 'image_caption',
		'type' => 'text',
	) );

}

add_action( 'cmb2_init', 'yourprefix_register_user_profile_metabox' );
/**
 * Hook in and add a metabox to add fields to the user profile pages
 */
function yourprefix_register_user_profile_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_yourprefix_user_';

	/**
	 * Metabox for the user profile screen
	 */
	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => esc_html__( 'User Profile Metabox', 'accountant-wp' ),
		'object_types'     => array( 'user' ), // Tells CMB to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );

	$cmb_user->add_field( array(
		'name'     => esc_html__( 'Extra Info', 'accountant-wp' ),
		'desc'     => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$cmb_user->add_field( array(
		'name'    => esc_html__( 'Avatar', 'accountant-wp' ),
		'desc'    => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'      => $prefix . 'avatar',
		'type'    => 'file',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Facebook URL', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'facebookurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Twitter URL', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'twitterurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Google+ URL', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'googleplusurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Linkedin URL', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'linkedinurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'User Field', 'accountant-wp' ),
		'desc' => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'   => $prefix . 'user_text_field',
		'type' => 'text',
	) );

}

add_action( 'cmb2_init', 'yourprefix_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page
 */
function yourprefix_register_theme_options_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$option_key = '_yourprefix_theme_options';

	/**
	 * Metabox for an options page. Will not be added automatically, but needs to be called with
	 * the `cmb2_metabox_form` helper function. See wiki for more info.
	 */
	$cmb_options = new_cmb2_box( array(
		'id'      => $option_key . 'page',
		'title'   => esc_html__( 'Theme Options Metabox', 'accountant-wp' ),
		'hookup'  => false, // Do not need the normal user/post hookup
		'show_on' => array(
			// These are important, don't remove
			'key'   => 'options-page',
			'value' => array( $option_key )
		),
	) );

	/**
	 * Options fields ids only need
	 * to be unique within this option group.
	 * Prefix is not needed.
	 */
	$cmb_options->add_field( array(
		'name'    => esc_html__( 'Site Background Color', 'accountant-wp' ),
		'desc'    => esc_html__( 'field description (optional)', 'accountant-wp' ),
		'id'      => 'bg_color',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );

}
