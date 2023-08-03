<?php
/**
 * Breadcrumbs.
 *
 * @package Education_Care
 */

// Bail if front page.
if ( is_front_page() ) {
	return;
}

if ( ! function_exists( 'breadcrumb_trail' ) ) {
	require_once trailingslashit( get_template_directory() ) . 'inc/breadcrumbs.php';
}

// Custom image.
$image_url = get_header_image();

if( !empty( $image_url ) ){
	$breadcrumbs_style = 'style="background: url('.esc_url( $image_url ).') top center no-repeat; background-size: cover;"';
} else{

	$breadcrumbs_style = '';
}
?>

<div id="bredcrum-section" class="overlay-area" <?php echo $breadcrumbs_style; ?>>

    <div class="container">

        <div class="page-title">

        	<?php 
        	if(is_page() || is_single() ){ ?>
        		<h2>
        			<?php echo esc_html( get_the_title() ); ?>
        		</h2>
        		<?php
        	} elseif( is_search() ){ ?>
                <h2><?php printf( esc_html__( 'Search Results for: %s', 'education-care' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                <?php
            }elseif( is_404() ){ ?>
                <h2><?php echo esc_html( 'Page Not Found: 404', 'education-care'); ?></h2>
                <?php
            } else{
        		the_archive_title( '<h2>', '</h2>' );
        	}
        	?>

        </div>

        <div class="bredcrums">
			<?php
				$breadcrumb_args = array(
									'container'   => 'div',
									'show_browse' => false,
								);
			breadcrumb_trail( $breadcrumb_args );
			?>
        </div>

    </div><!-- .container -->

</div><!-- #bredcrum -->
