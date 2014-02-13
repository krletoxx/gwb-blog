<?php get_header(); ?>

<div class="wrapper">

	<div id="single-post">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="post-thumb single-thumb">
						<?php the_post_thumbnail('feat-large'); ?>
					</div>
				<?php } ?>
				
				<h1 class="post-title"><?php the_title(); ?></h1>
				
				<ul class="post-meta single-meta">
					<li class="post-author"><?php the_author_posts_link(); ?></li>
					<li class="post-date"><?php the_time( get_option('date_format') ); ?></li>
					<li class="post-category"><?php the_category(', '); ?></li>
				</ul>

				<div class="entry">
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
				</div>

				<div class="post-social group">
					<span class="socialite twitter-share" data-count="vertical" data-url="<?php the_permalink(); ?>"></span>
					<span class="socialite facebook-like" data-layout="box_count" data-href="<?php the_permalink(); ?>"></span>
					<span class="socialite googleplus-one" data-size="tall" data-href="<?php the_permalink(); ?>"></span>
					<span class="socialite linkedin-share" data-counter="top" data-url="<?php the_permalink(); ?>"></span>
				</div>
				
				<?php the_tags('<div class="tagcloud">', '', '</div>'); ?>
				
			</article>

			<?php get_template_part('author', 'bio'); ?>
						
			<?php get_template_part('related', 'posts'); ?>

			<?php comments_template(); ?>

		<?php endwhile; endif; ?>

	</div><!--#single-post-->
	
	<?php get_sidebar(); ?>

</div><!--.wrapper-->

<?php get_footer(); ?>