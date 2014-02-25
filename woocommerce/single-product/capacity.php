<div class="box capacity hide-on-tablet">
	<header class="header">
		<h5 class="title"><?php _e("This skip can hold:", THEME_NAME); ?></h5>
	</header>
	<div class="content clearfix">
		<?php if($bin_bags = get_field('bin_bags')): ?>
		<div class="bin-bags span five break-on-mobile">
			<h5><span class="bold"><?php the_field('bin_bags_text'); ?></span> <?php _e("Large Bin Bags", THEME_NAME); ?></h5>
			<?php for($i = 0; $i < $bin_bags; $i++): ?>
			<img src="<?php echo get_template_directory_uri(); ?>/images/icons/bin_bag.png" class="bin-bag-img"/>
			<?php endfor; ?>
		</div>
		<?php endif; ?>
		<?php if($wheel_barrows = get_field('wheel_barrows')): ?>
		<div class="wheel-barrows span five break-on-mobile right">
			<h5><span class="bold"><?php the_field('wheel_barrows_text'); ?></span> <?php _e("builder’s barrow loads", THEME_NAME); ?></h5>
			<?php for($i = 0; $i < $wheel_barrows; $i++): ?>
			<img src="<?php echo get_template_directory_uri(); ?>/images/icons/wheel_barrow.png" class="wheel-barrow-img"/>
			<?php endfor; ?>
		</div>
		<?php endif; ?>
	</div>
</div>