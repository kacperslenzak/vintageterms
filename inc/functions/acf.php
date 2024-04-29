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
