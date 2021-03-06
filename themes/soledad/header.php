<?php
/**
 * The Header for our theme
 *
 * @package    WordPress
 * @since      1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if ( get_theme_mod( 'penci_favicon' ) ) : ?>
		<link rel="shortcut icon" href="<?php echo esc_url( get_theme_mod( 'penci_favicon' ) ); ?>" type="image/x-icon" />
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_theme_mod( 'penci_favicon' ) ); ?>">
	<?php endif; ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?> Atom Feed" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<style type="text/css">
		.featured-carousel .item { opacity: 1; }
	</style>
	<![endif]-->
	<?php wp_head(); ?>
	<meta name="google-site-verification" content="akFy5NxC8VrFjZRWDAoNtqFNgSDHDLC5rVu1L4VfjbY" />
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src=""https://www.googletagmanager.com/gtag/js?id=G-NWR5YJ5TYM""></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-NWR5YJ5TYM');
    </script>
    
    <!-- Owner Verification by BuySellGuestPost  -->
    <!-- <script>
        window.location.replace('https://www.buysellguestpost.com/frontend/verifyowner?userid=1af247e88db0afe0fa886fc2b943da6c0160fb6f8931f08d4338ad2e00de79d3b6707f6c8ff9f9f9d2224926cc8e0f2c3ab83bcbb657b987189dbf00470b4d48&pro_id=6bd22cecbb87a06989a2456d078adf2506ef023b4e5b0dd17799c80a37ac6a81380f779ced28d735408db8a516bd5bbfa2325e03f18bec8015a62218a445beb7');
    </script> -->

    <meta property="og:image" content="https://thedailynotes.com/wp-content/uploads/2019/05/C1_R1.png" />
    <meta property="fb:app_id" content="297467120636009" />

</head>

<body <?php body_class(); ?>>
<?php
/**
 * Get header layout in your customizer to change header layout
 *
 * @author PenciDesign
 */
$header_layout = get_theme_mod( 'penci_header_layout' );
if ( ! isset( $header_layout ) || empty( $header_layout ) ) {
	$header_layout = 'header-1';
}
?>
<a id="close-sidebar-nav" class="<?php echo esc_attr( $header_layout ); ?>"><i class="fa fa-close"></i></a>

<nav id="sidebar-nav" class="<?php echo esc_attr( $header_layout ); ?>">

	<?php if ( ! get_theme_mod( 'penci_header_logo_vertical' ) ) : ?>
		<div id="sidebar-nav-logo">
			<?php if ( get_theme_mod( 'penci_mobile_nav_logo' ) ) { ?>
				<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'penci_mobile_nav_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
			<?php } elseif( get_theme_mod( 'penci_logo' ) ) { ?>
				<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'penci_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
			<?php } else { ?>
				<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/mobile-logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
			<?php } ?>
		</div>
	<?php endif; ?>

	<?php if ( ! get_theme_mod( 'penci_header_social_check' ) ) : ?>
		<?php if ( get_theme_mod( 'penci_email_me' ) || get_theme_mod( 'penci_vk' ) || get_theme_mod( 'penci_facebook' ) || get_theme_mod( 'penci_twitter' ) || get_theme_mod( 'penci_google' ) || get_theme_mod( 'penci_instagram' ) || get_theme_mod( 'penci_pinterest' ) || get_theme_mod( 'penci_linkedin' ) || get_theme_mod( 'penci_flickr' ) || get_theme_mod( 'penci_behance' ) || get_theme_mod( 'penci_tumblr' ) || get_theme_mod( 'penci_youtube' ) || get_theme_mod( 'penci_rss' ) ) : ?>
			<div class="header-social sidebar-nav-social">
				<?php include( trailingslashit( get_template_directory() ). 'inc/modules/socials.php' ); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	/**
	 * Display main navigation
	 */
	wp_nav_menu( array(
		'container'      => false,
		'theme_location' => 'main-menu',
		'menu_class'     => 'menu',
		'fallback_cb'    => 'penci_menu_fallback',
		'walker'         => new penci_menu_walker_nav_menu()
	) );
	?>
</nav>

<!-- .wrapper-boxed -->
<div class="wrapper-boxed header-style-<?php echo esc_attr( $header_layout ); ?><?php if ( get_theme_mod( 'penci_body_boxed_layout' ) ) : echo ' enable-boxed'; endif;?>">

<!-- Top Bar -->
<?php if( get_theme_mod( 'penci_top_bar_show' ) ): ?>
	<?php get_template_part( 'inc/modules/topbar' ); ?>
<?php endif; ?>

<?php if ( $header_layout == 'header-1' || $header_layout == 'header-4' ) : ?>
<!-- Navigation -->
<nav id="navigation" class="header-layout-top <?php echo esc_attr( $header_layout ); ?><?php if( get_theme_mod( 'penci_disable_sticky_header' ) ): echo ' penci-disable-sticky-nav'; endif; /* Check for disable sticky header */ ?>">
	<div class="container">
		<div class="button-menu-mobile <?php echo esc_attr( $header_layout ); ?>"><i class="fa fa-bars"></i></div>
		<?php
		/**
		 * Display main navigation
		 */
		wp_nav_menu( array(
			'container'      => false,
			'theme_location' => 'main-menu',
			'menu_class'     => 'menu',
			'fallback_cb'    => 'penci_menu_fallback',
			'walker'         => new penci_menu_walker_nav_menu()
		) );
		?>

		<?php if ( class_exists( 'WooCommerce' ) && ! get_theme_mod( 'penci_woo_shop_hide_cart_icon' ) && ( ( get_theme_mod( 'penci_header_layout' ) == 'header-4' ) || ( get_theme_mod( 'penci_header_layout' ) == 'header-5' ) ) ): ?>
			<div id="top-search" class="shoping-cart-icon<?php if( get_theme_mod( 'penci_topbar_search_check' ) ): echo ' clear-right'; endif; ?>"><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-cart"></i><span><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span></a></div>
		<?php endif; ?>

		<?php if ( ! get_theme_mod( 'penci_topbar_search_check' ) ) : ?>
			<div id="top-search">
				<a class="search-click"><i class="fa fa-search"></i></a>
				<div class="show-search">
					<?php get_search_form(); ?>
					<a class="search-click close-search"><i class="fa fa-close"></i></a>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( class_exists( 'WooCommerce' ) && ! get_theme_mod( 'penci_woo_shop_hide_cart_icon' ) && ( get_theme_mod( 'penci_header_layout' ) != 'header-4' ) && ( get_theme_mod( 'penci_header_layout' ) != 'header-5' ) ): ?>
			<div id="top-search" class="shoping-cart-icon<?php if( get_theme_mod( 'penci_topbar_search_check' ) ): echo ' clear-right'; endif; ?>"><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-cart"></i><span><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span></a></div>
		<?php endif; ?>

	</div>
</nav><!-- End Navigation -->
<?php endif; /* End check if header layout is 1 */?>

<header id="header" class="header-<?php echo esc_attr( $header_layout ); ?><?php if( ( ( ! is_home() || ! is_front_page() ) && ! get_theme_mod( 'penci_featured_slider_all_page' ) ) || ( ( is_home() || is_front_page() ) && ! get_theme_mod( 'penci_featured_slider' ) ) ): ?> has-bottom-line<?php endif;?>"><!-- #header -->
	<?php if ( $header_layout != 'header-6' ): ?>
	<div class="inner-header">
		<div class="container<?php if( $header_layout == 'header-3' ): echo ' align-left-logo'; if( get_theme_mod( 'penci_header_3_banner' ) || get_theme_mod( 'penci_header_3_adsense' ) ): echo ' has-banner'; endif; endif;?>">

			<div id="logo">
				<?php if ( ! get_theme_mod( 'penci_logo' ) ) : ?>
					<?php if ( is_home() || is_front_page() ) : ?>
						<h1>
							<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
						</h1>
					<?php else : ?>
						<h2>
							<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
						</h2>
					<?php endif; ?>
				<?php else : ?>
					<?php if ( is_home() || is_front_page() ) : ?>
						<h1>
							<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'penci_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
						</h1>
					<?php else : ?>
						<h2>
							<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'penci_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
						</h2>
					<?php endif; ?>
				<?php endif; ?>
			</div>

			<?php if( ( get_theme_mod( 'penci_header_3_adsense' ) || get_theme_mod( 'penci_header_3_banner' ) ) && $header_layout == 'header-3' ): ?>
				<?php
				$banner_img = get_theme_mod( 'penci_header_3_banner' );
				$open_banner_url = '';
				$close_banner_url = '';
				if( get_theme_mod( 'penci_header_3_banner_url' ) ):
					$banner_url = get_theme_mod( 'penci_header_3_banner_url' );
					$open_banner_url = '<a href="'. esc_url( $banner_url ) .'" target="_blank">';
					$close_banner_url = '</a>';
				endif;
				?>
				<div class="header-banner header-style-3">
					<?php if( get_theme_mod( 'penci_header_3_adsense' ) ):  echo get_theme_mod( 'penci_header_3_adsense' ); endif; ?>
					<?php if( get_theme_mod( 'penci_header_3_banner' ) && ! get_theme_mod( 'penci_header_3_adsense' ) ): ?>
						<?php echo wp_kses( $open_banner_url, penci_allow_html() ); ?><img src="<?php echo esc_url( $banner_img ); ?>" alt="Banner" /><?php echo wp_kses( $close_banner_url, penci_allow_html() ); ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'penci_header_slogan_text' ) && $header_layout != 'header-3' ) : ?>
				<div class="header-slogan">
					<h2 class="header-slogan-text"><?php echo get_theme_mod( 'penci_header_slogan_text' ); ?></h2>
				</div>
			<?php endif; ?>

			<?php if ( ! get_theme_mod( 'penci_header_social_check' ) && $header_layout != 'header-3' ) : ?>
				<?php if ( get_theme_mod( 'penci_email_me' ) || get_theme_mod( 'penci_vk' ) || get_theme_mod( 'penci_facebook' ) || get_theme_mod( 'penci_twitter' ) || get_theme_mod( 'penci_google' ) || get_theme_mod( 'penci_instagram' ) || get_theme_mod( 'penci_pinterest' ) || get_theme_mod( 'penci_linkedin' ) || get_theme_mod( 'penci_flickr' ) || get_theme_mod( 'penci_behance' ) || get_theme_mod( 'penci_tumblr' ) || get_theme_mod( 'penci_youtube' ) || get_theme_mod( 'penci_rss' ) ) : ?>
					<div class="header-social">
						<?php include( trailingslashit( get_template_directory() ). 'inc/modules/socials.php' ); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; /* End check if header is layout 6 */ ?>

	<?php if ( $header_layout == 'header-2' || $header_layout == 'header-3' || $header_layout == 'header-5' || $header_layout == 'header-6' ) : ?>
		<!-- Navigation -->
		<nav id="navigation" class="header-layout-bottom <?php echo esc_attr( $header_layout ); ?><?php if( get_theme_mod( 'penci_disable_sticky_header' ) ): echo ' penci-disable-sticky-nav'; endif; /* Check for disable sticky header */ ?>">
			<div class="container">
				<div class="button-menu-mobile <?php echo esc_attr( $header_layout ); ?>"><i class="fa fa-bars"></i></div>
				<?php if ( $header_layout == 'header-6' ): ?>
					<div id="logo">
						<?php if ( ! get_theme_mod( 'penci_logo' ) ) : ?>
							<?php if ( is_home() || is_front_page() ) : ?>
								<h1>
									<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
								</h1>
							<?php else : ?>
								<h2>
									<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
								</h2>
							<?php endif; ?>
						<?php else : ?>
							<?php if ( is_home() || is_front_page() ) : ?>
								<h1>
									<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'penci_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
								</h1>
							<?php else : ?>
								<h2>
									<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'penci_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
								</h2>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php
				/**
				 * Display main navigation
				 */
				wp_nav_menu( array(
					'container'      => false,
					'theme_location' => 'main-menu',
					'menu_class'     => 'menu',
					'fallback_cb'    => 'penci_menu_fallback',
					'walker'         => new penci_menu_walker_nav_menu()
				) );
				?>

				<?php if ( class_exists( 'WooCommerce' ) && ! get_theme_mod( 'penci_woo_shop_hide_cart_icon' ) && ( ( get_theme_mod( 'penci_header_layout' ) == 'header-4' ) || ( get_theme_mod( 'penci_header_layout' ) == 'header-5' ) ) ): ?>
					<div id="top-search" class="shoping-cart-icon<?php if( get_theme_mod( 'penci_topbar_search_check' ) ): echo ' clear-right'; endif; ?>"><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-cart"></i><span><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span></a></div>
				<?php endif; ?>

				<?php if ( ! get_theme_mod( 'penci_topbar_search_check' ) ) : ?>
					<div id="top-search">
						<a class="search-click"><i class="fa fa-search"></i></a>
						<div class="show-search">
							<?php get_search_form(); ?>
							<a class="search-click close-search"><i class="fa fa-close"></i></a>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( class_exists( 'WooCommerce' ) && ! get_theme_mod( 'penci_woo_shop_hide_cart_icon' ) && ( get_theme_mod( 'penci_header_layout' ) != 'header-4' ) && ( get_theme_mod( 'penci_header_layout' ) != 'header-5' ) ): ?>
					<div id="top-search" class="shoping-cart-icon<?php if( get_theme_mod( 'penci_topbar_search_check' ) ): echo ' clear-right'; endif; ?>"><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-cart"></i><span><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span></a></div>
				<?php endif; ?>
			</div>
		</nav><!-- End Navigation -->
	<?php endif; /* End check if header layout is layout 2 */?>
</header>
<!-- end #header -->

<?php
/**
 * Display sign-up mailchimp form below the header
 * Check if 'header-signup-form' has widget, if true display it
 *
 * @since 2.0
 */
if ( is_active_sidebar( 'header-signup-form' ) ): ?>
	<div class="penci-header-signup-form">
		<div class="container">
			<?php dynamic_sidebar( 'header-signup-form' ); ?>
		</div>
	</div>
<?php endif; ?>

<?php
/**
 * Get feature slider
 */
if( is_home() || get_theme_mod( 'penci_featured_slider_all_page' ) ) {
	if( get_theme_mod( 'penci_enable_featured_video_bg' ) && get_theme_mod( 'penci_featured_video_url' ) ) {
			get_template_part( 'inc/featured_slider/featured_video' );
	} else {
		if ( get_theme_mod( 'penci_featured_slider' ) == true ) :
			if( get_theme_mod( 'penci_featured_slider_style' ) == 'style-10' && get_theme_mod( 'penci_feature_rev_sc' ) ){
			$rev_shortcode = get_theme_mod( 'penci_feature_rev_sc' );
			?>
				<div class="featured-area style-4 style-10 loaded loaded-wait">
					<?php echo do_shortcode( $rev_shortcode ); ?>
				</div>
			<?php
			} elseif( get_theme_mod( 'penci_featured_slider_style' ) == 'style-11' && get_theme_mod( 'penci_feature_rev_sc' ) ) {
			$rev_shortcode = get_theme_mod( 'penci_feature_rev_sc' );
			?>
				<div class="featured-area style-11 loaded loaded-wait">
					<?php echo do_shortcode( $rev_shortcode ); ?>
				</div>
			<?php
			} elseif( get_theme_mod( 'penci_featured_slider_style' ) == 'style-6' ) {
				get_template_part( 'inc/featured_slider/magazine_slider' );
			} elseif ( get_theme_mod( 'penci_featured_slider_style' ) == 'style-8' ) {
				get_template_part( 'inc/featured_slider/magazine_slider_2' );
			} elseif ( get_theme_mod( 'penci_featured_slider_style' ) == 'style-9' ) {
				get_template_part( 'inc/featured_slider/magazine_slider_3' );
			} elseif( get_theme_mod( 'penci_featured_slider_style' ) == 'style-4' || get_theme_mod( 'penci_featured_slider_style' ) == 'style-5' ) {
				get_template_part( 'inc/featured_slider/featured_penci_slider' );
			} else {
				get_template_part( 'inc/featured_slider/featured_slider' );
			}
		endif;
	}
}
?>