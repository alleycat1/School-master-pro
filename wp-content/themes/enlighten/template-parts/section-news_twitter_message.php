<?php
$enlighten_news_title = get_theme_mod('enlighten_news_title');
$enlighten_news_cat = get_theme_mod('enlighten_news_post_cat');
$enlighten_message_author = get_theme_mod('enlighten_message_aurhot');
$enlighten_message_author_designation = get_theme_mod('enlighten_message_aurhot_designation');
?>
<div class="ak-container">
    <div class="NTM_wrap wow fadeInUp">
    <?php if($enlighten_news_title || $enlighten_news_cat){ ?>
        <div class="recent_news">
            <?php if($enlighten_news_title){ ?>
                <span class="rn_title"><?php echo esc_html($enlighten_news_title) ; ?></span>
            <?php } ?>
            <?php if($enlighten_news_cat){ ?>
                <div class="rn_content">
                <?php
                    $enlighten_news_args = array(
                        'post_type' => 'post',
                        'cat' => $enlighten_news_cat,
                        'order' => 'DESC'
                    );
                    $enlighten_news_query = new WP_Query($enlighten_news_args);
                    if($enlighten_news_query->have_posts()):
                    $enlighten_i = 1;
                        while($enlighten_news_query->have_posts()):
                            $enlighten_news_query->the_post();
                            if ($enlighten_i % 2 == 0) {
                              $enlighten_loop_class = 'even_loop';
                            }
                            else
                            {
                                $enlighten_loop_class = 'odd_loop';
                            }?>
                                <div class="rn_content_loop <?php echo esc_html($enlighten_loop_class); ?>">
                                <?php
                                    if(is_active_sidebar('enlighten_home_twitter')){
                                        $enlighten_recent_image_size = 'enlighten-recent-news-disable-twitter';
                                    }
                                    else{
                                        $enlighten_recent_image_size = 'enlighten-recent-news';
                                    }
                                 ?>
                                <?php $enlighten_image = wp_get_attachment_image_src(get_post_thumbnail_id(),$enlighten_recent_image_size);
                                $enlighten_image_url = $enlighten_image['0']; 
                                if($enlighten_image_url){ ?>
                                    <div class="rn_image">
                                        <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo esc_url($enlighten_image_url); ?>" />
                                        </a>
                                    </div>
                                <?php } ?>
                                <?php if(get_the_title() || get_the_content()){ ?>
                                    <div class="rn_title_content">
                                        <?php if(get_the_date()){ ?>
                                            <span class="ln_date"><?php echo esc_attr(get_the_date()); ?></span>
                                        <?php } ?>
                                        <?php if(get_the_title()){ ?>
                                            <div class="rn_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
                                        <?php } ?>
                                        <?php if(get_the_content()){ ?>
                                            <div class="rn_content"><?php echo wp_kses_post(wp_trim_words(get_the_content(),'20')); ?></div>
                                            <div class="read_more_ln"><a href="<?php the_permalink(); ?>"><?php  esc_attr_e('Read More','enlighten'); ?></a></div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                </div>
                            <?php
                            $enlighten_i++;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <?php
        if(is_active_sidebar('enlighten_home_twitter')){ 
    ?>
    <div class="twitter_wrap">
        <?php
            dynamic_sidebar('enlighten_home_twitter');
        ?>
    </div>
    <?php } ?>
    <?php
    $enlighten_message_post = get_theme_mod('enlighten_message_post');
    if($enlighten_message_post){
        $enlighten_message_posts = new WP_Query(array('post_type' => 'post', 'post__in' => array($enlighten_message_post)));?>
        <?php if($enlighten_message_posts->have_posts()){
            while($enlighten_message_posts->have_posts()){
                $enlighten_message_posts->the_post();
                $enlighten_message_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'enlighten-message-image');?>
                <div class="messag_wrap">
                    <?php if(get_the_title()){ ?>
                        <span class="rn_title"><?php the_title(); ?></span>
                    <?php } ?>
                    <div class="message_wrap">
                        <?php if($enlighten_message_image[0]){ ?><div class="message_image"><img src="<?php echo esc_url($enlighten_message_image[0]); ?>" /></div><?php } ?>
                        <div class="content_title_designation">
                            <?php if(get_the_content()){ ?>
                                <div class="message_content"><?php the_content(); ?></div>
                            <?php } ?>
                            <?php if($enlighten_message_author){ ?>
                                <div class="message_author"><?php echo esc_html($enlighten_message_author); ?></div>
                            <?php } ?>
                            <?php if($enlighten_message_author_designation){ ?>
                                <div class="message_designation"><?php echo esc_html($enlighten_message_author_designation); ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php }
            wp_reset_postdata();
        } ?>
<?php } ?>
    </div>
</div>