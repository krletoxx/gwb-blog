<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		<?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
	
		wp_title( '-', true, 'right' );
	
		// Add the blog name.
		bloginfo( 'name' );
	
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " - $site_description";
	
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' - ' . sprintf( __( 'Page %s', 'skoon' ), max( $paged, $page ) );
	
		?>
	</title>
	
	<?php if( of_get_option('favicon_uploader') ) { ?>
		<link rel="shortcut icon" href="<?php echo of_get_option('favicon_uploader'); ?>">
	<?php } ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<header id="main-header">
		<div class="wrapper">
			
			<?php if( of_get_option('logo_uploader') ) { ?>
				<div id="logo">
					<a href="<?php echo home_url(); ?>" ><img alt="logo" src="<?php echo of_get_option('logo_uploader'); ?>"></a>
				</div>
			<?php } else { ?>
				<div id="logo">
					<h1><a href="<?php echo home_url(); ?>" ><?php bloginfo(); ?></a></h1>
					<span><a href="<?php echo home_url(); ?>" ><?php bloginfo( 'description' ); ?></a></span>
				</div>
			<?php } ?>

			<?php if( of_get_option('header_ad') ) { ?>
				<div id="header-ad">	
					<a href="<?php echo of_get_option('header_url'); ?>"><img alt="" src="<?php echo of_get_option('header_ad'); ?>"></a>
				</div>
			<?php } ?>

		</div><!--.wrapper-->
	</header>

	<nav id="main-nav">
		<div class="wrapper">
			<?php wp_nav_menu(array('menu' => __('Main Navigation Menu', 'skoon'),'theme_location' => 'main_nav', 'menu_class' => 'sf-menu')); ?>
			
			<?php get_search_form(); ?>
		</div><!--.wrapper-->
	</nav>