<?php get_header(); ?>

<div class="wrapper">

	<div id="posts">

		<?php if (have_posts()) : ?>

			<div class="special-heading">
				<h2><?php _e('Search Results', 'skoon'); ?></h2>
			</div>

			<?php while (have_posts()) : the_post(); ?>
			
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="post-thumb">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('normal-post'); ?></a>
						</div>
					<?php } ?>

					<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					
					<ul class="post-meta">
						<li class="post-author"><?php the_author_posts_link(); ?></li>
						<li class="post-date"><?php the_time( get_option('date_format') ); ?></li>
					</ul>
					<p class="excerpt"><?php echo mola_excerpt(17); ?></p>
				</article>

			<?php endwhile; ?>

			<?php
			global $wp_query;
			
			$big = 999999999; // need an unlikely integer
			
			echo '<div class="pagination group">';
			
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'prev_text' => __('Prev', 'skoon'),  
				'next_text' => __('Next', 'skoon'),
				'total' => $wp_query->max_num_pages
			) );
			
			echo '</div>'; 
		?>
			
		<?php else : ?>

			<h2><?php _e('Nothing found', 'skoon'); ?></h2>

		<?php endif; ?>

	</div><!--#posts-->

	<?php get_sidebar(); ?>

</div><!--.wrapper-->

<?php get_footer(); ?>