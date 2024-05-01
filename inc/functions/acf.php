<?php

add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );

function my_acf_json_save_point( $path ): string {

	// update path
	$path = get_stylesheet_directory() . '/acf-json';


	// return
	return $path;

}

add_filter( 'acf/settings/load_json', 'my_acf_json_load_point' );

function my_acf_json_load_point( $paths ) {

	// remove original path (optional)
	unset( $paths[0] );


	// append path
	$paths[] = get_stylesheet_directory() . '/acf-json';


	// return
	return $paths;

}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title'    => 'Theme General Settings',
		'menu_title'    => 'Theme Settings',
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));

}

// Add default rows to ACF repeater field
function add_default_rows_to_repeater($value, $post_id, $field) {
	// Check if this is the repeater field you want to modify
	if ($field['key'] === 'field_6620fa71d8f09') {
		// Check if the repeater field is empty
		if (empty($value)) {
			$value[] = array(
				'field_6620fa7ad8f0a' => 'Description', // Customize these fields as per your repeater field structure
				'field_6620fa83d8f0b' =>
					"
					Men's ...

+ Material: 

+ Colour: 

+ Size Label States: 

+ Recommended Size: 

Please note that all vintage items have been previously worn, and may show some signs of previous wear. However, any significant damage will be photographed and/or stated in the items listing. Please note that damage to the inside may not always be photographed or listed.
					",
			);
			$value[] = array(
				'field_6620fa7ad8f0a' => 'Product Care', // Customize these fields as per your repeater field structure
				'field_6620fa83d8f0b' =>
					"
					Wash on a delicate 30 degree wash with similar colours only. Do not tumble dry.

Please note that all vintage items have been previously worn, and may show some signs of previous wear. However, any significant damage will be photographed and/or stated in the items listing. Please note that damage to the inside may not always be photographed or listed.
					",
			);
			$value[] = array(
				'field_6620fa7ad8f0a' => 'Shipping', // Customize these fields as per your repeater field structure
				'field_6620fa83d8f0b' => "For information regarding shipping costs, please refer to our Shipping Page."
			);
			$value[] = array(
				'field_6620fa7ad8f0a' => 'Returns', // Customize these fields as per your repeater field structure
				'field_6620fa83d8f0b' => "You can return your unwanted items for a full refund within 14 days of receiving your order (21 days for international orders). Please note, this means we must have your order returned back to us and in our possession, within 14 days of you receiving your parcel (21 days for international). Any orders received back after the respective period will be ineligible for a refund, and you will be invoiced to have the goods returned to you.

All items must be returned in their original, unworn condition, with our tags still attached."
			);
		}
	}

	// Return the modified value
	return $value;
}

// Hook into acf/load_value filter
add_filter('acf/load_value', 'add_default_rows_to_repeater', 10, 3);