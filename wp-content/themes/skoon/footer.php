	<footer id="main-footer" class="group">
		<div class="wrapper">
			
			<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(__('Medium Footer Widgets', 'skoon'))) : else : ?>
    
		        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
			
			<?php endif; ?>

			<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(__('Large Footer Widget', 'skoon'))) : else : ?>
    
		        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
			
			<?php endif; ?>

		</div><!--.wrapper-->
	</footer>
	
	<div id="copyright">
		<div class="wrapper">
			<p><?php echo of_get_option('footer_text'); ?></p>
			<?php wp_nav_menu(array('menu' => __('Footer Navigation Menu', 'skoon'),'theme_location' => 'footer_nav', 'menu_class' => 'sf-menu')); ?>
		</div><!--.wrapper-->
	</div><!--#copyright-->
	
	<span class="back-to-top"></span>

	<?php get_template_part('custom', 'styles'); ?>

	<?php wp_footer(); ?>
	
</body>

</html>
