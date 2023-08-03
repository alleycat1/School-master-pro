<?php
$enlighten_testimonial_title = get_theme_mod('enlighten_testimonial_title');
$enlighten_faq_title = get_theme_mod('enlighten_faq_title');
$enlighten_testimonial_cat = get_theme_mod('enlighten_testimonial_cat');
$enlighten_faq_cat = get_theme_mod('enlighten_faq_cat');
if($enlighten_faq_cat || $enlighten_testimonial_cat){
?>
<div class="ak-container">
    <div class="test_faq_wrap">
            <?php if($enlighten_faq_title || $enlighten_faq_cat){ ?>
            <div  class="faq_wrap wow fadeInLeft">
                <span class="faq_title"><?php echo esc_html($enlighten_faq_title); ?></span>
                <?php if($enlighten_faq_cat){ ?>
                    <div class="faw_cat_wrap">
                        <div class="faq_loop_wrap">
                            <?php
                                $enlighten_faq_args = array(
                                    'post_type' => 'post',
                                    'cat' => $enlighten_faq_cat,
                                    'order' => 'DESC',
                                    'posts_per_page' => -1,
                                    
                                );
                                $enlighten_faq_query = new WP_Query($enlighten_faq_args);
                                if($enlighten_faq_query->have_posts()):
                                    while($enlighten_faq_query->have_posts()):
                                        $enlighten_faq_query->the_post();
                                            ?>
                                                <li class="faq_qa <?php echo absint(get_the_ID()); ?>">
                                                    <span class="faq_question"><?php the_title(); ?><span id="<?php echo esc_attr(get_the_ID()); ?>" class="plus_minus_wrap"><span></span></span></span>
                                                    
                                                    <div class="faq_ans"><div class="faq_dot"></div><?php the_content(); ?></div>
                                                </li>
                                            <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                            ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
            <?php if($enlighten_testimonial_title || $enlighten_testimonial_cat){ ?>
            <div class="test_wrap wow fadeInRight">
                <span class="title_test"><?php echo esc_html($enlighten_testimonial_title); ?></span>
                <?php if($enlighten_testimonial_cat){ ?>
                <div class="faq_cat_wrap">
                    <ul class="test_loop_wrap">
                            <?php
                                $enlighten_test_args = array(
                                    'post_type' => 'post',
                                    'cat' => $enlighten_testimonial_cat,
                                    'order' => 'DESC',
                                );
                                $enlighten_test_query = new WP_Query($enlighten_test_args);
                                
                                if($enlighten_test_query->have_posts()):
                                    while($enlighten_test_query->have_posts()):
                                        $enlighten_test_query->the_post();
                                        $enlighten_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'enlighten-testimonial-image');
                                        $enlighten_image_url = $enlighten_image['0'];
                                        if($enlighten_image_url || get_the_title() || get_the_content()):
                                            ?>
                                                <li class="test_content_wrap">
                                                    <div class="content_test">
                                                        <?php if(get_the_content()){ ?>
                                                            <div class="description_test"><?php echo wp_kses_post(wp_trim_words(get_the_content(),'30')); ?></div>
                                                        <?php } ?>
                                                        <div class="img_title_wrap">
                                                        <?php if($enlighten_image_url){ ?>
                                                            <div class="image_test"><img src="<?php echo esc_url($enlighten_image_url); ?>" /></div>
                                                        <?php } ?>
                                                        <?php if(get_the_title()){ ?>
                                                            <div class="title_sub">
                                                                <?php the_title(); ?>
                                                            </div>
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php
                                        endif;
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                            ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
    </div>
</div>
<?php } ?>