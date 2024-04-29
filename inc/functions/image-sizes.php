<?php

/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/

add_theme_support( 'post-thumbnails' );

add_image_size( 'blog-thumb', 250, 250, true );

add_image_size( 'card-thumb', 400, 220, true );