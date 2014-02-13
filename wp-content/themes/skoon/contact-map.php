<?php
/**
 * Contact Page Map.
 */
?>

<?php $map_url = of_get_option('map_url'); ?>

<div id="contact-map">
	<iframe width="630" height="460" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $map_url; ?>&amp;output=embed"></iframe>
</div>