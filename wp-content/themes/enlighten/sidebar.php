<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package enlighten
 */

if (is_active_sidebar( 'enlighten_sidebar-1' ) ) {
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'enlighten_sidebar-1' ); ?>
</aside><!-- #secondary -->
<?php } ?>