<?php
$enlighten_service_enable = get_theme_mod('enlighten_enable_service');
$enlighten_section_title_one = get_theme_mod('enlighten_service_title');
$enlighten_section_title_two = get_theme_mod('enlighten_service_title_sub');
$enlighten_section_description = get_theme_mod('enlighten_service_description');
if($enlighten_service_enable){
    $enlighten_service_cat = get_theme_mod('enlighten_service_cat');
    if($enlighten_service_cat){
    $enlighten_service_args = array(
        'post_type' => 'post',
        'cat' => $enlighten_service_cat,
        'order' => 'DESC',
        'posts_per_page' => -1,
    );
    $enlighten_service_query = new WP_Query($enlighten_service_args);
    if($enlighten_service_query->have_posts()):
        $enlighten_post_array = array();
        $enlighten_i = 0;
        while($enlighten_service_query->have_posts()):
            $enlighten_service_query->the_post();
                $enlighten_post_array[$enlighten_i] = get_the_ID();
                $enlighten_i++;
        endwhile;
        wp_reset_postdata();
        $enlighten_chunk_array =array_chunk($enlighten_post_array, 4);
        ?><div class="ak-container">
            <div class="effect_title">
                <div class="after-effet1"></div>
                <div class="section_title">
                    <?php if($enlighten_section_title_one){ ?>
                        <span class="title_one wow fadeInUp"><?php echo esc_html($enlighten_section_title_one); ?></span>
                    <?php } ?>
                    <?php if($enlighten_section_title_two){ ?>
                        <span class="title_two wow fadeInUp"><?php echo esc_html($enlighten_section_title_two); ?></span>
                    <?php } ?>
                    <?php if($enlighten_section_description){ ?>
                        <div class="description_service wow fadeInUp"><?php echo wp_kses_post($enlighten_section_description); ?></div>
                    <?php } ?>
                </div>
            </div>
            <div class="service_slider"> 
                <?php
                        foreach($enlighten_chunk_array as $enlighten_post_arrays){ ?> 
                        <div class="array_service"> <?php
                                foreach($enlighten_post_arrays as $enlighten_posts){
                                    $enlighten_image = wp_get_attachment_image_src(get_post_thumbnail_id($enlighten_posts),'enlighten-service-image');
                                    $enlighten_image_url = $enlighten_image['0'];
                                    $enlighten_post_get_content = get_post($enlighten_posts);
                                    $enlighten_title = $enlighten_post_get_content->post_title;
                                    $enlighten_content = $enlighten_post_get_content->post_content;
                                    ?>
                                        <div class="content_wrap">
                                        <?php if($enlighten_title || $enlighten_image_url){ ?>
                                            <div class="image_title">
                                                <?php if($enlighten_title){ ?>
                                                    <span class="service_title wow fadeInUp"><a href="<?php echo esc_url(get_permalink($enlighten_posts)); ?>"><?php echo esc_attr($enlighten_title); ?></a></span>
                                                <?php } ?>
                                                <div class="service_image wow fadeInUp"><a href="<?php echo esc_url(get_permalink($enlighten_posts)); ?>"><img src="<?php echo esc_url($enlighten_image_url); ?>" /></a></div>
                                            </div>
                                        <?php } ?>
                                            <div class="title_content_service wow fadeInUp">
                                                <?php if($enlighten_content){ ?>
                                                    <div class="service_content"><?php echo esc_html(wp_trim_words($enlighten_content,'15','...')); ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php
                                }
                        ?> </div> <?php
                        }
                ?></div>
        </div> <?php
    endif;
    }
}

