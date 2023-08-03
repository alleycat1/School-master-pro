<?php
/**
 * Template Name: Home Page
 */
 get_header();
 $enlighten_home_sections = array('news_slide','portfolio','service','achieve','video','cta','faq_testimonial','news_twitter_message','client');
 foreach($enlighten_home_sections as $enlighten_home_section)
 {
    $enable_section = esc_attr(get_theme_mod('enlighten_enable_'.$enlighten_home_section));
    if($enable_section){
        ?>
            <section class="home_section" id="<?php echo 'section_'.esc_attr($enlighten_home_section); ?>">
                <div class="<?php echo 'bg_'.esc_attr($enlighten_home_section) ?> clearfix">
                    <?php get_template_part('template-parts/section',$enlighten_home_section); ?>
                </div>
            </section>
        <?php
    }
 }
 get_footer();