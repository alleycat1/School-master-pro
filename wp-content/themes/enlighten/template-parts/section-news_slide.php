<?php
$enlighten_news_slider_cat = get_theme_mod('enlighten_news_category');
if($enlighten_news_slider_cat){
    $enlighten_args_slider = array(
        'post_type' => 'post',
        'cat' => $enlighten_news_slider_cat,
        'order' => 'DESC',
        'posts_per_page' => -1,
    );
    $enlighten_news_slider_query = new WP_Query($enlighten_args_slider);
    if($enlighten_news_slider_query->have_posts()):
    $enlighten_news_slider_title = get_theme_mod('enlighten_news_slide_title');
    ?> 
        <div class="ak-container">
            <div class="news_slide_wrap wow fadeInUp">
                <?php if($enlighten_news_slider_title){ ?>
                    <div class="news_slider_title"><?php echo esc_html($enlighten_news_slider_title); ?></div>
                    <?php } ?> 
                    <ul class="news_slide"> <?php
                        while($enlighten_news_slider_query->have_posts()):
                            $enlighten_news_slider_query->the_post();
                                ?>
                                    <li class="slide_content_loop">
                                        <div class="slide_content_wrap">
                                        <?php if(get_the_title()){?>
                                            <div class="slider_news_title"><a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                        <?php } 
                                            if(get_the_content()){ ?>
                                                <div class="slide_news_content"><?php echo wp_kses_post(wp_trim_words(get_the_content(),'10','...')); ?></div>
                                            <?php } ?>
                                        </div>
                                    </li>
                                <?php
                        endwhile;
                        wp_reset_postdata();?>
                    </ul>
            </div> 
        </div> <?php
    endif;
}