<?php
/**
 * Template Name: Custom Blog Page
 *
 * @package Wordpress
 * @since   2.3
 */

get_header();

/* Sidebar position */
$sidebar_position = 'right-sidebar';
if ( get_theme_mod( "penci_left_sidebar_archive" ) ) {
	$sidebar_position = 'left-sidebar';
}
$featured_boxes = get_post_meta( get_the_ID(), 'penci_page_display_featured_boxes', true );
$pagetitle = get_post_meta( $post->ID, 'penci_page_display_title', true );
$breadcrumb = get_post_meta( get_the_ID(), 'penci_page_breadcrumb', true );

/* Categories layout */
$layout_this = get_theme_mod( 'penci_archive_layout' );
if ( ! isset( $layout_this ) || empty( $layout_this ) ): $layout_this = 'standard'; endif;
$class_layout = '';
if ( $layout_this == 'classic' ): $class_layout = ' classic-layout'; endif;

$page_meta = get_post_meta( get_the_ID(), 'penci_page_slider', true );
if( in_array( $page_meta, array('style-1', 'style-2', 'style-3', 'style-4', 'style-5', 'style-6', 'style-7', 'style-8', 'style-9', 'video' ) ) ) {
	if( $page_meta == 'video' && get_theme_mod( 'penci_featured_video_url' ) ) {
		get_template_part( 'inc/featured_slider/featured_video' );
	} else {
		if( $page_meta == 'style-6' ) {
			get_template_part( 'inc/featured_slider/magazine_slider' );
		} elseif ( $page_meta == 'style-8' ) {
			get_template_part( 'inc/featured_slider/magazine_slider_2' );
		} elseif ( $page_meta == 'style-9' ) {
			get_template_part( 'inc/featured_slider/magazine_slider_3' );
		} elseif( $page_meta == 'style-4' || $page_meta == 'style-5' ) {
			get_template_part( 'inc/featured_slider/featured_penci_slider' );
		} else {
			get_template_part( 'inc/featured_slider/featured_slider' );
		}
	}
}

/* Display Featured Boxes */
if ( $featured_boxes == 'yes' && ! get_theme_mod( 'penci_home_hide_boxes' ) && ( get_theme_mod( 'penci_home_box_img1' ) || get_theme_mod( 'penci_home_box_img2' ) || get_theme_mod( 'penci_home_box_img3' ) || get_theme_mod( 'penci_home_box_img4' ) ) ):
	get_template_part( 'inc/modules/home_boxes' );
endif;
?>

<?php if( ! get_theme_mod( 'penci_disable_breadcrumb' ) && ( 'no' != $breadcrumb )  ): ?>
	<div class="container penci-breadcrumb">
		<span><a class="crumb" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'soledad' ); ?></a></span><i class="fa fa-angle-right"></i>
		<span><?php the_title(); ?></span>
	</div>
<?php endif; ?>

<div class="container<?php echo esc_attr( $class_layout );
if ( get_theme_mod( 'penci_sidebar_archive' ) ) : ?> penci_sidebar <?php echo esc_attr( $sidebar_position ); ?><?php endif; ?>">
	<div id="main" class="penci-layout-<?php echo esc_attr( $layout_this ); ?><?php if ( get_theme_mod( 'penci_sidebar_sticky' ) ): ?> penci-main-sticky-sidebar<?php endif; ?>">
		<div class="theiaStickySidebar">
			<?php if( get_the_title() && ( 'no' != $pagetitle ) ): ?>
			<div class="archive-box">
				<div class="title-bar">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
			<?php endif; ?>

			<?php
			$paged = max( get_query_var( 'paged' ), get_query_var( 'page' ), 1 );

			$args = array( 'post_type' => 'post', 'paged' => $paged );

			$query_custom = new WP_Query( $args );

			if ( $query_custom->have_posts() ) : ?>
				<?php if ( in_array( $layout_this, array( 'mixed', 'mixed-2', 'overlay-grid', 'overlay-list', 'photography', 'grid', 'grid-2', 'list', 'boxed-1', 'boxed-2', 'boxed-3', 'standard-grid', 'standard-grid-2', 'standard-list', 'standard-boxed-1', 'classic-grid', 'classic-grid-2', 'classic-list', 'classic-boxed-1', 'magazine-1', 'magazine-2' ) ) ) : ?><ul class="penci-grid"><?php endif; ?>
				<?php if ( in_array( $layout_this, array( 'masonry', 'masonry-2' ) ) ) : ?>
				<div class="penci-wrap-masonry">
				<div class="masonry penci-masonry"><?php endif; ?>

				<?php /* The loop */
				while ( $query_custom->have_posts() ) : $query_custom->the_post();
					include( locate_template( 'content-' . $layout_this . '.php' ) );
				endwhile;
				?>

				<?php if ( in_array( $layout_this, array( 'masonry', 'masonry-2' ) ) ) : ?></div></div><?php endif; ?>
				<?php if ( in_array( $layout_this, array( 'mixed', 'mixed-2', 'overlay-grid', 'overlay-list', 'photography', 'grid', 'grid-2', 'list', 'boxed-1', 'boxed-2', 'boxed-3', 'standard-grid', 'standard-grid-2', 'standard-list', 'standard-boxed-1', 'classic-grid', 'classic-grid-2', 'classic-list', 'classic-boxed-1', 'magazine-1', 'magazine-2' ) ) ) : ?></ul><?php endif; ?>

				<?php echo penci_pagination_numbers( $query_custom ); ?>

			<?php endif;
			wp_reset_postdata(); /* End if of the loop */ ?>
		</div>
	</div>

<?php if ( get_theme_mod( 'penci_sidebar_archive' ) ) : ?><?php get_sidebar(); ?><?php endif; ?>

<?php get_footer(); ?>