<?php
$enlighten_video_title = get_theme_mod('enlighten_video_title');
$enlighten_video_title_sub = get_theme_mod('enlighten_video_title_sub');
$enlighten_get_video_url = get_theme_mod('enlighten_video_url');
?>
<div class="wrap_video wow fadeInUp">
    <?php
    if($enlighten_video_title || $enlighten_video_title_sub || $enlighten_get_video_url){ ?>
        <!-- <div class="ak-container"> -->
            <div class="effect_title">
            <?php
                if($enlighten_video_title || $enlighten_video_title_sub){
             ?>
                <div class="section_title">
                  <div class="section-title-inner">
                    <?php if($enlighten_video_title){ ?>
                        <span class="title_one"><?php echo esc_html($enlighten_video_title); ?></span>
                    <?php } ?>
                    <?php if($enlighten_video_title_sub){ ?>
                        <span class="title_two"><?php echo esc_html($enlighten_video_title_sub); ?></span>
                    <?php } ?> 
                    </div>
                </div>
                <?php
                }
                if($enlighten_get_video_url){ 
                          $enlighten_vidarr = explode('?v=', $enlighten_get_video_url); 
                          $enlighten_vid_id = $enlighten_vidarr[1];
                        ?>
                        <div class="video_wrap">
                            <button id="togglePlay" class="play-pause-video"></button>
                            <section id="container-1" class="video js-video" data-property="{videoURL:'<?php echo esc_attr($enlighten_vid_id) ?>',containment:'#container-1',autoPlay:false, mute:true, startAt:0, opacity:1}"></section>
                            <div class="gap"></div>
                        </div>
                <?php } ?>
          </div>
        <!-- </div> -->
    <?php } ?>
</div>