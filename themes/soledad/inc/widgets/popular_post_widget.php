<?php
/**
 * Popular posts widget
 * Get most viewed and display in widget
 *
 * @package Wordpress
 * @since 1.0
 */

add_action( 'widgets_init', 'penci_popular_news_load_widget' );

function penci_popular_news_load_widget() {
	register_widget( 'penci_popular_news_widget' );
}

class penci_popular_news_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'penci_popular_news_widget', 'description' => esc_html__('A widget that displays your popular posts from all categories or a category', 'soledad') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'penci_popular_news_widget' );

		/* Create the widget. */
		global $wp_version;
		if( 4.3 > $wp_version ) {
			$this->WP_Widget( 'penci_popular_news_widget', esc_html__('.Soledad Popular Posts', 'soledad'), $widget_ops, $control_ops );
		} else {
			parent::__construct( 'penci_popular_news_widget', esc_html__('.Soledad Popular Posts', 'soledad'), $widget_ops, $control_ops );
		}
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$type = isset( $instance['type'] ) ? $instance['type'] : '';
		$categories = isset( $instance['categories'] ) ? $instance['categories'] : '';
		$number = isset( $instance['number'] ) ? $instance['number'] : '';
		$featured = isset( $instance['featured'] ) ? $instance['featured'] : false;
		$allfeatured = isset( $instance['allfeatured'] ) ? $instance['allfeatured'] : false;
		$thumbright = isset( $instance['thumbright'] ) ? $instance['thumbright'] : false;
		$postdate = isset( $instance['postdate'] ) ? $instance['postdate'] : false;


		$query = array( 'posts_per_page'      => $number,
						'meta_key'            => 'penci_post_views_count',
						'orderby'             => 'meta_value_num',
						'order'               => 'DESC',
						'cat'                 => $categories
		);

		if( $type == 'week' ) {
			$query = array( 'posts_per_page'      => $number,
							'meta_key'            => 'penci_post_week_views_count',
							'orderby'             => 'meta_value_num',
							'order'               => 'DESC',
							'cat'                 => $categories
			);
		} elseif ( $type == 'month' ) {
			$query = array( 'posts_per_page'      => $number,
							'meta_key'            => 'penci_post_month_views_count',
							'orderby'             => 'meta_value_num',
							'order'               => 'DESC',
							'cat'                 => $categories
			);
		}

		$loop = new WP_Query($query);
		if ($loop->have_posts()) :

		/* Before widget (defined by themes). */
		echo ent2ncr( $before_widget );

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo ent2ncr( $before_title . $title . $after_title );

		?>
			<ul class="side-newsfeed">

			<?php  $num = 1; while ($loop->have_posts()) : $loop->the_post(); ?>

				<li class="penci-feed<?php if( ( ( $num == 1 ) && $featured ) || $allfeatured ): echo ' featured-news'; endif;  ?><?php if( $allfeatured ): echo ' all-featured-news'; endif;  ?>">
					<div class="side-item">
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
						<div class="side-image<?php if( $thumbright ): echo ' thumbnail-right'; endif;  ?>">
							<?php
							/* Display Review Piechart  */
							if( function_exists('penci_display_piechart_review_html') ) {
								$size_pie = 'small';
								if( ( ( $num == 1 ) && $featured ) || $allfeatured ): $size_pie = 'normal'; endif;
								penci_display_piechart_review_html( get_the_ID(), $size_pie );
							}
							?>
							<a class="penci-image-holder<?php if( ( ( $num == 1 ) && $featured ) || $allfeatured ){ echo ''; } else { echo ' small-fix-size'; } ?>" rel="bookmark" style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), 'penci-thumb' ); ?>');" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
							</a>
						</div>
						<?php endif; ?>
						<div class="side-item-text">
							<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
							<?php if( ! $postdate ): ?>
							<span class="side-item-meta"><?php the_time( get_option('date_format') ); ?></span>
							<?php endif; ?>
						</div>
					</div>
				</li>

			<?php $num++; endwhile; ?>

			</ul>

		<?php
		endif;
		wp_reset_postdata();

		/* After widget (defined by themes). */
		echo ent2ncr( $after_widget );
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['type'] = $new_instance['type'];
		$instance['categories'] = $new_instance['categories'];
		$instance['number'] = strip_tags( $new_instance['number'] );
		$instance['featured'] = strip_tags( $new_instance['featured'] );
		$instance['allfeatured'] = strip_tags( $new_instance['allfeatured'] );
		$instance['thumbright'] = strip_tags( $new_instance['thumbright'] );
		$instance['postdate'] = strip_tags( $new_instance['postdate'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => esc_html__('Popular Posts', 'soledad'), 'type' => '', 'number' => 5, 'categories' => '', 'featured' => false, 'allfeatured' => false, 'thumbright' => false, 'postdate' => false );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e('Title:', 'soledad'); ?></label>
			<input  type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo sanitize_text_field( $instance['title'] ); ?>"  />
		</p>

		<!-- Type -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('type') ); ?>">Display Popular Posts on</label>
			<select id="<?php echo esc_attr( $this->get_field_id('type') ); ?>" name="<?php echo esc_attr( $this->get_field_name('type') ); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('' == $instance['type']) echo 'selected="selected"'; ?>>All Time</option>
				<option value='week' <?php if ('week' == $instance['type']) echo 'selected="selected"'; ?>>Once Weekly</option>
				<option value='month' <?php if ('month' == $instance['type']) echo 'selected="selected"'; ?>>Once a Month</option>
			</select>
		</p>

		<!-- Category -->
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id('categories') ); ?>"><?php esc_html_e('Filter by Category:', 'soledad'); ?></label>
		<select id="<?php echo esc_attr( $this->get_field_id('categories') ); ?>" name="<?php echo esc_attr( $this->get_field_name('categories') ); ?>" class="widefat categories" style="width:100%;">
			<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>><?php esc_html_e('All categories', 'soledad'); ?></option>
			<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
			<?php foreach($categories as $category) { ?>
			<option value='<?php echo esc_attr( $category->term_id ); ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo sanitize_text_field( $category->cat_name ); ?></option>
			<?php } ?>
		</select>
		</p>

		<!-- Number of posts -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e('Number of posts to show:', 'soledad'); ?></label>
			<input  type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" value="<?php echo esc_attr( $instance['number'] ); ?>" size="3" />
		</p>

		<!-- Display thumbnail right -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'thumbright' ) ); ?>"><?php esc_html_e('Display thumbnail on right?:','soledad'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'thumbright' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumbright' ) ); ?>" <?php checked( (bool) $instance['thumbright'], true ); ?> />
		</p>

		<!-- Display post featured -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'featured' ) ); ?>"><?php esc_html_e('Display 1st post featured?:','soledad'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'featured' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'featured' ) ); ?>" <?php checked( (bool) $instance['featured'], true ); ?> />
		</p>

		<!-- Display big post -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'allfeatured' ) ); ?>"><?php esc_html_e('Display all post featured?:','soledad'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'allfeatured' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'allfeatured' ) ); ?>" <?php checked( (bool) $instance['allfeatured'], true ); ?> />
		</p>

		<!-- Hide post date -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'postdate' ) ); ?>"><?php esc_html_e('Hide post date?:','soledad'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'postdate' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'postdate' ) ); ?>" <?php checked( (bool) $instance['postdate'], true ); ?> />
		</p>

	<?php
	}
}
?>