<?php
/**
 * Custom functions for different widgets
 *
 * @package Education_Care
 */

/**
 * Load custom widgets
 */
if ( ! function_exists( 'education_care_custom_widgets' ) ) :

	function education_care_custom_widgets() {

		// Information and Facts widget.
		register_widget( 'Education_Care_Info_Facts_Widget' );

		// Call to action (CTA) widget.
		register_widget( 'Education_Care_CTA_Widget' );

		// Call to action (CTA) widget with search form.
		register_widget( 'Education_Care_CTA_Search_Widget' );

		// Features widget.
		register_widget( 'Education_Care_Features_Widget' );

		// Courses widget.
		register_widget( 'Education_Care_Courses_Widget' );

		// Team widget.
		register_widget( 'Education_Care_Team_Widget' );

		// Gallery widget.
		register_widget( 'Education_Care_Gallery_Widget' );

		// Testimonial widget.
		register_widget( 'Education_Care_Testimonial_Widget' );

		// Latest News widget.
		register_widget( 'Education_Care_Latest_News_Widget' );

		// Contact widget.
		register_widget( 'Education_Care_Contact_Widget' );

	}

endif;

add_action( 'widgets_init', 'education_care_custom_widgets' );

/**
 * Information widget with fact counter
 */
require get_template_directory() . '/inc/widgets/info-facts.php';

/**
 * Call to action (CTA)
 */
require get_template_directory() . '/inc/widgets/cta.php';

/**
 * Call to action (CTA) with search form
 */
require get_template_directory() . '/inc/widgets/cta-search.php';

/**
 * Features
 */
require get_template_directory() . '/inc/widgets/features.php';

/**
 * Courses
 */
require get_template_directory() . '/inc/widgets/courses.php';

/**
 * Team
 */
require get_template_directory() . '/inc/widgets/team.php';

/**
 * Gallery
 */
require get_template_directory() . '/inc/widgets/gallery.php';

/**
 * Testimonial
 */
require get_template_directory() . '/inc/widgets/testimonial.php';

/**
 * Latest News
 */
require get_template_directory() . '/inc/widgets/latest-news.php';

/**
 * Contact
 */
require get_template_directory() . '/inc/widgets/contact.php';


/**
* Enqueue scripts and styles for widgets page only
*/
function education_care_admin_scripts( $hook ) {

	if( 'widgets.php' === $hook ){

		wp_enqueue_style( 'education-care-admin', get_template_directory_uri() . '/inc/widgets/css/admin.css', array(), '1.0.0' );

		wp_enqueue_media();

		wp_enqueue_script( 'education-care-admin', get_template_directory_uri() . '/inc/widgets/js/admin.js', array( 'jquery' ), '1.0.0' );

	}

}

add_action( 'admin_enqueue_scripts', 'education_care_admin_scripts' );