<div id="featured-area">
	<div class="wrapper">

		<div id="large-feat">
			<?php
				$catergory_option = of_get_option('feat_category');
			
				global $post;
				$args = array(
					'numberposts' => 1,
					'cat' => $catergory_option
				);
				
				$custom_posts = get_posts($args);
				foreach($custom_posts as $post) : setup_postdata($post);
			?>

			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('feat-large'); ?></a>
			<div class="feat-cap">
				<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<ul class="cap-meta">
					<li class="cap-author"><?php the_author_posts_link(); ?></li>
					<li class="cap-date"><?php the_time( get_option('date_format') ); ?></li>
					<li class="cap-read"><a href="<?php the_permalink(); ?>"><?php _e('read more', 'skoon'); ?></a></li>
				</ul>
			</div>
			
			<?php
				endforeach;
			?>
		</div><!--#large-feat-->

		<div id="small-feat-wrap">

			<div class="small-feat top-small">
				<?php
					$catergory_option = of_get_option('feat_category');
			
					global $post;
					$args = array(
						'numberposts' => 1,
						'offset' => 1,
						'cat' => $catergory_option
					);
					
					$custom_posts = get_posts($args);
					foreach($custom_posts as $post) : setup_postdata($post);
				?>

				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('feat-small'); ?></a>
				<div class="feat-cap">
					<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<ul class="cap-meta">
						<li class="cap-author"><?php the_author_posts_link(); ?></li>
						<li class="cap-date"><?php the_time( get_option('date_format') ); ?></li>
						<li class="cap-read"><a href="<?php the_permalink(); ?>"><?php _e('read more', 'skoon'); ?></a></li>
					</ul>
				</div>
				
				<?php
					endforeach;
				?>
			</div><!--.small-feat-->

			<div class="small-feat bottom-small">
				<?php
					$catergory_option = of_get_option('feat_category');
			
					global $post;
					$args = array(
						'numberposts' => 1,
						'offset' => 2,
						'cat' => $catergory_option
					);
					
					$custom_posts = get_posts($args);
					foreach($custom_posts as $post) : setup_postdata($post);
				?>

				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('feat-small'); ?></a>
				<div class="feat-cap">
					<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<ul class="cap-meta">
						<li class="cap-author"><?php the_author_posts_link(); ?></li>
						<li class="cap-date"><?php the_time( get_option('date_format') ); ?></li>
						<li class="cap-read"><a href="<?php the_permalink(); ?>"><?php _e('read more', 'skoon'); ?></a></li>
					</ul>
				</div>
				
				<?php
					endforeach;
				?>
			</div><!--.small-feat-->

		</div><!--#small-feat-wrap-->

	</div><!--.wrapper-->
</div><!--#featured-area-->