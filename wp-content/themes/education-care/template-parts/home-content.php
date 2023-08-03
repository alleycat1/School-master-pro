<?php
/**
 * Home page main content area
 *
 * @package Education_Care
 */

// Bail if not home page.
if ( ! is_front_page() || 'posts' === get_option( 'show_on_front' ) ) {
	return;
}
?>

<div id="home-page-content" class="home-wrapper">
	<div class="dynamic-widgets">
		<?php 
		if ( is_active_sidebar( 'home-page-widget-area' ) ) : 

			dynamic_sidebar( 'home-page-widget-area' ); 

		endif; ?>
	</div><!-- .home-wrapper -->
</div><!-- #home-page-widget-area -->