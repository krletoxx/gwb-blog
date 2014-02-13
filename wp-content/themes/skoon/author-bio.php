<?php // Template part for displaying author bio ?>

<?php

	$description = get_the_author_meta( 'description' );
	if( $description != null ) {
		
?>

<div id="about-author">
 
	<?php echo get_avatar( get_the_author_meta( 'ID' ), '80' ); ?>
	
	<div class="author-text group">
 
		<h3><?php the_author(); ?></h3>
 
		<p><?php echo wp_kses( get_the_author_meta( 'description' ), null ); ?></p>
		
		<div class="author-icons">
			
			<?php if ( get_the_author_meta( 'twitter' ) != '' )  { ?>	
				<a class="twitter-link" href="<?php echo wp_kses( get_the_author_meta( 'twitter' ), null ); ?>"><?php _e('Twitter', 'skoon'); ?></a>
			<?php } ?>
			
			<?php if ( get_the_author_meta( 'facebook' ) != '' )  { ?>	
				<a class="facebook-link" href="<?php echo wp_kses( get_the_author_meta( 'facebook' ), null ); ?>"><?php _e('Facebook', 'skoon'); ?></a>
			<?php } ?>

			<?php if ( get_the_author_meta( 'pinterest' ) != '' )  { ?>	
				<a class="pinterest-link" href="<?php echo wp_kses( get_the_author_meta( 'pinterest' ), null ); ?>"><?php _e('Pinterest', 'skoon'); ?></a>
			<?php } ?>
			
			<?php if ( get_the_author_meta( 'google' ) != '' )  { ?>	
				<a class="google-link" href="<?php echo wp_kses( get_the_author_meta( 'google' ), null ); ?>"><?php _e('Google Plus', 'skoon'); ?></a>
			<?php } ?>

			<?php if ( get_the_author_meta( 'dribbble' ) != '' )  { ?>	
				<a class="dribbble-link" href="<?php echo wp_kses( get_the_author_meta( 'dribbble' ), null ); ?>"><?php _e('Dribbble', 'skoon'); ?></a>
			<?php } ?>
		
		</div><!--.author-icons-->
			
	</div><!--.author-text-->
	
</div><!--#about-author-->

<?php

	}

?>