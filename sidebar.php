<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) OR is_singular('post') OR is_singular('roost_realtors') OR is_home() OR is_category() && is_archive() OR ( get_post_type() == 'mls-listings' OR 'mls-search'  ) ) {
	return;
}
?>


<?php if( is_post_type_archive('roost_realtors') ) : ?>
<?php else : ?>
	<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'twentyseventeen' ); ?>">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->
<?php endif; ?>
