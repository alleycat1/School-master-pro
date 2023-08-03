<?php
/**
 * Contact widget
 *
 * @package Education_Care
 */

if ( ! class_exists( 'Education_Care_Contact_Widget' ) ) :

	/**
	 * Contact widget class.
	 *
	 * @since 1.0.0
	 */
	class Education_Care_Contact_Widget extends WP_Widget {

		function __construct() {
			$opts = array(
					'classname'   => 'education-care-contact',
					'description' => esc_html__( 'Contact Widget', 'education-care' ),
			);
			parent::__construct( 'ec-contact', esc_html__( 'EC: Contact', 'education-care' ), $opts );
		}

		function widget( $args, $instance ) {

			$title      	= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$show_address 	= ! empty( $instance['show_address'] ) ? $instance['show_address'] : 0;

			$show_email    	= ! empty( $instance['show_email'] ) ? $instance['show_email'] : 0;

			$show_phone    	= ! empty( $instance['show_phone'] ) ? $instance['show_phone'] : 0;

			$show_social    = ! empty( $instance['show_social'] ) ? $instance['show_social'] : 0;

			$additional 	= ! empty( $instance['additional'] ) ? esc_html( $instance['additional'] ) : '';


			$contact_page = !empty( $instance['contact_page'] ) ? $instance['contact_page'] : ''; 
			
			echo $args['before_widget']; ?>

			<section id="education-contact" class="education-contact-section">

                    <div id="contact-us" class="contact-us-wrapper">

						<div class="container">


							<div class="contact-us-info">

							    <div class="contact-us-info-inner">
							        
							        <div class="contact-part">
							            <?php 

	            				        if ( $title ) { ?>
											
											<h2><?php echo esc_html( $title ); ?></h2>
	                                      
	            	                    <?php } ?>

							            <ul>
							                <?php 
							                if( 1 == $show_address && !empty( education_care_options('conatct_address') ) ){ ?>
							                	<li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html( education_care_options('conatct_address') ); ?></li>
							                <?php } ?>

							                <?php 
							                if( 1 == $show_email && !empty( education_care_options('conatct_email') ) ){ ?>
							                	<li><i class="fa fa-envelope-open-o" aria-hidden="true"></i> <?php echo esc_html( education_care_options('conatct_email') ); ?></li>
							                <?php } ?>

							                <?php 
							                if( 1 == $show_phone && !empty( education_care_options('conatct_phone') ) ){ ?>
							                	<li><i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_html( education_care_options('conatct_phone') ); ?></li>
							                <?php } ?>
							            </ul>

							            <?php 
							            if( 1 == $show_social){ ?>

								            <div class="social-widgets">

								                <ul>
									                <?php 
									                for( $j= 1; $j<=6; $j++ ){ 

									                	$social_link = education_care_options('social_link_'.$j);

									                	if( !empty( $social_link ) ){ ?>

									                  		<li><a target="_blank" href="<?php echo esc_url( $social_link ); ?>">Facebook</a></li>

									                	<?php 
									                	} 

									                } ?>
								                </ul> 

								            </div><!-- .social-widgets -->
							            <?php } ?>

							        </div><!-- .contact-part -->

							        <?php if( !empty( $additional ) ){ ?>
								        <div class="newsletter-holder">
								        	<?php echo do_shortcode( wp_kses_post( $additional ) ); ?>
								        </div><!-- .newsletter-holder -->
							        <?php } ?>


							    </div><!-- .contact-us-info-inner -->

							</div><!-- .contact-us-info -->

					</div><!-- .container -->

					<?php if ( !empty( $contact_page ) ) { 

						$contact_args = array(
										'posts_per_page' => 1,
										'page_id'	     => absint( $contact_page ),
										'post_type'      => 'page',
										'post_status'  	 => 'publish',
									);

						$contact_query = new WP_Query( $contact_args );	

						if( $contact_query->have_posts()){

							while( $contact_query->have_posts()){

								$contact_query->the_post(); ?>

								<div class="map-holder">
									<?php the_content(); ?>
								</div>

								<?php

							}

							wp_reset_postdata();

						} ?>
						
					<?php } ?>

				</div><!-- #contact-us -->
			</section><!-- #education-contact -->

			<?php 

			echo $args['after_widget'];

		}

		function update( $new_instance, $old_instance ) {
			$instance 				  = $old_instance;
			$instance['title']        = sanitize_text_field( $new_instance['title'] );
			$instance['contact_page'] = absint( $new_instance['contact_page'] );
			$instance['show_address'] = (bool) $new_instance['show_address'] ? 1 : 0;
			$instance['show_email']   = (bool) $new_instance['show_email'] ? 1 : 0;
			$instance['show_phone']   = (bool) $new_instance['show_phone'] ? 1 : 0;
			$instance['show_social']  = (bool) $new_instance['show_social'] ? 1 : 0;
			$instance['additional']   = sanitize_text_field( $new_instance['additional'] );


			return $instance;
		}

		function form( $instance ) {

			// Defaults.
			$defaults = array(
				'title'         => '',
				'contact_page' 	=> '',
				'show_address' 	=> 1,
				'show_email' 	=> 1,
				'show_phone' 	=> 1,
				'show_social' 	=> 1,
				'additional'    => '',
			);

			$instance 			= wp_parse_args( (array) $instance, $defaults );
			?>

			<p>
			  <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'education-care' ); ?></strong></label>
			  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>

			<p>
			    <input class="checkbox" type="checkbox" <?php checked( $instance['show_address'] ); ?> id="<?php echo $this->get_field_id( 'show_address' ); ?>" name="<?php echo $this->get_field_name( 'show_address' ); ?>" />
			    <label for="<?php echo $this->get_field_id( 'show_address' ); ?>"><?php esc_html_e( 'Show Address ( Add this field in customizer )', 'education-care' ); ?></label>
			</p>

			<p>
			    <input class="checkbox" type="checkbox" <?php checked( $instance['show_email'] ); ?> id="<?php echo $this->get_field_id( 'show_email' ); ?>" name="<?php echo $this->get_field_name( 'show_email' ); ?>" />
			    <label for="<?php echo $this->get_field_id( 'show_email' ); ?>"><?php esc_html_e( 'Show Email ( Add this field in customizer )', 'education-care' ); ?></label>
			</p>

			<p>
			    <input class="checkbox" type="checkbox" <?php checked( $instance['show_phone'] ); ?> id="<?php echo $this->get_field_id( 'show_phone' ); ?>" name="<?php echo $this->get_field_name( 'show_phone' ); ?>" />
			    <label for="<?php echo $this->get_field_id( 'show_phone' ); ?>"><?php esc_html_e( 'Show Phone ( Add this field in customizer )', 'education-care' ); ?></label>
			</p>

			<p>
			    <input class="checkbox" type="checkbox" <?php checked( $instance['show_social'] ); ?> id="<?php echo $this->get_field_id( 'show_social' ); ?>" name="<?php echo $this->get_field_name( 'show_social' ); ?>" />
			    <label for="<?php echo $this->get_field_id( 'show_social' ); ?>"><?php esc_html_e( 'Show Soial Links ( You need to add social links in Appearance >> Customize >> Social Links )', 'education-care' ); ?></label>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'additional' ) ); ?>"><strong><?php esc_html_e( 'Additional Content:', 'education-care' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'additional' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'additional' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['additional'] ); ?>" />
				<small>
		        	<?php esc_html_e('Texts or shortcode like contact form, newsletter, etc can be used', 'education-care'); ?>	
		        </small>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'contact_page' ); ?>">
					<strong><?php esc_html_e( 'Contact Page:', 'education-care' ); ?></strong>
				</label>
				<?php
				wp_dropdown_pages( array(
					'id'               => $this->get_field_id( 'contact_page' ),
					'class'            => 'widefat',
					'name'             => $this->get_field_name( 'contact_page' ),
					'selected'         => $instance[ 'contact_page' ],
					'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'education-care' ),
					)
				);
				?>
				<small>
		        	<?php esc_html_e('Please select page that contain contact form or google map', 'education-care'); ?>	
		        </small>
			</p>

		<?php
				
		}
	}

endif;