<div class="aptf-tweets-slider-wrapper aptf-slider-template-3" data-auto-slide ="<?php echo $auto_slide; ?>" data-slide-controls = "<?php echo $slide_controls; ?>" data-slide-duration="<?php echo $slide_duration; ?>"><?php
    if (is_array($tweets)) {

// to use with intents
        //echo '<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>';

        foreach ($tweets as $tweet) {
            //$this->print_array($tweet);
            ?>

            <div class="aptf-single-tweet-wrapper">
                <div class="aptf-tweet-content">

                    <div class="aptf-tweet-box">
                        <?php
                        if ($tweet->text) {
                            $the_tweet = ' '.$tweet->text . ' '; //adding an extra space to convert hast tag into links
                            $the_tweet = $this->makeClickableLinks($the_tweet);
                            

                            // i. User_mentions must link to the mentioned user's profile.
                            if (is_array($tweet->entities->user_mentions)) {
                                foreach ($tweet->entities->user_mentions as $key => $user_mention) {
                                    $the_tweet = preg_replace(
                                            '/@' . $user_mention->screen_name . '/i', '<a href="http://www.twitter.com/' . $user_mention->screen_name . '" target="_blank">@' . $user_mention->screen_name . '</a>', $the_tweet);
                                }
                            }

                            // ii. Hashtags must link to a twitter.com search with the hashtag as the query.
                            if (is_array($tweet->entities->hashtags)) {
                                foreach ($tweet->entities->hashtags as $hashtag) {
                                    $the_tweet = str_replace(' #' . $hashtag->text . ' ', ' <a href="https://twitter.com/search?q=%23' . $hashtag->text . '&src=hash" target="_blank">#' . $hashtag->text . '</a> ', $the_tweet);
                                }
                            }

                           

                            echo $the_tweet . ' ';
                            ?>
                        </div><!--tweet content-->
                        <?php if (isset($aptf_settings['display_twitter_actions']) && $aptf_settings['display_twitter_actions'] == 1) { ?>
                            <!--Tweet Action -->
                            <?php include(plugin_dir_path(__FILE__) . '../tweet-actions.php'); ?>
                            <!--Tweet Action -->
                        <?php } ?>
                    </div>
                    <?php if ($aptf_settings['display_username'] == 1) { ?><a href="http://twitter.com/<?php echo $username; ?>" class="aptf-tweet-name" target="_blank"><?php echo $username; ?></a> <?php } ?>
                    <div class="aptf-tweet-date">
                       
                        <p class="aptf-timestamp">
                            <a href="https://twitter.com/<?php echo $username; ?>/status/<?php echo $tweet->id_str; ?>" target="_blank"> -
                                <?php echo $this->get_date_format($tweet->created_at, $aptf_settings['time_format']); ?>
                            </a>
                        </p>
                    </div><!--tweet_date-->
                        <?php
                    } else {
                        ?>

                        <p><a href="http://twitter.com/'<?php echo $username; ?> " target="_blank"><?php _e('Click here to read ' . $username . '\'S Twitter feed', 'accesspress-twitter-feed'); ?></a></p>
                        <?php
                    }
                    ?>
                


            </div><!-- single_tweet_wrap-->
            <?php
        }
    }
    ?>
</div>
<?php if(isset($aptf_settings['display_follow_button']) && $aptf_settings['display_follow_button']==1){
    ?>
    <div class="aptf-seperator"></div>
    <?php 
    include(plugin_dir_path(__FILE__) . '../follow-btn.php');
}
?>