<?php get_header(); ?>

<div class="wrapper">

	<div id="posts">

		<?php if (have_posts()) : ?>

				<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>

				<div class="special-heading">
					<h2><?php single_cat_title(); ?></h2>
				</div>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>

				<div class="special-heading">
					<h2><?php single_tag_title(); ?></h2>
				</div>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>

				<div class="special-heading">
					<h2><?php the_time('F jS, Y'); ?></h2>
				</div>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>

				<div class="special-heading">
					<h2><?php the_time('F, Y'); ?></h2>
				</div>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>

				<div class="special-heading">
					<h2><?php the_time('Y'); ?></h2>
				</div>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>

				<?php
					$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
				?>

				<div class="special-heading">
					<h2><?php echo $curauth->nickname; ?></h2>
				</div>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>

				<div class="special-heading">
					<h2><?php _e('Blog Archives', 'skoon'); ?></h2>
				</div>
			
			<?php } ?>

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

			<?php get_template_part('nav'); ?>
			
		<?php else : ?>

			<h2><?php _e('Nothing found', 'skoon'); ?></h2>

		<?php endif; ?>

	</div><!--#posts-->

	<?php get_sidebar(); ?>

</div><!--.wrapper-->

<?php get_footer(); ?>