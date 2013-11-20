<div class="box dimensions hide-on-tablet">
	<header class="header">
		<h5 class="title"><?php _e("Skip dimensions:", THEME_NAME); ?></h5>
	</header>
	<div class="content clearfix">
		<div class="size span six break-on-mobile">
			<?php $image = get_field('dimensions_image'); ?>
			<?php if($image): ?>
			<img class="skip" src="<?php echo $image['url']; ?>" />
			<?php endif; ?>
		</div>
		<div class="details span four break-on-mobile right">
			<ul class="unstyled-list">
				<li><span class="key bold"><?php _e("Width", THEME_NAME); ?>:</span> <span class="value"><?php the_field('width'); ?></span></li>
				<li><span class="key bold"><?php _e("Depth", THEME_NAME); ?>:</span> <span class="value"><?php the_field('depth'); ?></span></li>
				<li><span class="key bold"><?php _e("Height", THEME_NAME); ?>:</span> <span class="value"><?php the_field('height'); ?></span></li>
			</ul>
		</div>
	</div>
</div>