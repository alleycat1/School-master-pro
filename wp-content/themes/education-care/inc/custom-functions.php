<?php
/**
 * Sample implementation of the Custom Functions of theme
 *
 * @package Education_Care
 */

/**
 * Set up the WordPress core custom logo feature.
 *
 * @uses education_care_logo()
 */
if ( ! function_exists( 'education_care_logo' ) ) :

	/**
	 * Displays logo.
	 *
	 * @since 1.0.0
	 */
	function education_care_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}
endif;

/**
 * Set up fallback menu for primary navigation.
 *
 * @uses education_care_fallback_menu()
 */
if ( ! function_exists( 'education_care_fallback_menu' ) ) :

	/**
	 * Fallback for main menu.
	 *
	 * @since 1.0.0
	 */
	function education_care_fallback_menu() {
		echo '<ul>';
		echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'education-care' ) . '</a></li>';
		$args = array(
			'number'       => 4,
			'hierarchical' => false,
			);
		$pages = get_pages( $args );
		if ( is_array( $pages ) && ! empty( $pages ) ) {
			foreach ( $pages as $page ) {
				echo '<li><a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a></li>';
			}
		}
		echo '</ul>';

	}

endif;

/**
 * Custom excerpt lenght of the theme.
 *
 * @uses education_care_fallback_menu()
 */
if ( ! function_exists( 'education_care_get_the_excerpt' ) ) :

	/**
	 * Returns post excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length      Excerpt length in words.
	 * @param WP_Post $post_object The post object.
	 * @return string Post excerpt.
	 */
	function education_care_get_the_excerpt( $length = 0, $post_object = null ) {
		global $post;

		if ( is_null( $post_object ) ) {
			$post_object = $post;
		}

		$length = absint( $length );
		if ( 0 === $length ) {
			return;
		}

		$source_content = $post_object->post_content;

		if ( ! empty( $post_object->post_excerpt ) ) {
			$source_content = $post_object->post_excerpt;
		}

		$source_content = strip_shortcodes( $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}

endif;

/**
 * Google fonts of the theme.
 *
 * @uses education_care_google_fonts()
 */
if ( ! function_exists( 'education_care_google_fonts' ) ) :

	/**
	 * Register Google fonts.
	 *
	 * @since 1.0.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function education_care_google_fonts() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'education-care' ) ) {
			$fonts[] = 'Poppins:300,400,500,600,700';
		}
		
		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), '//fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}

endif;
