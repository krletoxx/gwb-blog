<?php if ( have_comments() ) { ?>

	<div class="comments-head">
		
		<h2><?php comments_number( __('No Comments', 'skoon'), __('One Comment', 'skoon'), __('% Comments', 'skoon') ); ?></h2>
		
	</div>
	
	<div id="comments" class="comment-entry group">
	
		<ol class="commentlist">
			<?php wp_list_comments('type=comment&callback=mola_comments'); ?>
		</ol>
	
	</div>
	
	 <?php
	 
		$paginate_args = array (
			'echo' => false,	
		);
	 
		paginate_comments_links( $paginate_args ); ?> 
	
<?php }


$comments_args = array (
	'title_reply'=> __( 'Leave a comment', 'skoon' ),
	'title_reply_to' => __( 'Leave a Reply to %s', 'skoon' ),
	'label_submit' => __( 'Submit Comment', 'skoon' ),
	'comment_notes_after' => '' );

comment_form($comments_args);