<?php

/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, <?php echo get_template_directory_uri(  ) ?>/assets/images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Justdigital_Base_Theme
 *
 */

get_header(); 
global $jdExtras;
?>

<?php
$scroll_items = get_field('scroll_items');
?>
<div class="container-fluid">
	<div class="scrolling">
		<marquee scrollamount="10" onmouseover="this.stop();" onmouseout="this.start();">
			<div class="items">
				<?php foreach ($scroll_items as $item): ?>
				<div class="item">
					<?php echo $item['item']; ?>
				</div>
				<?php endforeach; ?>
			</div>
		</marquee>
	</div>
</div>


<?php
$offer_image = get_field('offer_image');
$offer_text = get_field('offer_text');
$offer_button = get_field('offer_button');
$offer_bg_color = get_field('offer_background_color');
?>
<section class="special_offer">
	<div class="container-fluid g-0">
		<div class="row g-0">
			<div class="col-md-6">
				<img src="<?php echo $offer_image; ?>" alt="" class="img-fluid">
			</div>
			<div class="col-md-6 d-flex flex-column justify-content-center ps-5 text-white py-5 py-md-0" style="background-color: <?php echo $offer_bg_color; ?>;">
				<?php echo $offer_text; ?>
				<div class="btn me-auto mt-4">
                    <a href="<?php echo $offer_button['url']; ?>" class="jd-btn__primary"><?php echo $offer_button['title']; ?></a>
                </div>
			</div>
		</div>
	</div>
</section>

<?php
$args = array(
	'post_type' => 'product',
	'posts_per_page' => '10',
	'orderby' => 'date',
	'order' => 'DESC'
);
$products = new WP_Query( $args );
if($products->have_posts()):
?>

<section class="latest_products my-5">
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12 text-center fw-bold text-uppercase">
                <div class="arrows">
                    <div class="left-arrow">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/slider_arrow.png" alt="" width="auto" height="24px">
                    </div>
                    <h2>Latest Vintage</h2>
                    <div class="right-arrow">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/slider_arrow.png" alt="" width="auto" height="24px">
                    </div>
                </div>
                <a href="#" class="fw-bold text-uppercase text-black">View All</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row g-0">

            <div class="product_slider d-flex">
	            <?php
	            foreach($products->posts as $post):
	            setup_postdata($post);
                $product = wc_get_product($post->ID);
	            ?>
                <a href="<?php echo get_the_permalink(); ?>" class="text-black text-decoration-none">
                <div class="product mx-lg-5 mx-md-2 mx-0 d-flex flex-column align-items-center">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" height="300px">
                    <p class="fw-bold text-uppercase mb-0 mt-2"><?php echo get_the_title(); ?></p>
                    <?php if($product->is_on_sale()): ?>
                        <p class="fw-bold"><?php echo get_woocommerce_currency_symbol() . $product->get_sale_price(); ?> <span class="text-decoration-line-through fw-normal"><?php echo get_woocommerce_currency_symbol() . $product->get_regular_price(); ?></span></p>
                    <?php else: ?>
                        <p class="fw-bold"><?php echo get_woocommerce_currency_symbol() . $product->get_price(); ?></p>
                    <?php endif; ?>
                </div>
                </a>
	            <?php endforeach;wp_reset_postdata(); ?>
            </div>

        </div>
    </div>
</section>

<?php
$offer_1 = get_field('offer_1');
$offer_2 = get_field('offer_2');
?>
<section class="offers">
    <div class="container-fluid g-0">
        <div class="row g-0">
            <div class="col-md-6" style="background-image: url(<?php echo $offer_1['background_image']; ?>);">
                <div class="text">
                    <h1 class="mb-5 text-white text-uppercase"><?php echo $offer_1['title']; ?></h1>
                    <a href="<?php echo $offer_1['button']['url']; ?>" class="jd-btn__primary"><?php echo $offer_1['button']['title']; ?></a>
                </div>
            </div>
            <div class="col-md-6" style="background-image: url(<?php echo $offer_2['background_image']; ?>);">
                <div class="text">
                    <h1 class="mb-5 text-white text-uppercase"><?php echo $offer_2['title']; ?></h1>
                    <a href="<?php echo $offer_2['button']['url']; ?>" class="jd-btn__primary"><?php echo $offer_2['button']['title']; ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>

<?php
$ig_title = get_field('ig_title');
$ig_text = get_field('ig_text');
$ig_shortcode = get_field('ig_feed_shortcode');
?>
<section class="ig_feed mb-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-uppercase fw-bold"><?php echo $ig_title; ?></h1>
                <p class="fs-5 mb-0"><?php echo $ig_text ?></p>
            </div>
        </div>
    </div>
    <div class="container-fluid g-0">
        <div class="row g-0">
			<?php echo do_shortcode($ig_shortcode); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
