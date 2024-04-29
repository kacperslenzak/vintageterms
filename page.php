<?php

/**
 * The template for displaying all pages.
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

<main id="main-content" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4 class="fw-bold text-uppercase"><?php echo get_the_title(); ?></h4>
            </div>
        </div>
        <div class="col-md-12">
            <?php the_content(); ?>
        </div>
    </div>

    <?php get_template_part('template-parts/content', 'flex'); // flex components ?>
</main>

<?php
get_footer();
?>
