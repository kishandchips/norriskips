<?php 
/*
 * Template Name: Skip Finder
 */
?>
<?php get_header(); ?>
<section id="template-skip-finder">
	<?php get_template_part('inc/page-header'); ?>
	<div class="inner container">
		<div id="content">
			<div class="calculator span seven">
				<div class="inner">
					<header class="header">
						<h3 class="title text-center"><?php _e("What will you need this skip for?", THEME_NAME); ?></h3>
					</header>
					<div class="content">
						<div class="bin-bags clearfix">
							<div class="images span three">
								<img src="<?php echo get_template_directory_uri(); ?>/images/misc/house.png" />
							</div>
							<div class="span seven omega">
								<h5 class="bold blue"><?php _e("Household Waste", THEME_NAME); ?></h5>
								<div class="slider"></div>
								<div class="description">
									<p class="bold"><?php _e("How much household waste do you need to get rid of?", THEME_NAME); ?></p>
								</div>
							</div>
						</div>
						<div class="wheel-barrows clearfix">
							<div class="images span three">
								<img src="<?php echo get_template_directory_uri(); ?>/images/misc/wheel_barrow.png" />
							</div>
							<div class="span seven omega">
								<h5 class="bold blue"><?php _e("Garden Waste", THEME_NAME); ?></h5>
								<div class="slider"></div>
								<div class="description">
									<p class="bold"><?php _e("How much garden waste do you need to get rid of?", THEME_NAME); ?></p>
								</div>
							</div>
						</div>
					</div>
					<footer class="footer clearfix">
						<h4 class="left"><?php _e("Already know which skip you need?", THEME_NAME); ?></h4>
						<a class="orange-btn right" href="<?php echo get_permalink(get_option('woocommerce_shop_page_id')); ?>"><i class="icon-grid"></i> <?php _e("See the full range", THEME_NAME); ?></a>
					</footer>
				</div>
			</div>
			<div class="results span three right">
				<div class="inner">
					<header class="header">
						<h3 class="title text-center blue"><?php _e("Recommended Skip", THEME_NAME); ?></h3>
					</header>

					<div class="content">
						<div class="no-product">
							<img src="<?php echo get_template_directory_uri(); ?>/images/misc/no_skip_selected.jpg" />
						</div>
						<div class="product">

						</div>
					</div>
				</dov>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>