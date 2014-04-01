<header class="header product-header hide-on-mobile">
	<div class="inner clearfix">
		<div class="alpha span four hide-on-tablet">
			<a href="<?php echo get_permalink(get_option('woocommerce_shop_page_id')); ?>" class="white-btn arrow-left-btn"><?php _e("Back to Skip Chooser", THEME_NAME); ?></a>
		</div>
		<div class="span six alpha omega break-on-tablet text-right call-us">
			<h6 class="no-margin"><img class="valign-middle" src="<?php echo get_template_directory_uri(); ?>/images/icons/skip_question.png" />&nbsp;&nbsp;<?php _e("Need help choosing the right Skip?", THEME_NAME); ?>
				<?php $skip_finder = get_field('skip_finder', 'options'); ?>
				&nbsp;&nbsp;&nbsp;&nbsp;<a class="orange-btn" href="<?php echo get_permalink($skip_finder->ID); ?>"><?php _e("Use our Skip Chooser", THEME_NAME); ?></a>
			</h6>
		</div>
		<div class="clearfix"></div>
	</div>
</header>