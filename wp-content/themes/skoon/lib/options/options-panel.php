<?php

	// Styling Options Framework
	function mola_ops_styling() {
	echo '<style type="text/css">
           #optionsframework-wrap
		   .of-input[type=text]{width: 443px;}
		   
		   #optionsframework .controls .of-radio-img-selected {
				border: 3px solid #5DABCF;
			}
		   
		   /*** Twitter ***/
		   
		   #section-twitter {
				border-bottom: 1px solid #DFDFDF;
				padding-bottom: 20px !important;
		   }
		   
		   #section-twitter
		   .heading {
				background: url(' . get_template_directory_uri() . '/images/twitter.png) left center no-repeat;
				padding: 20px 0 20px 42px !important;
				margin-bottom: 8px !important;
				border-bottom: none !important;
		   }
		   
		   /*** Facebook ***/
		   
		   #section-facebook {
				border-bottom: 1px solid #DFDFDF;
				padding-bottom: 20px !important;
		   }
		   
		   #section-facebook
		   .heading {
				background: url(' . get_template_directory_uri() . '/images/facebook.png) left center no-repeat;
				padding: 20px 0 20px 42px !important;
				margin-bottom: 8px !important;
				border-bottom: none !important;
		   }
		   
		   /*** Pinterest ***/
		   
		   #section-pinterest {
				border-bottom: 1px solid #DFDFDF;
				padding-bottom: 20px !important;
		   }
		   
		   #section-pinterest
		   .heading {
				background: url(' . get_template_directory_uri() . '/images/pinterest.png) left center no-repeat;
				padding: 20px 0 20px 42px !important;
				margin-bottom: 8px !important;
				border-bottom: none !important;
		   }
		   
		   /*** Google Plus ***/
		   
		   #section-google {
				border-bottom: 1px solid #DFDFDF;
				padding-bottom: 20px !important;
		   }
		   
		   #section-google
		   .heading {
				background: url(' . get_template_directory_uri() . '/images/google.png) left center no-repeat;
				padding: 20px 0 20px 42px !important;
				margin-bottom: 8px !important;
				border-bottom: none !important;
		   }
		   
		   /*** Instagram ***/
		   
		   #section-instagram {
				border-bottom: 1px solid #DFDFDF;
				padding-bottom: 20px !important;
		   }
		   
		   #section-instagram
		   .heading {
				background: url(' . get_template_directory_uri() . '/images/instagram.png) left center no-repeat;
				padding: 20px 0 20px 42px !important;
				margin-bottom: 8px !important;
				border-bottom: none !important;
		   }
			
			/*** Soundcloud ***/
			
			#section-soundcloud {
				border-bottom: 1px solid #DFDFDF;
				padding-bottom: 20px !important;
			}
		   
			#section-soundcloud
			.heading {
				background: url(' . get_template_directory_uri() . '/images/soundcloud.png) left center no-repeat;
				padding: 20px 0 20px 42px !important;
				margin-bottom: 8px !important;
				border-bottom: none !important;
			}
			
			/*** Flickr ***/
			
			#section-flickr {
				border-bottom: 1px solid #DFDFDF;
				padding-bottom: 20px !important;
			}
		   
			#section-flickr
			.heading {
				background: url(' . get_template_directory_uri() . '/images/flickr.png) left center no-repeat;
				padding: 20px 0 20px 42px !important;
				margin-bottom: 8px !important;
				border-bottom: none !important;
			}
			
			/*** YouTube ***/
			
			#section-youtube {
				border-bottom: 1px solid #DFDFDF;
				padding-bottom: 20px !important;
			}
		   
			#section-youtube
			.heading {
				background: url(' . get_template_directory_uri() . '/images/youtube.png) left center no-repeat;
				padding: 20px 0 20px 42px !important;
				margin-bottom: 8px !important;
				border-bottom: none !important;
			}
		   
         </style>';
	}
	add_action('admin_enqueue_scripts', 'mola_ops_styling');

?>