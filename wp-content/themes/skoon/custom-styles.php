<?php
/*
Overrides Default Styles With Custom Styles From The Themes Options Panel
*/

	echo ' <style type="text/css"> ';
	
			if ( of_get_option('logo_margin') ) { 
				echo '#logo {
					margin-top: '.of_get_option('logo_margin').';
				}';
			}

			if ( of_get_option('accent_color') ) { 
				echo 'a:hover,
				#main-nav li
				.sub-menu li a:hover,
				.post-meta a:hover,
				.widget .menu li a:hover,
				.widget_pages li a:hover,
				.widget_recent_entries li a:hover,
				.widget_recent_comments li a:hover,
				.widget_archive li a:hover,
				.widget_categories li a:hover,
				.widget_meta li a:hover,
				#main-footer
				.widget .menu li a:hover,
				#main-footer
				.widget_pages li a,
				#main-footer
				.widget_recent_entries li a:hover,
				#main-footer
				.widget_recent_comments li a:hover,
				#main-footer
				.widget_archive li a:hover,
				#main-footer
				.widget_categories li a:hover,
				#main-footer
				.widget_meta li a:hover,
				#copyright a:hover {
					color: '.of_get_option('accent_color').';
				}

				#main-header,
				.special-heading {
					border-top-color: '.of_get_option('accent_color').';
				}

				#main-nav a:hover,
				#main-nav
				.current-menu-item a,
				#main-nav li:hover a,
				.special-heading h2,
				.post-icon,
				#top-posts
				.cap-meta,
				.popular-post
				.cap-meta,
				.car-prev,
				.car-next,
				.pagination
				.current,
				.pagination a:hover,
				#main-footer
				.tagcloud a:hover,
				.tagcloud a:hover,
				#submit:hover,
				.wpcf7-submit:hover,
				.back-to-top:hover {
					background-color: '.of_get_option('accent_color').';
				}

				#main-footer
				.widget-title h2 {
					border-bottom-color: '.of_get_option('accent_color').';
				}
				
				';
			}

			if ( of_get_option('header_background') ) { 
				echo '#main-header {
					background-color: '.of_get_option('header_background').';
				}';
			}

			if ( of_get_option('site_title') ) { 
				echo '#logo a, #logo a:hover {
					color: '.of_get_option('site_title').';
				}';
			}

			if ( of_get_option('site_desc') ) { 
				echo '#logo span a, #logo span a:hover {
					color: '.of_get_option('site_desc').';
				}';
			}

			if ( of_get_option('menu_background') ) { 
				echo '#main-nav {
					background: '.of_get_option('menu_background').';
				}';
			}

			if ( of_get_option('menu_font_color') ) { 
				echo '#main-nav a {
					color: '.of_get_option('menu_font_color').';
				}';
			}

			if ( of_get_option('footer_background') ) { 
				echo '#main-footer {
					background-color: '.of_get_option('footer_background').';
				}';
			}

			if ( of_get_option('footer_font_color') ) { 
				echo '#main-footer,
					  #copyright {
						color: '.of_get_option('footer_font_color').';
					}';
			}

			if ( of_get_option('footer_border_color') ) { 
				echo '#main-footer .widget-title,
					  #main-footer .widget .menu li, 
					  #main-footer .widget_pages li, 
					  #main-footer .widget_recent_entries li, 
					  #main-footer .widget_recent_comments li, 
					  #main-footer .widget_archive li, 
					  #main-footer .widget_categories li, 
					  #main-footer .widget_meta li {
						border-bottom-color: '.of_get_option('footer_border_color').';
					}

					#copyright {
						border-top-color: '.of_get_option('footer_border_color').';
					}';
			}

			if ( of_get_option('copyrights_background') ) { 
				echo '#copyright {
					background-color: '.of_get_option('copyrights_background').';
				}';
			}

			if ( of_get_option('custom_css') ) { 
				echo of_get_option('custom_css');
			}
			
	echo ' </style> ';