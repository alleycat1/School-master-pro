<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package enlighten
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'enlighten' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		
        <!-- Site Logo -->
        <div class="ak-container">
            <?php
                $enlighten_header_text = get_theme_mod('enlighten_header_text');
                $enlighten_header_social_link_enable = esc_attr(get_theme_mod('enlighten_enable_heade_social_icon'));
                if($enlighten_header_text || $enlighten_header_social_link_enable){
             ?>
            <div class="social_htext_wrap">
            <?php if($enlighten_header_text){ ?>
                <div class="header_text">
                    <span class="text_wrap"><?php echo esc_attr($enlighten_header_text); ?></span>
                </div>
            <?php } ?>
            <?php if($enlighten_header_social_link_enable){ ?>
                <div class="header_social_link">
                    <?php do_action('enlignten_header_social_link_action'); ?>
                </div>
            <?php } ?>
            </div>
            <?php } ?>
            
            <div class="logo_info_wrap">
              <?php
              //Header Logo
              do_action('enlighten_action_custom_logo');
              
                $enlighten_enable_info = esc_attr(get_theme_mod('enlighten_enable_header_info'));
                if($enlighten_enable_info)
                  { ?>
                      <div class="header_info_wrap">
                          <?php $enlighten_number = get_theme_mod('enlighten_phone_header');
                          if($enlighten_number){ ?>
                            <div class="phone_header wow fadeIn">
                                <div class="fa_icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                <div class="title_phone">
                                    <span class="pnone_title"><?php esc_html_e('Call Support','enlighten'); ?></span>
                                    <span class="phone"><?php echo esc_attr($enlighten_number); ?></span>
                                </div>
                            </div>
                          <?php }
                          $enlighten_email = get_theme_mod('enlighten_email_header');
                          if($enlighten_email){ ?>
                            <div class="email_header wow fadeIn">
                                <div class="fa_icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                <div class="title_email_wrap">
                                    <span class="title_email"><?php esc_html_e('Email Support','enlighten'); ?></span>
                                    <span class="email_address"><?php echo esc_attr($enlighten_email); ?></span>
                                </div>
                            </div>
                            <?php }
                          $enlighten_location = get_theme_mod('enlighten_localtion_header');
                          if($enlighten_location){ ?>
                            <div class="location_header wow fadeIn">
                                <div class="fa_icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                <div class="title_location_wrap">
                                    <span class="title_location"><?php esc_html_e('Location','enlighten'); ?></span>
                                    <span class="location"><?php echo esc_attr($enlighten_location); ?></span>
                                </div>
                            </div>
                          <?php } ?>
                      </div>
            <?php } ?>
            </div>
        </div>
        <?php
            $enlighten_alignment = get_theme_mod('enlighten_menu_alignment','center');
            $enlighten_position = get_theme_mod('enlighten_menu_style','top');
            if($enlighten_position == ''){$enlighten_position = 'top';}
         ?>
		<nav id="site-navigation" class="main-navigation <?php if($enlighten_alignment || $enlighten_position){echo esc_attr($enlighten_alignment.' '.$enlighten_position);} ?>" role="navigation">
			<div class="ak-container">
                <div class="mb-ham">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container_class' => 'menu-menu-1-container mmenu-wrapper' ) ); ?>
            </div>
		</nav><!-- #site-navigation -->
        
        <?php 
            if(is_home() || is_front_page()){
                $enlighten_slider_enable = get_theme_mod('enlighten_enable_slider');
                if($enlighten_slider_enable){
                    do_action('enlighten_header_slider_action');
                } 
        } ?>
	</header><!-- #masthead -->

    <!-- Header Banner -->
    <?php do_action('enlighten_header_banner'); ?>

	<div id="content" class="site-content">
