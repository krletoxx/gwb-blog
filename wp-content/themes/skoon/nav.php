<?php
/**
 * The template part for displaying pagination.
 */
?>
<?php
	global $wp_query;  
	
	$total_pages = $wp_query->max_num_pages;  
	
	if ($total_pages > 1){  
	
	$current_page = max(1, get_query_var('paged'));  
	
	echo '<div class="pagination group">';  
	
	echo paginate_links(array(  
	  'base' => get_pagenum_link(1) . '%_%',  
	  'format' => '/page/%#%',  
	  'current' => $current_page,  
	  'total' => $total_pages,  
	  'prev_text' => __('Prev', 'skoon'),
	  'next_text' => __('Next', 'skoon')
	));
	
	echo '</div>';
	
	}
?>