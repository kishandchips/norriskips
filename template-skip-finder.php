<?php 
/*
 * Template Name: Skip Finder
 */

$products_query = new WP_Query(array('post_type' => 'product', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC')); 				
?>
<?php get_header(); ?>
<section id="template-skip-finder">
	<?php get_template_part('inc/page-header'); ?>
	<div class="inner container">
		<div class="calculator clearfix">
			<div class="question span six break-on-tablet">
				<div class="inner">
					<header class="header">
						<h3 class="title text-center"><?php _e("What will you need this skip for?", THEME_NAME); ?></h3>
					</header>
					<div class="content">
						<?php if($products_query->have_posts()): ?>
						<div class="images results">
							<img class="result" data-index="0" src="<?php echo get_template_directory_uri(); ?>/images/misc/house.jpg" />
							<?php $i = 1; ?>
							<?php while($products_query->have_posts()): $products_query->the_post();?>
							<?php if($image = get_field('waste_image')): ?>
								<img class="result hide" data-index="<?php echo $i; ?>" src="<?php echo $image['url']; ?>" />
								<?php $i++; ?>
							<?php endif; ?>
							<?php endwhile; ?>
							<img class="result hide" data-index="<?php echo $i; ?>" src="<?php echo get_template_directory_uri(); ?>/images/misc/waste.jpg" />
							
						</div>
						<?php endif; ?>
							<div class="slider" data-max="<?php echo $products_query->post_count + 1; ?>"></div>
						<div class="descriptions results">
							<div class="description result" data-index="0">
								<h4 class="blue text-center"><?php _e("Drag the slider", THEME_NAME); ?> <span class="scroll-down"><?php _e("and scroll down", THEME_NAME); ?></span> <?php _e("to find the best skip for your needs.", THEME_NAME); ?></h4>
							</div>
							<?php $i = 1; ?>
							<?php while($products_query->have_posts()): $products_query->the_post();?>
							<?php if($image = get_field('waste_image')): ?>
								<div class="description result hide" data-index="<?php echo $i; ?>">
									<?php the_field('waste_description'); ?>
								</div>
								<?php $i++; ?>
							<?php endif; ?>
							<?php endwhile; ?>
							<div class="description result hide" data-index="<?php echo $i ?>">
								<h4 class="blue"><?php _e("Something Bigger...", THEME_NAME); ?></h4>
								<p class="bold"><?php _e("COPY TO BE SUPPLIED", THEME_NAME); ?></p>
							</div>
							
						</div>
						
					</div>
					<footer class="footer clearfix hide-on-tablet">
						<h4 class="left"><?php _e("Already know which skip you need?", THEME_NAME); ?></h4>
						<a class="orange-btn right" href="<?php echo get_permalink(get_option('woocommerce_shop_page_id')); ?>"><i class="icon-grid"></i> <?php _e("See the full range", THEME_NAME); ?></a>
					</footer>
				</div>
			</div>
			<div class="recommended span four right break-on-tablet">
				<div class="inner">
					<header class="header">
						<h3 class="title text-center blue"><?php _e("Recommended Skip", THEME_NAME); ?></h3>
					</header>
					<?php if($products_query->have_posts()): ?>
					<div class="content products results" >
						<div class="result no-product" data-index="0">
							<img src="<?php echo get_template_directory_uri(); ?>/images/misc/no_skip_selected.jpg" />
						</div>
						<?php $i = 1; ?>
						<?php while($products_query->have_posts()): $products_query->the_post();?>
						<div class="result product hide" data-index="<?php echo $i; ?>">
							<div class="top">
								<?php if($dimensions_image = get_field('dimensions_image')): ?>
								<div class="image">
								<?php if($capacity_image = get_field('capacity_image')): ?>
									<img class="capacity" src="<?php echo $capacity_image['url']; ?>" />
									<div class="mask">
										<img class="dimensions" src="<?php echo $dimensions_image['url']; ?>" />
									</div>
								<?php else: ?>
									<img class="dimensions" src="<?php echo $dimensions_image['url']; ?>" />
								<?php endif; ?>
								</div>
								<?php endif; ?>
								<h4 class="title text-center"><?php the_title(); ?></h4>
								<p class="small dimensions"><b>W:</b> <?php the_field('width'); ?>&nbsp;&nbsp;<b>D:</b> <?php the_field('depth'); ?>&nbsp;&nbsp;<b>H:</b> <?php the_field('height'); ?></p>
							</div>
							<div class="bottom">
								<h6 class="title text-center"><?php _e("This skip is suitable for:", THEME_NAME); ?></h5>
								<div class="capacities clearfix">
									<li class="alpha capacity span five bin-bags">
										<div class="inner">
											<p class="text-center">
												<img src="<?php echo get_template_directory_uri(); ?>/images/icons/bin_bag.png" class="bin-bag-img" /> 
												<span class="value"><?php //the_field(); ?>x 40 - 45</span>
												<br />
												<span class="label"><?php _e("Large rubbish bags", THEME_NAME); ?></span>
											</p>
										</div>
									</li>
									<li class="omega capacity span five wheel-barrows">
										<div class="inner">
											<p class="text-center">
												<img src="<?php echo get_template_directory_uri(); ?>/images/icons/wheel_barrow.png" class="wheel-barrow-img" /> 
												<span class="value"><?php //the_field(); ?>x 40 - 45</span>
												<br />
												<span class="label"><?php _e("Builder's wheelbarrow loads", THEME_NAME); ?></span>
											</p>
										</div>
									</li>
								</div>
								<?php if($note = get_field('note')): ?>
								<div class="note alert">
									<?php echo $note; ?>
								</div>
								<?php endif; ?>
								<footer class="footer">
									<p class="text-center">
										<a href="<?php the_permalink(); ?>" class="orange-btn"><i class="icon-tick" data-aria="hidden"></i> <?php _e("Select this Skip", THEME_NAME); ?></a>
									</p>
								</footer>
							</div>
						</div>
						<?php $i++; ?>
						<?php endwhile; ?>
						<div class="result no-product hide" data-index="<?php echo $i; ?>">

							<img src="<?php echo get_template_directory_uri(); ?>/images/misc/trucks_color.png" />
							<h6><?php _e("You may need a specific waste management solution for your job. Call us now to discuss your requirements:", THEME_NAME); ?></h6>
							<h4 class="phone-number"><i class="icon-phone circle"></i> <?php the_field('phone_number', 'options'); ?></h4>
							<h6><?php _e("Alternatively, get in touch with us via Live Chat", THEME_NAME); ?></h6>
							<a href="#" class="orange-btn"><?php _e("Open Live Chat", THEME_NAME); ?></a>
						</div>
					</div>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>