<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until the main tag
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Justdigital_Base_Theme
 */

?>

    <!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="preconnect" href="https://fonts.gstatic.com/"/>
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin/>

        <?php if( !empty( get_field('header_code', 'options') ) ){
            echo get_field('header_code', 'options');
        } ?>

		<?php
		wp_head();
		?>
    </head>

<body <?php body_class(); ?> >
<?php

get_template_part( 'template-parts/content-header' );

?>