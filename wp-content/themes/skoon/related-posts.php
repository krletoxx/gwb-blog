<?php

	$tags = wp_get_post_tags($post->ID);
	
	if ($tags) {
		$first_tag = $tags[0]->term_id;
			$args=array(
				'tag__in' => array($first_tag),
				'post__not_in' => array($post->ID),
				'posts_per_page' => 2,
				'ignore_sticky_posts' => 1,
				'orderby' => 'rand'
			);
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) { ?>
		
			<div id="related-posts" class="small-posts">
	
				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
		
					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="post-thumb">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-post'); ?></a>
							</div>
						<?php } ?>
						
						<div class="post-content">
							<h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<ul class="post-meta">
								<li class="post-date"><?php the_time( get_option('date_format') ); ?></li>
							</ul>
						</div><!--.post-content-->
					</article>
		
				<?php endwhile; ?>
			
			</div><!--#related-posts-->
		
		<?php }
		
	wp_reset_query();
	
	}
?>