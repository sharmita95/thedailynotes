<?php
/**
 * Template loop for gird style
 */
?>
<article id="post-<?php the_ID(); ?>" class="item item-masonry grid-masonry grid-masonry-2">
	<?php if ( has_post_format( 'gallery' ) ) : ?>
		<?php $images = get_post_meta( get_the_ID(), '_format_gallery_images', true ); ?>
		<?php if ( $images ) : ?>
			<div class="thumbnail">
				<div class="penci-slick-slider" data-auto-height="true">
					<?php foreach ( $images as $image ) : ?>

						<?php $the_image = wp_get_attachment_image_src( $image, 'penci-masonry-thumb' ); ?>
						<?php $the_caption = get_post_field( 'post_excerpt', $image ); ?>
						<figure>
							<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $the_image[0] ); ?>" alt="<?php the_title(); ?>" <?php if ($the_caption) : ?>title="<?php echo esc_attr( $the_caption ); ?>"<?php endif; ?> /></a>
						</figure>

					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	<?php elseif ( has_post_thumbnail() ) : ?>
		<div class="thumbnail">
			<?php
			/* Display Review Piechart  */
			if( function_exists('penci_display_piechart_review_html') ) {
				penci_display_piechart_review_html( get_the_ID() );
			}
			?>
			<a href="<?php the_permalink() ?>" class="post-thumbnail">
				<?php the_post_thumbnail( 'penci-masonry-thumb' ); ?>
			</a>
			<?php if( ! get_theme_mod('penci_grid_icon_format') ): ?>
				<?php if ( has_post_format( 'video' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format"><i class="fa fa-play"></i></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'audio' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format"><i class="fa fa-music"></i></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'link' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format"><i class="fa fa-link"></i></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'quote' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format"><i class="fa fa-quote-left"></i></a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="grid-header-box">
		<?php if ( ! get_theme_mod( 'penci_grid_cat' ) ) : ?>
			<span class="cat"><?php penci_category( '' ); ?></span>
		<?php endif; ?>
		<h2 class="grid-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php if ( ! get_theme_mod( 'penci_grid_date' ) || ! get_theme_mod( 'penci_grid_author' ) ) : ?>
			<div class="grid-post-box-meta">
				<?php if ( ! get_theme_mod( 'penci_grid_author' ) ) : ?>
					<span class="author-italic"><?php esc_html_e( 'by ', 'soledad' ); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
				<?php endif; ?>
				<?php if ( ! get_theme_mod( 'penci_grid_date' ) ) : ?>
					<span><?php the_time( get_option('date_format') ); ?></span>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="item-content">
		<?php the_excerpt(); ?>
	</div>

	<?php if( get_theme_mod( 'penci_grid_add_readmore' ) ): ?>
		<div class="penci-readmore-btn">
			<a class="penci-btn-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'soledad' ); ?><i class="fa fa-angle-double-right"></i></a>
		</div>
	<?php endif; ?>

	<?php if ( ! get_theme_mod( 'penci_grid_share_box' ) ) : ?>
		<div class="penci-post-box-meta penci-post-box-grid">
			<div class="penci-post-share-box">
				<?php echo penci_getPostLikeLink( get_the_ID() ); ?>
				<?php
				$twitter_text = 'Check out this article';
				if( get_theme_mod( 'penci_post_twitter_share_text' ) ){
					$twitter_text = get_theme_mod( 'penci_post_twitter_share_text' );
				}
				$twitter_text = trim( $twitter_text );
				$twitter_text_process = str_replace( ' ', '%20', $twitter_text );
				$facebook_share  = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink();
				$twitter_share   = 'https://twitter.com/intent/tweet?text=' . $twitter_text_process . ':%20' . get_the_title() . '%20-%20' . get_the_permalink();
				$google_share    = 'https://plus.google.com/share?url=' . get_the_permalink();
				$pinterest_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
				$pinterest_share = 'https://pinterest.com/pin/create/button/?url=' . get_the_permalink() . '&media=' . $pinterest_image . '&description=' . get_the_title();
				?>
				<a target="_blank" href="<?php echo esc_url( $facebook_share ); ?>"><i class="fa fa-facebook"></i><span class="dt-share"><?php esc_html_e( 'Facebook', 'soledad' ); ?></span></a>
				<a target="_blank" href="<?php echo esc_url( $twitter_share ); ?>"><i class="fa fa-twitter"></i><span class="dt-share"><?php esc_html_e( 'Twitter', 'soledad' ); ?></span></a>
				<a target="_blank" href="<?php echo esc_url( $google_share ); ?>"><i class="fa fa-google-plus"></i><span class="dt-share"><?php esc_html_e( 'Google +', 'soledad' ); ?></span></a>
				<a data-pin-do="none" target="_blank" href="<?php echo esc_url( $pinterest_share ); ?>"><i class="fa fa-pinterest"></i><span class="dt-share"><?php esc_html_e( 'Pinterest', 'soledad' ); ?></span></a>
			</div>
		</div>
	<?php endif; ?>
</article>