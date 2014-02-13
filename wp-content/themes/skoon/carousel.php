<?php
/**
 * Carousel template part.
 */
?>

<div id="car-wrap" class="group">
	<span class="car-prev"></span>
	<div id="carousel">
		<ul>
			
			<?php // additional loop via get_posts
				
				$catergory_option = of_get_option('car_category');
				$number_of_posts = of_get_option('car_number');;
				$order_by = of_get_option('car_order');
				
				if($number_of_posts > 20) {
					$number_of_posts = 20;
				}
			
				global $post;
				$args = array(
					'numberposts' => $number_of_posts,
					'cat' => $catergory_option,
					'orderby' => $order_by
				);
				
				$custom_posts = get_posts($args);
				foreach($custom_posts as $post) : setup_postdata($post);
			?>
			
				<li <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="post-thumb">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-post'); ?></a>
						</div>
					<?php } ?>
				</li>
			
			<?php
				endforeach;
			?>
			
		</ul>
	</div><!--#carousel-->
	<span class="car-next"></span>
</div><!--.car-wrap-->