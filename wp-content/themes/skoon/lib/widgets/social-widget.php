<?php

class Mola_Social_Widget extends WP_Widget {
	
	function __construct()
	{
		$params = array(
			'description' => __('Displays social media icons.', 'skoon'),
			'name' => 'Promola Social'
		);
		parent::__construct('mola_social', '', $params);
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
			
			<p><?php _e('Go to "Theme Options" to paste your social profile links.', 'skoon'); ?></p>
			
		<?php
	}
	
	public function widget($args, $instance)
	{
		extract($args);
		extract($instance);
		
		echo $before_widget;
		
			if(!empty($title))
			{
				echo $before_title . $title . $after_title;
			}
		
			echo "<ul>";
			
				if(of_get_option('twitter')){
					echo "<li class='twitter' title='Twitter'><a href=". of_get_option('twitter') .">Twitter</a></li>";
				}
			
				if(of_get_option('facebook')){
					echo "<li class='facebook' title='Facebook'><a href=". of_get_option('facebook') .">Facebook</a></li>";
				}
				
				if(of_get_option('pinterest')){
					echo "<li class='pinterest' title='Pinterest'><a href=". of_get_option('pinterest') .">Pinterest</a></li>";
				}
				
				if(of_get_option('google')){
					echo "<li class='google' title='Google Plus'><a href=". of_get_option('google') .">Google Plus</a></li>";
				}
				
				if(of_get_option('instagram')){
					echo "<li class='instagram' title='Instagram'><a href=". of_get_option('instagram') .">Instagram</a></li>";
				}
				
				if(of_get_option('soundcloud')){
					echo "<li class='soundcloud' title='Soundcloud'><a href=". of_get_option('soundcloud') .">Soundcloud</a></li>";
				}
				
				if(of_get_option('flickr')){
					echo "<li class='flickr' title='Flickr'><a href=". of_get_option('flickr') .">Flickr</a></li>";
				}
				
				if(of_get_option('youtube')){
					echo "<li class='youtube' title='YouTube'><a href=". of_get_option('youtube') .">YouTube</a></li>";
				}
					
			echo "</ul>";
			
		echo $after_widget;
		
	}
	
}

add_action('widgets_init', 'mola_reg_social_widget');

function mola_reg_social_widget()
{
	register_widget('Mola_Social_Widget');
}