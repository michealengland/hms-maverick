<?php
/**
* Roost Real Estate Agents CPT & Taxonomy
* PARENT: page.php
* Plugin Requirement: CPT UI
*/


if( is_archive() ) : ?>

<?php elseif( is_tax() ) : ?>

<h1>Roost Agent Tax</h1>

<?php elseif( is_singular() ) : ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="post-meta">
      <?php hms_breadcrumbs(); ?>

      <?php if( function_exists('get_field') ) :
      // Get Fields
      $realtor_facebook_url = get_field('realtor_facebook_url');
      $realtor_phone = get_field('realtor_phone_number');
      $hms_pre_formatted_phone = $realtor_phone;
      ?>

        <?php if( $realtor_facebook_url ) : ?>
          <a class="facebook-button" href="<?php echo $realtor_facebook_url; ?>" title="Facebook {Agent Name}" target="_blank"><span>Connect on Facebook</span></a><br>
          <?php echo hms_format_phone( $hms_pre_formatted_phone ); ?>
        <?php endif; ?>

        <?php if( $realtor_phone ) : ?>
          <?php hms_format_phone( $hms_pre_formatted_phone ); ?>
        <?php endif; ?>

      <?php endif; ?>

    </div>

  	<?php
    // Post Header
  	if( has_post_thumbnail() ) :
  		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

  		// Calculate aspect ratio: h / w * 100%.
  		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
  		?>

      <header class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php if( function_exists('get_field') ) :
          $realtor_position = get_field('realtor_position_title');

          if( $realtor_position ) {
          echo '<p class="position-title" >Your Roost ' . $realtor_position . '</p>';
          }
        endif; ?>

      </header><!-- .page-header -->

  	<?php else : ?>
  		<header class="page-header">
  			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  		</header><!-- .page-header -->
  	<?php endif; ?>


      <?php the_content(); ?>


    <aside id="realtor-footer" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'twentyseventeen' ); ?>">
  		<?php dynamic_sidebar('agents-footer-widgets'); ?>
  	</aside><!-- #secondary -->


  </article><!-- #post-## -->

<?php endif; ?>
