<?php
/**
 * Features widget
 *
 * @package Education_Care
 */

if ( ! class_exists( 'Education_Care_Features_Widget' ) ) :

	/**
	 * Features widget class.
	 *
	 * @since 1.0.0
	 */
	class Education_Care_Features_Widget extends WP_Widget {

		function __construct() {
			$opts = array(
					'classname'   => 'education-care-features',
					'description' => esc_html__( 'Display features', 'education-care' ),
			);
			parent::__construct( 'features', esc_html__( 'EC: Features', 'education-care' ), $opts );
		}

		function widget( $args, $instance ) {

			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$excerpt_length	= !empty( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : 20;

			$detail_link 	= ! empty( $instance['detail_link'] ) ? $instance['detail_link'] : 0;

			$services_ids 	= array();
			$item_number 	= 6;

			for ( $i = 1; $i <= $item_number; $i++ ) {
				if ( ! empty( $instance["item_id_$i"] ) && absint( $instance["item_id_$i"] ) > 0 ) {
					$id = absint( $instance["item_id_$i"] );
					$services_ids[ $id ]['id']   = absint( $instance["item_id_$i"] );
				}
			}

			echo $args['before_widget']; ?>

			<section id="education-services" class="education-services-section">

				<div id="services" class="services-wrapper services-col-3">
                       
					<div class="container">

						<?php

						if ( $title ) { ?>

							<div class="section-title">
							    <h2><?php echo esc_html( $title ); ?></h2>
							</div><!-- .section-title -->

						<?php }

						if ( ! empty( $services_ids ) ) {
							$query_args = array(
								'posts_per_page' => count( $services_ids ),
								'post__in'       => wp_list_pluck( $services_ids, 'id' ),
								'orderby'        => 'post__in',
								'post_type'      => 'page',
								'no_found_rows'  => true,
							);
							$all_services = get_posts( $query_args ); ?>

							<?php if ( ! empty( $all_services ) ) : ?>
								<?php global $post; ?>
								
									<div class="inner-wrapper">

										<?php foreach ( $all_services as $post ) : ?>
											<?php setup_postdata( $post ); ?>
											<div class="services-item">
												<div class="service-item-inner">
													<?php if( has_post_thumbnail() ){ ?>
														<div class="service-icon">
															<?php 
															if( 1 == $detail_link ){ ?>
															<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
																<?php
															} else{ 
																the_post_thumbnail();
															} ?>
														</div>
													<?php } ?>

													<?php
												    if( 1 == $detail_link ){ ?>
												    	<h3 class="services-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												    	<?php 
												    } else{ ?>
												    	<h3 class="services-item-title"><?php the_title(); ?></h3>
												    	<?php
												    }

													$content = education_care_get_the_excerpt( absint( $excerpt_length ) );

													echo $content ? wpautop( wp_kses_post( $content ) ) : ''; 
													?>
												</div><!-- .service-item-inner -->
											</div><!-- .services-item -->
										<?php endforeach; ?>

									</div><!-- .inner-wrapper -->

								<?php wp_reset_postdata(); ?>

							<?php endif;
						} ?>

					</div>

				</div>

			</section><!-- #education-services -->

			<?php

			echo $args['after_widget'];

		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title'] 			= sanitize_text_field( $new_instance['title'] );

			$instance['excerpt_length'] = absint( $new_instance['excerpt_length'] );

			$instance['detail_link']    = (bool) $new_instance['detail_link'] ? 1 : 0;

			$item_number = 6;

			for ( $i = 1; $i <= $item_number; $i++ ) {
				$instance["item_id_$i"]   = absint( $new_instance["item_id_$i"] );
			}

			return $instance;
		}

		function form( $instance ) {

			// Defaults.
			$defaults = array(
							'title' 			=> '',
							'section_id' 		=> '',
							'excerpt_length'	=> 20,
							'detail_link'   	=> 0,
						);

			$item_number = 6;

			for ( $i = 1; $i <= $item_number; $i++ ) {
				$defaults["item_id_$i"]   = '';
			}

			$instance = wp_parse_args( (array) $instance, $defaults );

			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'education-care' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('excerpt_length') ); ?>">
					<?php esc_html_e('Excerpt Length:', 'education-care'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('excerpt_length') ); ?>" name="<?php echo esc_attr( $this->get_field_name('excerpt_length') ); ?>" type="number" value="<?php echo absint( $instance['excerpt_length'] ); ?>" />
			</p>

			<p>
			    <input class="checkbox" type="checkbox" <?php checked( $instance['detail_link'] ); ?> id="<?php echo $this->get_field_id( 'detail_link' ); ?>" name="<?php echo $this->get_field_name( 'detail_link' ); ?>" />
			    <label for="<?php echo $this->get_field_id( 'detail_link' ); ?>"><?php esc_html_e( 'Enable link to detail page', 'education-care' ); ?></label>
			</p>
			
			<?php
				for ( $i = 1; $i <= $item_number; $i++ ) {
					?>
					<p>
						<label for="<?php echo $this->get_field_id( "item_id_$i" ); ?>"><strong><?php esc_html_e( 'Page:', 'education-care' ); ?>&nbsp;<?php echo $i; ?></strong></label>
						<?php
						wp_dropdown_pages( array(
							'id'               => $this->get_field_id( "item_id_$i" ),
							'class'            => 'widefat',
							'name'             => $this->get_field_name( "item_id_$i" ),
							'selected'         => $instance["item_id_$i"],
							'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'education-care' ),
							)
						);
						?>
					</p>
					<?php
				}
		}
	}

endif;