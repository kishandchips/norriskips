<?php
	$parent_page = get_queried_page(1);
	$page = get_queried_page();
?>
<?php if($parent_page && get_field('show_page_title', $parent_page->ID)): ?>
<header id="page-header" class="header">
	<div class="container">
		<h2 class="title"><?php echo get_the_title($parent_page->ID); ?></h2>
		<?php if(is_page() && has_post_thumbnail($page->ID)): ?>
		<div class="thumbnail">
			<?php echo get_the_post_thumbnail($page->ID); ?>
		</div>
		<?php endif; ?>
	</div>
</header>
<?php endif; ?>