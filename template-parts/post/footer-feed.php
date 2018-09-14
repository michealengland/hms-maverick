<?php
/**
* Output the attachment image and adjust $i during the loop.
* @param mav_post_thumbnail_iterator( $attachment_id = img id, $i = int, $image_count = int )
*/
function mav_post_thumbnail_iterator( $attachment_id, $i, $image_count ) {

  // Get random img ID from $img_defaults
  echo wp_get_attachment_image( $attachment_id, 'thumbnail', true);

  // check if $i is greater than total.
  if( $i >= $image_count ) {
    return $i = 0; // reset the value of $i.
  } else {
    return $i++; // increment $i by 1.
  }
}
?>

    <?php
    if( is_singular() ) {

      // Check for Yoast Class to see then get Primary Category term
      if( class_exists( 'WPSEO_Primary_Term' ) ) {
        $cat_primary_term = new WPSEO_Primary_Term( 'category', get_the_ID() );
        $cat_term = $cat_primary_term->get_primary_term(); // Category Term
        $cat_link =
        $cat_name = get_cat_name($cat_term);   // Category Name
        $cat_slug = get_category_link($cat_term); // Category Slug
      } else {
        $cat_primary_term = '';
        $cat_term = ''; // Category Term
        $cat_name = '';   // Category Name
        $cat_slug = ''; // Category Slug
      }

      /**
      * 1. Get ACF Gallery field array if plugins is active
      * 2. $cat specifies which taxonomy to check
      */
      if( function_exists( 'get_field' ) ) {
        $post_thubmnail_defaults = get_field( 'term_gallery', $cat_term ); // returns array
      }


      // Assign Array
      if( $post_thubmnail_defaults ) {
        $img_defaults = array_column( $post_thubmnail_defaults, 'ID' ); // Returns an array of image ID's from ACF Gallery.
      } else {
        $img_defaults = array( 899, 900, 901 ); // Back Up Images
      }


      // randomize array order.
      shuffle($img_defaults);

      $i = 0;                            // set array count start
      $image_count = count( $img_defaults ); // Array Integer Max
      $image_count--;                        // Offset count for array


    } else {

      $img_defaults = '';
      $i= '';
      $image_count = '';

    }

    $attachment_id = $img_defaults[$i];

    $args = array(
    'post_type'              => 'post',
    'category_name'          => $cat_slug,
    'post_status'            => array( 'publish' ),
    'has_password'           => false,
    'order'                  => 'ASC',
    'orderby'                => 'date',
    'post__not_in'           => array( get_the_ID() ),
    'posts_per_page'         => '3', // Unsure why this must be three inorder to make 4?
    );

    // The Query
    $recent_posts = new WP_Query( $args );

    // The Loop
    if ( $recent_posts->have_posts() ) : ?>

    <!-- Column Title -->
    <?php if( is_singular('post') ) : ?>

      <?php
      if ( ! empty( $cat_slug && $cat_name ) ) {
          echo '<h3 class="entry-title"><a href="' . esc_url( $cat_slug ) . '">' . esc_html( $cat_name ) . '</a></h3>';
      }
      ?>

    <?php elseif( ! is_singular('post') ) : ?>
      <h3 class="entry-title"><?php echo $term->name; ?></h3>
    <?php endif; ?>
    <div class="post-feed">

      <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>

        <article class="post">
         <a href="<?php echo get_the_permalink(); ?>" alt="<?php echo esc_attr_e( get_the_title() ); ?>">

           <?php if( has_post_thumbnail() ) : ?>

             <?php echo get_the_post_thumbnail($post, 'thumbnail', true ); ?>

           <?php else : ?>

             <?php mav_post_thumbnail_iterator( $attachment_id, $i, $image_count ); ?>

           <?php endif; ?>
         </a>

         <h3 class="entry-title"><?php the_title(); ?></h3>

        </article>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    </div>
    <?php endif; ?>

</div>
