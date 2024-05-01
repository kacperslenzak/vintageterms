<?php

/**
 * @snippet       Remove add to card button
 * @author        Kacper Slenzak
 * @compatible    WooCommerce 7
 * @community     https://justdigital.ie/
 */
add_action( 'woocommerce_after_shop_loop_item', 'jd_remove_add_to_cart', 1 );

function jd_remove_add_to_cart(): void  {
	if( is_shop()) {
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
	}
}

/**
 * @snippet       Remove SALE badge @ Product Archives and Single Product
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 7
 * @community     https://businessbloomer.com/club/
 */

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

//remove skus
add_filter( 'wc_product_sku_enabled', '__return_false' );

// add description etc under add to cart
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 70 );

/**
 * Remove "Description" Heading Title @ WooCommerce Single Product Tabs
 */
add_filter( 'woocommerce_product_description_heading', '__return_null' );

//remove in stock message
add_filter( 'woocommerce_get_stock_html', '__return_false', 10, 2 );

/**
 * @snippet       Add Woococommerce product tabs using acf repeater
 * @author        Kacper Slenzak
 * @compatible    WooCommerce 8
 * @community     https://justdigital.ie/
 * @info          Make ACF repeater called product_tabs and give it a field called tab_title and tab_content, otherwise alter code as needed.
 **/
function jd_add_product_tabs( $tabs ): ?array {
	global $product;
	$acf_tabs = get_field('product_tabs', $product->get_id());
	if ($acf_tabs) {
		foreach ($acf_tabs as $tab){
			$tabs[$tab['tab_title']] = array(
				'title' => __( $tab['tab_title'], 'woocommerce' ),// tab title
				'priority' => 50,
				'callback' => function() use ($tab){
					echo $tab['tab_content']; // tab content
				}
			);
		}
		return $tabs;
	}
	return null;
}
add_filter('woocommerce_product_tabs', 'jd_add_product_tabs');

//ajax add to cart
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 30 );

//add to cart fragment
add_filter( 'woocommerce_add_to_cart_fragments', 'jd_add_to_cart_fragment' );

function jd_add_to_cart_fragment( $fragments ) {

	$fragments[ '.jd-cart' ] = '<a href="'. wc_get_cart_url() .'" class="nav-link position-relative jd-cart">Cart <i class="fa-solid fa-cart-shopping text-black"></i><span class="cart-label">'. WC()->cart->get_cart_contents_count() . '</span></a>';
	return $fragments;

}

/**
 * @snippet       Remove Additional Information Tab @ WooCommerce Single Product Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 8
 * @community     https://businessbloomer.com/club/
 */

add_filter( 'woocommerce_product_tabs', 'bbloomer_remove_product_tabs', 9999 );

function bbloomer_remove_product_tabs( $tabs ) {
	unset( $tabs['additional_information'] );
	return $tabs;
}