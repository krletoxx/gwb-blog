<?php

require_once 'class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'ross_register_required_plugins' );

function ross_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'     				=> 'Options Framework',
			'slug'     				=> 'options-framework',
			'source'   				=> get_stylesheet_directory() . '/lib/plugins/options-framework.zip',
			'required' 				=> true,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> ''
		),
		array(
			'name'     				=> 'Carousel Without Jetpack',
			'slug'     				=> 'carousel-without-jetpack',
			'source'   				=> get_stylesheet_directory() . '/lib/plugins/carousel-without-jetpack.zip',
			'required' 				=> false,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> ''
		),
		array(
			'name'     				=> 'Contact Form 7',
			'slug'     				=> 'contact-form-7',
			'source'   				=> get_stylesheet_directory() . '/lib/plugins/contact-form-7.zip',
			'required' 				=> false,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> ''
		)

	);

	$theme_text_domain = 'skoon';

	$config = array(
		'domain'       		=> $theme_text_domain,
		'default_path' 		=> '',
		'parent_menu_slug' 	=> 'themes.php',
		'parent_url_slug' 	=> 'themes.php',
		'menu'         		=> 'install-required-plugins',
		'has_notices'      	=> true,
		'is_automatic'    	=> false,
		'message' 			=> '',
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}