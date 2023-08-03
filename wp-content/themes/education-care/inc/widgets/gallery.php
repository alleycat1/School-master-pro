<?php
/**
 * Gallery widget
 *
 * @package Education_Care
 */

if ( ! class_exists( 'Education_Care_Gallery_Widget' ) ) :

	/**
	 * Gallery widget class.
	 *
	 * @since 1.0.0
	 */
	class Education_Care_Gallery_Widget extends WP_Widget {

		function __construct() {
			$opts = array(
					'classname'   => 'education-care-gallery',
					'description' => esc_html__( 'Display Gallery', 'education-care' ),
			);
			parent::__construct( 'ec-gallery', esc_html__( 'EC: Gallery', 'education-care' ), $opts );
		}

		function widget( $args, $instance ) {

			$title        = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$gallery_page = !empty( $instance['gallery_page'] ) ? $instance['gallery_page'] : ''; 

			$show_caption   = ! empty( $instance['show_caption'] ) ? $instance['show_caption'] : 0;
			
			echo $args['before_widget']; ?>

			<section id="education-gallery" class="education-gallery-section">

				<div id="gallery" class="gallery-wrapper gallery-col-3">

					<div class="container">

						<?php 
						if ( $title ) { ?>

							<div class="section-title">
							    <h2><?php echo esc_html( $title ); ?></h2>
							</div><!-- .section-title -->

						<?php }

						if ( $gallery_page ) { ?>

								<div class="inner-wrapper">

									<?php

									$gallery = get_post_gallery( $gallery_page , false );

									if ( $gallery ) {

										$images = $gallery['ids'];


										if ( ! empty( $images ) ) {

											if( 1 == $show_caption ) {
												$caption_class = 'show-caption';
											} else{
												$caption_class = 'hide-caption';
											}

											echo '<ul id="education-care-gallery" class="'.$caption_class.'">';

											$images = explode( ',', $images );

											foreach ( $images as $post_id ) {

												$post = get_post( $post_id );

												if ( $post ) {

													$img_thumb = wp_get_attachment_image_src($post_id, 'education-care-custom' );

													if ($img_thumb) {
														$img_thumb = $img_thumb[0];
													}

													$img_full = wp_get_attachment_image_src( $post_id, 'full' );
													if ($img_full) {
														$img_full = $img_full[0];
													}

													if ( $img_thumb && $img_full ) {
														$data[ $post_id ] = array(
															'id'        => $post_id,
															'thumbnail' => $img_thumb,
															'full'      => $img_full,
															'title'     => $post->post_title,
															'content'   => $post->post_content,
														);
													} ?>

													<li class="gallery-item " data-src="<?php echo esc_url( $data[ $post_id ]['full'] ); ?>" data-sub-html="<h3><?php echo esc_attr($data[ $post_id ]['title'] ); ?></h3><p><?php echo esc_attr($data[ $post_id ]['content'] ); ?></p>">
														<div class="gallery-item-inner">
															<div class="gallery-thumb overlay-area">
															    <img src="<?php echo esc_url( $data[ $post_id ]['thumbnail'] ); ?>" alt="galley-image"/>
															    <div class="gallery-icon v-center">
															        <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
															    </div>
															</div>
														</div> 
													</li>

													<?php
												}
											}

											echo '</ul>';
										}
									} ?>

									

								</div><!-- .about-us-description -->

							<?php 

						} ?>

					</div>

				</div>

			</section><!-- #education-gallery -->

			<?php 

			echo $args['after_widget'];

		}

		function update( $new_instance, $old_instance ) {
			$instance 				  = $old_instance;
			$instance['title']        = sanitize_text_field( $new_instance['title'] );
			$instance['gallery_page'] = absint( $new_instance['gallery_page'] );
			$instance['show_caption']   = (bool) $new_instance['show_caption'] ? 1 : 0;

			return $instance;
		}

		function form( $instance ) {

			// Defaults.
			$defaults = array(
				'title'         => '',
				'gallery_page' 	=> '',
				'show_caption'     => 0,
			);

			$instance 			= wp_parse_args( (array) $instance, $defaults );
			?>

			<p>
			  <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'education-care' ); ?></strong></label>
			  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'gallery_page' ); ?>">
					<strong><?php esc_html_e( 'Info Page:', 'education-care' ); ?></strong>
				</label>
				<?php
				wp_dropdown_pages( array(
					'id'               => $this->get_field_id( 'gallery_page' ),
					'class'            => 'widefat',
					'name'             => $this->get_field_name( 'gallery_page' ),
					'selected'         => $instance[ 'gallery_page' ],
					'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'education-care' ),
					)
				);
				?>
				<small>
		        	<?php esc_html_e('Please select page that contain gallery shortcode. Note that only gallery of this page will be used.', 'education-care'); ?>	
		        </small>
			</p>

			<p>
			    <input class="checkbox" type="checkbox" <?php checked( $instance['show_caption'] ); ?> id="<?php echo $this->get_field_id( 'show_caption' ); ?>" name="<?php echo $this->get_field_name( 'show_caption' ); ?>" />
			    <label for="<?php echo $this->get_field_id( 'show_caption' ); ?>"><?php esc_html_e( 'Show Title and Caption of image in lightbox', 'education-care' ); ?></label>
			</p>

		<?php
				
		}
	}

endif;