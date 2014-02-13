<?php

class Mola_Popular_Widget extends WP_Widget {
	
	function __construct()
	{
		$params = array(
			'description' => __('Display popular posts with thumbnails.', 'skoon'),
			'name' => 'Promola Popular Posts'
		);
		parent::__construct('mola_popular', '', $params);
	}
	
	public function form($instance)
	{
		extract($instance);
		?>
			
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'skoon'); ?></label>
				<input
					class="widefat"
					type="text"
					id="<?php echo $this->get_field_id('title'); ?>"
					name="<?php echo $this->get_field_name('title'); ?>"
					value="<?php if(isset($title)) echo esc_attr($title); ?>">
			</p>
			
		<?php
	}
	
	public function widget($args, $instance)
	{
		extract($args);
		extract($instance);
		
		global $post;
		$args = array(
			'numberposts' => 2,
			'orderby' => 'comment_count'
		);
			
		$custom_posts = get_posts($args);
		
		echo $before_widget;
		
			if(!empty($title))
			{
				echo $before_title . $title . $after_title;
			}
			
			echo "<div class='small-posts'>";
			
				foreach($custom_posts as $post) : setup_postdata($post);
				
					$postClass = get_post_class();
					
				
						echo "<article class='popular-post group " . $postClass[4] . "'>";
						
							if ( has_post_thumbnail() ) {
								echo "<div class='post-thumb'>";
									echo "<a href='" . get_permalink($post->ID) . "'>";

										the_post_thumbnail('normal-post');

										echo "<ul class='cap-meta'><li class='cap-date'>";
											the_time( get_option('date_format') );
										echo "</li></ul>";

									echo "</a>";
								echo "</div>";
							}
							
							echo "<h3 class='post-title'><a href='" . get_permalink($post->ID) . "'>" . get_the_title() . "</a></h3>";
							
						echo "</article>";
					
				endforeach;
				
			echo "</div>";

			global $post;
			$args = array(
				'numberposts' => 2,
				'offset' => 2,
				'orderby' => 'comment_count'
			);
				
			$custom_posts = get_posts($args);

			echo "<div class='small-posts'>";
			
				foreach($custom_posts as $post) : setup_postdata($post);
				
					$postClass = get_post_class();
					
				
						echo "<article class='popular-post group " . $postClass[4] . "'>";
						
							if ( has_post_thumbnail() ) {
								echo "<div class='post-thumb'>";
									echo "<a href='" . get_permalink($post->ID) . "'>";

										the_post_thumbnail('normal-post');

										echo "<ul class='cap-meta'><li class='cap-date'>";
											the_time( get_option('date_format') );
										echo "</li></ul>";

									echo "</a>";
								echo "</div>";
							}
							
							echo "<h3 class='post-title'><a href='" . get_permalink($post->ID) . "'>" . get_the_title() . "</a></h3>";
							
						echo "</article>";
					
				endforeach;
				
			echo "</div>";
			
		echo $after_widget;
	}
	
}

add_action('widgets_init', 'mola_reg_popular_widget');

function mola_reg_popular_widget()
{
	register_widget('Mola_Popular_Widget');
}