<aside id="main-sidebar">

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(__('Sidebar Widgets', 'skoon'))) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
	
	<?php endif; ?>

</aside>