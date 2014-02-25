<?php $upgrade_product = get_the_adjacent_fukn_post('next', array('post_type' => 'product')); ?>
<div class="box blue upgrade hide-on-mobile">
	<header class="header">
		<?php if($upgrade_product): ?>
		<h5 class="title"><?php _e("Are you sure this is big enough?:", THEME_NAME); ?></h5>
		<?php else: ?>
		<h5 class="title"><?php _e("Need a bigger Skip?", THEME_NAME); ?></h5>
		<?php endif; ?>

	</header>
	<div class="content clearfix">
		<?php if($upgrade_product): ?>
		<div class="span seven">
			<!--h6><?php _e("Don’t be caught short!", THEME_NAME); ?><br />
			<span class="normal"><?php //_e("You can get double the space for only an extra ", THEME_NAME); ?><?php //the_price_difference(get_the_id(), $upgrade_product->ID); ?>.</h6-->
			<?php the_field('upgrade_description', get_the_id()); ?>
			<p><a href="<?php the_permalink(); ?>/upgrade" class="orange-btn"><?php _e("Upgrade", THEME_NAME); ?></a></p>
		</div>
		<img class="hide-on-tablet upgrade-img" src="<?php echo get_template_directory_uri(); ?>/images/misc/upgrade.png" />
		<?php else: ?>
		<h6 >
			<?php _e("You may need a specific waste management solution for your job.", THEME_NAME); ?>
			<span class="normal"><?php _e("Call us now to discuss your requirements:", THEME_NAME); ?></span>
		</h6>
		<h4 class="phone-number"><i class="icon-phone circle"></i> <?php the_field('phone_number_local', 'options'); ?></h4>
		<p><?php _e("Alternatively, get in touch with us via Live Chat", THEME_NAME); ?></p>
		<p><a class="orange-btn ClickdeskChatLink" image="false"><?php _e("Open Live Chat", THEME_NAME); ?></a></p>
		<?php endif; ?>
	</div>
</div>