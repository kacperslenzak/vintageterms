<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> fw-bold text-black"><?php echo $product->get_price_html(); ?></p>

<?php
$post_brand = get_the_terms($post->ID, 'brand')[0];
if($post_brand):
?>
<p class="fw-bold text-uppercase">By <a href="<?php echo get_term_link($post_brand->term_id, 'brand'); ?>"><?php echo $post_brand->name; ?></a></p>
<?php endif; ?>

