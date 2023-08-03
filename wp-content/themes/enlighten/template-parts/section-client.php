<?php
$enlighten_section_title = get_theme_mod('enlighten_client_title');
$enlighten_section_title_sub = get_theme_mod('enlighten_client_title_sub');
$enlighten_client_cat = get_theme_mod('enlighten_client_cat');
if($enlighten_section_title || $enlighten_section_title_sub || $enlighten_client_cat){
    
    ?>
        <div class="ak-container">
            <div class="client_wrap">
                <?php
                if($enlighten_section_title || $enlighten_section_title_sub){
                    ?>
                    <div class="effect_title">
                    <div class="after-effet1"></div>
                        <div class="section_title">
                              <?php if($enlighten_section_title){ ?>
                                <span class="title_one wow fadeInUp"><?php echo esc_html($enlighten_section_title); ?></span>
                                <?php } ?>
                                <?php if($enlighten_section_title_sub){ ?>
                                <span class="title_two wow fadeInUp"><?php echo esc_html($enlighten_section_title_sub); ?></span>
                                <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if($enlighten_client_cat){ ?>
                    <div class="client_cat_loop wow fadeInUp">
                        <?php
                            $enlighten_client_args = array(
                                'post_type' => 'post',
                                'cat' => $enlighten_client_cat,
                                'order' => 'DESC',
                                'posts_per_page' => -1,
                            );
                            $enlighten_client_query = new WP_Query($enlighten_client_args);
                            if($enlighten_client_query->have_posts()):
                                while($enlighten_client_query->have_posts()):
                                $enlighten_client_query->the_post();
                                $enlighten_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'enlighten-client-section');
                                $enlighten_image_url = $enlighten_image['0'];
                                if($enlighten_image_url){
                                    ?>
                                        <div class="client_image">
                                            <img src="<?php echo esc_url($enlighten_image_url); ?>" alt="<?php the_title(); ?>" />
                                        </div>
                                    <?php
                                    }
                                endwhile;
                                wp_reset_postdata();
                            endif;
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php
}