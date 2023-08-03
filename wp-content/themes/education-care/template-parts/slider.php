<?php
/**
 * Template part for slider
 *
 * @package Education_Care
 */

// Bail if no slider.
$slider_details = education_care_slider_details();
if ( empty( $slider_details ) ) {
	return;
}

// Slider status.
$slider_status = education_care_options( 'slider_status' );
if ( 1 != $slider_status ) {
	return;
}
if ( ! ( is_front_page() && ! is_home() ) ) {
    return;
}
?>
<section id="featured-slider">
    <div id="main-banner">
        <div class="slick-main-slider">
        	<?php
        	foreach ( $slider_details as $slide ) :

        		if( !empty( $slide['image_url'] )){ 

        			if( 1 == $slide['linked']){
        				$link_opening = '';
        				$link_closing = '';
        			} else{
        				$link_opening = '<a href="'.esc_url( $slide['url'] ).'">';
        				$link_closing = '</a>';
        			} ?>

			            <div class="item" style="background:url(<?php echo esc_url( $slide['image_url'] ); ?>) top center; background-size:cover;">
			                <div class="container">
			                	<?php echo $link_opening; ?>
				                    <div class="caption">
				                        <?php 
				                        if( !empty( $slide['title'] )){ ?>
						                	<h3><?php echo esc_html( $slide['title'] ); ?></h3>
						                	<?php 
						            	} 

						                if( !empty( $slide['excerpt'] )){ ?>
						                	<h2><?php echo wp_kses_post($slide['excerpt']); ?></h2>
						                <?php } ?>
				                    </div>
				                <?php echo $link_closing; ?>
			                </div><!-- .container -->
			            </div>
	            		<?php 
            	} 

		    endforeach; 
		    ?>
        </div><!-- .slider-holder -->
    </div><!-- .main-banner -->
</section><!-- #main-banner -->