<?php
/*
    Original Widget was by Paul Underwood released under the GNU license
*/

/**
 * Register the Widget
 */
add_action( 'widgets_init', create_function( '', 'register_widget("pu_facebook_widget");' ) ); 

/**
 * Create the widget class and extend from the WP_Widget
 */
 class pu_facebook_widget extends WP_Widget {
 	
	/**
	 * Set the widget defaults
	 */
	private $widget_title = "Facebook Page";
	private $facebook_id = "244325275637598";
	private $facebook_username = "envato";
 	
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		
		parent::__construct(
			'pu_facebook_widget',		// Base ID
			'Facebook Like Box',		// Name
			array(
				'classname'		=>	'pu_facebook_widget',
				'description'	=>	__('A widget that displays a facebook like box from your facebook page.', 'skoon')
			)
		);

		// Load JavaScript and stylesheets
		$this->register_scripts_and_styles();

	} // end constructor
	
	/**
	 * Registers and enqueues stylesheets for the administration panel and the
	 * public facing site.
	 */
	public function register_scripts_and_styles() {
		
		

	} // end register_scripts_and_styles
	
	/**
	 * Add Facebook javascripts
	 */
	public function add_js(){
		echo '<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId='.$this->facebook_id.'";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, \'script\', \'facebook-jssdk\'));</script>';
	}

	
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$this->widget_title = apply_filters('widget_title', $instance['title'] );
		
		$this->facebook_id = $instance['app_id'];
		$this->facebook_username = $instance['page_name'];
		
		add_action('wp_footer', array(&$this,'add_js'));

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $this->widget_title )
			echo $before_title . $this->widget_title . $after_title;

		/* Like Box */
		 ?>
            <div class="fb-like-box" 
            	data-href="http://www.facebook.com/<?php echo $this->facebook_username; ?>" 
            	data-width="470"
				data-height="290"
				data-colorscheme="light"
				data-show-faces="true"
				data-header="false"
				data-stream="false"
				data-show-border="true"></div>
		<?php 

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['app_id'] = strip_tags( $new_instance['app_id'] );
		$instance['page_name'] = strip_tags( $new_instance['page_name'] );

		return $instance;
	}
	
	/**
	 * Create the form for the Widget admin
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => $this->widget_title,
		'app_id' => $this->facebook_id,
		'page_name' => $this->facebook_username,
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>


			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'skoon') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- App id: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'app_id' ); ?>"><?php _e('App Id', 'skoon') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'app_id' ); ?>" name="<?php echo $this->get_field_name( 'app_id' ); ?>" value="<?php echo $instance['app_id']; ?>" />
		</p>
		
		<!-- Page name: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'page_name' ); ?>"><?php _e('Page name (http://www.facebook.com/[page_name])', 'skoon') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'page_name' ); ?>" name="<?php echo $this->get_field_name( 'page_name' ); ?>" value="<?php echo $instance['page_name']; ?>" />
		</p>
		
	<?php
	}
 }
?>