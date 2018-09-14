<?php
/**
 * Blog Page Only
 */

get_header(); ?>

	<?php get_template_part( 'template-parts/modules/page', 'header' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

          <?php
          $categories = get_categories( array(
              'orderby' => 'name',
              'order'   => 'ASC',
              'exclude' => array(1),
          ) );

          foreach( $categories as $category ) {

            // Featured Image ACF Field in Cateogry
            if( function_exists('get_field') ) {

              $category_featured_img = get_field( 'tax_featured_img', $category );

              if( $category_featured_img ) {
               $category_bg_img = wp_get_attachment_image_url($category_featured_img, 'large', true );
             } else {
               $category_bg_img = '';
             }
            }

            if( $category_bg_img ) :
	            echo '<article class="post-tile">';
	              echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . $category->name . '"  style="background-image: url(' . esc_url( $category_bg_img ) . ');">';
	                echo '<h2 class="post-title">' . $category->name . '</h2>';
	              echo '</a>';
	              echo '<span class="post-description">' . category_description( $category->term_id ) . '</span>';
	            echo '</article>';
          	endif;

          } // endforeach

          wp_reset_postdata();
          ?>

			<?php else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
