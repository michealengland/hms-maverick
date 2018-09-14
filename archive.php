<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">

	<?php get_template_part( 'template-parts/modules/page', 'header' ); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

			<?php do_action( 'before_the_content' ); ?>

			<?php
			/**
			* Get ACF Category Gallery Field
			* Must be outside of post loop!
			*/


			if( is_category() ) {

					// Determine the current term
					$term = get_queried_object();

					// Get ACF Gallery
					if( function_exists( 'get_field' ) ) {
						$post_thubmnail_defaults = get_field( 'term_gallery', $term ); // returns array
					}

					// Assign Array
					if( $post_thubmnail_defaults ) {
						// Returns an array of values representing a single column from the input array.
						$img_defaults = array_column( $post_thubmnail_defaults, 'ID' );
					} else {
						// Image ID's up incase ACF Not Active
						$img_defaults = array( 899, 900, 901 );
					}

				// assign counters and randomize array order.
				shuffle($img_defaults);

				$i = 0; // Array Integer Start
	      $end_count = count( $img_defaults ); // Array Integer Max
	      $end_count--; // Offset count for array.

			} else {
				$img_defaults = '';
				$i= '';
				$end_count = '';
			}
			?>

      <?php
      // NORMAL TWENTY SEVENTEEN ARCHIVE
      if ( have_posts() ) : ?>
        <?php
        /* Start the Loop */
        while ( have_posts() ) : the_post();

          /*
           * Include the Post-Format-specific template for the content.
           * If you want to override this in a child theme, then include a file
           * called content-___.php (where ___ is the Post Format name) and that will be used instead.
           */

					 if( is_category() ) {  ?>

						 <article class="post">
						 	<a href="<?php echo get_the_permalink(); ?>" title="<?php echo esc_attr_e( get_the_title() ); ?>">

						 		<?php if( has_post_thumbnail() ) : ?>

						 			<?php echo get_the_post_thumbnail($post, 'thumbnail', true ); ?>

						 		<?php else : ?>

						 			<?php
									// Get random img ID from $img_defaults
						 			echo wp_get_attachment_image( $img_defaults[$i], 'thumbnail', true);

									// check if $i is greater than total.
                  if( $i >= $end_count ) {
                    $i = 0; // reset the value of $i.
                  } else {
                    $i++; // increment $i by 1.
                  }
                  ?>

						 		<?php endif; ?>
						 	</a>
							<h3 class="entry-title"><?php echo get_the_title(); ?></h3>

						 </article>
						 <?php

					 } elseif( get_post_type() == 'mls' OR is_tax('mls_cats') ) {
						 get_template_part( 'template-parts/post/mls', 'content' );
					 } else {
						 get_template_part( 'template-parts/post/content', get_post_format() );
					 }


        endwhile;

        the_posts_pagination( array(
          'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
          'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
          'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
        ) );

      else :

        get_template_part( 'template-parts/post/content', 'none' );

      endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
