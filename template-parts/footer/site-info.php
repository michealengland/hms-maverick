<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

<div class="site-info">

	<p class="credits">
		<span class="copyright"><?php
		$hms_auto_copyright =  get_theme_mod('hms_auto_copyright');
		if( $hms_auto_copyright ) { 
			echo '&copy;' . date('Y') . ' ' . get_bloginfo('title');	
		}
		?></span>
		<span>
		<?php
		$hms_footer_credits =  get_theme_mod('hms_footer_credits');

		if( ! empty( $hms_footer_credits ) ) : ?>
			<?php echo $hms_footer_credits; ?>
		<?php endif; ?>
		</span>
	</p>

	<p class="dev-credits">Developed by <a href="http://www.thinkholmes.com" alt="Holmes Marketing Services" target="blank">Holmes Marketing</a></p>
</div><!-- .site-info -->
