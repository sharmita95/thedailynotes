<?php
/**
 * Template loop for gird style
 */
?>
<div class="grid-style grid-mixed">
	<article id="post-<?php the_ID(); ?>" class="item">

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="thumbnail thumb-left">
				<?php
				/* Display Review Piechart  */
				if( function_exists('penci_display_piechart_review_html') ) {
					penci_display_piechart_review_html( get_the_ID() );
				}
				?>
				<a class="penci-image-holder" style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), 'penci-magazine-slider' ); ?>');" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
				</a>
			</div>
		<?php endif; ?>

		<div class="mixed-detail">
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

			<?php if ( ! get_theme_mod( 'penci_grid_share_box' ) || ! get_theme_mod( 'penci_grid_comment' ) ) : ?>
				<div class="penci-post-box-meta<?php if( get_theme_mod( 'penci_grid_share_box' ) || get_theme_mod( 'penci_grid_comment' ) ): echo ' center-inner'; endif; ?>">
					<?php if ( ! get_theme_mod( 'penci_grid_comment' ) ) : ?>
						<div class="penci-box-meta">
							<span><a href="<?php comments_link(); ?> "><i class="fa fa-comment-o"></i><?php comments_number( esc_html__( '0 comment', 'soledad' ), esc_html__( '1 comment', 'soledad' ), '% ' . esc_html__( 'comments', 'soledad' ) ); ?></a></span>
						</div>
					<?php endif; ?>
					<?php if ( ! get_theme_mod( 'penci_grid_share_box' ) ) : ?>
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
							$pinterest_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
							$pinterest_share = 'https://pinterest.com/pin/create/button/?url=' . get_the_permalink() . '&media=' . $pinterest_image . '&description=' . get_the_title();
							?>
							<a target="_blank" href="<?php echo esc_url( $facebook_share ); ?>"><i class="fa fa-facebook"></i><span class="dt-share"><?php esc_html_e( 'Facebook', 'soledad' ); ?></span></a>
							<a target="_blank" href="<?php echo esc_url( $twitter_share ); ?>"><i class="fa fa-twitter"></i><span class="dt-share"><?php esc_html_e( 'Twitter', 'soledad' ); ?></span></a>
							<a target="_blank" href="<?php echo esc_url( $google_share ); ?>"><i class="fa fa-google-plus"></i><span class="dt-share"><?php esc_html_e( 'Google +', 'soledad' ); ?></span></a>
							<a data-pin-do="none" target="_blank" href="<?php echo esc_url( $pinterest_share ); ?>"><i class="fa fa-pinterest"></i><span class="dt-share"><?php esc_html_e( 'Pinterest', 'soledad' ); ?></span></a>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="thumbnail thumb-right">
				<a href="<?php the_permalink() ?>">
					<?php the_post_thumbnail( 'penci-magazine-slider' ); ?>
				</a>
			</div>
		<?php endif; ?>

	</article>
</div>