<?php get_header(); ?>

	<?php if(is_home() && !is_paged()){ ?>

		<?php get_template_part('featured', 'area'); ?>

		<div id="top-posts" class="wrapper">
			<section id="category-one">
				<div class="special-heading">
					<h2><?php echo of_get_option('first_cat_heading'); ?></h2>
				</div>
				<div class="small-posts">

					<?php

						$first_category = of_get_option('first_category');

						global $post;
						$args = array(
							'numberposts' => 2,
							'cat' => $first_category
						);
						
						$custom_posts = get_posts($args);
						foreach($custom_posts as $post) : setup_postdata($post);
					?>

					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="post-thumb">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('normal-post'); ?>
									<ul class="cap-meta">
										<li class="cap-date"><?php the_time( get_option('date_format') ); ?></li>
									</ul>
								</a>
							</div>
						<?php } ?>
						<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="excerpt"><?php echo mola_excerpt(14); ?></p>
					</article>
					
					<?php
						endforeach;
					?>

				</div><!--.small-posts-->

				<?php

					$first_category = of_get_option('first_category');

					global $post;
					$args = array(
						'numberposts' => 1,
						'offset' => 2,
						'cat' => $first_category
					);
					
					$custom_posts = get_posts($args);
					foreach($custom_posts as $post) : setup_postdata($post);
				?>

				<div id="large-post">
					<?php if ( has_post_thumbnail() ) { ?>
						<div id="large-thumb">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('large-post'); ?>
								<ul class="cap-meta">
									<li class="cap-author"><?php the_author_posts_link(); ?></li>
									<li class="cap-date"><?php the_time( get_option('date_format') ); ?></li>
								</ul>
							</a>
						</div>
					<?php } ?>
					<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<p class="excerpt"><?php echo mola_excerpt(26); ?></p>
				</div><!--#large-post-->
				
				<?php
					endforeach;
				?>

			</section>

			<section id="category-two">
				<div class="special-heading">
					<h2><?php echo of_get_option('second_cat_heading'); ?></h2>
				</div>
				<div class="small-posts">

					<?php

						$second_category = of_get_option('second_category');

						global $post;
						$args = array(
							'numberposts' => 2,
							'cat' => $second_category
						);
						
						$custom_posts = get_posts($args);
						foreach($custom_posts as $post) : setup_postdata($post);
					?>

					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="post-thumb">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('normal-post'); ?>
									<ul class="cap-meta">
										<li class="cap-date"><?php the_time( get_option('date_format') ); ?></li>
									</ul>
								</a>
							</div>
						<?php } ?>
						<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="excerpt"><?php echo mola_excerpt(14); ?></p>
					</article>
					
					<?php
						endforeach;
					?>

				</div><!--.small-posts-->
				<div class="small-posts">
					
					<?php

						$second_category = of_get_option('second_category');

						global $post;
						$args = array(
							'numberposts' => 2,
							'offset' => 2,
							'cat' => $second_category
						);
						
						$custom_posts = get_posts($args);
						foreach($custom_posts as $post) : setup_postdata($post);
					?>

					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="post-thumb">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('small-post'); ?>
									<ul class="cap-meta">
										<li class="cap-date"><?php the_time( get_option('date_format') ); ?></li>
									</ul>
								</a>
							</div>
						<?php } ?>
						<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="excerpt"><?php echo mola_excerpt(14); ?></p>
					</article>
					
					<?php
						endforeach;
					?>

				</div><!--.small-posts-->
			</section>
		</div><!--#top-posts-->

	<?php } ?>

	<div class="wrapper">

		<?php if(is_home() && !is_paged()){ ?>

			<?php get_template_part('carousel') ?>

		<?php } ?>

		<section id="posts">
			<div class="special-heading">
				<h2><?php echo of_get_option('recent_heading'); ?></h2>
			</div>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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

			<?php else : ?>

				<h2><?php _e('Nothing found', 'skoon'); ?></h2>

			<?php endif; ?>

			<?php get_template_part('nav'); ?>

		</section>

		<?php get_sidebar(); ?>

	</div><!--.wrapper-->

<?php get_footer(); ?>