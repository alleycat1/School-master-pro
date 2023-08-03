<?php
/**
 * Testimonial widget
 *
 * @package Education_Care
 */

if ( ! class_exists( 'Education_Care_Testimonial_Widget' ) ) :

    /**
     * Team widget class.
     *
     * @since 1.0.0
     */
    class Education_Care_Testimonial_Widget extends WP_Widget {

        function __construct() {
            $opts = array(
                'classname'   => 'education-care-testimonial',
                'description' => esc_html__( 'Testimonial Widget', 'education-care' ),
            );

            parent::__construct( 'ec-testimonial', esc_html__( 'EC: Testimonial', 'education-care' ), $opts );
        }


        function widget( $args, $instance ) {

            $title             = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
            $post_category     = ! empty( $instance['post_category'] ) ? $instance['post_category'] : 0;
            $post_number       = ! empty( $instance['post_number'] ) ? $instance['post_number'] : 3;
            $show_image        = ! empty( $instance['show_image'] ) ? $instance['show_image'] : 0;

            echo $args['before_widget']; ?>

            <section id="education-testimonial" class="education-testimonial-section">

                <div id="testimonial" class="testimonial-wrapper">

                    <div class="container">

                        <?php

                        if ( $title ) { ?>

                            <div class="section-title">
                                <h2><?php echo esc_html( $title ); ?></h2>
                            </div><!-- .section-title -->

                        <?php }

                        $testimonial_args = array(
                                            'posts_per_page'        => esc_attr( $post_number ),
                                            'no_found_rows'         => true,
                                            'post__not_in'          => get_option( 'sticky_posts' ),
                                            'ignore_sticky_posts'   => true,
                                        );
                        if ( absint( $post_category ) > 0 ) {
                            $testimonial_args['cat'] = absint( $post_category );
                        }

                        $testimonial_query = new WP_Query( $testimonial_args );

                        if ( $testimonial_query->have_posts() ) : ?>

                            <div class="testimonial-holder">
                                <div class="testimonial-slider">

                                    <?php 
                                    while ( $testimonial_query->have_posts() ) :

                                        $testimonial_query->the_post();  ?> 

                                        <div class="testimonial-item">
                                            <div class="testimonial-caption">
                                                <?php the_content(); ?>
                                            </div><!-- .testimonial-caption -->

                                            <div class="testimonial-meta">
                                                <?php if ( has_post_thumbnail() && 1 == $show_image ) :  ?>
                                                    <figure>
                                                        <?php the_post_thumbnail('thumbnail'); ?>
                                                    </figure>
                                                <?php endif; ?>

                                                <div class="person-info">
                                                    <span class="testimonial-title"><?php the_title(); ?></span>

                                                    <?php 
                                                    $position =  get_post(get_post_thumbnail_id())->post_content;
                                                    if( !empty( $position ) ){ ?>
                                                        <span class="position"><?php echo esc_html( $position );  ?></span>
                                                    <?php } ?>
                                                    
                                                </div>
                                            </div>
                                        </div><!-- .testimonail-wrap -->
                                       
                                        <?php 
                                    endwhile; 

                                    wp_reset_postdata(); ?>

                                </div><!-- .testimonial-slider -->
                            </div><!-- .testimonial-holder -->

                        <?php endif; ?>

                    </div><!-- .container -->

                </div><!-- #testimonial -->

            </section><!-- #education-testimonial -->

            <?php echo $args['after_widget'];

        }

        function update( $new_instance, $old_instance ) {

            $instance = $old_instance;
            $instance['title']          = sanitize_text_field( $new_instance['title'] );
            $instance['post_category']  = absint( $new_instance['post_category'] );
            $instance['post_number']    = absint( $new_instance['post_number'] );
            $instance['show_image']     = (bool) $new_instance['show_image'] ? 1 : 0;


            return $instance;
        }

        function form( $instance ) {

            $instance = wp_parse_args( (array) $instance, array(
                'title'          => '',
                'post_category'  => '',
                'post_number'    => 3,
                'show_image'     => 1,
            ) ); 
            ?>
            <p>
              <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'education-care' ); ?></strong></label>
              <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>
            <p>
              <label for="<?php echo  esc_attr( $this->get_field_id( 'post_category' ) ); ?>"><strong><?php esc_html_e( 'Select Category:', 'education-care' ); ?></strong></label>
                <?php
                $cat_args = array(
                    'orderby'         => 'name',
                    'hide_empty'      => 0,
                    'taxonomy'        => 'category',
                    'name'            => $this->get_field_name( 'post_category' ),
                    'id'              => $this->get_field_id( 'post_category' ),
                    'class'           => 'widefat',
                    'selected'        => absint( $instance['post_category'] ),
                    'show_option_all' => esc_html__( 'All Categories','education-care' ),
                  );
                wp_dropdown_categories( $cat_args );
                ?>
            </p>
            <p>
              <label for="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>"><strong><?php esc_html_e( 'Number of Posts:', 'education-care' ); ?></strong></label>
              <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>" name="<?php echo  esc_attr( $this->get_field_name( 'post_number' ) ); ?>" type="number" value="<?php echo esc_attr( $instance['post_number'] ); ?>" min="1" />
            </p>

            <p>
                <input class="checkbox" type="checkbox" <?php checked( $instance['show_image'] ); ?> id="<?php echo $this->get_field_id( 'show_image' ); ?>" name="<?php echo $this->get_field_name( 'show_image' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'show_image' ); ?>"><?php esc_html_e( 'Show Featured Image', 'education-care' ); ?></label>
            </p>
            
            <?php
        }
    }

endif;