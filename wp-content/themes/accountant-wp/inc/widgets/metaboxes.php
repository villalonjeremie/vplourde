<?php
// Add the Events Meta Boxes

function accountant_add_percent_metaboxes() {
	add_meta_box('accountant_add_percent_metaboxes', 'Percent value', 'accountant_wpt_percent_metaboxes', 'years_satistic', 'side', 'default');
}

// The Event Location Metabox

function accountant_wpt_percent_metaboxes() {
	global $post;
	
	// Noncename needed to verify where the data originated
	print '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	
	// Get the location data if its already been entered
	$percent = get_post_meta($post->ID, '_percent', true);
	
	// print out the field
	print '<input type="number" min="1" max="100" name="_percent" value="' . esc_attr($percent)  . '" class="widefat" />';

}

// Save the Metabox Data

function accountant_wpt_save_percent_meta($post_id, $post) {

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
	if (isset($_POST['_percent'])): 	
	$events_meta['_percent'] = $_POST['_percent'];
	
	// Add values of $events_meta as custom fields
	
	foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}
	endif;

}

add_action('save_post', 'accountant_wpt_save_percent_meta', 1, 2); // save the custom fields