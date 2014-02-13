<?php get_header(); ?>

<div class="wrapper">

	<div id="posts" class="error-wrap">

		<div class="special-heading">
			<h2><?php _e('Page Not Found', 'skoon'); ?></h2>
		</div>

		<h2 class="error-heading"><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'skoon' ); ?></h2>

		<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 12 ), array( 'widget_id' => '404' ) ); ?>
						
		<div class="widget widget_categories">
			<h3 class="widgettitle"><?php _e( 'Categories', 'skoon' ); ?></h3>
			<ul>
				<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 12 ) ); ?>
			</ul>
		</div>
			
		<?php the_widget( 'WP_Widget_Archives', array('count' => 0 , 'dropdown' => 1 )); ?>

	</div><!--#posts-->

	<?php get_sidebar(); ?>

</div><!--.wrapper-->

<?php get_footer(); ?>