<?php
/**
 * Education Care Theme Customizer
 *
 * @package Education_Care
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function education_care_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'            => '.site-title a',
		'container_inclusive' => false,
		'render_callback'     => 'education_care_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'            => '.site-description',
		'container_inclusive' => false,
		'render_callback'     => 'education_care_customize_partial_blogdescription',
	) );

	/* Include Controls
	----------------------------------------------------------------------*/
	require get_template_directory() . '/inc/customizer/customizer-controls.php';

	/* Include Sanitization functions
	----------------------------------------------------------------------*/
	require get_template_directory() . '/inc/customizer/customizer-sanitize.php';

	/* Load Upgrade to Pro control
	----------------------------------------------------------------------*/
	require_once trailingslashit( get_template_directory() ) . '/inc/upgrade-to-pro/control.php';

	/* Register custom section types.
	----------------------------------------------------------------------*/
	$wp_customize->register_section_type( 'Education_Care_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Education_Care_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Education Care Pro', 'education-care' ),
				'pro_text' => esc_html__( 'Upgrade to PRO', 'education-care' ),
				'pro_url'  => 'https://www.preciousthemes.com/downloads/education-care-pro/',
				'priority' => 1,
			)
		)
	);

	$defaults = education_care_default_options();

	/*------------------------------------------------------------------------*/
    /*  Option Panel
    /*------------------------------------------------------------------------*/
	$wp_customize->add_panel( 'theme_options', 
		array(
			'title'				=> esc_html__('Theme Options', 'education-care'),
			'priority' 			=> 30		
			)
	);

	/*------------------------------------------------------------------------*/
    /*  Top Header Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'top_header', 
		array(    
			'title'       => esc_html__('Top Header', 'education-care'),
			'panel'       => 'theme_options'    
		)
	);

	//top left 
	$wp_customize->add_setting( 'top_left', 
		array(
			'default'           => $defaults['top_left'],			
			'sanitize_callback' => 'education_care_sanitize_select'
		)
	);

	$wp_customize->add_control( 'top_left', 
		array(
			'label'       => esc_html__('Top Left Section', 'education-care'),
			'section'     => 'top_header',   
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'notice' 			=> esc_html__( 'Notice', 'education-care' ),
				'contact_details'   => esc_html__( 'Contact Details ', 'education-care' ),
			),
		)
	);

	//top right 
	$wp_customize->add_setting( 'top_right', 
		array(
			'default'           => $defaults['top_right'],			
			'sanitize_callback' => 'education_care_sanitize_select'
		)
	);

	$wp_customize->add_control( 'top_right', 
		array(
			'label'       => esc_html__('Top Right Section', 'education-care'),
			'section'     => 'top_header',   
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'notice' 			=> esc_html__( 'Notice', 'education-care' ),
				'contact_details'   => esc_html__( 'Contact Details ', 'education-care' ),
				'social_links'   	=> esc_html__( 'Social Links ', 'education-care' ),
				'mixed'   			=> esc_html__( 'Contact Details + Social Links', 'education-care' ),

			),
		)
	);

	// Contact address
	$wp_customize->add_setting( 'conatct_address',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'conatct_address',
		array(
			'label'       => __( 'Address', 'education-care' ),
			'section'     => 'top_header',
			'type'        => 'text',
			'priority'    => 100,
		)
	);

	// Contact email
	$wp_customize->add_setting( 'conatct_email',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_email',
		)
	);
	$wp_customize->add_control( 'conatct_email',
		array(
			'label'       => __( 'Email', 'education-care' ),
			'section'     => 'top_header',
			'type'        => 'text',
			'priority'    => 100,
		)
	);

	// Contact phone
	$wp_customize->add_setting( 'conatct_phone',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'conatct_phone',
		array(
			'label'       => __( 'Phone', 'education-care' ),
			'section'     => 'top_header',
			'type'        => 'text',
			'priority'    => 100,
		)
	);

	// Notice title
	$wp_customize->add_setting( 'notice_title',
		array(
			'default'           => $defaults['notice_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'notice_title',
		array(
			'label'       => __( 'Notice Title', 'education-care' ),
			'section'     => 'top_header',
			'type'        => 'text',
			'priority'    => 100,
		)
	);

	// Notice type 
	$wp_customize->add_setting( 'notice_type', 
		array(
			'default'           => $defaults['notice_type'],			
			'sanitize_callback' => 'education_care_sanitize_select'
		)
	);

	$wp_customize->add_control( 'notice_type', 
		array(
			'label'       => esc_html__('Notice Type', 'education-care'),
			'section'     => 'top_header',   
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'latest_posts' 		=> esc_html__( 'Latest Posts', 'education-care' ),
				'category_posts'   	=> esc_html__( 'Category Posts ', 'education-care' ),
			),
		)
	);

	// Notice category 
	$wp_customize->add_setting( 'notice_category', 
		array(
			'default'           => '',			
			'sanitize_callback' => 'education_care_sanitize_number'
		)
	);

	$wp_customize->add_control(
		new Education_Care_Customize_Category_Control(
			$wp_customize,
			'notice_category',
			array(
				'label'       		=> __( 'Category for notices', 'education-care' ),
				'section'     		=> 'top_header', 
				'priority'    		=> 100,  
				'active_callback' 	=> 'education_care_notice_type_category',     
			)
		)
	); 

	/*------------------------------------------------------------------------*/
    /*  Main Header Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'main_header', 
		array(    
			'title'       => esc_html__('Main Header', 'education-care'),
			'panel'       => 'theme_options'    
		)
	);

	//Logo type 
	$wp_customize->add_setting( 'logo_type', 
		array(
			'default'           => $defaults['logo_type'],			
			'sanitize_callback' => 'education_care_sanitize_select'
		)
	);

	$wp_customize->add_control( 'logo_type', 
		array(
			'label'       => esc_html__('Site Title and Logo', 'education-care'),
			'section'     => 'main_header',   
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'logo-only' 		=> esc_html__( 'Logo Only', 'education-care' ),
				'title-desc' 		=> esc_html__( 'Title + Description', 'education-care' ),
				'logo-title-desc'   => esc_html__( 'Logo + Title + Description', 'education-care' ),
				'logo-title'   		=> esc_html__( 'Logo + Title', 'education-care' ),
				'logo-desc'   		=> esc_html__( 'Logo + Description', 'education-care' ),

			),
		)
	);

	// Show search in header
	$wp_customize->add_setting( 'header_search',
		array(
			'default'           => $defaults['header_search'],
			'sanitize_callback' => 'education_care_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'header_search',
		array(
			'label'           => __( 'Show search in header', 'education-care' ),
			'section'         => 'main_header',
			'type'            => 'checkbox',
			'priority'        => 100,
		)
	);

	/*------------------------------------------------------------------------*/
    /*  Slider Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'main_slider', 
		array(    
			'title'       => esc_html__('Slider Options', 'education-care'),
			'panel'       => 'theme_options'    
		)
	);

	$wp_customize->add_setting( 'slider_status',
		array(
			'default'           => $defaults['slider_status'],
			'sanitize_callback' => 'education_care_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'slider_status',
		array(
			'label'           => __( 'Enable Slider', 'education-care' ),
			'section'         => 'main_slider',
			'type'            => 'checkbox',
			'priority'        => 100
		)
	);

	// Slider Type 
	$wp_customize->add_setting( 'slider_type', 
		array(
			'default'           => $defaults['slider_type'],			
			'sanitize_callback' => 'education_care_sanitize_select'
		)
	);

	$wp_customize->add_control( 'slider_type', 
		array(
			'label'       => esc_html__('Slider Type', 'education-care'),
			'section'     => 'main_slider',   
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'category_posts' 	=> esc_html__( 'Posts from category', 'education-care' ),
				'pages' 			=> esc_html__( 'Assign Pages', 'education-care' ),
			),
			'active_callback' 	=> 'education_care_slider_active'
		)
	);

	// Slider category 
	$wp_customize->add_setting( 'slider_category', 
		array(
			'default'           => '',			
			'sanitize_callback' => 'education_care_sanitize_number'
		)
	);

	$wp_customize->add_control(
		new Education_Care_Customize_Category_Control(
			$wp_customize,
			'slider_category',
			array(
				'label'       		=> __( 'Category for Slider', 'education-care' ),
				'section'     		=> 'main_slider', 
				'priority'    		=> 100,  
				'active_callback' 	=> 'education_care_slider_type_category',     
			)
		)
	);

	$slide = 5;
	for ( $i = 1; $i <= $slide; $i++ ) {
		$wp_customize->add_setting( "slide_$i",
			array(
				'sanitize_callback' => 'education_care_sanitize_dropdown_pages',
			)
		);
		$wp_customize->add_control( "slide_$i",
			array(
				'label'           => __( 'Page', 'education-care' ) . ' - ' . $i,
				'section'         => 'main_slider',
				'type'            => 'dropdown-pages',
				'priority'        => 100,
				'active_callback' => 'education_care_slider_type_page',
			)
		);
	}

	// Content Type 
	$wp_customize->add_setting( 'content_type', 
		array(
			'default'           => $defaults['content_type'],			
			'sanitize_callback' => 'education_care_sanitize_select'
		)
	);

	$wp_customize->add_control( 'content_type', 
		array(
			'label'       => esc_html__('Content Type', 'education-care'),
			'section'     => 'main_slider',   
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'full_length' 	=> esc_html__( 'Full Content', 'education-care' ),
				'excerpt' 		=> esc_html__( 'Excerpt', 'education-care' ),
			),
			'active_callback' 	=> 'education_care_slider_active'
		)
	);

	// Setting slider word count.
	$wp_customize->add_setting( 'slider_word_count',
		array(
			'default'           => $defaults['slider_word_count'],
			'sanitize_callback' => 'education_care_sanitize_number',
		)
	);
	$wp_customize->add_control( 'slider_word_count',
		array(
			'label'           => esc_html__( 'Number of words', 'education-care' ),
			'description'     => esc_html__( 'It controls the number of words from slider page/post content', 'education-care' ),
			'section'         => 'main_slider',
			'type'            => 'number',
			'priority'        => 100,
			'active_callback' => 'education_care_excerpt_active',
			'input_attrs'     => array( 'min' => 5, 'max' => 50, 'step' => 1, 'style' => 'width: 100%;' ),
		)
	);

	// Disable slider link to detail page
	$wp_customize->add_setting( 'disable_link',
		array(
			'default'           => $defaults['disable_link'],
			'sanitize_callback' => 'education_care_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'disable_link',
		array(
			'label'           => esc_html__( 'Disable link to detail page', 'education-care' ),
			'section'         => 'main_slider',
			'type'            => 'checkbox',
			'priority'        => 100,
			'active_callback' => 'education_care_slider_active',
		)
	);

	/*------------------------------------------------------------------------*/
    /*  Global Page, Post and Blog Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'global_blog', 
		array(    
			'title'       => esc_html__('Global Page, Posts and Blog', 'education-care'),
			'panel'       => 'theme_options'    
		)
	);

	// Show home page content
	$wp_customize->add_setting( 'home_content',
		array(
			'default'           => $defaults['home_content'],
			'sanitize_callback' => 'education_care_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'home_content',
		array(
			'label'           => esc_html__( 'Show home content in frontpage', 'education-care' ),
			'section'         => 'global_blog',
			'type'            => 'checkbox',
			'priority'        => 100,
			'active_callback' => 'education_care_slider_active',
		)
	);

	// Setting blog_layout.
	$wp_customize->add_setting( 'blog_layout',
		array(
			'default'           => $defaults['blog_layout'],
			'sanitize_callback' => 'education_care_sanitize_select',
		)
	);
	$wp_customize->add_control( 'blog_layout',
		array(
			'label'    => __( 'Blog Layout', 'education-care' ),
			'section'  => 'global_blog',
			'type'     => 'radio',
			'priority' => 100,
			'choices'  => array(
					'left-sidebar'  => esc_html__( 'Left Sidebar', 'education-care' ),
					'right-sidebar' => esc_html__( 'Right Sidebar', 'education-care' ),
				),
		)
	);

	// Setting archive_layout.
	$wp_customize->add_setting( 'exclude_cats',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'exclude_cats',
		array(
			'label'           => esc_html__( 'Excludes Categories', 'education-care' ),
			'description'     => esc_html__( 'Enter category id seperated with comma. Posts from these categories will be excluded from latest post listing.', 'education-care' ),
			'section'         => 'global_blog',
			'type'            => 'text',
			'priority'        => 100,
		)
	); 

	// Setting excerpt_length.
	$wp_customize->add_setting( 'excerpt_length',
		array(
			'default'           => $defaults['excerpt_length'],
			'sanitize_callback' => 'education_care_sanitize_number',
		)
	);
	$wp_customize->add_control( 'excerpt_length',
		array(
			'label'       => esc_html__( 'Excerpt Length', 'education-care' ),
			'description' => esc_html__( 'in words', 'education-care' ),
			'section'     => 'global_blog',
			'type'        => 'number',
			'priority'    => 100,
			'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
		)
	);

	/*------------------------------------------------------------------------*/
    /*  Social Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'social_links', 
		array(    
			'title'       => esc_html__('Social Links', 'education-care'),
			'panel'       => 'theme_options'    
		)
	);

	for( $j= 1; $j<=6; $j++ ){
		$wp_customize->add_setting( "social_link_$j",
			array(
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( "social_link_$j",
			array(
				'label'           => esc_html__( 'Social Link', 'education-care' ),
				'description' 	  => esc_html__( 'Please add complete url of social profile page', 'education-care' ),
				'section'         => 'social_links',
				'type'            => 'text',
				'priority'        => 100,
			)
		);
	}

	/*------------------------------------------------------------------------*/
    /*  Footer Section
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'footer', 
		array(    
			'title'       => esc_html__('Footer Options', 'education-care'),
			'panel'       => 'theme_options'    
		)
	);	

	// Copyright.
	$wp_customize->add_setting( 'copyright_text',
		array(
			'default'           => $defaults['copyright_text'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'copyright_text',
		array(
			'label'    => esc_html__( 'Copyright Text', 'education-care' ),
			'section'  => 'footer',
			'type'     => 'text',
			'priority' => 100,
		)
	);

}

add_action( 'customize_register', 'education_care_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function education_care_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function education_care_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function education_care_customize_preview_js() {
	wp_enqueue_script( 'education_care_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'education_care_customize_preview_js' );

/**
 * Enqueue style for custom customize control.
 */
function education_care_custom_customize_enqueue() {

	wp_enqueue_script( 'education-care-customize-controls', get_template_directory_uri() . '/inc/upgrade-to-pro/customize-controls.js', array( 'customize-controls' ) );

	wp_enqueue_style( 'education-care-customize-controls', get_template_directory_uri() . '/inc/upgrade-to-pro/customize-controls.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'education_care_custom_customize_enqueue' );
