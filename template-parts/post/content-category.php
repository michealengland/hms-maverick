<article class="post">
	<a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr_e( get_the_title() ); ?>">

		<?php if( has_post_thumbnail() ) : ?>

			<?php echo get_the_post_thumbnail($post, 'thumbnail', true ); ?>

		<?php else : ?>

			<?php
			/**
			* @file site-functions.php
			* default_img_id( array( INT )
			*/
			echo wp_get_attachment_image( $thumbnail_id, 'thumbnail', true);
			?>

		<?php endif; ?>

		<h3 class="entry-title"><?php echo get_the_title(); ?></h3>
	</a>

</article>
