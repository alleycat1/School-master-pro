<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package enlighten
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses enlighten_header_style()
 */
function enlighten_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'enlighten_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1920,
		'height'                 => 350,
		'flex-height'            => true,
        'flex-width'            => true,
		'wp-head-callback'       => 'enlighten_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'enlighten_custom_header_setup' );

if ( ! function_exists( 'enlighten_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see enlighten_custom_header_setup().
 */
function enlighten_header_style() {
	$header_text_color = get_header_textcolor();
	$header_text_color = ltrim( $header_text_color, '#' );
	$default_header_text_color = get_theme_support( 'custom-header', 'default-text-color' );
	$default_header_text_color = ltrim( $default_header_text_color, '#' );

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
	 */
	if ( $default_header_text_color === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
