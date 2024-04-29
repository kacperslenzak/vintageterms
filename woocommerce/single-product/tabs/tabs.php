<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>

    <div class="accordion mt-5" id="woocommerce-tabs-accordion">

		<?php
		$counter = 0;
        foreach($product_tabs as $key => $product_tab):
        ?>
			<div class="accordion-item">
				<h2 class="accordion-header" id="heading<?php echo $counter; ?>">
					<button class="accordion-button fw-bold text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $counter; ?>" aria-expanded="true" aria-controls="collapse<?php echo $counter; ?>">
						<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
					</button>
				</h2>
				<div id="collapse<?php echo $counter; ?>" class="accordion-collapse collapse <?php if ($counter == 0) { echo 'show'; } ?>" aria-labelledby="heading<?php echo $counter; ?>" data-bs-parent="#woocommerce-tabs-accordion">
					<div class="accordion-body">
						<?php
						if ( isset( $product_tab['callback'] ) ) {
							call_user_func( $product_tab['callback'], $key, $product_tab );
						}
						?>
					</div>
				</div>
			</div>
		<?php $counter++;endforeach; ?>

	</div>

<?php endif; ?>