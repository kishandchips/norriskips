<header class="header product-header hide-on-mobile">
	<div class="inner clearfix">
		<div class="alpha span four hide-on-tablet">
			<a href="<?php echo get_permalink(get_option('woocommerce_shop_page_id')); ?>" class="white-btn arrow-left-btn"><?php _e("Back to Skip Chooser", THEME_NAME); ?></a>
		</div>
		<div class="span six alpha omega break-on-tablet text-right call-us">
			<div class="span five">
				<h6><img class="valign-middle" src="<?php echo get_template_directory_uri(); ?>/images/icons/skip_question.png" />&nbsp;&nbsp;<?php _e("Need help choosing the right Skip?", THEME_NAME); ?></h6>
			</div>
			<div class="span five">
				<h6 class="normal valign-bottom phone-number-container"><?php _e("Call us on:", THEME_NAME); ?>&nbsp;&nbsp;<span class="phone-number"><?php the_field('phone_number', 'options'); ?></span></h6>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</header>