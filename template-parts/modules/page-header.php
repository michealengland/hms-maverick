<?php
/**
* Assign class if has featured.
*/
if( has_post_thumbnail() && is_single() ){

  $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

  // Calculate aspect ratio: h / w * 100%.
  $ratio = $thumbnail[2] / $thumbnail[1] * 100;

  $header_featured_bg = esc_url( $thumbnail[0]);
} else {
  $header_featured_bg = '';
}
?>

<?php if( $header_featured_bg ) : ?>
<header class="page-header has-featured alignfull" style="background-image: url(<?php echo $header_featured_bg; ?>);">
<?php else : ?>
<header class="page-header">
<?php endif; ?>

  <div class="inner-wrap">
    <?php
    if ( is_single() ) {

      the_title( '<h1 class="entry-title">', '</h1>' );
      hms_breadcrumbs();

    } elseif ( is_home() && ! is_front_page() ) {

      single_post_title( '<h1 class="page-title">', '</h1>' );
      
    } elseif( is_post_type_archive() ) {

      echo '<h1 class="page-title">' . post_type_archive_title( '', false ) . '</h1>';
      the_archive_description( '<div class="taxonomy-description">', '</div>' );

    } elseif( is_tax() OR is_category() ) {

      the_archive_title( '<h1 class="page-title">', '</h1>' );

      if( get_post_type() == 'post' ) {
        hms_breadcrumbs();
      }
      
      the_archive_description( '<div class="taxonomy-description">', '</div>' );

    } elseif( is_page() ) {

      the_title( '<h1 class="entry-title">', '</h1>' );

      ?>
      
      <?php if( is_page(32) OR is_page(35)  ) : ?>
        <ul class="page-content-header-menu">
          <li><a class="listings-button meta-menu-link" href="<?php echo esc_url( get_term_link( 'mls-listings', 'mls_cats' ) ); ?>" title="View Our Listings" target="_blank"><span>View Listings</span></a></li>
          <li><a class="search-button meta-menu-link" href="<?php echo esc_url( get_term_link( 'mls-search', 'mls_cats' ) ); ?>" title="Search Our Listings" target="_blank"><span>Search Listings</span></a></li>
        </ul>
      <?php endif; ?>
      
      
      <?php if( is_page(44) ) : ?>
        <ul class="page-content-header-menu">
        <li><a class="meta-menu-link" href="<?php echo esc_url( get_term_link( 'mls-rental-units', 'mls_cats' ) ); ?>" title="View available rental units" target="_blank"><span>Availabe Rental Units</span></a></li>
      </ul>
      <?php endif; ?>

      <?php
    } else {
      the_title( '<h1 class="entry-title">', '</h1>' );
    }

    if ( is_singular('post') ) {
      echo '<span class="entry-meta">';
      if ( is_single() ) {
        twentyseventeen_posted_on();
      } else {
        echo twentyseventeen_time_link();
        twentyseventeen_edit_link();
      };
      echo '</span><!-- .entry-meta -->';
    };
    ?>
  </div>

</header><!-- .entry-header -->
