<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
?>

<div id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentyseventeen' ); ?>">
	<div class="nav-top">
		<?php
		/**
		* Custom Roost Logo
		*/
		$site_logo = get_custom_logo();

		if( ! $site_logo == '' ) :
			the_custom_logo();
		else : ?>
			<?php if ( is_front_page() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
		<?php endif ?>

		<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
			<?php
			echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) );
			echo twentyseventeen_get_svg( array( 'icon' => 'close' ) );
			_e( 'Menu', 'twentyseventeen' );
			?>
		</button>

		<?php wp_nav_menu( array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
			'container'		 => 'nav',
		) ); ?>

		</div>

		<div class="nav-bottom alignfull">
			<?php if ( has_nav_menu( 'secondary-menu' ) ) : ?>
				<?php wp_nav_menu( array(
					'theme_location' => 'secondary-menu',
					'menu_id'        => 'secondary-menu',
					'container'			 => 'nav',
					'depth'          => 1,
				) ); ?>
			<?php endif; ?>

			<?php if ( has_nav_menu( 'social-header' ) ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Header Social Links Menu', 'twentyseventeen' ); ?>">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'social-header',
								'menu_class'     => 'social-links-menu',
								'container'			 => 'ul',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							)
						);
					?>
				</nav>
			<?php endif; ?>
		</div>
	</div>
</div><!-- #site-navigation -->
