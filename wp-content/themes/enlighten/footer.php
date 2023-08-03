<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package enlighten
 */

?>

	</div><!-- #content -->
<?php 
$enlighten_footer_style = esc_attr(get_theme_mod('enlighten_menu_style'));
?>
	<footer id="colophon" class="site-footer <?php if($enlighten_footer_style == 'bottom'){echo 'bottom_menu';} ?>" role="contentinfo">
        <div class="ak-container">
        <?php 
            if(is_active_sidebar('enlighten_footer-1') || is_active_sidebar('enlighten_footer-2') || is_active_sidebar('enlighten_footer-3')){
        ?>
        <div class="footer_area clearfix">
            <?php
                if(is_active_sidebar('enlighten_footer-1')){
             ?>
                <div class="footer_area_one">
                    <?php
                        dynamic_sidebar('enlighten_footer-1');
                    ?>
                </div>
            <?php } ?>
            <?php
                if(is_active_sidebar('enlighten_footer-2')){ 
            ?>
                <div class="footer_area_two">
                    <?php
                        dynamic_sidebar('enlighten_footer-2');
                    ?>
                </div>
            <?php } ?>
            <?php
                if(is_active_sidebar('enlighten_footer-3')){
            ?>
                <div class="footer_area_three">
                    <?php
                        dynamic_sidebar('enlighten_footer-3');
                    ?>
                </div>
            <?php } ?>
        </div>
        <?php } ?>
        <?php if( get_theme_mod('enlighten_footer_text_disable') != '1'){ ?>
            <div class="site-info">
                <?php 
                    $enlighten_footer_text = get_theme_mod('enlighten_footer_text');
                if($enlighten_footer_text){
                    echo enlighten_esc_footer_copyright($enlighten_footer_text);
                    }
                    else{
                         printf( esc_html__( '%1$s Theme: %2$s by %3$s', 'enlighten' ), '&copy; 2016 Enlighten |' ,'<a target="_blank" href="https://accesspressthemes.com/wordpress-themes/enlighten/" rel="designer">Enlighten</a>', '<a target="_blank" href="http://accesspressthemes.com/" rel="designer">AccessPress Themes</a>' );
                    }?>
        	</div><!-- .site-info -->
        <?php } ?>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
