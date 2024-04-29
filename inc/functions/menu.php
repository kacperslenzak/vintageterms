<?php

$menus = array(
	'primary-left' => esc_html__( 'Primary Left Menu', 'justdigital-base-theme' ),
	'primary-right' => esc_html__( 'Primary Right Menu', 'justdigital-base-theme' ),
	'footer' => esc_html__( 'Footer Menu', 'justdigital-base-theme' ),
	'mobile' => esc_html__( 'Mobile Menu', 'justdigital-base-theme' )
);

register_nav_menus( $menus );