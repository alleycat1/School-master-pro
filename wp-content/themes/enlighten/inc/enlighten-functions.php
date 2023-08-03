<?php
function enlighten_category_list(){
    $categories = get_categories(
        array(
            'hide_empty' => 0,
            'exclude' => 1
        )
    );

    
    $category_lists = array();
    $category_lists[''] = '--Choose--';
    foreach($categories as $category) :
        $category_lists[$category->term_id] = $category->name;
    endforeach;
    return $category_lists;
}
function enlighten_post_lists(){
        wp_reset_postdata();
        $posts = get_posts(array('posts_per_page'   => -1));
        $post_lists = array();
        $post_lists[''] = esc_html__('Select post', 'enlighten'); 
        foreach($posts as $post) :
            $post_lists[$post->ID] = $post->post_title;
        endforeach;
        return $post_lists;
    }
function enlighten_header_social_link(){
                $social_link = array('facebook','twitter','youtube','pinterest','instagram','linkedin','googleplus','flickr');
                foreach($social_link as $social_links){
                    
                    $social_links_val = get_theme_mod('enlighten_'.$social_links.'_text');
                    if($social_links == 'googleplus'){
                        if($social_links_val){
                            echo '<div class="fa_link_wrap">';
                            ?> <a target="_blank" href="<?php echo esc_url($social_links_val); ?>"> <?php
                                echo '<span class="fa_wrap">';
                                    echo '<i class="fa fa-google-plus" aria-hidden="true"></i>';
                                echo '</span>';
                                echo '<div class="link_wrap">';
                                    ?>
                                        <?php echo esc_attr($social_links); ?>  
                                    <?php
                                echo '</div>';
                                ?></a>   <?php
                            echo '</div>';
                        }
                    }
                    elseif($social_links == 'pinterest'){
                        if($social_links_val){
                            echo '<div class="fa_link_wrap">';
                            ?><a target="_blank" href="<?php echo esc_url($social_links_val); ?>"><?php
                                echo '<span class="fa_wrap">';
                                echo '<i class="fa fa-pinterest-p" aria-hidden="true"></i>';
                                echo '</span>';
                                echo '<div class="link_wrap">';
                                    ?>
                                        <?php echo esc_attr($social_links); ?>   
                                    <?php
                                echo '</div>';
                                ?> </a> <?php
                            echo '</div>';
                        }
                    }
                    else{
                            if($social_links_val){
                            echo '<div class="fa_link_wrap">';
                            ?> <a target="_blank" href="<?php echo esc_url($social_links_val) ?>"> <?php
                                echo '<span class="fa_wrap">';
                                    ?>
                                        <i class="fa fa-<?php echo esc_attr($social_links); ?>"></i>
                                    <?php
                                echo '</span>';
                                echo '<div class="link_wrap">';
                                    ?>
                                        <?php echo esc_attr($social_links); ?>    
                                    <?php
                                echo '</div>';
                                ?> </a> <?php
                            echo '</div>';
                        }
                    }
                }
}
add_action('enlignten_header_social_link_action','enlighten_header_social_link');

function enlighten_header_slider(){
    $slider_cat = get_theme_mod('enlighten_slider_category');
    if($slider_cat){
        $slider_arg = array(
            'post_type' => 'post',
            'cat' => $slider_cat,
            'order' => 'DESC'
        );
        $slider_query = new WP_Query($slider_arg);
        if($slider_query->have_posts()):
            ?><div id="header_slider_wrap"> 
                <ul class="header_slider"> <?php
                        while($slider_query->have_posts()):
                                $slider_query->the_post();
                                ?>                     
                                <li class="slider_content_loop">
                                        <?php the_post_thumbnail( 'enlighten-slider-image' ); ?>
                                            <div class="slider_capation">
                                                <div class="ak-container">
                                                <?php if(get_the_title() || get_the_content()){ ?>
                                                        <div class="slider_title_desc">
                                                            <?php if(get_the_title()){ ?>
                                                            <div class="slider_title wow fadeInUp"><?php echo esc_attr(wp_trim_words(get_the_title(),'15','...')); ?></div>
                                                            <?php } ?>
                                                            <?php if(get_the_content()){ ?>
                                                            <div class="slider_content wow fadeInUp"><?php echo apply_filters('the_content' , wp_kses_post(wp_trim_words(get_the_content(),20,'...')));?> </div>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                </li>
                                    
                                <?php
                        endwhile;
                        wp_reset_postdata();
                ?> </ul> 
            </div><?php
        endif;
    }
}
add_action('enlighten_header_slider_action','enlighten_header_slider');

function enlighten_escape_fa($input){
    
    $fa_variable = array(
        'i' => array(
            'class' =>array(),
            'aria-hidden' => array()
        )
    );
    
    return wp_kses($input,$fa_variable);
}
//Header Logo
function enlighten_custom_logo() {
        if (get_theme_mod('custom_logo')){
            ?>
                <div class="header-logo-container">
                    <?php the_custom_logo(); ?>
                </div>
            <?php
        }
        else{
            $site_tagline = get_theme_mod('enlighten_header_textcolor');
            if($site_tagline !== 'blank'){ ?>
                <div class="site-branding wow fadeIn clearfix">
                   <h1 class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                   </h1>
                   <p class="site-description"><?php bloginfo( 'description' ); ?></p>
                </div><!-- .site-branding -->
        <?php }
    }

}
add_action('enlighten_action_custom_logo','enlighten_custom_logo');

function enlighten_esc_footer_copyright($input){
    $enlighten_copyright = array(
        'a'=> array(
            'href' => array(),
            'target' => array(),
            'class' => array(),                        
        ),
        'span' => array(
            'class' => array(),
            'id' => array()            
        )        
    );
    return wp_kses($input,$enlighten_copyright);    
    
}

/**
 * Registers an editor stylesheet for the theme.
 */
function enlighten_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'enlighten_add_editor_styles' );