<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {
	
	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Order Posts
	$order_array = array(
		'rand' => __('Random', 'options_check'),
		'post_date' => __('Date', 'options_check'),
		'title' => __('Title', 'options_check')
	);
	
	/**
	 * Styling Options
	 */
	
	$options[] = array(
		'name' => __('Basics', 'options_check'),
		'type' => 'heading');
	
	// Logo upload
	$options[] = array(
		'name' => __('Logo Uploader', 'options_check'),
		'id' => 'logo_uploader',
		'type' => 'upload');
	
	$options[] = array(
		'name' => __('Logo Top Margin', 'options_check'),
		'desc' => __('Adjust the top margin of your logo accordingly if necessary.', 'options_check'),
		'id' => 'logo_margin',
		'std' => '56px',
		'class' => 'mini',
		'type' => 'text');
	
	// Header banner
	$options[] = array(
		'name' => __('Header Ad Uploader', 'options_check'),
		'desc' => __('728x90 banner advertisement.', 'options_check'),
		'id' => 'header_ad',
		'type' => 'upload');
	
	$options[] = array(
		'name' => __('Header Ad URL', 'options_check'),
		'desc' => __('Paste a link to were you want the banner ad to take your visitors. Prefix link with http://', 'options_check'),
		'id' => 'header_url',
		'std' => '',
		'type' => 'text');
	
	// Favicon upload
	$options[] = array(
		'name' => __('Favicon Uploader', 'options_check'),
		'id' => 'favicon_uploader',
		'type' => 'upload');
	
	// Footer Text
	$options[] = array(
		'name' => __('Footer Text', 'options_check'),
		'desc' => __('Text displayed in the footer.', 'options_check'),
		'id' => 'footer_text',
		'std' => '(C) 2013 Copyright Skoon Magazine By Promola',
		'type' => 'text');
	
	/**
	 * Homepage
	 */
	
	$options[] = array(
		'name' => __('Homepage', 'options_check'),
		'type' => 'heading');
	
	// Featured Category
	$options[] = array(
		'name' => __('Select Feature Category', 'options_check'),
		'desc' => __('Select a category for the featured area at the top of the homepage.', 'options_check'),
		'type' => 'info');

	$options[] = array(
		'id' => 'feat_category',
		'type' => 'select',
		'options' => $options_categories);

	$options[] = array(
		'name' => __('Homepage Headings Settings', 'options_check'),
		'desc' => __('Select categories to display on the homepage and give them headings.', 'options_check'),
		'type' => 'info');

	// First Selected Category
	$options[] = array(
		'name' => __('Select The First Category', 'options_check'),
		'desc' => __('Select the first category to display on the homepage.', 'options_check'),
		'id' => 'first_category',
		'type' => 'select',
		'options' => $options_categories);
	
	// First Selected Category Heading
	$options[] = array(
		'desc' => __('Give the first category area a heading.', 'options_check'),
		'id' => 'first_cat_heading',
		'std' => 'First Category',
		'type' => 'text');

	// Second Selected Category
	$options[] = array(
		'name' => __('Select The Second Category', 'options_check'),
		'desc' => __('Select the second category to display on the homepage.', 'options_check'),
		'id' => 'second_category',
		'type' => 'select',
		'options' => $options_categories);

	// Second Selected Category Heading
	$options[] = array(
		'desc' => __('Give the second category area a heading.', 'options_check'),
		'id' => 'second_cat_heading',
		'std' => 'Second Category',
		'type' => 'text');

	// Recent Posts Heading
	$options[] = array(
		'name' => __('Recent Posts Heading', 'options_check'),
		'desc' => __('Heading for the recent posts area.', 'options_check'),
		'id' => 'recent_heading',
		'std' => 'Recent News',
		'type' => 'text');

	/**
	 * Carousel
	 */

	$options[] = array(
		'name' => __('Carousel', 'options_check'),
		'type' => 'heading');

	// Carousel Category
	$options[] = array(
		'name' => __('Select Carousel Category', 'options_check'),
		'desc' => __('Select a category for the carousel.', 'options_check'),
		'id' => 'car_category',
		'type' => 'select',
		'options' => $options_categories);
	
	// Carousel Number
	$options[] = array(
		'name' => __('Carousel Items', 'options_check'),
		'desc' => __('How many posts to display in the carousel (Maximum is 20).', 'options_check'),
		'id' => 'car_number',
		'std' => '15',
		'class' => 'mini',
		'type' => 'text');
	
	// Carousel Order
	$options[] = array(
		'name' => __('Carousel Order', 'options_check'),
		'desc' => __('Order posts by date, randomly or by title.', 'options_check'),
		'id' => 'car_order',
		'std' => 'post_date',
		'type' => 'radio',
		'options' => $order_array);
	
	/**
	 * Social Widget
	 */
	
	$options[] = array(
		'name' => __('Social Widget', 'options_check'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Links To Social Networking Profiles', 'options_check'),
		'desc' => __('Links to your social networking profiles used by the Promola Social Widget. Links must start with http for example http://twitter.com/promolaSA', 'options_check'),
		'type' => 'info');
	
	// Twitter
	$options[] = array(
		'name' => __('Twitter', 'options_check'),
		'desc' => __('Twitter link.', 'options_check'),
		'id' => 'twitter',
		'std' => '',
		'type' => 'text');
	
	// Facebook
	$options[] = array(
		'name' => __('Facebook', 'options_check'),
		'desc' => __('Facebook link.', 'options_check'),
		'id' => 'facebook',
		'std' => '',
		'type' => 'text');
	
	// Pinterest
	$options[] = array(
		'name' => __('Pinterest', 'options_check'),
		'desc' => __('Pinterest link.', 'options_check'),
		'id' => 'pinterest',
		'std' => '',
		'type' => 'text');
	
	// Google Plus
	$options[] = array(
		'name' => __('Google Plus', 'options_check'),
		'desc' => __('Google Plus link.', 'options_check'),
		'id' => 'google',
		'std' => '',
		'type' => 'text');
	
	// Instagram
	$options[] = array(
		'name' => __('Instagram', 'options_check'),
		'desc' => __('Instagram link.', 'options_check'),
		'id' => 'instagram',
		'std' => '',
		'type' => 'text');
	
	// Soundcloud
	$options[] = array(
		'name' => __('Soundcloud', 'options_check'),
		'desc' => __('Soundcloud link.', 'options_check'),
		'id' => 'soundcloud',
		'std' => '',
		'type' => 'text');
	
	// Flickr
	$options[] = array(
		'name' => __('Flickr', 'options_check'),
		'desc' => __('Flickr link.', 'options_check'),
		'id' => 'flickr',
		'std' => '',
		'type' => 'text');
	
	// YouTube
	$options[] = array(
		'name' => __('YouTube', 'options_check'),
		'desc' => __('YouTube link.', 'options_check'),
		'id' => 'youtube',
		'std' => '',
		'type' => 'text');

	/**
	 * Custom Colors
	 */
	
	$options[] = array(
		'name' => __('Custom Colors', 'options_check'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Custom Colors', 'options_check'),
		'desc' => __('Change colors of the theme.', 'options_check'),
		'type' => 'info');
	
	// Header Background
	$options[] = array(
		'name' => __('Header Background', 'options_check'),
		'desc' => __('Change the header background color.', 'options_check'),
		'id' => 'header_background',
		'std' => '',
		'type' => 'color' );

	// Site Title Font Color
	$options[] = array(
		'name' => __('Site Title Font Color', 'options_check'),
		'desc' => __('Change the site title font color.', 'options_check'),
		'id' => 'site_title',
		'std' => '',
		'type' => 'color' );

	// Site Description Font Color
	$options[] = array(
		'name' => __('Site Description Font Color', 'options_check'),
		'desc' => __('Change the site description font color.', 'options_check'),
		'id' => 'site_desc',
		'std' => '',
		'type' => 'color' );

	// Menu Background
	$options[] = array(
		'name' => __('Menu Background', 'options_check'),
		'desc' => __('Change the main navigation background color.', 'options_check'),
		'id' => 'menu_background',
		'std' => '',
		'type' => 'color' );

	// Menu Font Color
	$options[] = array(
		'name' => __('Menu Font Color', 'options_check'),
		'desc' => __('Change the menu font color.', 'options_check'),
		'id' => 'menu_font_color',
		'std' => '',
		'type' => 'color' );

	// Accent color
	$options[] = array(
		'name' => __('Accent Color', 'options_check'),
		'desc' => __('Select the main color.', 'options_check'),
		'id' => 'accent_color',
		'std' => '#FFCA18',
		'type' => 'color' );

	// Footer Background
	$options[] = array(
		'name' => __('Footer Background', 'options_check'),
		'desc' => __('Footer background color.', 'options_check'),
		'id' => 'footer_background',
		'std' => '',
		'type' => 'color' );

	// Footer Font Color
	$options[] = array(
		'name' => __('Footer Font Color', 'options_check'),
		'desc' => __('Change the footer font color.', 'options_check'),
		'id' => 'footer_font_color',
		'std' => '',
		'type' => 'color' );

	// Footer Widgets
	$options[] = array(
		'name' => __('Footer Widgets Border Color', 'options_check'),
		'desc' => __('Change the footer widgets border color.', 'options_check'),
		'id' => 'footer_border_color',
		'std' => '',
		'type' => 'color' );

	// Copyrights Background Color
	$options[] = array(
		'name' => __('Copyrights Background Color', 'options_check'),
		'desc' => __('Change the copyrights background color.', 'options_check'),
		'id' => 'copyrights_background',
		'std' => '',
		'type' => 'color' );

	/**
	 * Custom CSS Box
	 */
	
	$options[] = array(
		'name' => __('Custom CSS', 'options_check'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Custom CSS Box', 'options_check'),
		'desc' => __('Add your own Cascading Style Sheets (CSS)', 'options_check'),
		'type' => 'info');
	
	$options[] = array(
		'name' => __('Custom CSS', 'options_check'),
		'id' => 'custom_css',
		'std' => '',
		'type' => 'textarea');
	
	/**
	 * Contact Page
	 */
	
	$options[] = array(
		'name' => __('Contact', 'options_check'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Contact Page Google Map', 'options_check'),
		'desc' => __('Paste Google map link, Check user manual to see how.', 'options_check'),
		'type' => 'info');
	
	$options[] = array(
		'name' => __('Google Map URL', 'options_check'),
		'id' => 'map_url',
		'std' => '',
		'type' => 'textarea');
	
	return $options;
}