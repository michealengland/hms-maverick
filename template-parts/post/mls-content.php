<?php if( is_post_type_archive() OR is_tax() ) : ?>

	<article class="post">

		<a href="<?php echo get_the_permalink(); ?>" title="<?php echo esc_attr_e( get_the_title() ); ?>">
			<?php
	    if( has_post_thumbnail() ){
	      echo get_the_post_thumbnail($post, 'medium', true);
	    } else {
	      echo '<img src="https://dummyimage.com/600x400/000/fff" alt="" width="600" height="400">';
	    }
	    ?>
		</a>

		<h2 class="entry-title"><?php echo get_the_title(); ?></h2>

	</article>

<?php elseif( is_tax() ) : ?>


	<article class="post">
		<a href="<?php echo get_the_permalink(); ?>" title="<?php echo esc_attr_e( get_the_title() ); ?>">
			<?php
	    if( has_post_thumbnail() ){
	      echo get_the_post_thumbnail($post, 'medium', true);
	    } else {
	      echo '<img src="https://dummyimage.com/600x400/000/fff" alt="" width="600" height="400">';
	    }
	    ?>
		</a>
		<h2 class="entry-title"><?php echo get_the_title(); ?></h2>
	</article>

<?php elseif( is_singular() ) : ?>

  <header class="page-header">
    <div class="inner-wrap">
    <?php
    if ( is_single() ) {
      the_title( '<h1 class="entry-title">', '</h1>' );
      echo hms_breadcrumbs();
    } elseif ( is_front_page() && is_home() ) {
      the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
    } else {
      the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    }

    if ( 'post' === get_post_type() ) {
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
  <div class="entry-content">

    <?php
    /**
    * Display Iframe
    */
    if( function_exists('get_field') ) {
      $mls_url_iframe = get_field( 'mls_url_iframe' );

      // Return ACF
      if( $mls_url_iframe ) {
      echo '<div class="mls-embed"><iframe src="' . $mls_url_iframe . '" width="100%" height="650" frameborder="0"></iframe></div>';
      }

    } else {
      echo '<p>Content not found.</p>';
    }
    ?>
    <iframe src="//link.flexmls.com/1amxj0ver0ib,17" width="100%" height="650" frameborder="0"></iframe>
  </div>

<?php endif; ?>
