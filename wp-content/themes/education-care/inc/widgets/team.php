<?php
/**
 * Team widget
 *
 * @package Education_Care
 */

if ( ! class_exists( 'Education_Care_Team_Widget' ) ) :

    /**
     * Team widget class.
     *
     * @since 1.0.0
     */
    class Education_Care_Team_Widget extends WP_Widget {

        function __construct() {
            $opts = array(
                'classname'   => 'education-care-team',
                'description' => esc_html__( 'Our Team Widget', 'education-care' ),
            );

            parent::__construct( 'our-team', esc_html__( 'EC: Team', 'education-care' ), $opts );
        }


        function widget( $args, $instance ) {

            $title             = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
            $post_category     = ! empty( $instance['post_category'] ) ? $instance['post_category'] : 0;
            $post_column       = ! empty( $instance['post_column'] ) ? $instance['post_column'] : 3;
            $post_number       = ! empty( $instance['post_number'] ) ? $instance['post_number'] : 3;

            echo $args['before_widget']; ?>

             <section id="education-team" class="education-our-team-section">

                <div id="our-team" class="our-team-wrapper team-col-<?php echo esc_attr( $post_column ); ?>">

                    <div class="container">

                        <?php

                        if ( $title ) { ?>

                            <div class="section-title">
                                <h2><?php echo esc_html( $title ); ?></h2>
                            </div><!-- .section-title -->

                        <?php }

                        $team_args = array(
                                        'posts_per_page'        => esc_attr( $post_number ),
                                        'no_found_rows'         => true,
                                        'post__not_in'          => get_option( 'sticky_posts' ),
                                        'ignore_sticky_posts'   => true,
                                    );
                        if ( absint( $post_category ) > 0 ) {
                            $team_args['cat'] = absint( $post_category );
                        }

                        $team_query = new WP_Query( $team_args );

                        if ( $team_query->have_posts() ) : ?>

                            <div class="inner-wrapper">

                                <?php 
                                while ( $team_query->have_posts() ) :

                                    $team_query->the_post();  ?> 
                                    <div class="our-team-item">
                                        <div class="our-team-inner">
                                            <?php if ( has_post_thumbnail() ) :  ?>
                                                  <div class="our-team-thumb">
            	                                        <a href="<?php the_permalink(); ?>">
            	                                            <?php the_post_thumbnail('education-care-custom'); ?>
            	                                        </a>
                                                  </div><!-- .our-team-thumb -->
                                            <?php endif; ?>
                                            <div class="our-team-description">
                                                <h3><?php the_title(); ?></h3>
                                                <span>
                                                    <?php 
                                                    $team_excerpt = education_care_get_the_excerpt( 20 );
                                                    echo esc_html( $team_excerpt ); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <?php 
                                endwhile; 

                                wp_reset_postdata(); ?>

                            </div><!-- .inner-wrapper -->

                        <?php endif; ?>

                    </div>
                </div>

            </section>

            <?php echo $args['after_widget'];

        }

        function update( $new_instance, $old_instance ) {

            $instance = $old_instance;
            $instance['title']          = sanitize_text_field( $new_instance['title'] );
            $instance['post_category']  = absint( $new_instance['post_category'] );
            $instance['post_number']    = absint( $new_instance['post_number'] );
            $instance['post_column']    = absint( $new_instance['post_column'] );

            return $instance;
        }

        function form( $instance ) {

            $instance = wp_parse_args( (array) $instance, array(
                'title'          => '',
                'post_category'  => '',
                'post_column'    => 3,
                'post_number'    => 3,
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
              <label for="<?php echo esc_attr( $this->get_field_id( 'post_column' ) ); ?>"><strong><?php esc_html_e( 'Number of Columns:', 'education-care' ); ?></strong></label>
                <?php
                $this->dropdown_post_columns( array(
                    'id'       => $this->get_field_id( 'post_column' ),
                    'name'     => $this->get_field_name( 'post_column' ),
                    'selected' => absint( $instance['post_column'] ),
                    )
                );
                ?>
            </p>

            <?php
        }

        function dropdown_post_columns( $args ) {
            $defaults = array(
                'id'       => '',
                'name'     => '',
                'selected' => 0,
            );

            $r = wp_parse_args( $args, $defaults );
            $output = '';

            $choices = array(
                '2' => 2,
                '3' => 3,
                '4' => 4,
            );

            if ( ! empty( $choices ) ) {

                $output = "<select name='" . esc_attr( $r['name'] ) . "' id='" . esc_attr( $r['id'] ) . "'>\n";
                foreach ( $choices as $key => $choice ) {
                    $output .= '<option value="' . esc_attr( $key ) . '" ';
                    $output .= selected( $r['selected'], $key, false );
                    $output .= '>' . esc_html( $choice ) . '</option>\n';
                }
                $output .= "</select>\n";
            }

            echo $output;
        }
    }

endif;