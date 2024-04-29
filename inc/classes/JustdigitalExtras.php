<?php

/**
 * @User kacperslenzak
 * @Package thebankwexford.dev
 * @File JustdigitalExtras
 * @Date 29/01/2023
 */

class JustdigitalExtras {

	function social_media_repeater($atts=''): void {
		$rows = get_field('social_media', 'options');
		$font_size = ($atts['font-size']!='' ? $atts['font-size'] : '') ;
		if ($rows){
			foreach($rows as $row){
				echo "<li class='list-inline-item me-4 " . $font_size . "'>";
				echo "<a href='". $row['link'] ."'><i class='". $row['icon'] ." text-black'></i></a>";
				echo "</li>";
			}
		}

	}

	function get_phone_number(): ?string {
		$phone_number = get_field('phone_number', 'options');
		if($phone_number){
			return $phone_number;
		}

		return null;
	}

	function the_breadcrumb(): void {

		$sep = ' » ';

		if (!is_front_page()) {

			echo '<div class="breadcrumbs">';
			echo '<a href="';
			echo get_option('home');
			echo '">';
			bloginfo('name');
			echo '</a>' . $sep;

			if (is_category() || is_single() ){
				the_category('title_li=');
			} elseif (is_archive() || is_single()){
				if ( is_day() ) {
					printf( __( '%s', 'text_domain' ), get_the_date() );
				} elseif ( is_month() ) {
					printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
				} elseif ( is_year() ) {
					printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
				} else {
					_e( 'Blog Archives', 'text_domain' );
				}
			}

			if (is_single()) {
				//echo $sep; // disable this echo as we are not using taxonomy
				the_title();
			}

			if (is_page()) {
				echo the_title();
			}

			if (is_home()){
				global $post;
				$page_for_posts_id = get_option('page_for_posts');
				if ( $page_for_posts_id ) {
					$post = get_page($page_for_posts_id);
					setup_postdata($post);
					the_title();
					rewind_posts();
				}
			}

			echo '</div>';
		}
	}

	function process_markdown($text): string {
		$processed = preg_replace('/#b#(.*?)#b#/', '<span>$1</span>', $text);
		return $processed;
	}

}
