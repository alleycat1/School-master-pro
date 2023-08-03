<?php
$enlighten_enable_portfolio = get_theme_mod('enlighten_enable_portfolio');
if($enlighten_enable_portfolio){
    
    $enlighten_portfolio_cat = get_theme_mod('enlighten_portfolio_cat');
    if($enlighten_portfolio_cat){
        $enlighten_portfolio_args = array(
                'post_type' =>'post',
                'cat' => $enlighten_portfolio_cat,
                'order' => 'DESC',
                'posts_per_page' => -1
            );
            $enlighten_port_query = new WP_Query($enlighten_portfolio_args);
            if($enlighten_port_query->have_posts()):
            ?> <div class="ak-container"><?php
                    $enlighten_title_one = get_theme_mod('enlighten_portfolio_title');
                    $enlighten_title_two = get_theme_mod('enlighten_portfolio_title_sub');
                    if($enlighten_title_one || $enlighten_title_two){
                    ?>
                    <div class="effect_title">
                        <div class="after-effet1"></div>
                        <div class="section_title">
                              <?php if($enlighten_title_one){ ?>
                                <span class="title_one wow fadeInUp"><?php echo esc_html($enlighten_title_one); ?></span>
                                <?php } ?>
                                <?php if($enlighten_title_two){ ?>
                                <span class="title_two wow fadeInUp"><?php echo esc_html($enlighten_title_two); ?></span>
                                <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="portfolio_slider_wrap"> <?php
                            while($enlighten_port_query->have_posts()):
                                $enlighten_port_query->the_post();
                                $enlighten_image_port = wp_get_attachment_image_src(get_post_thumbnail_id(),'enlighten-portfolio-image');
                                $enlighten_image_url = $enlighten_image_port['0'];
                                ?>
                                    <div class="portfolio_slide_loop wow fadeInUp">
                                        <div class="image_wrap_port wow fadeInUp"><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($enlighten_image_url); ?>" /></a></div>
                                        <div class="title_content_wrap">
                                            <?php
                                                $enlighten_title = get_the_title();
                                                $enlighten_content = get_the_content();
                                                if($enlighten_title){
                                             ?>
                                            <div class="anchor_title_wrap">
                                                <span class="port_title wow fadeInUp">
                                                    <a href="<?php the_permalink(); ?>"><?php echo esc_html($enlighten_title); ?></a>
                                                </span>
                                            </div>
                                            <?php } ?>
                                            <?php if($enlighten_content){ ?>
                                            <div class="port_content_wrap wow fadeInUp"><?php echo wp_kses_post(wp_trim_words($enlighten_content,'20','...')); ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                     ?> </div> <?php
            ?> </div> <?php
            endif;
    }
}