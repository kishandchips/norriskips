<?php if(get_field('show_page_title')): ?>
<header id="page-header" class="header">
	<div class="container">
		<h2 class="title"><?php the_title(); ?></h2>
		<?php if(has_post_thumbnail()): ?>
		<div class="thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php endif; ?>
	</div>
</header>
<?php endif; ?>