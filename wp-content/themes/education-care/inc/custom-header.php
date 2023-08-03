<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Education_Care
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses education_care_header_style()
 */
function education_care_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'education_care_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1920,
		'height'                 => 400,
		'flex-height'            => true,
		'header-text'   		 => false,
	) ) );
}
add_action( 'after_setup_theme', 'education_care_custom_header_setup' );

