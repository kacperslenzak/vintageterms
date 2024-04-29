<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Justdigital_Base_Theme
 */

if(is_single()) {
?>

	<div class="post_content">
        <div class="container mt-n5 bg-white rounded-top" style="min-height: 20vh;">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <h1 class="text-center"><?php the_title(); ?></h1>
                    <p class="mt-4"><?php echo get_the_content(); ?></p>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
