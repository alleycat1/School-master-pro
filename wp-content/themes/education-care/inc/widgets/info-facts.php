<?php
/**
 * Information and fact counter widget
 *
 * @package Education_Care
 */

if ( ! class_exists( 'Education_Care_Info_Facts_Widget' ) ) :

	/**
	 * Information and Facts widget class.
	 *
	 * @since 1.0.0
	 */
	class Education_Care_Info_Facts_Widget extends WP_Widget {

		function __construct() {
			$opts = array(
					'classname'   => 'education-care-info-facts',
					'description' => esc_html__( 'Display Information and Facts', 'education-care' ),
			);
			parent::__construct( 'info-facts', esc_html__( 'EC: Information and Facts', 'education-care' ), $opts );
		}

		function widget( $args, $instance ) {

			$info_page 			= !empty( $instance['info_page'] ) ? $instance['info_page'] : ''; 

			$count_one			= !empty( $instance['count_one'] ) ? $instance['count_one'] : '';
			$text_one			= !empty( $instance['text_one'] ) ? $instance['text_one'] : '';

			$count_two			= !empty( $instance['count_two'] ) ? $instance['count_two'] : '';
			$text_two			= !empty( $instance['text_two'] ) ? $instance['text_two'] : '';

			$count_three 		= !empty( $instance['count_three'] ) ? $instance['count_three'] : '';
			$text_three 		= !empty( $instance['text_three'] ) ? $instance['text_three'] : '';

			$count_four			= !empty( $instance['count_four'] ) ? $instance['count_four'] : '';
			$text_four			= !empty( $instance['text_four'] ) ? $instance['text_four'] : '';
			
			echo $args['before_widget']; ?>

			<section id="education-about" class="education-about-section">
				<div id="about-us" class="about-wrapper">
					<div class="container">

						<?php if ( $info_page ) { 

							$info_args = array(
											'posts_per_page' => 1,
											'page_id'	     => absint( $info_page ),
											'post_type'      => 'page',
											'post_status'  	 => 'publish',
										);

							$info_query = new WP_Query( $info_args );	

							if( $info_query->have_posts()){ ?>

								<div class="about-us-description">
									<?php

									while( $info_query->have_posts()){

										$info_query->the_post(); ?>

										<h2><?php the_title(); ?></h2>
										<?php the_content(); 

									}

									wp_reset_postdata(); ?>

								</div><!-- .about-us-description -->

							<?php } 

						} ?>

						<div class="some-facts">
							<div class="counter-item-wrapper">

								<?php if( 0 < $count_one && !empty( $text_one ) ){ ?>
									<div class="counter-item">
									    <div class="counter-inner">
									        <span class="count"><?php echo absint( $count_one ); ?></span>
									        <span class="count-text"><?php echo esc_html( $text_one); ?></span>
									    </div>
									</div>
								<?php  } ?>

								<?php if( 0 < $count_two && !empty( $text_two ) ){ ?>
									<div class="counter-item">
									    <div class="counter-inner">
									        <span class="count"><?php echo absint( $count_two ); ?></span>
									        <span class="count-text"><?php echo esc_html( $text_two); ?></span>
									    </div>
									</div>
								<?php  } ?>

								<?php if( 0 < $count_three && !empty( $text_three ) ){ ?>
									<div class="counter-item">
									    <div class="counter-inner">
									        <span class="count"><?php echo absint( $count_three ); ?></span>
									        <span class="count-text"><?php echo esc_html( $text_three); ?></span>
									    </div>
									</div>
								<?php  } ?>

								<?php if( 0 < $count_four && !empty( $text_four ) ){ ?>
									<div class="counter-item">
									    <div class="counter-inner">
									        <span class="count"><?php echo absint( $count_four ); ?></span>
									        <span class="count-text"><?php echo esc_html( $text_four); ?></span>
									    </div>
									</div>
								<?php  } ?>
							</div><!-- .counter-item-wrapper -->
						</div><!-- .some-facts -->

					</div>
				</div><!-- #about-us -->
			</section><!-- #education-about -->

			<?php 

			echo $args['after_widget'];

		}

		function update( $new_instance, $old_instance ) {
			$instance 						= $old_instance;

			$instance['info_page'] 	        = absint( $new_instance['info_page'] );

			$instance['count_one'] 			= absint( $new_instance['count_one'] );
			$instance['text_one'] 			= sanitize_text_field( $new_instance['text_one'] );

			$instance['count_two'] 			= absint( $new_instance['count_two'] );
			$instance['text_two'] 			= sanitize_text_field( $new_instance['text_two'] );

			$instance['count_three'] 		= absint( $new_instance['count_three'] );
			$instance['text_three'] 		= sanitize_text_field( $new_instance['text_three'] );
			
			$instance['count_four'] 		= absint( $new_instance['count_four'] );
			$instance['text_four'] 			= sanitize_text_field( $new_instance['text_four'] );

			return $instance;
		}

		function form( $instance ) {

			// Defaults.
			$defaults = array(
				'info_page' 		=> '',
				'count_one'			=> '',
				'text_one' 			=> '',
				'count_two'			=> '',
				'text_two' 			=> '',
				'count_three'		=> '',
				'text_three' 		=> '',
				'count_four'		=> '',
				'text_four' 		=> '',
			);

			$instance 			= wp_parse_args( (array) $instance, $defaults );

			$info_page			= !empty( $instance['info_page'] ) ? $instance['info_page'] : '';

			$count_one			= !empty( $instance['count_one'] ) ? $instance['count_one'] : '';
			$text_one			= !empty( $instance['text_one'] ) ? $instance['text_one'] : '';

			$count_two			= !empty( $instance['count_two'] ) ? $instance['count_two'] : '';
			$text_two			= !empty( $instance['text_two'] ) ? $instance['text_two'] : ''; 

			$count_three 		= !empty( $instance['count_three'] ) ? $instance['count_three'] : '';
			$text_three 		= !empty( $instance['text_three'] ) ? $instance['text_three'] : ''; 

			$count_four			= !empty( $instance['count_four'] ) ? $instance['count_four'] : '';
			$text_four			= !empty( $instance['text_four'] ) ? $instance['text_four'] : '';
			?>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'info_page' ); ?>">
					<strong><?php esc_html_e( 'Info Page:', 'education-care' ); ?></strong>
				</label>
				<?php
				wp_dropdown_pages( array(
					'id'               => $this->get_field_id( 'info_page' ),
					'class'            => 'widefat',
					'name'             => $this->get_field_name( 'info_page' ),
					'selected'         => $instance[ 'info_page' ],
					'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'education-care' ),
					)
				);
				?>
				<small>
		        	<?php esc_html_e('Content of this page will be used in left side of section as information', 'education-care'); ?>	
		        </small>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('count_one') ); ?>">
					<?php esc_html_e('Count One:', 'education-care'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count_one') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count_one') ); ?>" type="number" value="<?php echo absint( $count_one ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('text_one') ); ?>">
					<?php esc_html_e('Text One:', 'education-care'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_one') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_one') ); ?>" type="text" value="<?php echo esc_attr( $text_one ); ?>" />		
			</p>

			<hr>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('count_two') ); ?>">
					<?php esc_html_e('Count Two:', 'education-care'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count_two') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count_two') ); ?>" type="number" value="<?php echo absint( $count_two ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('text_two') ); ?>">
					<?php esc_html_e('Text Two:', 'education-care'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_two') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_two') ); ?>" type="text" value="<?php echo esc_attr( $text_two ); ?>" />		
			</p>

			<hr>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('count_three') ); ?>">
					<?php esc_html_e('Count Three:', 'education-care'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count_three') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count_three') ); ?>" type="number" value="<?php echo absint( $count_three ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('text_three') ); ?>">
					<?php esc_html_e('Text Three:', 'education-care'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_three') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_three') ); ?>" type="text" value="<?php echo esc_attr( $text_three ); ?>" />		
			</p>

			<hr>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('count_four') ); ?>">
					<?php esc_html_e('Count Four:', 'education-care'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count_four') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count_four') ); ?>" type="number" value="<?php echo absint( $count_four ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('text_four') ); ?>">
					<?php esc_html_e('Text Four:', 'education-care'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_four') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_four') ); ?>" type="text" value="<?php echo esc_attr( $text_four ); ?>" />		
			</p>
			
		<?php
				
		}
	}

endif;