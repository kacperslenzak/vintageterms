<?php

class JustdigitalBaseTheme {

	function __construct() {
		require_once 'inc/classes/JustdigitalExtras.php';

		$this->init();
	}

	function init(): void{
		global $jdExtras;

		$jdExtras = new JustdigitalExtras();
		add_shortcode('social_media_repeater', array($jdExtras, 'social_media_repeater'));
		add_shortcode('phone_number', array($jdExtras, 'get_phone_number'));

		$filters = array(
			'after_setup_theme' => array('jd_base_theme_setup'),
			'wp_enqueue_scripts' => array('jd_base_theme_scripts_setup'),
			'widgets_init' => array('jd_base_theme_register_widgets'),
			'upload_mimes' => array('jd_enable_svg_upload'),
			'admin_enqueue_scripts' => array('jd_base_theme_admin_scripts_setup'),
			'login_head' => array('jd_base_theme_admin_scripts_setup'),
			'nav_menu_css_class' => array('jd_add_li_class', 1, 3), // add li class in wp_nav_menu
			'wp_nav_menu_items' => array('jd_add_cart_to_menu', 20, 2)
		);

		foreach($filters as $filter=>$filter_data){
			$priority = $filter_data[1] ?? 10;
			$accepted_args = $filter_data[2] ?? 1;
			add_filter($filter, array(__CLASS__, $filter_data[0]), $priority, $accepted_args);
		}

		//remove_filter( 'the_content', 'wpautop' );

	}

	public static function jd_base_theme_setup(): void {
		require_once( 'inc/functions/menu.php' ); // load nav menus
		require_once( 'inc/functions/image-sizes.php' ); // create image sizes
		require_once( 'inc/functions/acf.php' ); // load acf save functions
		require_once( 'inc/functions/branding.php' ); // load acf save functions
		require_once( 'inc/classes/walker.class.php' ); // load bootstrap walker
		require_once( 'inc/functions/woocommerce.php' ); // register woocommerce hooks
		require_once( 'inc/functions/custom-posts.php' );

		add_theme_support( 'title-tag' ); // let wordpress manage the title

        add_theme_support('woocommerce');
		add_theme_support( 'wc-product-gallery-lightbox' );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		remove_theme_support( 'widgets-block-editor' ); // classic widgets

		//show_admin_bar(false); // hide admin bar
	}

	public static function jd_base_theme_scripts_setup(): void {
		wp_register_script( 'jd-js-main', get_template_directory_uri() . '/dist/main.js', '', '', true );
		wp_enqueue_script( 'jd-js-main' );

		wp_register_style( 'jd-css-main', get_template_directory_uri() . '/dist/main.css' );
		wp_enqueue_style( 'jd-css-main' );

		wp_register_style('dm-serif-display', 'https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap');
		wp_enqueue_style('dm-serif-display');

	}

	public static function jd_base_theme_admin_scripts_setup(): void {
		wp_register_style( 'admin-styles', get_template_directory_uri() . '/dist/admin.css', false);
		wp_enqueue_style( 'admin-styles' );
	}

	public static function jd_base_theme_register_widgets(): void {
		require_once( 'inc/functions/widgets.php' );
	}

	public static function jd_enable_svg_upload( $upload_mimes ): array {
		if( get_field('enable_svg_upload', 'options') ){
			$upload_mimes['svg'] = 'image/svg+xml';
			$upload_mimes['svgz'] = 'image/svg+xml';
			return $upload_mimes;
		}

		return $upload_mimes;
	}

	public static function jd_add_li_class($classes, $item, $args){
		if(isset($args->add_li_class)){
			$classes[] = $args->add_li_class;
		}
    	return $classes;
	}

	public static function jd_add_cart_to_menu($items, $args): string{
		if( $args->theme_location != 'primary-right' ){
			return $items;
		}

		$items_count = (WC()->cart->get_cart_contents_count()) ? WC()->cart->get_cart_contents_count() : false;
		if ($items_count) {
			return '<li id="menu-item-198" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-198 nav-item me-4"><a href="'. wc_get_cart_url() .'" class="nav-link position-relative jd-cart">Cart <i class="fa-solid fa-cart-shopping text-black"></i><span class="cart-label">'. $items_count . '</span></a></li>' . $items;
		} else {
			return '<li id="menu-item-198" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-198 nav-item me-4"><a href="'. wc_get_cart_url() .'" class="nav-link position-relative jd-cart">Cart <i class="fa-solid fa-cart-shopping text-black"></i></a></li>' . $items;
		}

	}
}

$jdBaseTheme = new JustdigitalBaseTheme();

