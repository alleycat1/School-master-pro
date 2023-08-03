<?php
/**
 * Sample implementation of options from database
 *
 * @package Education_Care
 */

if ( ! function_exists( 'education_care_options' ) ) :

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function education_care_options( $key ) {

        if ( empty( $key ) ) {
            return;
        }

        $value = '';

        $default = education_care_default_options();
        $default_value = null;
        if ( is_array( $default ) && isset( $default[ $key ] ) ) {
            $default_value = $default[ $key ];
        }

        if ( null !== $default_value ) {
            $value = get_theme_mod( $key, $default_value );
        }
        else {
            $value = get_theme_mod( $key );
        }

        return $value;

    }
endif;

if ( ! function_exists( 'education_care_default_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function education_care_default_options() {

        $defaults = array();

        // Header.
        $defaults['top_left']           = 'contact_details';
        $defaults['top_right']          = 'social_links';
        $defaults['notice_title']       = esc_html__( 'Notice', 'education-care' );
        $defaults['notice_type']        = 'latest_posts';
        $defaults['logo_type']          = 'title-desc';
        $defaults['header_search']      = true;
        $defaults['slider_status']      = false;
        $defaults['slider_type']        = 'category_posts';
        $defaults['content_type']       = 'full_length';
        $defaults['slider_word_count']  = 20;
        $defaults['disable_link']       = true;
        $defaults['home_content']       = true;
        $defaults['blog_layout']        = 'right-sidebar';
        $defaults['excerpt_length']     = 20;

        
        
        $defaults['copyright_text']     = esc_html__( 'Copyright &copy; All rights reserved.', 'education-care' );

        return $defaults;
    }
endif;

if ( ! function_exists( 'education_care_slider_details' ) ) :

    /**
     * Slider details.
     *
     * @since 1.0.0
     *
     * @return array Slider details.
     */
    function education_care_slider_details() {

        $content_type = education_care_options( "content_type" );

        $slider_type = education_care_options( "slider_type" );

        $output = array();

        if( 'pages' == $slider_type ){

            $slider_number = 5;

            $page_ids = array();

            for ( $i = 1; $i <= $slider_number ; $i++ ) {
                $page_id = education_care_options( "slide_$i" );
                if ( absint( $page_id ) > 0 ) {
                    $page_ids[] = absint( $page_id );
                }
            }

            if ( empty( $page_ids ) ) {
                return $output;
            }

            $slider_args = array(
                'posts_per_page' => count( $page_ids ),
                'orderby'        => 'post__in',
                'post_type'      => 'page',
                'post__in'       => $page_ids,
                'meta_query'     => array(
                    array( 'key' => '_thumbnail_id' ),
                ),
            );

        } elseif( 'category_posts' == $slider_type ){

            $slider_cat = education_care_options( "slider_category" );

            $slider_args = array(
                'posts_per_page' => -1,
                'cat'            => absint( $slider_cat ),
                'post_type'      => 'post',
                'meta_query'     => array(
                    array( 'key' => '_thumbnail_id' ),
                ),
            );

        }
        

        $slider_query = new WP_Query( $slider_args );

        if ( ! empty( $slider_query->have_posts() ) ) {

            $p_count = 0;

            while ( $slider_query->have_posts() ) {

                $slider_query->the_post();

                if ( has_post_thumbnail( get_the_ID() ) ) {
                    $image_array = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                    $output[ $p_count ]['image_url'] = $image_array[0];
                    $output[ $p_count ]['title']     = get_the_title();
                    $output[ $p_count ]['url']       = get_permalink();
                    $output[ $p_count ]['excerpt']   = get_the_content();
                    $output[ $p_count ]['linked']    = education_care_options( "disable_link" );

                    if( 'full_length' == $content_type ){

                        $output[ $p_count ]['excerpt']   = apply_filters('the_content', get_the_content() );

                    } else{

                        $slider_words       = education_care_options( "slider_word_count" );
                        $output[ $p_count ]['excerpt']  = esc_html( education_care_get_the_excerpt( $slider_words ) );
                    }

                    $p_count++;
                }
            }

            wp_reset_postdata();
        }

        return $output;
    }

endif;