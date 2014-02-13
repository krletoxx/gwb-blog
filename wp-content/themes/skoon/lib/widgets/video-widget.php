<?php

class Mola_Video_Widget extends WP_Widget {
	
	function __construct()
	{
		$params = array(
			'description' => __('Display YouTube and Vimeo videos in sidebar.', 'skoon'),
			'name' => 'Promola Videos'
		);
		parent::__construct('molavid', '', $params);
	}
	
	public function form($instance)
	{
		extract($instance);
		?>
			
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'skoon'); ?>:</label>
				<input
					class="widefat"
					type="text"
					id="<?php echo $this->get_field_id('title'); ?>"
					name="<?php echo $this->get_field_name('title'); ?>"
					value="<?php if(isset($title)) echo esc_attr($title); ?>">
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('videourl'); ?>"><?php _e('Video Embed', 'skoon'); ?>:</label>
				<textarea
					class="widefat"
					rows="10"
					id="<?php echo $this->get_field_id('videourl'); ?>"
					name="<?php echo $this->get_field_name('videourl'); ?>"><?php if(isset($videourl)) echo esc_attr($videourl); ?></textarea>
			</p>
			
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
			
			echo $videourl;
			
		echo $after_widget;
	}
	
}

add_action('widgets_init', 'mola_reg_video_widget');

function mola_reg_video_widget()
{
	register_widget('Mola_Video_Widget');
}