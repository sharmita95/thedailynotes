<?php
/**
 * This is footer template of Soledad theme
 *
 * @package Wordpress
 * @since   1.0
 */
?>
<!-- END CONTAINER -->
</div>
<div class="clear-footer"></div>

<?php if ( get_theme_mod( 'penci_footer_adsense' ) ): echo '<div class="container penci-google-adsense penci-google-adsense-footer">'. get_theme_mod( 'penci_footer_adsense' ) .'</div>'; endif; ?>

<?php if ( ! get_theme_mod( 'penci_footer_widget_area' ) && ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) ) : ?>
	<div id="widget-area">
	<div class="container">
	<div class="footer-widget-wrapper">
	<?php /* Widgetised Area */
if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer-1' ) ) ?>
	</div>
	<div class="footer-widget-wrapper">
<?php /* Widgetised Area */
if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer-2' ) ) ?>
	</div>
	<div class="footer-widget-wrapper last">
<?php /* Widgetised Area */
	if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer-3' ) ) ?>
		</div>
		</div>
		</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer-instagram' ) ): ?>
	<div class="footer-instagram">
		<?php dynamic_sidebar( 'footer-instagram' ); ?>
	</div>
<?php endif; ?>

<footer id="footer-section">
	<div class="container">
		<?php if ( ! get_theme_mod( 'penci_footer_social' ) ) : ?>
			<?php if ( get_theme_mod( 'penci_email_me' ) || get_theme_mod( 'penci_vk' ) || get_theme_mod( 'penci_facebook' ) || get_theme_mod( 'penci_twitter' ) || get_theme_mod( 'penci_google' ) || get_theme_mod( 'penci_instagram' ) || get_theme_mod( 'penci_pinterest' ) || get_theme_mod( 'penci_linkedin' ) || get_theme_mod( 'penci_flickr' ) || get_theme_mod( 'penci_behance' ) || get_theme_mod( 'penci_tumblr' ) || get_theme_mod( 'penci_youtube' ) || get_theme_mod( 'penci_rss' ) ) : ?>
				<div class="footer-socials-section">
					<ul class="footer-socials">
						<?php if ( get_theme_mod( 'penci_facebook' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_facebook' ) ); ?>" target="_blank"><i class="fa fa-facebook"></i><span><?php esc_html_e( 'Facebook', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_twitter' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_twitter' ) ); ?>" target="_blank"><i class="fa fa-twitter"></i><span><?php esc_html_e( 'Twitter', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_google' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_google' ) ); ?>" target="_blank"><i class="fa fa-google-plus"></i><span><?php esc_html_e( 'Google +', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_instagram' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_instagram' ) ); ?>" target="_blank"><i class="fa fa-instagram"></i><span><?php esc_html_e( 'Instagram', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_pinterest' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_pinterest' ) ); ?>" target="_blank"><i class="fa fa-pinterest"></i><span><?php esc_html_e( 'Pinterest', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_linkedin' ) ) : ?>
							<li><a href="<?php echo esc_url( get_theme_mod( 'penci_linkedin' ) ); ?>" target="_blank"><i class="fa fa-linkedin"></i><span><?php esc_html_e( 'Linkedin', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_flickr' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_flickr' ) ); ?>" target="_blank"><i class="fa fa-flickr"></i><span><?php esc_html_e( 'Flickr', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_behance' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_behance' ) ); ?>" target="_blank"><i class="fa fa-behance"></i><span><?php esc_html_e( 'Behance', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_tumblr' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_tumblr' ) ); ?>" target="_blank"><i class="fa fa-tumblr"></i><span><?php esc_html_e( 'Tumblr', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_youtube' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_youtube' ) ); ?>" target="_blank"><i class="fa fa-youtube-play"></i><span><?php esc_html_e( 'Youtube', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_email_me' ) ) : ?>
							<li><a href="<?php echo get_theme_mod( 'penci_email_me' ); ?>"><i class="fa fa-envelope-o"></i><span><?php esc_html_e( 'Email', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_vk' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_vk' ) ); ?>" target="_blank"><i class="fa fa-vk"></i><span><?php esc_html_e( 'Vk', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_bloglovin' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_bloglovin' ) ); ?>" target="_blank"><i class="fa fa-heart"></i><span><?php esc_html_e( 'Bloglovin', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_vine' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_vine' ) ); ?>" target="_blank"><i class="fa fa-vine"></i><span><?php esc_html_e( 'Vine', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_soundcloud' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_soundcloud' ) ); ?>" target="_blank"><i class="fa fa-soundcloud"></i><span><?php esc_html_e( 'Soundcloud', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_snapchat' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_snapchat' ) ); ?>" target="_blank"><i class="fa fa-snapchat-ghost"></i><span><?php esc_html_e( 'Snapchat', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_spotify' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_spotify' ) ); ?>" target="_blank"><i class="fa fa-spotify"></i><span><?php esc_html_e( 'Spotify', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_github' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_github' ) ); ?>" target="_blank"><i class="fa fa-github"></i><span><?php esc_html_e( 'Github', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_stack' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_stack' ) ); ?>" target="_blank"><i class="fa fa-stack-overflow"></i><span><?php esc_html_e( 'Stack-Overflow', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_twitch' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_twitch' ) ); ?>" target="_blank"><i class="fa fa-twitch"></i><span><?php esc_html_e( 'Twitch', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_vimeo' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_vimeo' ) ); ?>" target="_blank"><i class="fa fa-vimeo"></i><span><?php esc_html_e( 'Vimeo', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_steam' ) ) : ?>
							<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_steam' ) ); ?>" target="_blank"><i class="fa fa-steam"></i><span><?php esc_html_e( 'Steam', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_rss' ) ) : ?>
							<li><a href="<?php echo esc_url( get_theme_mod( 'penci_rss' ) ); ?>" target="_blank"><i class="fa fa-rss"></i><span><?php esc_html_e( 'RSS', 'soledad' ); ?></span></a></li>
						<?php endif; ?>
					</ul>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( ( get_theme_mod( 'penci_footer_logo' ) && ! get_theme_mod( 'penci_hide_footer_logo' ) ) || get_theme_mod( 'penci_footer_copyright' ) || ! get_theme_mod( 'penci_go_to_top' ) || get_theme_mod( 'penci_footer_menu' ) ) : ?>
			<div class="footer-logo-copyright<?php if ( ! get_theme_mod( 'penci_footer_logo' ) || get_theme_mod( 'penci_hide_footer_logo' ) ) : echo ' footer-not-logo'; endif; ?><?php if ( get_theme_mod( 'penci_go_to_top' ) ) : echo ' footer-not-gotop'; endif; ?>">
				<?php if ( get_theme_mod( 'penci_footer_logo' ) && ! get_theme_mod( 'penci_hide_footer_logo' ) ) : ?>
					<div id="footer-logo">
						<a href="<?php echo esc_url( home_url('/') ); ?>">
							<img src="<?php echo esc_url( get_theme_mod( 'penci_footer_logo' ) ); ?>" alt="<?php esc_html_e( 'Footer Logo', 'soledad' ); ?>" />
						</a>
					</div>
				<?php endif; ?>

				<?php if( get_theme_mod( 'penci_footer_menu' ) ): ?>
					<div class="footer-menu-wrap">
					<?php
					/**
					 * Display main navigation
					 */
					wp_nav_menu( array(
						'container'      => false,
						'theme_location' => 'footer-menu',
						'menu_class'     => 'footer-menu'
					) );
					?>
					</div>
				<?php endif; /* End check if enable footer menu */?>

				<?php if ( get_theme_mod( 'penci_footer_copyright' ) ) : ?>
					<div id="footer-copyright">
						<p><?php echo wp_kses( get_theme_mod( 'penci_footer_copyright' ), penci_allow_html() ); ?></p>
					</div>
				<?php endif; ?>
				<?php if ( ! get_theme_mod( 'penci_go_to_top' ) ) : ?>
					<div class="go-to-top-parent"><a href="#" class="go-to-top"><span><i class="fa fa-angle-up"></i><br><?php esc_html_e( 'Back To Top', 'soledad' ); ?></span></a></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</footer>

</div><!-- End .wrapper-boxed -->

<div id="fb-root"></div>

<?php wp_footer(); ?>

<?php if( get_theme_mod('penci_footer_analytics') ):
echo get_theme_mod('penci_footer_analytics');
endif; ?>

<script>
    jQuery(document).ready(function($) {
        
      $('a').each(function() {
    	   var a = new RegExp('/' + window.location.host + '/');
		  	//if(this.href != null) {
    	   if(this.href && !a.test(this.href)) {
    	       $(this).click(function(event) {
    	           event.preventDefault();
    	           event.stopPropagation();
    	           window.open(this.href, '_blank');
    	       });
    	   }
      });

      let images = document.getElementsByTagName("img");
    
      for (var i = 0; i < images.length; i++) addAlt(images[i]);
    
      //adds alt value from file name
      function addAlt(el) {
        if(el.getAttribute("alt")) return;
        
        url = el.src;
        let filename = url.substring(url.lastIndexOf("/") + 1);
        filename = filename
          .split(".")
          .slice(0, -1)
          .join(".");
        
        el.setAttribute("alt", filename);
        //console.log("added alt: " + filename);
      }
    
    });
    
</script>

</body>
</html>