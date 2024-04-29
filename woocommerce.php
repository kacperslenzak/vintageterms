<?php

/**
 * The template for displaying woocommerce.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Justdigital_Base_Theme
 */
get_header();
?>

<main id="main-content" class="pt-5">
    <div class="<?php if(!is_product()) { echo 'container-fluid px-5'; } else { echo 'container'; } ?>">
        <div class="row">
            <?php if(!is_product()): ?>
            <div class="col-md-2">
                <a class="jd-btn__secondary d-md-none d-block" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Show Product Filters
                </a>
                <div class="collapse" id="collapseExample">
                    <div class="sidebar">
		                <?php dynamic_sidebar('shop'); ?>
                    </div>
                </div>
                <div class="sidebar d-md-block d-none">
                    <?php dynamic_sidebar('shop'); ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="<?php if(!is_product()) { echo 'col-md-10'; } else { echo 'col-md-12'; } ?>">
		        <?php woocommerce_content(); ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>
