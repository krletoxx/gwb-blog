<?php
	/*
		Template Name: Contact Page
	*/
?>

<?php get_header(); ?>

<div class="wrapper">

	<?php
		if ( of_get_option('map_url') )
		{
			get_template_part('contact', 'map');
		}
	?>

	<div id="posts">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="special-heading">
				<h2><?php the_title(); ?></h2>
			</div>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<div class="entry">
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
				</div>

			</article>

		<?php endwhile; endif; ?>

	</div><!--#posts-->

	<?php get_sidebar(); ?>

</div><!--.wrapper-->

<?php get_footer(); ?>