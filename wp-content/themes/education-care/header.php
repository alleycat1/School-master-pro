<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Education_Care
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
		<div class="top-header">
		    <div class="container">
		        <div class="top-header-content">
		              <div class="top-info-left left">
		                  
		                  	<?php 
		                  	$top_left = education_care_options( 'top_left' );

		                  	if( 'contact_details' == $top_left ){ ?>

		                  		<div class="top-contact-info">

			                  		<?php 
			                  		if( !empty( education_care_options('conatct_address') ) ){ ?>
			                  			<span class="address"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html( education_care_options('conatct_address') ); ?></span>
			                  		<?php } ?>

			                  		<?php 
			                  		if( !empty( education_care_options('conatct_email') ) ){ ?>
			                  			<span class="email"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> <?php echo esc_html( education_care_options('conatct_email') ); ?></span>
			                  		<?php } ?>

			                  		<?php 
			                  		if( !empty( education_care_options('conatct_phone') ) ){ ?>
			                  			<span class="phone"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_html( education_care_options('conatct_phone') ); ?></span>
			                  		<?php } ?>

			                  	</div><!-- .top-contact-info -->

		                  	<?php

		                  	} elseif ( 'notice' == $top_left ) {

		                  		get_template_part( 'template-parts/notices' );
		                  		
		                  	} ?>

		                  
		              </div><!-- .top-info-left -->

		              <div class="top-info-right right">
		              	<?php 
		              	$top_right = education_care_options( 'top_right' );

		              	if( 'contact_details' == $top_right ){ ?>

		              		<div class="top-contact-info">
		              		
			              		<?php 
			              		if( !empty( education_care_options('conatct_address') ) ){ ?>
			              			<span class="address"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html( education_care_options('conatct_address') ); ?></span>
			              		<?php } ?>

			              		<?php 
			              		if( !empty( education_care_options('conatct_email') ) ){ ?>
			              			<span class="email"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> <?php echo esc_html( education_care_options('conatct_email') ); ?></span>
			              		<?php } ?>

			              		<?php 
			              		if( !empty( education_care_options('conatct_phone') ) ){ ?>
			              			<span class="phone"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_html( education_care_options('conatct_phone') ); ?></span>
			              		<?php } ?>

		              		</div><!-- .top-contact-info -->

		              	<?php

		              	} elseif ( 'notice' == $top_right ) {

		              		get_template_part( 'template-parts/notices' );
		              		
		              	} elseif ( 'social_links' == $top_right ) { ?>

		              		<div class="social-widgets">
		              		    <ul>
		              		      <?php 
					                for( $j= 1; $j<=6; $j++ ){ 

					                	$social_link = education_care_options('social_link_'.$j);

					                	if( !empty( $social_link ) ){ ?>

					                  		<li><a target="_blank" href="<?php echo esc_url( $social_link ); ?>"><?php echo esc_url($social_link); ?></a></li>

					                	<?php 
					                	} 

					                } ?>
		              		    </ul> 
		              		</div><!-- .social-widgets -->

		              		<?php
		              		
		              	} elseif ( 'mixed' == $top_right ) { 

		              		if( !empty( education_care_options('conatct_address') ) ){ ?>
		              			<span class="address"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html( education_care_options('conatct_address') ); ?></span>
		              		<?php } ?>

		              		<?php 
		              		if( !empty( education_care_options('conatct_email') ) ){ ?>
		              			<span class="email"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> <?php echo esc_html( education_care_options('conatct_email') ); ?></span>
		              		<?php } ?>

		              		<?php 
		              		if( !empty( education_care_options('conatct_phone') ) ){ ?>
		              			<span class="phone"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_html( education_care_options('conatct_phone') ); ?></span>
		              		<?php } ?>

  		              		<div class="social-widgets">
  		              		    <ul>
  		              		      <?php 
  					                for( $j= 1; $j<=6; $j++ ){ 

  					                	$social_link = education_care_options('social_link_'.$j);

  					                	if( !empty( $social_link ) ){ ?>

  					                  		<li><a target="_blank" href="<?php echo esc_url( $social_link ); ?>"><?php echo esc_url($social_link); ?></a></li>

  					                	<?php 
  					                	} 

  					                } ?>
  		              		    </ul> 
  		              		</div><!-- .social-widgets -->

		              	<?php
		              		
		              	} 
		              	?>
		                  
		              </div><!-- .top-info-right -->
		        </div><!-- .top-header-content -->   
		    </div>
		</div><!-- .top-header -->

		<div class="bottom-header">
		    <div class="container">
		        <div class="site-main-header">
		               <div class="site-branding">
		                  	<?php 

		                  	$logo_type = education_care_options( 'logo_type' );

		                  	if( 'logo-only' == $logo_type ){

		                  		education_care_logo();

		                  	} elseif( 'title-desc' == $logo_type  ){ ?>

								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
									<?php
								endif; 

		                  	} elseif( 'logo-title-desc' == $logo_type  ){

      		                  	education_care_logo(); ?>
      		                  	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      							<?php
      							$description = get_bloginfo( 'description', 'display' );
      							if ( $description || is_customize_preview() ) : ?>
      								<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
      								<?php
      							endif; 
		                  		
		                  	}elseif( 'logo-title' == $logo_type  ){

      		                  	education_care_logo(); ?>
      		                  	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      							<?php

		                  	}elseif( 'logo-desc' == $logo_type  ){

      		                  	education_care_logo(); 
      		                  	
      							$description = get_bloginfo( 'description', 'display' );

      							if ( $description || is_customize_preview() ) : ?>
      								<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
      							<?php
      							endif;
		                  		
		                  	} ?>
		               </div>
		               <!-- .site-branding -->

		                <div class="main-navigation-wrapper">
		                   <div id="main-nav" class="clear-fix">
		                    	<nav id="site-navigation" class="main-navigation" role="navigation">
									<div class="wrap-menu-content">
										<?php
										wp_nav_menu(
											array(
												'theme_location' => 'primary',
												'menu_id'        => 'primary-menu',
												'fallback_cb'    => 'education_care_fallback_menu',
											)
										);
										?>
									</div><!-- .menu-content -->
		                      	</nav><!-- #site-navigation -->
		                	</div><!-- #main-nav -->

		                   	<?php 
		                   	$header_search = education_care_options( 'header_search' ); 
		                   	if( 1 == $header_search ){ ?>
			                   <div class="search-holder">
			                      <a href="#" class="education-search" data-popup-open="popup">
			                              <i class="fa fa-search" aria-hidden="true"></i>
			                      </a><!-- .education-search -->
			                   </div><!-- .search-holder -->
			                <?php } ?>
		              </div>
		        </div><!-- site-main-header -->
		    </div>
		</div><!-- .bottom-header -->

		<div class="popup" data-popup="popup">
		  <div class="popup-inner">
		      <div class="education-search-container">
		          <div class="education-search-form">
		              <?php get_search_form(); ?>
		              <a href="#" class="popup-close" data-popup-close="popup"><i class="fa fa-times" aria-hidden="true"></i></a>
		          </div><!-- education-search-form -->                       
		       </div><!-- .education-search-containe -->
		  </div>
		</div>
	</header><!-- #masthead -->

	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

	<div id="content" class="site-content">

		<?php get_template_part( 'template-parts/slider' ); ?>

		<?php get_template_part( 'template-parts/home-content' ); ?>

		<div class="container">

            <div class="inner-wrapper">

            	<div class="custom-wrapper">

				