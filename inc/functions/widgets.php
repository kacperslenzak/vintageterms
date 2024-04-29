<?php

register_sidebar( array(
	'name'          => esc_html__( 'Footer 1', 'justdigital-base-theme' ),
	'id'            => 'footer-1',
	'description'   => esc_html__( 'Add widgets here.', 'justdigital-base-theme' ),
	'before_widget' => false,
	'after_widget'  => false,
	'before_title'  => '<h5 class="widget-title">',
	'after_title'   => '</h5>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Shop Sidebar', 'justdigital-base-theme' ),
	'id'            => 'shop',
	'description'   => esc_html__( 'Add widgets here.', 'justdigital-base-theme' ),
	'before_title'  => '<h5 class="widget-title">',
	'after_title'   => '</h5>',
) );


function jd_register_dashboard_widgets() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']);

	wp_add_dashboard_widget( 'dashboard_widget', 'JustDigital Welcome Widget', 'jd_dashboard_widget');
}
add_action('wp_dashboard_setup', 'jd_register_dashboard_widgets');

function jd_dashboard_widget( $post, $callback_args ) {
	?>
		<img src="<?php echo get_template_directory_uri(  ) ?>/screenshot.png" alt="" width="100%">
		<p>Tel: <a href="tel:0834402337">083 440 2337</a> || Mail: <a href="mailto:info@justdigital.ie">info@justdigital.ie</a></p>
	<?php
}