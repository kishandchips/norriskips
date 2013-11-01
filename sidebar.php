<div id="sidebar" class="span two omega">
	<button class="mobile-sidebar-btn"></button>
	<?php 
	if ( ! acf_Widget::dynamic_widgets( 'Side Bar' ) ) :
		dynamic_sidebar('default');
	endif;
	?>
</div>