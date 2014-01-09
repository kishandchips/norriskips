<?php get_header(); ?>
<section id="upgrade-single-product">
	<?php get_template_part('inc/page-header'); ?>
	<div class="inner container">
		<?php do_action( 'woocommerce_before_single_product' ); ?>
		<div class="products clearfix">
			<?php if(have_posts()): ?>
			<?php while(have_posts()): the_post(); ?>
			<?php $upgrade_product = get_the_adjacent_fukn_post('next', array('post_type' => 'product')); ?>
			<?php if($upgrade_product): ?>
			<?php $upgrade_id = $upgrade_product->ID; ?>
			<div class="product current span five break-on-tablet">
				<div class="box product-info">
					<div class="content">
						<h3 class="title text-center"><?php _e("You have selected", THEME_NAME); ?></h3>
						<div class="thumbnail text-center">
							<?php $image = get_field('dimensions_image'); ?>
							<?php if($image): ?>
							<img src="<?php echo $image['url']; ?>" />
							<?php endif; ?>
						</div>
						<h4 class="title text-center"><?php the_title(); ?></h4>
					</div>
					<footer class="footer">
						<h3 class="price text-center no-margin">&nbsp;</h3>
					</footer>
				</div>
				<div class="box">
					<header class="header">
						<h5 class="title bold text-center"><?php _e("This can hold", THEME_NAME); ?></h5>
					</header>
					<div class="content">

						<?php if($current_bin_bags = get_field('bin_bags')): ?>
							<div class="bin-bags">
							<h6><?php echo $current_bin_bags.' - '. ($current_bin_bags + 5); ?> <span class="normal"><?php _e("Large Bin Bags", THEME_NAME); ?></span></h6>
							<?php for($i = 0; $i < $current_bin_bags; $i++): ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/bin_bag.png" class="bin-bag-img"/>
							<?php endfor; ?>
						</div>
						<?php endif; ?>

						<?php if($current_wheel_barrows = get_field('wheel_barrows')): ?>
							<div class="bin-bags">
							<h6><?php echo $current_wheel_barrows.' - '. ($current_wheel_barrows + 5); ?> <span class="normal"><?php _e("Large Bin Bags", THEME_NAME); ?></span></h6>
							<?php for($i = 0; $i < $current_wheel_barrows; $i++): ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/wheel_barrow.png" class="wheel-barrow-img"/>
							<?php endfor; ?>
						</div>
						<?php endif; ?>
					</div>
					<footer class="footer">
						<p class="text-center">
							<a href="<?php the_permalink(); ?>" class="grey-btn"><?php _e("Keep this Skip", THEME_NAME); ?></a>
						</p>
					</footer>
				</div>
			</div>
			<div class="product upgrade span five break-on-tablet">
				<div class="box product-info">
					<div class="content">
						<h3 class="title text-center blue"><?php _e("Why not upgrade to", THEME_NAME); ?></h3>
						<div class="thumbnail text-center">
							<?php $image = get_field('dimensions_image', $upgrade_id); ?>
							<?php if($image): ?>
							<img src="<?php echo $image['url']; ?>" />
							<?php endif; ?>
						</div>
						<h4 class="title text-center"><?php echo get_the_title($upgrade_id); ?></h4>
					</div>
					<footer class="footer">
						<h3 class="price text-center no-margin">
							<span class="tiny">For only</span> £25 <span class="tiny">Extra</span>
						</h3>
					</footer>
				</div>
				<div class="box">
					<header class="header">
						<h5 class="title bold text-center"><?php _e("This can hold", THEME_NAME); ?></h5>
					</header>
					<div class="content">

						<?php if($upgrade_bin_bags = get_field('bin_bags', $upgrade_id)): ?>
							<div class="bin-bags">
							<h6><?php echo $upgrade_bin_bags.' - '. ($upgrade_bin_bags + 5); ?> <span class="normal"><?php _e("Large Bin Bags", THEME_NAME); ?></span></h6>
							<?php for($i = 0; $i < $upgrade_bin_bags; $i++): ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/bin_bag.png" class="bin-bag-img <?php if($i < $current_bin_bags) echo 'fade'; ?>"/>
							<?php endfor; ?>
						</div>
						<?php endif; ?>

						<?php if($upgrade_wheel_barrows = get_field('wheel_barrows', $upgrade_id)): ?>
							<div class="bin-bags">
							<h6><?php echo $upgrade_wheel_barrows.' - '. ($upgrade_wheel_barrows + 5); ?> <span class="normal"><?php _e("Large Bin Bags", THEME_NAME); ?></span></h6>
							<?php for($i = 0; $i < $upgrade_wheel_barrows; $i++): ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/wheel_barrow.png" class="wheel-barrow-img <?php if($i < $current_wheel_barrows) echo 'fade'; ?>"/>
							<?php endfor; ?>
						</div>
						<?php endif; ?>
					</div>
					<footer class="footer">
						<p class="text-center">
							<a href="<?php the_permalink(); ?>" class="orange-btn"><i class="icon-tick" data-aria="hidden"></i> <?php _e("Upgrade to this Skip", THEME_NAME); ?></a>
						</p>
					</footer>
				</div>
			</div>
			<?php else: ?>
			<h3 class="text-center"><?php _e("No upgrade available", THEME_NAME); ?><br />&nbsp;</h3>
			<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>