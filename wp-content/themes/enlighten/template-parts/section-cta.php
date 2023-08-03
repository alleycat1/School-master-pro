<?php
$enlighten_cta_section_title = get_theme_mod('enlighten_cta_section_title');
$enlighten_cta_button_text = get_theme_mod('enlighten_cta_button_text');
$enlighten_cta_buttom_link = get_theme_mod('enlighten_button_link');
?>
<div class="ak-container">
    <div class="cta_wrap wow fadeInUp">
        <?php if($enlighten_cta_section_title){ ?>
            <span class="title_section_cta"><?php echo esc_html($enlighten_cta_section_title); ?></span>
        <?php } ?>
        
        <?php
        $enlighten_cta_post = get_theme_mod('enlighten_cta_post');
        if($enlighten_cta_post){
            $enlighten_cta_posts = new WP_Query(array('post_type' => 'post', 'post__in' => array($enlighten_cta_post)));?>
            <?php if($enlighten_cta_posts->have_posts()){
                    while($enlighten_cta_posts->have_posts()){
                        $enlighten_cta_posts->the_post();?> 
                        <div class="title_description">
                            <?php if(get_the_title()){ ?>
                                <span class="cta_title"><?php the_title(); ?></span>
                            <?php }
                            if(get_the_content()){ ?>
                                <span class="cta_desc"><?php the_content(); ?></span>
                            <?php } ?>
                        </div>
                    <?php } 
                    wp_reset_postdata();?>
                <?php if($enlighten_cta_buttom_link){ ?>
                        <span class="button_cta"><a target="_blank" class="cta_button" href="<?php echo esc_url($enlighten_cta_buttom_link); ?>"><?php echo esc_attr($enlighten_cta_button_text); ?></a></span>
                <?php }
            }
        } ?>
    </div>
</div>