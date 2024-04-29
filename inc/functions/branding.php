<?php

if(!class_exists('ACF')) {
    return new WP_Error('acf-not-found', 'ACF Plugins cannot be found');
}

function jd_register_custom_menu(): void {
  add_menu_page( 'Custom Menu Page Title', 'Custom Menu Page', 'manage_options', 'logo_based_menu', '', '', 1);
}
add_action( 'admin_menu', 'jd_register_custom_menu' );

function jd_custom_menu_style(): void {
    echo '<style>
            #toplevel_page_logo_based_menu {
                background-image: url('. get_field ("logo", "options") . ');
            }
        </style>';
    }
add_action('admin_enqueue_scripts', 'jd_custom_menu_style');

function jd_login_page_logo(){
	if(!empty(get_field('logo', 'options'))){
		?>
		<style>
            .login h1 a {
	            background-image: url(<?php echo get_field('logo', 'options'); ?>);
            }
		</style>
		<?php
	}
}
add_action('login_head', 'jd_login_page_logo');