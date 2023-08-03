<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package enlighten
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
 
function enlighten_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'enlighten_body_classes' );

function enlighten_sanitize_bradcrumb($input){
    $all_tags = array(
        'a'=>array(
            'href'=>array()
        )
     );
    return wp_kses($input,$all_tags);
    
}

function enlighten_header_banner_x() {
	if(is_page_template( 'template-home.php' ) || is_home() || is_front_page()) :
	else :
		?>
			<div class="header-banner-container">
                <div class="ak-container">
    				<div class="page-title-wrap">
    					<?php
    						if(is_author()) {
    						   ?>
                                <h1 class="page-title"><?php echo esc_html(strip_tags(get_the_archive_title())); ?></h1>
                                <?php
    						
    						}elseif(is_archive()){
                               	?>
                                <h1 class="page-title"><?php echo esc_attr(get_the_archive_title()); ?></h1>
    							<div class="taxonomy-description"><?php echo esc_attr(get_the_archive_description()); ?></div>
                                <?php
                            }elseif(is_single() || is_singular('page')) {
    							wp_reset_postdata();
    							the_title('<h1 class="page-title">', '</h1>');
    						} elseif(is_search()) {
                                ?>
                                <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'enlighten' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                                <?php
                            } elseif(is_404()) {
                                ?>
                                <h1 class="page-title"><?php esc_html_e( '404 Error', 'enlighten' ); ?></h1>
                                <?php
                            }
                            
    					?>
    					<?php enlighten_breadcrumbs(); ?>
    				</div>
                </div>
			</div>
		<?php
	endif;
}

add_action('enlighten_header_banner', 'enlighten_header_banner_x');

function enlighten_breadcrumbs() {
    global $post;
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show

    $delimiter = '&gt;';

    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $homeLink = esc_url( home_url() );
    $linkBefore = '<span typeof="v:Breadcrumb">';
	$linkAfter = '</span>';
	$linkAttr = ' rel="v:url" property="v:title"';
	$link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
    $before  = '<span class="current">'; // tag before the current crumb
    $after       = '</span>'; // tag after the current crumb    

    if (is_home() || is_front_page()) {

        if ($showOnHome == 1)
            echo '<div id="enlighten-breadcrumb"><a href="' . $homeLink . '">' . esc_html__('Home', 'enlighten') . '</a></div></div>';
    } else {

        echo '<div id="enlighten-breadcrumb"><a href="' . $homeLink . '">' . esc_html__('Home', 'enlighten') . '</a> ' . esc_attr($delimiter) . ' ';

        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0)
                echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo $before . esc_html__('Archive by category','enlighten').' "' . esc_attr(get_the_archive_title()) . '"' . $after;
        } elseif (is_search()) {
            echo $before . esc_html__('Search results for','enlighten'). '"' . get_search_query() . '"' . $after;
        } elseif ( is_day() ) {
			echo sprintf($link, esc_url(get_year_link(get_the_time('Y'))), esc_html(get_the_time('Y'))) . $delimiter;
			echo sprintf($link, esc_url(get_month_link(get_the_time('Y')),esc_html(get_the_time('m'))), esc_html(get_the_time('F'))) . $delimiter;
			echo $before . esc_html(get_the_time('d')) . $after;
		} elseif ( is_month() ) {
			echo sprintf($link, esc_url(get_year_link(get_the_time('Y'))), esc_html(get_the_time('Y'))) . $delimiter;
			echo $before . esc_html(get_the_time('F')) . $after;
		} elseif ( is_year() ) {
			echo $before .esc_html( get_the_time('Y')) . $after;
		}elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . esc_url(get_the_permalink()) . '/">' . esc_attr($post_type->labels->singular_name) . '</a>';
                if ($showCurrent == 1)
                    echo ' ' . $delimiter . ' ' . $before . esc_attr(get_the_title()) . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                if ($showCurrent == 0)
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                echo enlighten_sanitize_bradcrumb($cats);
                if ($showCurrent == 1)
                    echo $before . esc_attr(get_the_title()) . $after;
            }
        } 
        elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . esc_attr($post_type->labels->singular_name) . $after;
        } elseif (is_attachment()) {
            if ($showCurrent == 1) echo ' ' . $before . esc_attr(get_the_title()) . $after;
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1)
                echo $before . esc_attr(get_the_title()) . $after;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo enlighten_sanitize_bradcrumb($breadcrumbs[$i]);
                if ($i != count($breadcrumbs) - 1)
                    echo ' ' . $delimiter. ' ';
            }
            if ($showCurrent == 1)
                echo ' ' . $delimiter . ' ' . $before . esc_attr(get_the_title()) . $after;
        } elseif (is_tag()) {
            echo $before . esc_html__('Posts tagged','enlighten').' "' . esc_attr(get_the_archive_title()) . '"' . $after;
        } elseif (is_author()) {
            echo $before . esc_html__('Articles posted by ','enlighten'). esc_html(strip_tags(get_the_archive_title())) . $after;
        } elseif (is_404()) {
            echo $before . esc_html__('Error 404','enlighten') . $after;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ' (';
            echo esc_html__('Page', 'enlighten') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ')';
        }

        echo '</div>';
    }
}