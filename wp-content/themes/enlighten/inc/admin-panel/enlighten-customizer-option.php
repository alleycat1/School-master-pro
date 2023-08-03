<?php
$enlighten_post_lists = enlighten_post_lists();
$enlighten_categories_list = enlighten_category_list();
/** =============================================================================== **/
// Add Pannel Start

$wp_customize->add_panel(
    'enlighten_header_panel',
    array(
        'title' => esc_html__('Header Setting','enlighten'),
        'description' => esc_html__('Setting option for header content','enlighten'),
        'priority' => 2,
    )
);
$wp_customize->add_panel(
    'enlighten_home_panel',
    array(
        'title' => esc_html__('Home Setting','enlighten'),
        'description' => esc_html__('Setting For All Home Section','enlighten'),
        'priority' => 3,
    )
);
$wp_customize->add_panel(
    'enlighten_general_panel',
    array(
        'title' => esc_html__('General Setting','enlighten'),
        'priority' => 4,
    )
);

//Add Pannel End

/** =============================================================================== **/
//Add Section Start
$wp_customize->add_section(
    'enlighten_enlighten_header_text_section',
    array(
        'title' => esc_html__('Header Text','enlighten'),
        'priority' => 4,
        'capability' => 'edit_theme_options',
        'theme_support' => '',
        'panel' => 'enlighten_header_panel'
    )
);

$wp_customize->add_section(
    'enlighten_header_social_icon',
        array(
        'title' => esc_html__('Header Social Icon','enlighten'),
        'priority' => 6,
        'capability' => 'edit_theme_options',
        'theme_support' => '',
        'panel' => 'enlighten_header_panel'
        )
);
$wp_customize->add_section(
    'enlighten_footer_section',
    array(
        'title' => esc_html__('Footer Section','enlighten'),
        'description' => esc_html__('Footer Setting Option Section','enlighten'),
        'priority' => 6,
        'capability' => 'edit_theme_options',
        'theme_support' => ''
    )
);
$wp_customize->add_section(
    'enlighten_header_info_section',
    array(
        'title' => esc_html__('Header Info Section','enlighten'),
        'description' => esc_html__('Field for Phone,Email,Location','enlighten'),
        'priority' => 7,
        'capability' => 'edit_theme_options',
        'theme_support' => '',
        'panel' => 'enlighten_header_panel'
    )
);
$wp_customize->add_section(
    'enlighten_menu_section',
    array(
        'title' => esc_html__('Menu Style','enlighten'),
        'priority' => 8,
        'capability' => 'edit_theme_options',
        'theme_support' => '',
        'panel' => 'enlighten_header_panel'
    )
);

$wp_customize->add_section(
    'enlighten_slider_section',
    array(
        'title' => esc_html__('Slider Section','enlighten'),
        'priority' => 1,
        'capability' => 'edit_theme_options',
        'theme_support' => '',
        'panel' => 'enlighten_home_panel'
    )
);
$wp_customize->add_section(
    'enlighten_news_section',
    array(
        'title' => esc_html__('News Slide Section','enlighten'),
        'priority' => 4,
        'capability' => 'edit_theme_options',
        'theme_support' => '',
        'panel' => 'enlighten_home_panel'
    )
);
$wp_customize->add_section(
    'enlighten_portfolio_section',
    array(
        'title' => esc_html__('Portfolio Section','enlighten'),
        'priority' => 6,
        'capability' => 'edit_theme_options',
        'theme_support' => '',
        'panel' => 'enlighten_home_panel'
    )
);
$wp_customize->add_section(
    'enlighten_service_section',
    array(
        'title' => esc_html__('Service Section','enlighten'),
        'priority' => 8,
        'capability' => 'edit_theme_options',
        'theme_support' => '',
        'panel' => 'enlighten_home_panel'
    )
);
$wp_customize->add_section(
    'enlighten_achieve_section',
    array(
        'title' => esc_html__('Counter Section','enlighten'),
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_support' => '',
        'panel' => 'enlighten_home_panel'
    )
);

$wp_customize->add_section(
    'enlighten_video_section',
    array(
        'title' => esc_html__('Video Section','enlighten'),
        'priority' => 13,
        'capability' => 'edit_theme_options',
        'theme_support' => '',
        'panel' => 'enlighten_home_panel'
    )
);

$wp_customize->add_section(
    'enlighten_cta_section',
    array(
        'title' => esc_html__('Call To Action Section','enlighten'),
        'priority' => 15,
        'capability' => 'edit_theme_options',
        'theme_support' => '',
        'panel' => 'enlighten_home_panel'
    )
);
$wp_customize->add_section(
    'enlightne_faq_testimonial_section',
    array(
        'title' => esc_html__('FAQ & Testimonial Section','enlighten'),
        'priority' => 17,
        'capability' => 'edit_theme_options',
        'theme_support' => '',
        'panel' => 'enlighten_home_panel'
    )
);
$wp_customize->add_section(
    'enlighten_news_twitter_message_section',
    array(
        'title' => esc_html__('News Twitter Message Section','enlighten'),
        'description' => esc_html__('To add twitter feed go to Appearance widget and drag "Accesspress Twitter Feed" widget and drop into "Home Twitter Feed" Widget area','enlighten'),
        'priority' => 19,
        'capability' => 'edit_theme_options',
        'theme_support' => '',
        'panel' => 'enlighten_home_panel'
    )
);
$wp_customize->add_section(
    'enlighten_client_section',
    array(
        'title' => esc_html__('Client Section','enlighten'),
        'priority' => 20,
        'capability' => 'edit_theme_options',
        'theme_support' => '',
        'panel' => 'enlighten_home_panel'
    )
);
$wp_customize->add_section(
    'enlighten_footer_setting',
    array(
        'title' => esc_html__('Footer Setting','enlighten'),
        'priority' => 8,
        'capability' => 'edit_theme_options',
        'theme_support' => '',
    )
);
//Add Section End

/** =============================================================================== **/
//Add Setting And Control Start
$wp_customize->add_setting(
    'enlighten_enable_heade_social_icon',
        array(
            'default' => '',
            'sanitize_callback' => 'enlighten_sanitize_checkbox',
        )
);
$wp_customize->add_control(
    'enlighten_enable_heade_social_icon',
        array(
            'label' => esc_html__('Enable Header Social Icon','enlighten'),
            'priority' => 1,
            'type' => 'checkbox',
            'section' => 'enlighten_header_social_icon'
        )
);

$wp_customize->add_setting(
    'enlighten_header_text',
    array(
        'default' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    'enlighten_header_text',
    array(
        'label' => esc_html__('Header Text','enlighten'),
        'priority' => 1,
        'type' => 'text',
        'section' => 'enlighten_enlighten_header_text_section',
        
    )
);



$wp_customize->add_setting(
        'enlighten_facebook_text',
             array(
                'default'=>'',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
    $wp_customize->add_control(
        'enlighten_facebook_text',
            array(
                'label' => esc_html__('Facebook Link','enlighten'),
                'section' => 'enlighten_header_social_icon',
                'type' => 'text',
            )
    );
    
    $wp_customize->add_setting(
        'enlighten_twitter_text',
             array(
                'default'=>'',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
    $wp_customize->add_control(
        'enlighten_twitter_text',
            array(
                'label' => esc_html__('Twitter Link','enlighten'),
                'section' => 'enlighten_header_social_icon',
                'type' => 'text',
            )
    );
    
    $wp_customize->add_setting(
        'enlighten_youtube_text',
             array(
                'default'=>'',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
    $wp_customize->add_control(
        'enlighten_youtube_text',
            array(
                'label' => esc_html__('Youtube Link','enlighten'),
                'section' => 'enlighten_header_social_icon',
                'type' => 'text',
            )
    );
    
    $wp_customize->add_setting(
        'enlighten_pinterest_text',
             array(
                'default'=>'',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
    $wp_customize->add_control(
        'enlighten_pinterest_text',
            array(
                'label' => esc_html__('Pinterest Link','enlighten'),
                'section' => 'enlighten_header_social_icon',
                'type' => 'text',
            )
    );
    
    $wp_customize->add_setting(
        'enlighten_instagram_text',
             array(
                'default'=>'',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
    $wp_customize->add_control(
        'enlighten_instagram_text',
            array(
                'label' => esc_html__('Instagram Link','enlighten'),
                'section' => 'enlighten_header_social_icon',
                'type' => 'text',
            )
    );
    
    $wp_customize->add_setting(
        'enlighten_linkedin_text',
             array(
                'default'=>'',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
    $wp_customize->add_control(
        'enlighten_linkedin_text',
            array(
                'label' => esc_html__('Linkedin Link','enlighten'),
                'section' => 'enlighten_header_social_icon',
                'type' => 'text',
            )
    );
    
    $wp_customize->add_setting(
        'enlighten_googleplus_text',
             array(
                'default'=>'',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
    $wp_customize->add_control(
        'enlighten_googleplus_text',
            array(
                'label' => esc_html__('GooglePlus Link','enlighten'),
                'section' => 'enlighten_header_social_icon',
                'type' => 'text',
            )
    );
    
    $wp_customize->add_setting(
        'enlighten_flickr_text',
             array(
                'default'=>'',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
    $wp_customize->add_control(
        'enlighten_flickr_text',
            array(
                'label' => esc_html__('Flickr Link','enlighten'),
                'section' => 'enlighten_header_social_icon',
                'type' => 'text',
            )
    );
    $wp_customize->add_setting(
        'enlighten_enable_header_info',
        array(
            'default' => '',
            'sanitize_callback' => 'enlighten_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'enlighten_enable_header_info',
        array(
            'label' => esc_html__('Enable Header Info','enlighten'),
            'section' => 'enlighten_header_info_section',
            'type' => 'checkbox',
            'priority' => 1
        )
    );
    $wp_customize->add_setting(
        'enlighten_phone_header',
        array(
            'default' => '',
            'transport'   => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'enlighten_phone_header',
            array(
                'label' => esc_html__('Phone Number','enlighten'),
                'section' => 'enlighten_header_info_section',
                'type' => 'text',
                'priority' => 2
            )
    );
    $wp_customize->add_setting(
        'enlighten_email_header',
        array(
            'default' => '',
            'transport'   => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'enlighten_email_header',
            array(
                'label' => esc_html__('Email Address','enlighten'),
                'section' => 'enlighten_header_info_section',
                'type' => 'text',
                'priority' => 3
            )
    );
    $wp_customize->add_setting(
        'enlighten_localtion_header',
        array(
            'default' => '',
            'transport'   => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'enlighten_localtion_header',
            array(
                'label' => esc_html__('Location','enlighten'),
                'section' => 'enlighten_header_info_section',
                'type' => 'text',
                'priority' => 4
            )
    );
    $wp_customize->add_setting(
        'enlighten_menu_alignment',
        array(
            'default' => '',
            'sanitize_callback' => 'enlighten_sanitize_menu_alignment',
        )
    );
    $wp_customize->add_control(
        'enlighten_menu_alignment',
            array(
                'label' => esc_html__('Menu Alignment','enlighten'),
                'section' => 'enlighten_menu_section',
                'type' => 'select',
                'choices' => array(
                        '' => '--Choose--',
                        'left' => 'Left',
                        'center' => 'Center',
                        'right' => 'Right'
                ),
                'priority' => 4
            )
    );
    $wp_customize->add_setting(
        'enlighten_menu_style',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control(
        'enlighten_menu_style',
        array(
            'label' => esc_html__('Menu Style','enlighten'),
            'type' => 'radio',
            'choices' => array(
                'top' => 'Top Menu',
                'bottom' => 'Bottom Menu',
            ),
            'priority' => 3,
            'section' => 'enlighten_menu_section'
        )
    );
  $wp_customize->add_setting(
    'enlighten_enable_slider',
    array(
        'default' => '',
        'sanitize_callback' => 'enlighten_sanitize_checkbox'
    )
  );
  $wp_customize->add_control(
    'enlighten_enable_slider',
    array(
        'label' => esc_html__('Enable Slider','enlighten'),
        'section' => 'enlighten_slider_section',
        'type' => 'checkbox',
        'priority' => 1
    )
  );
  $wp_customize->add_setting(
    'enlighten_slider_category',
    array(
        'default' => '',
        'sanitize_callback' => 'enlighten_category_list_sanitize'
    )
  );
  $wp_customize->add_control(
    'enlighten_slider_category',
    array(
        'label' => esc_html__('Slider Category','enlighten'),
        'section' => 'enlighten_slider_section',
        'type' => 'select',
        'choices' => $enlighten_categories_list,
        'priority' => 2
    )
  );
  $wp_customize->add_setting(
    'enlighten_enable_news_slide',
    array(
        'default' => '',
        'sanitize_callback' => 'enlighten_sanitize_checkbox'
    )
  );
  $wp_customize->add_control(
    'enlighten_enable_news_slide',
    array(
        'label' => esc_html__('Enable News Slide','enlighten'),
        'section' => 'enlighten_news_section',
        'type' => 'checkbox',
        'priority' => 1
    )
  );
  $wp_customize->add_setting(
    'enlighten_news_slide_title',
    array(
        'default' => 'news updates',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_news_slide_title',
    array(
        'label' => esc_html__('Title','enlighten'),
        'priority' => 2,
        'type' => 'text',
        'section' => 'enlighten_news_section',
    )
  );
   $wp_customize->add_setting(
    'enlighten_news_category',
    array(
        'default' => '',
        'sanitize_callback' => 'enlighten_category_list_sanitize'
    )
  );
  $wp_customize->add_control(
    'enlighten_news_category',
    array(
        'label' => esc_html__('News Slide Category','enlighten'),
        'section' => 'enlighten_news_section',
        'type' => 'select',
        'choices' => $enlighten_categories_list,
        'priority' => 3
    )
  );
  
  $wp_customize->add_setting(
    'enlighten_enable_portfolio',
    array(
        'default' => '',
        'sanitize_callback' => 'enlighten_sanitize_checkbox'
    )
  );
  $wp_customize->add_control(
    'enlighten_enable_portfolio',
    array(
        'label' => esc_html__('Enable Portfolio Section','enlighten'),
        'section' => 'enlighten_portfolio_section',
        'type' => 'checkbox',
        'priority' => 1,
    )
  );
  
  $wp_customize->add_setting(
    'enlighten_portfolio_title',
    array(
        'default' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_portfolio_title',
    array(
        'label' => esc_html__('Section Sub Title','enlighten'),
        'type' => 'text',
        'section' => 'enlighten_portfolio_section',
        'priority' => 3
    )
  );
  $wp_customize->add_setting(
    'enlighten_portfolio_title_sub',
    array(
        'default' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_portfolio_title_sub',
    array(
        'label' => esc_html__('Section Title','enlighten'),
        'type' => 'text',
        'section' => 'enlighten_portfolio_section',
        'priority' => 3
    )
  );
  $wp_customize->add_setting(
    'enlighten_portfolio_cat',
    array(
        'default' => '',
        'sanitize_callback' => 'enlighten_category_list_sanitize'
    )
  );
  $wp_customize->add_control(
    'enlighten_portfolio_cat',
    array(
        'label' => esc_html__('News Slide Category','enlighten'),
        'section' => 'enlighten_portfolio_section',
        'type' => 'select',
        'choices' => $enlighten_categories_list,
        'priority' => 5
    )
  );
  
  $wp_customize->add_setting(
    'enlighten_enable_service',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_enable_service',
    array(
        'label' => esc_html__('Enable Service Section','enlighten'),
        'section' => 'enlighten_service_section',
        'type' => 'checkbox',
        'priority' => 1,
    )
  );
  $wp_customize->add_setting(
    'enlighten_service_title',
    array(
        'default' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'enlighten_service_title',
    array(
        'label' => esc_html__('Section Sub Title','enlighten'),
        'section' => 'enlighten_service_section',
        'type' => 'text',
        'priority' => 4
    )
  );
  $wp_customize->add_setting(
    'enlighten_service_title_sub',
    array(
        'default' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'enlighten_service_title_sub',
    array(
        'label' => esc_html__('Section Title','enlighten'),
        'section' => 'enlighten_service_section',
        'type' => 'text',
        'priority' => 6
    )
  );
  $wp_customize->add_setting(
    'enlighten_service_description',
    array(
        'default' => '',
        'sanitize_callback' => 'enlighten_sanitize_textarea'
    )
  );
  $wp_customize->add_control(
    'enlighten_service_description',
    array(
        'label' => esc_html__('Section Description','enlighten'),
        'section' => 'enlighten_service_section',
        'type' => 'textarea',
        'priority' => 8
    )
  );
  $wp_customize->add_setting(
    'enlighten_service_cat',
    array(
        'default' => '',
        'sanitize_callback' => 'enlighten_category_list_sanitize'
    )
  );
  $wp_customize->add_control(
    'enlighten_service_cat',
    array(
        'label' => esc_html__('Service Category','enlighten'),
        'section' => 'enlighten_service_section',
        'type' => 'select',
        'choices' => $enlighten_categories_list,
        'priority' => 8
    )
  );
  $wp_customize->add_setting(
    'enlighten_service_bg_image',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
);
$wp_customize->add_control(
   new WP_Customize_Image_Control(
       $wp_customize,
       'enlighten_service_bg_image',
       array(
           'label'      => esc_html__( 'Service Section Background Image', 'enlighten' ),
           'description' => esc_html__('Suggested image dimensions: 1920 x 1280','enlighten'),
           'section'    => 'enlighten_service_section',
           'settings'   => 'enlighten_service_bg_image',
       )
   )
);
  $wp_customize->add_setting(
    'enlighten_enable_achieve',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_enable_achieve',
    array(
        'label' => esc_html__('Enable Counter Section','enlighten'),
        'section' => 'enlighten_achieve_section',
        'type' => 'checkbox',
        'priority' => 1,
    )
  );
  $wp_customize->add_setting(
    'enlighten_achieve_title',
    array(
        'default' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'enlighten_achieve_title',
    array(
        'label' => esc_html__('Section Sub Title','enlighten'),
        'section' => 'enlighten_achieve_section',
        'type' => 'text',
        'priority' => 4
    )
  );
  $wp_customize->add_setting(
    'enlighten_achieve_title_sub',
    array(
        'default' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'enlighten_achieve_title_sub',
    array(
        'label' => esc_html__('Section Title','enlighten'),
        'section' => 'enlighten_achieve_section',
        'type' => 'text',
        'priority' => 6
    )
  );
  $wp_customize->add_setting(
    'enlighten_achieve_image_one',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'enlighten_achieve_image_one',
           array(
               'label'      => esc_html__( 'Upload Counter Image One', 'enlighten' ),
               'description' => esc_html__('Suggested image dimensions: 70 x 72','enlighten'),
               'section'    => 'enlighten_achieve_section',
               'settings'   => 'enlighten_achieve_image_one',
               'priority' => 7
           )
       )
   );

  $wp_customize->add_setting(
       'enlighten_achieve_fa_one', array( 
       'default' => '',
       'sanitize_callback' => 'sanitize_text_field'
       )
   );
            
    $wp_customize->add_control( new enlighten_fa_icon( $wp_customize, 'enlighten_achieve_fa_one', array(
        'label' => esc_html__( 'FA Icon One', 'enlighten' ),
        'section' => 'enlighten_achieve_section',
        'settings' => 'enlighten_achieve_fa_one',
        'priority'=>8,
        )
    ) );
  $wp_customize->add_setting(
    'enlighten_achieve_count_one',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_achieve_count_one',
    array(
        'label' => esc_html__('Counter Count One','enlighten'),
        'type' => 'number',
        'section' => 'enlighten_achieve_section',
        'priority' => 10
    )
  );
  $wp_customize->add_setting(
    'enlighten_achieve_title_one',
    array(
        'default' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  
  $wp_customize->add_control(
    'enlighten_achieve_title_one',
    array(
        'label' => esc_html__('Counter Title One','enlighten'),
        'type' => 'text',
        'section' => 'enlighten_achieve_section',
        'priority' => 12,
    )
  );
  $wp_customize->add_setting(
    'enlighten_achieve_image_two',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'enlighten_achieve_image_two',
           array(
               'label'      => esc_html__( 'Upload Counter Image Two', 'enlighten' ),
               'description' => esc_html__('Suggested image dimensions: 70 x 72','enlighten'),
               'section'    => 'enlighten_achieve_section',
               'settings'   => 'enlighten_achieve_image_two',
               'priority' => 13
           )
       )
   );
$wp_customize->add_setting(
       'enlighten_achieve_fa_two', array( 
       'default' => '',
       'sanitize_callback' => 'sanitize_text_field'
       )
   );
            
    $wp_customize->add_control( new enlighten_fa_icon( $wp_customize, 'enlighten_achieve_fa_two', array(
        'label' => esc_html__( 'FA Icon Two', 'enlighten' ),
        'section' => 'enlighten_achieve_section',
        'settings' => 'enlighten_achieve_fa_two',
        'priority'=>14,
        )
    ) );
  $wp_customize->add_setting(
    'enlighten_achieve_count_two',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_achieve_count_two',
    array(
        'label' => esc_html__('Counter Count Two','enlighten'),
        'type' => 'number',
        'section' => 'enlighten_achieve_section',
        'priority' => 16
    )
  );
  $wp_customize->add_setting(
    'enlighten_achieve_title_two',
    array(
        'default' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_achieve_title_two',
    array(
        'label' => esc_html__('Counter Title Two','enlighten'),
        'type' => 'text',
        'section' => 'enlighten_achieve_section',
        'priority' => 18,
    )
  );
  $wp_customize->add_setting(
    'enlighten_achieve_image_three',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'enlighten_achieve_image_three',
           array(
               'label'      => esc_html__( 'Upload Counter Image Three', 'enlighten' ),
               'description' => esc_html__('Suggested image dimensions: 70 x 72','enlighten'),
               'section'    => 'enlighten_achieve_section',
               'settings'   => 'enlighten_achieve_image_three',
               'priority' => 19
           )
       )
   );
  $wp_customize->add_setting(
       'enlighten_achieve_fa_three', array( 
       'default' => '',
       'sanitize_callback' => 'sanitize_text_field'
       )
   );
            
    $wp_customize->add_control( new enlighten_fa_icon( $wp_customize, 'enlighten_achieve_fa_three', array(
        'label' => esc_html__( 'FA Icon Three', 'enlighten' ),
        'section' => 'enlighten_achieve_section',
        'settings' => 'enlighten_achieve_fa_three',
        'priority'=>20,
        )
    ) );
  $wp_customize->add_setting(
    'enlighten_achieve_count_three',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_achieve_count_three',
    array(
        'label' => esc_html__('Counter Count Three','enlighten'),
        'type' => 'number',
        'section' => 'enlighten_achieve_section',
        'priority' => 22
    )
  );
  $wp_customize->add_setting(
    'enlighten_achieve_title_three',
    array(
        'default' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_achieve_title_three',
    array(
        'label' => esc_html__('Counter Title Three','enlighten'),
        'type' => 'text',
        'section' => 'enlighten_achieve_section',
        'priority' => 24,
    )
  );
  $wp_customize->add_setting(
    'enlighten_achieve_image_four',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'enlighten_achieve_image_four',
           array(
               'label'      => esc_html__( 'Upload Counter Image Four', 'enlighten' ),
               'description' => esc_html__('Suggested image dimensions: 70 x 72','enlighten'),
               'section'    => 'enlighten_achieve_section',
               'settings'   => 'enlighten_achieve_image_four',
               'priority' => 25
           )
       )
   );
  $wp_customize->add_setting(
       'enlighten_achieve_fa_four', array( 
       'default' => '',
       'sanitize_callback' => 'sanitize_text_field'
       )
   );
            
    $wp_customize->add_control( new enlighten_fa_icon( $wp_customize, 'enlighten_achieve_fa_four', array(
        'label' => esc_html__( 'FA Icon Four', 'enlighten' ),
        'section' => 'enlighten_achieve_section',
        'settings' => 'enlighten_achieve_fa_four',
        'priority'=>26,
        )
    ) );
  $wp_customize->add_setting(
    'enlighten_achieve_count_four',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_achieve_count_four',
    array(
        'label' => esc_html__('Counter Count Four','enlighten'),
        'type' => 'number',
        'section' => 'enlighten_achieve_section',
        'priority' => 28
    )
  );
  $wp_customize->add_setting(
    'enlighten_achieve_title_four',
    array(
        'default' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_achieve_title_four',
    array(
        'label' => esc_html__('Counter Title Four','enlighten'),
        'type' => 'text',
        'section' => 'enlighten_achieve_section',
        'priority' => 30,
    )
  );
  $wp_customize->add_setting(
    'enlighten_enable_video',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_enable_video',
    array(
        'label' => esc_html__('Enable Video Section','enlighten'),
        'section' => 'enlighten_video_section',
        'type' => 'checkbox',
        'priority' => 1,
    )
  );
  $wp_customize->add_setting(
    'enlighten_video_title',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'enlighten_video_title',
    array(
        'label' => esc_html__('Section Sub Title','enlighten'),
        'section' => 'enlighten_video_section',
        'type' => 'text',
        'priority' => 4
    )
  );
  $wp_customize->add_setting(
    'enlighten_video_title_sub',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'enlighten_video_title_sub',
    array(
        'label' => esc_html__('Section Title','enlighten'),
        'section' => 'enlighten_video_section',
        'type' => 'text',
        'priority' => 6
    )
  );
  
  $wp_customize->add_setting(
    'enlighten_video_url',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
  );
  $wp_customize->add_control(
    'enlighten_video_url',
    array(
        'label' => esc_html__('Video URL','enlighten'),
        'description' => esc_html__('To get the video URL, go to https://youtube.com and play the video that you want to add and copy the url from the browser in the format https://www.youtue.com/watch?v=jzW4xtNi','enlighten'),
        'section' => 'enlighten_video_section',
        'type' => 'textarea',
        'priority' => 8
    )
  );
  
  $wp_customize->add_setting(
    'enlighten_enable_cta',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'enlighten_enable_cta',
    array(
        'label' => esc_html__('Enable Call To Aciton Section','enlighten'),
        'section' => 'enlighten_cta_section',
        'type' => 'checkbox',
        'priority' => 1
    )
  );
  $wp_customize->add_setting(
    'enlighten_cta_section_title',
    array(
        'default' => 'Enroll Now',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_cta_section_title',
    array(
        'label' => esc_html__('Section Title','enlighten'),
        'section' => 'enlighten_cta_section',
        'type' => 'text',
        'priority' => 2,
    )
  );
  $wp_customize->add_setting(
    'enlighten_cta_post',
    array(
        'default' => '',
        'sanitize_callback' => 'absint',
    )
  );
  $wp_customize->add_control(
    'enlighten_cta_post',
    array(
        'label' => esc_html__('CTA Post','enlighten'),
        'section' => 'enlighten_cta_section',
        'type' => 'select',
        'choices' => $enlighten_post_lists,
        'priority' => 4
    )
  );
  
  $wp_customize->add_setting(
    'enlighten_cta_button_text',
    array(
        'default' => 'Enroll Now',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'enlighten_cta_button_text',
    array(
        'label' => esc_html__('Button Text','enlighten'),
        'section' => 'enlighten_cta_section',
        'type' => 'text',
        'priority' => 8,
    )
  );
  $wp_customize->add_setting(
    'enlighten_button_link',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
  );
  $wp_customize->add_control(
    'enlighten_button_link',
    array(
        'label' => esc_html__('Button Link','enlighten'),
        'section' => 'enlighten_cta_section',
        'type' => 'text',
        'priority' => 10,
    )
  );
  
  $wp_customize->add_setting(
    'enlighten_enable_faq_testimonial',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_enable_faq_testimonial',
    array(
        'label' => esc_html__('Enable FAQ','enlighten'),
        'section' => 'enlightne_faq_testimonial_section',
        'type' => 'checkbox',
        'priority' => 1,
    )
  );
  $wp_customize->add_setting(
    'enlighten_faq_title',
    array(
        'defaul' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'enlighten_faq_title',
    array(
        'label' => esc_html__('FAQ Title','enlighten'),
        'section' => 'enlightne_faq_testimonial_section',
        'type' => 'text',
        'priority' => 3
    )
  );
  $wp_customize->add_setting(
    'enlighten_faq_cat',
    array(
        'default' => '',
        'sanitize_callback' => 'enlighten_category_list_sanitize'
    )
  );
  $wp_customize->add_control(
    'enlighten_faq_cat',
    array(
        'label' => esc_html__('FAQ Category','enlighten'),
        'type' => 'select',
        'choices' => $enlighten_categories_list,
        'priority' => 5,
        'section' => 'enlightne_faq_testimonial_section',
    )
  );
  $wp_customize->add_setting(
    'enlighten_testimonial_title',
    array(
        'defaul' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'enlighten_testimonial_title',
    array(
        'label' => esc_html__('Testimonial Title','enlighten'),
        'section' => 'enlightne_faq_testimonial_section',
        'type' => 'text',
        'priority' => 8
    )
  );
  $wp_customize->add_setting(
    'enlighten_testimonial_cat',
    array(
        'default' => '',
        'sanitize_callback' => 'enlighten_category_list_sanitize'
    )
  );
  $wp_customize->add_control(
    'enlighten_testimonial_cat',
    array(
        'label' => esc_html__('Testimonial Category','enlighten'),
        'type' => 'select',
        'choices' => $enlighten_categories_list,
        'priority' => 10,
        'section' => 'enlightne_faq_testimonial_section',
    )
  );
  $wp_customize->add_setting(
    'enlighten_enable_client',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_enable_client',
    array(
        'label' => esc_html__('Enable Client','enlighten'),
        'section' => 'enlighten_client_section',
        'type' => 'checkbox',
        'priority' => 1,
    )
  );
  $wp_customize->add_setting(
    'enlighten_client_title',
    array(
        'default' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'enlighten_client_title',
    array(
        'label' => esc_html__('Section Sub Title','enlighten'),
        'section' => 'enlighten_client_section',
        'type' => 'text',
        'priority' => 4
    )
  );
  $wp_customize->add_setting(
    'enlighten_client_title_sub',
    array(
        'default' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'enlighten_client_title_sub',
    array(
        'label' => esc_html__('Section Title','enlighten'),
        'section' => 'enlighten_client_section',
        'type' => 'text',
        'priority' => 6
    )
  );
  $wp_customize->add_setting(
  'enlighten_client_cat',
      array(
        'default' => '',
        'sanitize_callback' => 'enlighten_category_list_sanitize',
        )
  );
  $wp_customize->add_control(
  'enlighten_client_cat',
      array(
        'label' => esc_html__('Client Category','enlighten'),
        'section' => 'enlighten_client_section',
        'type' => 'select',
        'choices' => $enlighten_categories_list,
        'priorty' => 8
        )
  );
  
  $wp_customize->add_setting(
    'enlighten_enable_news_twitter_message',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_enable_news_twitter_message',
    array(
        'label' => esc_html__('Enable News Twitter Message Section','enlighten'),
        'section' => 'enlighten_news_twitter_message_section',
        'type' => 'checkbox',
        'priority' => 1
    )
  );
  $wp_customize->add_setting(
    'enlighten_news_title',
    array(
        'default' => '',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'enlighten_news_title',
    array(
        'label' => esc_html__('News Title','enlighten'),
        'section' => 'enlighten_news_twitter_message_section',
        'type' => 'text',
        'priority' => 4
    )
  );
  $wp_customize->add_setting(
    'enlighten_news_post_cat',
    array(
        'default' => '',
        'sanitize_callback' => 'enlighten_category_list_sanitize',
    )
  );
  $wp_customize->add_control(
    'enlighten_news_post_cat',
    array(
        'label' => esc_html__('News Category','enlighten'),
        'section' => 'enlighten_news_twitter_message_section',
        'type' => 'select',
        'choices' => $enlighten_categories_list,
        'priority' => 6
    )
  );
  $wp_customize->add_setting(
    'enlighten_message_post',
    array(
        'default' => '',
        'sanitize_callback' => 'absint',
    )
  );
  $wp_customize->add_control(
    'enlighten_message_post',
    array(
        'label' => esc_html__('Message Post','enlighten'),
        'section' => 'enlighten_news_twitter_message_section',
        'type' => 'select',
        'choices' => $enlighten_post_lists,
        'priority' => 8
    )
  );
  $wp_customize->add_setting(
    'enlighten_message_aurhot',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_message_aurhot',
    array(
        'label' => esc_html__('Message Author','enlighten'),
        'section' => 'enlighten_news_twitter_message_section',
        'type' => 'text',
        'priority' => 14
    )
  );
  $wp_customize->add_setting(
    'enlighten_message_aurhot_designation',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'enlighten_message_aurhot_designation',
    array(
        'label' => esc_html__('Message Author Designation','enlighten'),
        'section' => 'enlighten_news_twitter_message_section',
        'type' => 'text',
        'priority' => 16
    )
  );
  $wp_customize->add_setting(
    'enlighten_footer_text',
    array(
        'default' => '',
        'sanitize_callback' => 'enlighten_sanitize_textarea'
    )
  );
  $wp_customize->add_control(
    'enlighten_footer_text',
    array(
        'label' => esc_html__('Footer Text','enlighten'),
        'section' => 'enlighten_footer_setting',
        'type' => 'textarea',
        'priority' => 1
    )
  );
  $wp_customize->add_setting(
    'enlighten_footer_text_disable',
    array(
        'default' => '',
        'sanitize_callback' => 'enlighten_sanitize_checkbox'
    )
  );
  $wp_customize->add_control(
    'enlighten_footer_text_disable',
    array(
        'label' => esc_html__('Footer Text Disable','enlighten'),
        'section' => 'enlighten_footer_setting',
        'type' => 'checkbox',
        'priority' => 2
    )
  );