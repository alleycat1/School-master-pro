<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Education_Care
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function education_care_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( ! ( is_front_page() && ! is_home() ) ) {
	    $classes[] = 'inner';
	}

	// Add class for global layout.
	$global_layout 	= education_care_options( 'blog_layout' );
	$global_layout 	= apply_filters( 'education_care_filter_theme_global_layout', $global_layout );
	$classes[] 		= 'global-layout-' . esc_attr( $global_layout );

	$slider_status 	= education_care_options( 'slider_status' );

	if( 1 == $slider_status ){

		$classes[] 		= 'slider-active';

	}else{

		$classes[] 		= 'slider-inactive';

	}

	return $classes;
}
add_filter( 'body_class', 'education_care_body_classes' );

/**
 * Add a sidebar action
 */
if ( ! function_exists( 'education_care_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function education_care_add_sidebar() {

		$global_layout = education_care_options( 'blog_layout' );
		$global_layout = apply_filters( 'education_care_filter_theme_global_layout', $global_layout );

		// Include sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}

	}
endif;

add_action( 'education_care_action_sidebar', 'education_care_add_sidebar' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function education_care_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'education_care_pingback_header' );

/**
 * Filter to check home page content
 */
if ( ! function_exists( 'education_care_show_home_content' ) ) :

	/**
	 * Check home page content status.
	 *
	 */
	function education_care_show_home_content( $status ) {

		if ( is_front_page() ) {
			$show_home_content = education_care_options( 'home_content' );
			if ( false === $show_home_content ) {
				$status = false;
			}
		}
		return $status;

	}

endif;

add_action( 'education_care_show_home_page_content', 'education_care_show_home_content' );


if ( ! function_exists( 'education_care_implement_excerpt_length' ) ) :

	/**
	 * Implement excerpt length.
	 *
	 * @since 1.0.0
	 *
	 * @param int $length The number of words.
	 * @return int Excerpt length.
	 */
	function education_care_implement_excerpt_length( $length ) {

		$excerpt_length = education_care_options( 'excerpt_length' );
		if ( absint( $excerpt_length ) > 0 ) {
			$length = absint( $excerpt_length );
		}
		return $length;

	}
endif;


if ( ! function_exists( 'education_care_implement_read_more' ) ) :

	/**
	 * Implement read more in excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function education_care_implement_read_more( $more ) {

		$output = $more;

		$output = '&hellip;';

		return $output;

	}

endif;

if ( ! function_exists( 'education_care_hook_read_more_filters' ) ) :

	/**
	 * Hook read more and excerpt length filters.
	 *
	 * @since 1.0.0
	 */
	function education_care_hook_read_more_filters() {
		if ( is_home() || is_category() || is_tag() || is_author() || is_date() || is_search() ) {

			add_filter( 'excerpt_length', 'education_care_implement_excerpt_length', 999 );
			add_filter( 'excerpt_more', 'education_care_implement_read_more' );

		}
	}
endif;
add_action( 'wp', 'education_care_hook_read_more_filters' );

//=============================================================
// Exclude category in blog page
//=============================================================
if( ! function_exists( 'education_care_exclude_category_in_blog_page' ) ) :

  /**
   * Exclude category in blog page
   *
   * @since  Education_Care 1.0.0
   */
  function education_care_exclude_category_in_blog_page( $query ) {

    if(  $query->is_main_query() && ( $query->is_home || $query->is_archive()  ) ) {
      $exclude_categories = education_care_options( 'exclude_cats' );
      if ( ! empty( $exclude_categories ) ) {
        $cats = str_replace(', ', ',', $exclude_categories);
        $cats = str_replace(' , ', ',', $exclude_categories);
        $cats = explode( ',', $cats );
        $cats = array_filter( $cats, 'is_numeric' );
        $string_exclude = '';
        if ( ! empty( $cats ) ) {
          $string_exclude = '-' . implode( ',-', $cats);
          $query->set( 'cat', $string_exclude );
        }
      }
    }

    return $query;

  }

endif;

add_filter( 'pre_get_posts', 'education_care_exclude_category_in_blog_page' );

function education_care_exclude_posts_recent_post_widget( $args ){

    $exclude_categories = education_care_options( 'exclude_cats' );

    if ( ! empty( $exclude_categories ) ) {

    	$cats = str_replace(', ', ',', $exclude_categories);

    	$cats = str_replace(' , ', ',', $exclude_categories);

    	$cats = explode( ',', $cats );

    	$cats = array_filter( $cats, 'is_numeric' );

    	$args['category__not_in'] = $cats;

	}

    return $args;
}

add_filter( 'widget_posts_args', 'education_care_exclude_posts_recent_post_widget');

//Hide categories from WordPress category widget
function education_care_exclude_widget_categories($args){

    $exclude_categories = education_care_options( 'exclude_cats' );

    if ( ! empty( $exclude_categories ) ) {

    	$cats = str_replace(', ', ',', $exclude_categories);

    	$cats = str_replace(' , ', ',', $exclude_categories);

    	$cats = explode( ',', $cats );

    	$cats = array_filter( $cats, 'is_numeric' );

    	$args['exclude'] = $cats;

	}
   
    return $args;

}

add_filter( 'widget_categories_args', 'education_care_exclude_widget_categories' );


if ( ! function_exists( 'education_care_gotop' ) ) :

	function education_care_gotop() {

			echo '<a href="#page" class="gotop" id="btn-gotop"><i class="fa fa-angle-up"></i></a>';

	}

endif;

add_action( 'wp_footer', 'education_care_gotop' );